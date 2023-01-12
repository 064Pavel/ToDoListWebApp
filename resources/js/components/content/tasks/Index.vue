<template>
    <div class="task" v-for="task in tasks">
        <div class="task_info">
            <div class="task_info_section_1">

                <div class="task_info_delete">
                    <input type="checkbox">
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

</template>

<script>
import router from "../../../router";

export default {
    name: "Index",

    data() {
        return {
            tasks: []
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


    }
}
</script>

<style scoped>

.task{
    background-color: white;
    min-height: 4vh;
    text-align: left;
    width: 100%;
    margin-bottom: 2vh;
}

.not{
    border-left: 8px solid green;
}

.low{
    border-left: 8px solid blue;
}

.middle{
    border-left: 8px solid yellow;
}

.high{
    border-left: 8px solid red;
}


.task_info_section_1{
    display: flex;
    margin-left: 2vh;
}

.task_info_section_2{
    display: flex;
    margin-right: 2vh;
}

.task_info{
    display: flex;
    padding-top: 1vh;;
    justify-content: space-between;
}

.task_info div{

    margin-right: 2vh;
}
</style>
