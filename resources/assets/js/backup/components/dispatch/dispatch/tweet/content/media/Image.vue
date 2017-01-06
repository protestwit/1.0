<style>
    .tweet-image{
    max-width: 100%;
    min-width: 100%;
    }
</style>
<template type="text/html">
        <image class="tweet-image" v-bind:src="image.url"/>
</template>

<script type="text/javascript">
    export default {
        components: {
        },
        ready() {

        },
        created() {

        },
        data() {
            return {
            };
        },

        computed: {
            data: function(){


            },
        },
        watch: {

        },
        props: ['image'],
        methods: {

        },
    }
</script>


