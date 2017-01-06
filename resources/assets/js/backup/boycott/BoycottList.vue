<template type="text/html">
    <ul class="stream" v-show="boycotts.length">
        <div v-for="boycott in boycotts">
            <boycott :boycott="boycott" :boycotts="boycotts"></boycott>
        </div>
    </ul>
    <span v-else>
        No Boycotts Available
    </span>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    import Boycott from './Boycott.vue';

    export default {
        components: {
            Boycott
        },
        ready() {

        },
        created() {
            this.fetchBoycotts();
        },
        data() {
            return {
                boycotts: [],
            };
        },

        computed: {

        },
        watch: {

        },
        props: {

        },
        methods: {
            fetchBoycotts: function(){
                var resource = this.$resource('api/boycott');

                resource.get().then(function(boycotts){
                        this.boycotts = boycotts.data.data;
                }).bind(this);
            },
        },
    }
</script>

<style>

</style>
