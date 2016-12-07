<template type="text/html">
    <div class="alert alert-{{type}}">
        <a @click="hideAlert(this)" class="close" data-dismiss="alert"></a>
        <slot></slot>
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue';

    export default {
        components: {

        },
        ready() {

        },
        created() {

        },
        data() {
            return {
                hidden: false,
            };
        },

        computed: {

        },
        watch: {

        },
        props: {
            type: {default: 'info'}
        },
        methods: {
            hideAlert: function(alert){
                this.hidden = true;
            },
            isHidden: function(alert){
                return this.hidden;
            },
            isVisible: function(task){
                return ! this.hidden;
            },
        },
    }
</script>

<style>
.completed { text-decoration: line-through;}

</style>
