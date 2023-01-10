<template>
    <div class="content-container">

        <div class="content">
            <router-link :to="{ name: 'user.login' }">Login</router-link>
            <router-link :to="{ name: 'user.registration' }">Registration</router-link>
            <router-view></router-view>
        </div>

    </div>
</template>

<script>

export default {

    components:{

    },

    name: "Index"
}
</script>

<style scoped>
    .content-container{
        width: 100%;
        height: 100vh;

        padding: 20px;
        background-color: lightseagreen;
    }

    .content{
        position: absolute;
        top: 25%;
        left: 50%;
        transform: translate(-50%, 0);

        background-color: white;
        padding: 30px;
        text-align: center;

        width: 40vh;
        height: auto;
    }
</style>
