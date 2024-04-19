<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="navbar-brand">Admin Panel</div>
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
import { onLogout } from '../vue-apollo'
export default {
    methods: {
        logout() {
            onLogout(this.$apollo.provider.defaultClient);
            this.$store.state.isUserLogin = false;
        }
    }
}

</script>
