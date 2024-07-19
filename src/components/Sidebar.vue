<template>

<div id="app" class="d-flex">
    <nav id="sidebar" class="bg-light border-right">
        <div class="list-group list-group-flush">
            <routerLink  class="list-group-item list-group-item-action" to="/login"><i class="bi bi-person-fill"></i> login</routerLink>
            <routerLink  class="list-group-item list-group-item-action" to="/registro"><i class="bi bi-gear-fill"></i> registro</routerLink>
            <routerLink  class="list-group-item list-group-item-action" to="/dashboard"><i class="bi bi-gear-fill"></i> dashboard</routerLink>
        </div>
    </nav>
</div>
</template>
<script>
export default {};
const app = Vue.createApp({
    data() {
        return {
            sidebarOpen: true
        }
    },
    methods: {
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
        }
    }
});

app.mount('#app');
</script>