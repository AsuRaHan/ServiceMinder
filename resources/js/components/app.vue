<template>

    <nav class="navbar navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Admin</span>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="/user/logout"><i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-flex flex-wrap">
        <aside class="sticky-top" style="width: 15rem;">
            <ul class="list-group  rounded-0 widget widget-menu unstyled">
                <li class="list-group-item">
                    <router-link to="/admin" class="nav-link">
                        Dashboard
                    </router-link>
                </li>
                <li class="list-group-item">
                    <router-link to="/admin/about" class="nav-link">
                        About
                    </router-link>
                </li>
                <li class="list-group-item">A third item</li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </aside>
        <main style="width:calc(100% - 15rem);">
            <router-view></router-view>
        </main>
    </div>
</template>


<script>
export default {
    // Логика компонента Vue здесь
}
</script>

<style scoped>

</style>
