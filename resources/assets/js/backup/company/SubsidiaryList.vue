<style>

</style>
<template type="text/html">
    <div v-show="company" class="subsidiary-list">
        <div class="Subsidiaries">
            <div v-for="company in company.subsidiaries">
                <subsidiary :company="company"></subsidiary>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Subsidiary from './Subsidiary.vue';
    export default {
        components: {
            Subsidiary,
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


