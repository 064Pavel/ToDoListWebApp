<template>
    <div v-if="token">
        <p><a @click.prevent="logout">Logout</a></p>
    </div>
    <div v-for="task in tasks">
        {{task.title}}
    </div>
</template>

<script>
import router from "../../../router";

export default {
    name: "Index",

    data(){
        return{
            token: null,
            tasks: []
        }
    },

    mounted() {
        this.getTasks()
        this.getToken()
    },

    methods:{
        getTasks(){
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data.data
                })
        },

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

</style>
