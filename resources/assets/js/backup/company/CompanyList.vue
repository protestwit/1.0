<style>

</style>
<template type="text/html">
    <div v-show="companies" v-for="company in companies">
        company
        <company :name="company" :company.sync="company"></company>
    </div>
</template>

<script type="text/javascript">
    import Company from './Company.vue';

    export default {
        components: {
            Company,
        },
        ready() {

            // this.dispatch.json = JSON.parse(JSON.stringify(dispatch.tweet.json));
        },
        created() {

        },
        data() {
            return {

            };
        },

        computed: {

        },
        watch: {

        },
        props: ['companies'],
        methods: {
        },
    }
</script>


