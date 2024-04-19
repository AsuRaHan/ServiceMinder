<template>
    <div class="list-group rounded-0">
        <router-link to="/admin" class="list-group-item list-group-item-action" active-class="active">
            <i class="bi bi-house"></i>
            Dashboard
        </router-link>
        <router-link to="/admin/users" class="list-group-item list-group-item-action" active-class="active">
            <i class="bi bi-people"></i>
            Users
        </router-link>
        <router-link to="/admin/pages" class="list-group-item list-group-item-action" active-class="active">
            <i class="bi bi-file-earmark-text"></i>
            Pages
        </router-link>

    </div>
    <ul class="list-group rounded-0 mt-3">
        <li class="list-group-item"><i class="bi bi-gear"></i></li>
        <li class="list-group-item"><i class="bi bi-shield"></i></li>
    </ul>
</template>

<script>
export default {
    // Логика компонента Vue здесь
}
</script>

<style scoped>

</style>
