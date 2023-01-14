<template>
    <div class="content-container">

        <div class="content">
            <router-view :key="$route.fullPath"></router-view>
        </div>

    </div>
</template>

<script>

export default {

    components:{

    },

    name: "Index"
}
</script>

<style scoped>
    .content-container{
        width: 100%;
        height: 150vh;

        padding: 20px;
        background-color: lightseagreen;
    }

    .content{
        position: relative;

        left: 50%;
        transform: translate(-50%, 0);

        background-color: white;
        padding: 30px;
        text-align: center;

        width: 40vh;
        height: auto;
    }
</style>
