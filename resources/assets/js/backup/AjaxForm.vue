<template type="text/html">
    <h1>Ajax Form</h1>
<form action="test" method="POST" v-ajax complete="Submission is complete">
    Test
    <button type="submit">submit</button>
</form>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    Vue.use(require('vue-resource'));

    import Ajax from '../directives/ajax.js';


    export default {
        components: {
		},
		directives: {
		    Ajax
		},
        ready() {

        },
        data() {
            return {

            };
        },

        computed: {

        },
        watch: {

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
