<style>

</style>
<template type="text/html">
    <div class="Affiliate" v-show="company">
        <company-header :company="company"></company-header>
        <company-body :company="company"></company-body>
        <company-footer :company="company"></company-footer>
    </div>
</template>

<script type="text/javascript">
    import StockTicker from './StockTicker.vue';
    import CompanyHeader from './CompanyHeader.vue';
    import CompanyBody from './CompanyBody.vue';
    import CompanyFooter from './CompanyFooter.vue';


    export default {
        components: {
            StockTicker,
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
        props: ['company'],
        methods: {
        },
    }
</script>


