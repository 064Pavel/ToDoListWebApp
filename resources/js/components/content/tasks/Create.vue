<template>
    <div class="add_task">

        <div class="form_add_task">
            <div class="plus_decoration"><strong>+</strong></div>
            <div class="form_add_task_input"><input v-model="title" type="text" placeholder="Add task..."></div>
            <div class="form_add_task_btn"><input type="button" @click="addTask" value="Add"></div>
        </div>
    </div>
</template>

<script>
import router from "../../../router";

export default {
    name: "Create",

    data(){
        return{
            title: '',
            user_id: 3
        }
    },

    methods:{
        addTask(){
            console.log(this.title, this.user_id);
            axios.post('/api/tasks', {title: this.title, user_id: this.user_id})
                .then(response => {
                    this.$parent.getTasks()
                })
        }
    }
}
</script>

<style scoped>
.add_task{
    border-radius: 15px;
    background-color: lightseagreen;
    height: 6vh;
    margin-top: 4vh;
    text-align: center;
}

.form_add_task{
    display: flex;
    justify-content: space-around;
    margin-top: 1vh;
    position: relative;
    top: 50%;
    transform: translate(0, -50%);
}

.form_add_task_input input{
    width: 22vh;
    height: 2vh;

    outline: none;
    border: none;
}

.form_add_task_btn input{
    height: 2vh;
    width: 8vh;
    background-color: white;
    border: none;
}

.plus_decoration{
    font-size: 22px;
    font-weight: bold;
    transform: translate(0%, -16%);
}

</style>
