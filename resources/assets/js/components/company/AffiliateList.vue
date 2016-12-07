<style>

</style>
<template type="text/html">
    <div v-show="company" class="affiliate-list">
        <div class="Affiliates">
            <div v-for="company in company.affiliates">
                <affiliate :company.sync="company"></affiliate>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Affiliate from './Affiliate.vue';
    import Company from './Company.vue';
    export default {
        components: {
            Affiliate,
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
        props: ['company'],
        methods: {
        },
    }
</script>


