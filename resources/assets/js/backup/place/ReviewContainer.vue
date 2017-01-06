<style>

</style>
<template type="text/html">
    <ul>
        <li v-for="review in place.reviews">
            {{review.author_name}}
            {{review.author_url}}
            {{review.rating}}
            {{review.relative_time_description}}
            {{review.text}}
        </li>
    </ul>
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

        },
        watch: {

        },
        props: [
            'place'
        ],
        methods: {
        },
    }
</script>


