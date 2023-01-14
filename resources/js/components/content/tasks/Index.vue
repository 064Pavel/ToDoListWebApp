<template>
    <div class="tasks" v-for="task in tasks">

        <div class="task"
             v-bind:class="{
            'not':task.priority_id === 1,
            'low':task.priority_id === 2,
            'middle':task.priority_id === 3,
            'high':task.priority_id === 4,
        }">

            <div class="task_info">

                <div class="task_info_section_1">

                    <div class="task_info_complete">
                        <span><a @click.prevent="closeTask(task.id)" href="#">	&#9989;</a></span>
                    </div>

                    <div class="task_info_title">
                        <strong class="task_info_title_text">{{ task.title }}</strong>
                    </div>

                </div>

                <div class="task_info_section_2">
                    <strong>+</strong>
                </div>

            </div>
        </div>

    </div>


    <create></create>
</template>

<script>
import Create from "./Create.vue";

export default {
    name: "Index",

    components:{
        Create
    },

    data() {
        return {
            tasks: [],
        }
    },

    mounted() {
        this.getTasks()
    },

    methods: {
        getTasks() {
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data.data
                })
        },

        closeTask(id){
            console.log(this.is_done);
            axios.patch(`/api/close/${id}`)
                .then(response => {

                    this.getTasks()
                })
        }


    }
}
</script>

<style scoped>

.task {
    background-color: lightseagreen;
    min-height: 4vh;
    text-align: left;
    width: 100%;
    margin-bottom: 20px;
}

.not {
    border-left: 8px solid lightseagreen;
}

.low {
    border-left: 8px solid green;
}

.middle {
    border-left: 8px solid blue;
}

.high {
    border-left: 8px solid red;
}


.task_info_section_1 {
    display: flex;
    margin-left: 2vh;
}

.task_info_section_2 {
    display: flex;
    margin-right: 2vh;
}

.task_info {
    display: flex;
    padding-top: 1vh;;
    justify-content: space-between;
}

.task_info div {

    margin-right: 2vh;
}

.task_info_complete{
    padding-right: 12px;
    border-right: 2px solid black;
}

.task_info_complete span a{
    text-decoration: none;
    color: black;
}
</style>
