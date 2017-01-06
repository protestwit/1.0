<style>
</style>
<template type="text/html">
    <div class="modal-mask" @click="close" v-show="show" transition="modal">
        <div class="modal-container" @click.stop>
            <slot></slot>
        </div>
    </div>
</template>


<script type="text/javascript">

    export default {
        components: {

        },
        savePost: function () {
            this.close();
        }
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
        props: ['show'],
        methods: {
            close: function () {
                this.show = false;
                this.title = '';
                this.body = '';
            },
            savePost: function () {
                // Insert AJAX call here...
                this.close();
            }

        },
    }
</script>


