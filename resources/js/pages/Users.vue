<template>
    <h2>Список пользователей</h2>

    <div class="search-bar">
        <input type="text" v-model="searchName" placeholder="Search by name" @input="fetchUsers" />
        <input type="text" v-model="searchEmail" placeholder="Search by email" @input="fetchUsers" />
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" @click="sort('ID')">
                    ID <span v-if="sortBy === 'ID'">{{ sortDesc ? '↓' : '↑' }}</span>
                </th>
                <th scope="col" @click="sort('NAME')">
                    Name <span v-if="sortBy === 'NAME'">{{ sortDesc ? '↓' : '↑' }}</span>
                </th>
                <th scope="col" @click="sort('EMAIL')">
                    E-mail <span v-if="sortBy === 'EMAIL'">{{ sortDesc ? '↓' : '↑' }}</span>
                </th>
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
  $orderBy: [QueryUsersOrderByOrderByClause!],
  $name: String,
  $email: String
) {
  users(first: $first, page: $page, orderBy: $orderBy, name: $name, email: $email) {
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
            searchName: '',
            searchEmail: '',
        }
    },
    created() {
        this.fetchUsers();
    },
    methods: {
        fetchUsers() {
            this.$apollo.query({
                query: queryUsers,
                variables: {
                    first: this.itemsPerPage,
                    page: this.currentPage,
                    orderBy: this.sortBy ? [{ column: this.sortBy, order: this.sortDesc ? 'DESC' : 'ASC' }] : [],
                    name: this.searchName ? `%${this.searchName}%` : undefined,
                    email: this.searchEmail ? `%${this.searchEmail}%` : undefined,
                }
            }).then(data => {
                const usersData = data.data.users;
                this.usersList = usersData.data;
                this.totalUsers = usersData.paginatorInfo.total;
                this.totalPages = Math.ceil(this.totalUsers / this.itemsPerPage); // Вычисляем общее количество страниц
            }).catch(error => {
                console.error('Error fetching users:', error);
                this.isError = true;
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

