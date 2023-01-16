<template>
    <header class="modal-header">

        <div class="modal-header-info">
            <div>{{ task.title }}</div>
            <input v-model="title" type="text" placeholder="New title">
            <div>Priority:
                <select v-model="priority_id">
                    <option :value="priority.id" v-for="priority in priorities">{{ priority.title }}</option>
                </select>
            </div>
            <div class="date">
                Date: <br>
                <input v-model="date" type="date">
            </div>
        </div>

        <button
            type="button"
            class="btn-close"
            @click="closeModal"
        >
            x
        </button>

    </header>
    <section
        class="modal-body"
        id="modalDescription"
    >
        <div class="task-info">

            <div class="notes">
                Notes: <br>
                <textarea v-model="notes" class="notes-textarea"></textarea>
            </div>

        </div>
    </section>

    <div class="btn-section">


        <div class="btn-section-down">
            <div class="back">
                <button @click="changeModal">Back</button>
            </div>
            <div class="delete">
                <button @click="destroy(task.id)">Delete</button>
            </div>

        </div>


        <div class="update">
            <button @click="update(task.id)">Update</button>
        </div>

    </div>
</template>

<script>
export default {
    name: "Edit",

    data() {
        return {
            priorities: [],

            title: '',
            notes: '',
            priority_id: '',
            date: '',
            is_done: 0,
            user_id: ''
        }
    },

    props: ['task', 'closeModal', 'changeModal', 'getTasks'],

    mounted() {
        this.getPriorities()
        this.getUserId()
    },

    methods: {

        update(id) {
            console.log(this.title, this.notes, this.date, this.is_done, this.user_id, this.priority_id);

            axios.patch(`/api/tasks/${id}`, {
                title: this.title,
                notes: this.notes,
                date: this.date,
                is_done: this.is_done,
                user_id: this.user_id,
                priority_id: this.priority_id
            })
                .then(response => {
                    console.log(response);
                    this.closeModal()
                    this.getTasks()
                })
        },

        getPriorities() {
            axios.get('/api/priorities').then(response => {
                this.priorities = response.data.data
            });
        },

        getUserId() {

            axios.get('/api/tasks/create')
                .then(response => {
                    this.user_id = response.data;
                })
        },

        destroy(id){
            axios.delete(`/api/tasks/${id}`)
                .then(response => {
                    this.closeModal()
                    this.getTasks()
                })
        }
    }
}
</script>

<style scoped>
.modal-header {
    padding: 15px;
    display: flex;

}

.modal-header {
    border-bottom: 1px solid #eeeeee;
    justify-content: space-between;
}

.modal-header-info {
    display: flex;
    flex-direction: column;
    text-align: left;
}

.modal-body {
    position: relative;
    padding: 20px 10px;
}

.btn-close {
    border: none;
    font-size: 20px;
    padding: 20px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
}

.notes {
    text-align: left;
}

.notes-textarea {
    resize: none;
    width: 175px;
    height: 190px;
    margin-top: 20px;
}

.not {
    color: mediumpurple;
}

.low {
    color: green;
}

.middle {
    color: blue;
}

.high {
    color: red;
}

.btn-section {
    display: flex;
    justify-content: space-around;
}

.update, .delete {
    text-align: right;
    margin-right: 40px;
}

.delete {
    margin-top: 10px;
    margin-left: 40px;
}

.update button, .back button {
    background-color: lightseagreen;
    width: 120px;
    height: 30px;
    border: none;
    font-size: 24px;
}

.delete button {
    background-color: red;
    width: 120px;
    height: 30px;
    border: none;
    font-size: 24px;
}

.modal-fade-enter,
.modal-fade-leave-active {
    opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity .5s ease
}
</style>
