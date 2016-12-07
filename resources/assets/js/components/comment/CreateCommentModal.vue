<style>
</style>
<template type="text/html">
    <modal :show.sync="show" :on-close="close">
        <div class="modal-header">
            <h3>New Comment</h3>
        </div>

        <div class="modal-body">
            <label class="form-label">
                Comment
                <textarea v-model="comment" rows="5" class="form-control"></textarea>
            </label>
        </div>

        <div class="modal-footer text-right">
            <button class="modal-default-button" @click="postComment()">
                Post
            </button>
        </div>
    </modal>
</template>


<script type="text/javascript">
    import Modal from '../Modal.vue';
    export default {
        components: {
            Modal,
        },
        savePost: function () {
            this.close();
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
        props: ['show','company'],
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


