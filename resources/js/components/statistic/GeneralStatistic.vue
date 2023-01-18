<template>
    <div class="general-statistic-container">
        <div class="title">General statistic</div>
        <div class="all-users"><p>Users with us: {{all_users}}</p></div>
        <div class="all-tasks"><p>Total tasks created: {{all_tasks}}</p></div>
        <div class="done-tasks"><p>Tasks done: {{done_tasks}}</p></div>
    </div>
</template>

<script>
export default {
    name: "GeneralStatistic",

    data(){
        return{
            all_users: null,
            all_tasks: null,
            done_tasks: null
        }
    },

    mounted() {
        this.allUsers()
        this.allTasks()
        this.doneTasks()
    },

    methods:{
        allUsers(){
            axios.get('/api/all_users')
                .then(response => {
                    this.all_users = response.data
                })
        },

        allTasks(){
            axios.get('/api/general_all_tasks')
                .then(response => {
                    this.all_tasks = response.data
                })
        },

        doneTasks(){
            axios.get('/api/general_done_tasks')
                .then(response =>{
                    console.log(response);
                    this.done_tasks = response.data
                })
        }
    }
}
</script>

<style scoped>

</style>
