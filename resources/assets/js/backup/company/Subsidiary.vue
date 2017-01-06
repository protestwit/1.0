<style>

</style>
<template type="text/html">
    <div v-show="company" v-show="company.places">
        <company-header :company.sync="company"></company-header>
        <company-body :company.sync="company"></company-body>
        <company-footer :company.sync="company"></company-footer>
    </div>
</template>

<script type="text/javascript">
    import CompanyHeader from './CompanyHeader.vue';
    import CompanyBody from './CompanyBody.vue';
    import CompanyFooter from './CompanyFooter.vue';

    export default {
        components: {
            CompanyHeader,
            CompanyBody,
            CompanyFooter,
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

        },
        watch: {

        },
        props: ['company','name'],
        methods: {
        },
    }
</script>


