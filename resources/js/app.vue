<template>
    <login-form v-if="!isUserLogin"></login-form>
    <Navbar v-if="isUserLogin"></Navbar>

    <div v-if="isUserLogin" class="d-flex flex-wrap">

        <aside class="mh-100 bg-secondary" style="width: 15rem;">

                <div class="card rounded-0 sticky-top">
                    <Sidebar></Sidebar>
                </div>

        </aside>

        <main style="width:calc(100% - 15rem);">
            <router-view></router-view>
        </main>

    </div>
</template>

<script>
import Sidebar from "@/components/Sidebar.vue";
import Navbar from "@/components/Navbar.vue";
import loginForm from "@/components/LoginForm.vue";
export default {
    components: {
        Sidebar,
        Navbar,
        loginForm
    },
    computed: {
        isUserLogin() {
            return this.$store.state.isUserLogin
        }
    }
}

</script>

<style scoped>

</style>
