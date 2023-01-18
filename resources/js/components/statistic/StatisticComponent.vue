<template>
    <div class="statistic-container">
        <div class="statistic">
            <div><GeneralStatistic></GeneralStatistic></div>
            <div><PersonalStatistic></PersonalStatistic></div>
        </div>
    </div>
</template>

<script>

import GeneralStatistic from "./GeneralStatistic.vue";
import PersonalStatistic from "./PersonalStatistic.vue";
export default {
    name: "StatisticComponent",

    components:{
        GeneralStatistic, PersonalStatistic
    }
}
</script>

<style scoped>
    .statistic{
        display: flex;
        justify-content: space-around;
    }
</style>
