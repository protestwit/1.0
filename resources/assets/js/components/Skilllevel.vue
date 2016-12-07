<template>
<h1>Skill: {{ skill }}</h1>
    <input type="text" v-model="points">
</template>

<script>
    import Vue from 'vue';
    Vue.use(require('vue-resource'));


    export default {
        ready() {

        },
        data() {
            return {
                points: 1000,
            };
        },

        computed: {
                skill: function(){
                    if(this.points <= 99) {return 'Beginner'};
                    if(this.points > 999) {return 'Advanced'};
                    if(this.points >= 100) {return 'Intermediate'};

                },
        },
        props: [],
        methods: {

        },
    }
</script>

<style>
.test{

}

</style>
