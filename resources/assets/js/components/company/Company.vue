<style>

</style>
<template type="text/html">
    <div v-show="company">
        <stock-ticker v-show="company.symbol" :company.sync="company"></stock-ticker>
        <div v-show="company">
            <company-header :company.sync="company"></company-header>
        </div>
        <div @click="toggleAffiliates()">Show/Hide Affiliates</div>
        <div v-show="showAffiliates">
            <affiliate-list :company="company"></affiliate-list>
            <subsidiary-list :company="company"></subsidiary-list>
        </div>
        <div v-show="company">
            <company-footer :company.sync="company"></company-footer>
        </div>
    </div>
</template>

<script type="text/javascript">
    import CompanyHeader from './CompanyHeader.vue';
    import CompanyFooter from './CompanyFooter.vue';
    import StockTicker from './StockTicker.vue';
    import AffiliateList from './AffiliateList.vue';
    import SubsidiaryList from './SubsidiaryList.vue';


    export default {
        components: {
            StockTicker,
            AffiliateList,
            SubsidiaryList,
            CompanyHeader,
            CompanyFooter,
        },
        ready() {

        },
        created() {
        },
        data() {
            return {
                showAffiliates: false,
            };
        },

        computed: {

        },
        watch: {

        },
        props: [{
            'company': '',
            'name' : 'company',
        }],
        methods: {
        },
    }
</script>


