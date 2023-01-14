<template>
    <transition name="modal-fade">
        <div class="modal-backdrop">
            <div class="modal">
                <show v-show="modalComponent === 'show'" :task="task" :closeModal="closeModal"></show>
            </div>
        </div>
    </transition>
</template>

<script>
import Show from "./Show.vue";
export default {
    name: "TaskModal",

    components:{Show},

    props: ['task', 'closeModal'],

    data(){
        return{
            modalComponent: 'show'
        }
    },

    methods:{

    }


}
</script>

<style scoped>
.modal-backdrop {

    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 400px;
    height: 500px;
}

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
