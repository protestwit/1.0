<template>
<h1>Full Name</h1>
    <input type="text" v-model="firstName">
    <input type="text" v-model="lastName">
    {{ fullName }}

</template>

<script>
    import Vue from 'vue';
    Vue.use(require('vue-resource'));


    export default {
        ready() {

        },
        data() {
            return {
                firstName: 1000,
                lastName: 1000,
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
