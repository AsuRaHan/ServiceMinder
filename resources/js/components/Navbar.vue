<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="navbar-brand bg-light"><img src="@/../images/logo-light-n.svg" class="img-fluid"></div>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="nav-link">
                            <i class="bi bi-envelope-exclamation"></i>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a @click.prevent="logout" class="nav-link" href="/logout">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import {onLogout} from '../vue-apollo'

import gql from "graphql-tag";

const mutationLogout = gql`
    mutation logout {
      logout {
        id
      }
    }
`;
export default {
    created() {
        // `this` указывает на экземпляр vm
        console.log('Navbar created user data',this.$store.state.user);
    },
    methods: {
        /**
         * Logs out the user by calling the `onLogout` function and updating the `isUserLogin` state.
         * @returns {Promise<void>} A promise that resolves when the logout is complete.
         */
        logout() {
            this.$apollo.mutate({
                mutation: mutationLogout,
            }).then(data => {
                const userData = data.data;
                console.log(userData);
                // Call the `onLogout` function with the default Apollo client
                onLogout(this.$apollo.provider.defaultClient)
                .then(() => {
                    this.$store.state.user = {};
                    this.$store.state.userToken = '';
                    // Update the `isUserLogin` state to `false`
                    this.$store.state.isUserLogin = false;
                });
            }).catch(error => {
                console.log(error);
            });

        }
    }
}

</script>
