<template>
    Subject: {{ subject }}
    Increment Count: {{ count }}
      <button @click="buttonClicked" type="submit">Submit Me</button>
</template>

<script>
    import Vue from 'vue';
    Vue.use(require('vue-resource'));


    export default {
        ready() {

        },
        data() {
            return { count: 0 };
        },
        props: ['subject'],
        methods: {
            handleSubmission: function(e){
                alert('handle');
                e.preventDefault();
            },
            buttonClicked: function(e){
                this.updateCount();
            },
            updateCount: function(e){
                this.count += 1;
            },
        },
    }
</script>

<style>
.test{

}

</style>
