<template type="text/html">
    <div class="">
        <input type="text" v-model="message" @keyup.enter="storeMessage">
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue';

    export default {
        components: {

        },
        ready() {

        },
        created() {

        },
        data() {
            return {
                message: '',
            };
        },

        computed: {

        },
        watch: {

        },
        props: {

        },
        methods: {
            storeMessage: function(){
                this.$dispatch('new-message', this.message);
                //$dispatch only goes to parents
                //$broadcast goes to children
                this.message = '';
            },
        },
    }
</script>

<style>
.completed { text-decoration: line-through;}

</style>
