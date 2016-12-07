<style>
</style>
<template type="text/html">
    <div v-show="boycott" class="stream-item">
        <company-list :companies="boycott.companies"></company-list>
    </div>
</template>


<script type="text/javascript">
    import CompanyList from '../company/CompanyList.vue';

    export default {
        components: {
            CompanyList
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
        props: ['boycott','boycotts'],
        methods: {

        },
    }
</script>


