<template type="text/html">
    <ul class="stream" v-show="dispatches.length">
        <div v-for="dispatch in dispatches">
            <dispatch :dispatch="dispatch" :dispatches="dispatches"></dispatch>
        <div>
    </ul>
    <span v-else>
        No Dispatches Available
    </span>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    import Dispatch from './Dispatch.vue';

    export default {
        components: {
            Dispatch
        },
        ready() {

        },
        created() {
            this.fetchDispatches();
        },
        data() {
            return {
                dispatches: [],
            };
        },

        computed: {

        },
        watch: {

        },
        props: {

        },
        methods: {
            fetchDispatches: function(){
                var resource = this.$resource('api/dispatch');

                resource.get().then(function(dispatches){
                        this.dispatches = dispatches.data.data;

                }).bind(this);
            },
        },
    }
</script>

<style>
.completed { text-decoration: line-through;}

</style>
