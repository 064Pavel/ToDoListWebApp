<template>
    <header-component></header-component>
    <div v-if="token">
        <menu-component></menu-component>
    </div>
    <content-component></content-component>
    <router-view :key="$route.fullPath"></router-view>
</template>

<script>

import ContentComponent from "./content/ContentComponent.vue";
import HeaderComponent from "./header/HeaderComponent.vue";
import MenuComponent from "./menu/MenuComponent.vue";
export default {

    components:{
      MenuComponent, ContentComponent, HeaderComponent
    },

    name: "App",

    data(){
        return{
            token: null
        }
    },

    mounted() {
        this.getToken()
    },

    updated() {
        this.getToken()
    },

    methods:{
        getToken(){
            this.token = localStorage.getItem('x_xsrf_token')
        }
    },

}
</script>

<style scoped>

</style>
