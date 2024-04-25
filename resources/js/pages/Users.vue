<template>
    <h2>Список пользователей</h2>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" @click="sort('id')">ID</th>
                <th scope="col" @click="sort('name')">Name</th>
                <th scope="col" @click="sort('email')">E-mail</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in usersList" :key="user.id">
                <td>{{ user.id }}</td>
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <paginator :totalPages="totalPages" :currentPage="currentPage" @page-changed="changePage" />
</template>

<script>
import gql from 'graphql-tag'
import Paginator from '@/components/Paginator.vue'

const queryUsers = gql`
query users(
  $first: Int,
  $page: Int,
) {
  users(first: $first, page: $page) {
    data {
      email
      id
      name
      created_at
      updated_at
    }
    paginatorInfo {
      total
      count
      currentPage
      lastPage
      hasMorePages
    }
  }
}
`;

export default {
    components: {
        Paginator
    },
    data() {
        return {
            isError: false,
            usersList: [],
            currentPage: 1,
            itemsPerPage: 10,
            totalUsers: 0,
            totalPages: 0,
            sortBy: null,
            sortDesc: false,
        }
    },
    created() {
        this.fetchUsers();
    },
    computed: {
        sortedUsers() {
            if (this.sortBy) {
                return this.usersList.slice().sort((a, b) => {
                    if (this.sortDesc) {
                        return b[this.sortBy] < a[this.sortBy] ? -1 : 1;
                    } else {
                        return a[this.sortBy] < b[this.sortBy] ? -1 : 1;
                    }
                });
            } else {
                return this.usersList;
            }
        }
    },
    methods: {
        fetchUsers() {
            this.$apollo.query({
                query: queryUsers,
                variables: {
                    first: this.itemsPerPage,
                    page: this.currentPage,
                    orderBy: this.sortBy ? [{ column: this.sortBy, order: this.sortDesc ? 'DESC' : 'ASC' }] : undefined,
                    sortBy: this.sortBy,
                    sortDesc: this.sortDesc
                }
            }).then(data => {
                const usersData = data.data.users;
                this.usersList = usersData.data;
                this.totalUsers = usersData.paginatorInfo.total;
                this.totalPages = Math.ceil(this.totalUsers / this.itemsPerPage); // Вычисляем общее количество страниц
            });
        },
        changePage(page) {
            this.currentPage = page;
            this.fetchUsers();
        },
        sort(column) {
            if (this.sortBy === column) {
                this.sortDesc = !this.sortDesc;
            } else {
                this.sortBy = column;
                this.sortDesc = false;
            }
            this.fetchUsers();
        },
    },
}
</script>
