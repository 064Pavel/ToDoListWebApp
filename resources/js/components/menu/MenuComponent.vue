<template>
    <div class="menu-container">
        <div class="menu">
            <div><router-link :to="{name: 'tasks'}"><strong>Tasks</strong></router-link></div>
            <div><router-link :to="{name: 'statistic'}"><strong>Statistic</strong></router-link></div>

            <div><a  @click.prevent="signOut" href="#">
                <strong>Sign out</strong>
            </a></div>

        </div>
    </div>
</template>

<script>
import router from "../../router";

export default {
    name: "MenuComponent",

    data(){
        return{

        }
    },

    methods: {
        signOut(){
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
    .menu-container{
        background-color: lightseagreen;

        height: 50px;
        padding: 20px;
        max-width: 758px;
        margin: 40px auto;
        width: 720px;
    }

    .menu{
        position: relative;
        display: flex;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        text-align: center;

    }

    .menu div{
        margin: 10px;
        padding: 0 12px;
        font-size: 22px;
    }

    .menu div strong{
        color: black;
    }

</style>
