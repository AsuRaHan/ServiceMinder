<template>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="@/../images/logo-light-n.svg" class="img-fluid">
                        <!--                        <h4>Hello! Let's get started</h4>-->
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                    </div>
                    <Transition name="fade">
                        <div v-if="isError" class="alert alert-danger d-flex justify-content-between" role="alert">
                            <i class="bi bi-exclamation-octagon align-self-start"></i>
                            <span class="align-self-center">{{ errorMessage }}</span>
                            <i class="bi bi-emoji-frown align-self-end"></i>
                        </div>
                    </Transition>
                    <form @submit.prevent="login" class="pt-3">
                        <div class="form-group mb-3">
                            <input v-model="email" type="email"
                                   :class="{ 'is-invalid': isError }"
                                   class="form-control" id="InputEmail1"
                                   placeholder="E-Mail" required>
                            <div v-if="isError" class="invalid-feedback">
                                Please provide a valid email.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input v-model="password" type="password"
                                   :class="{ 'is-invalid': isError }"
                                   class="form-control" id="InputPassword"
                                   placeholder="Password" required>
                            <div v-if="isError" class="invalid-feedback">
                                Please provide a valid Password.
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" type="submit">SIGN IN</button>
                        </div>
                        <!--                        <div class="my-2 d-flex justify-content-between align-items-center">-->
                        <!--                            <a href="#" class="text-black">Forgot password?</a>-->
                        <!--                        </div>-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>

<script>
import gql from 'graphql-tag'
import { onLogin } from '../vue-apollo'
// GraphQL Mutation with one parameter
const mutation = gql`
        mutation Login($email: String!, $password: String!) {
            login(input: { email: $email, password: $password }) {
                accessToken
                user {
                    id
                    name
                    email
                }
            }
        }
`;
export default {
    data() {
        return {
            isError: false,
            email: '', password: '',
            errorMessage: ''
        }
    },
    methods: {
        login() {
            this.isError = false;
            this.errorMessage = '';
            this.$apollo.mutate({
                mutation: mutation,
                variables: {
                    email: this.email,
                    password: this.password
                }
            }).then(data => {
                const userData = data.data.login;
                const apolloClient = this.$apollo.provider.defaultClient;
                onLogin(apolloClient, userData.accessToken).then(() => {
                    this.$store.state.user = userData.user;
                    this.$store.state.userToken = userData.accessToken;
                    this.$store.state.isUserLogin = true;
                });
            }).catch(error => {
                this.isError = true;
                this.errorMessage = error.message;
                console.log(error);
            });

        }
    }
}

</script>
