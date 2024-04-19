<template>
    <h2>About Page</h2>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
            </tr>
            </tbody>
        </table>
    </div>


</template>

<script>
import gql from 'graphql-tag'
const queryUsers = gql`
query users ($first: Int, $page: Int) {
  users(first: $first, page: $page) {
    data {
      email
      id
      name
    }
    paginatorInfo {
      total
      count
      currentPage
      lastPage
    }
  }
}
`;
export default {
    data() {
        return {
            isError: false,
        }
    },
    created() {
        this.$apollo.query({
            query: queryUsers,
            variables: {
                first: 5,
                page: 1
            }
            }).then(data => {
            const usersData = data.data.users;
            console.log(usersData.data);
        });
    },
}
</script>
