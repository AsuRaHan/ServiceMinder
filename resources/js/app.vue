<template>

    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <h3 class="navbar-brand">Admin</h3>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="/user/logout"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="d-flex flex-wrap">
        <aside class="mh-100 bg-secondary" style="width: 15rem;">
            <div class="card rounded-0 sticky-top border border-secondary">
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
export default {
    components: {
        Sidebar
    },
    // Логика компонента Vue здесь
}
</script>

<style scoped>

</style>
