<template>
<h1>Plan Selector</h1>
<div v-for="plan in plans">
    <plan :plan="plan" :active.sync="active"></plan>
</div>
</template>

<script>
    import Vue from 'vue';
    import Plan from './planselector/Plan.vue';
    Vue.use(require('vue-resource'));


    export default {
        components: {Plan,
		},
        ready() {

        },
        data() {
            return {
                plans: [
                { name: 'Enterprise', price: 100},
                { name: 'Pro', price: 10},
                { name: 'Free', price: 0},
                ],
                active: {},
            };
        },

        computed: {
                fullName: function(){
                    return this.firstName +' '+this.lastName;
                },
        },
        watch: {
            firstName: function(first){
                alert(first);
            }
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
