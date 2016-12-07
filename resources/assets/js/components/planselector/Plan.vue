<template>
<div>
 <span> {{ plan.name }}</span>
 <span> {{ plan.price }}/month</span>
 <button @click="setActivePlan" v-show="plan !== active">{{ buttonText }}</button>
  <span v-else>Selected</span>
</div>

</template>

<script>
    import Vue from 'vue';
    Vue.use(require('vue-resource'));


    export default {
        data() {
            return {
            };
        },

        ready() {

        },
        computed: {
            buttonText: function(){
                if(this.active == this.plan){return 'Active'}
                if(this.active.price < this.plan.price){return 'Upgrade'}
                return 'Downgrade'
            }
        },
        watch: {

        },
        props: ['plan','active'],
        methods: {
           setActivePlan: function(){
                this.active = this.plan;
           },

        },
    }
</script>

<style>
.test{

}

</style>
