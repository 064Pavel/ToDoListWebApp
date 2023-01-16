<template>
    <header class="modal-header">

        <div class="modal-header-info">
            <div>{{ task.title }}</div>
            <div>Priority: <span
                v-bind:class="{
                                 'not':task.priority_id === 1,
                                 'low':task.priority_id === 2,
                                 'middle':task.priority_id === 3,
                                 'high':task.priority_id === 4,}">
                            {{ task.priority.title }}
                        </span></div>
            <div class="date">
                Date: <br> {{ task.date }}
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
                {{ task.notes }}
            </div>

        </div>
    </section>

    <div class="link-edit"><button @click="changeModal">Edit</button></div>
</template>

<script>
export default {
    name: "Show",

    props:['task', 'closeModal', 'changeModal'],



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

.link-edit{
    text-align: right;
    margin-right: 40px;
}

.link-edit button{
    background-color: lightseagreen;
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
