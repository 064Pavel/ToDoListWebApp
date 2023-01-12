<template>
    <div class="header">
        <div class="header-content">
            <div class="header-section-1">

                <div class="header-title"><h1>ToDo List WebApp</h1></div>

                <div class="logout" v-if="token">
                    <p><a @click.prevent="logout">Logout</a></p>
                </div>
            </div>

            <div class="header-description"><h3>Skillfully plan your day. Manage your to-do list online.</h3></div>
        </div>

    </div>
</template>

<script>
import router from "../../router";

export default {
    name: "Header",

    data(){
        return{
            token: null
        }
    },

    mounted() {
        this.getToken()
    },

    methods: {
        getToken(){
            this.token = localStorage.getItem('x_xsrf_token')
        },

        logout(){
            axios.post('/logout')
                .then(response => {
                    localStorage.removeItem('x_xsrf_token')
                    router.push({name: 'user.login'})
                })
        }

    }
}
</script>

<style scoped>
    .header{
        width: 100%;
        height: 12vh;
        padding: 20px;
        margin-bottom: 5vh;
        background-color: lightseagreen;
    }

    .header-content{
        text-align: center;
    }

    .header-section-1{
        position: relative;
        display: flex;
        left: 50%;
        transform: translate(-25%, 0);
    }

    .header-title{
        margin-right: 25px;
    }

    .logout{
        position: relative;
        margin-top: 14px;
        font-weight: bold;
    }


</style>
