<template>
    <div>
        <router-link :to="{ name: 'user.login' }">Login</router-link>
        <router-link :to="{ name: 'user.registration' }">Registration</router-link>
        <router-view></router-view>
    </div>
</template>

<script>
import Login from "./auth/Login.vue";
import Registration from "./auth/Registration.vue";
export default {

    components:{
        Login, Registration
    },

    name: "Index"
}
</script>

<style scoped>

</style>
