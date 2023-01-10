<template>
    <header-component></header-component>
    <content-component></content-component>
</template>

<script>

import ContentComponent from "./content/ContentComponent.vue";
import HeaderComponent from "./header/HeaderComponent.vue";
export default {

    components:{
      ContentComponent, HeaderComponent
    },

    name: "App"
}
</script>

<style scoped>

</style>
