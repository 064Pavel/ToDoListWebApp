<template>
    <div class="personal-statistic-container">
        <div class="title">Personal statistic</div>
        <div class="created-date"><p>You have joined: {{created_date}}</p></div>
        <div class="created-tasks"><p>You have created: {{all_tasks}}</p></div>
        <div class="done-tasks"><p>Tasks done: {{done_tasks}}</p></div>

    </div>
</template>

<script>

import axios from "axios";

export default {
    name: "PersonalStatistic",

    data(){
        return{
            created_date: null,
            all_tasks: null,
            done_tasks: null
        }
    },

    mounted() {
        this.getCreatedDate()
        this.allTasks()
        this.doneTasks()
    },

    methods:{

        getCreatedDate(){
            axios.get('/api/created_date')
                .then(response => {
                    response.data.forEach(date => {
                        let date_format = date.created_at.slice(0, 10)
                        this.created_date = date_format
                    })
                })
        },

        allTasks(){
            axios.get('/api/personal_all_tasks')
                .then(response => {
                    this.all_tasks = response.data
                })
        },

        doneTasks(){
            axios.get('/api/personal_done_tasks')
                .then(response => {
                    this.done_tasks = response.data
                })
        }
    }
}
</script>

<style scoped>

</style>
