<template>
<li :class="{ 'completed': task.completed}"
    @click="task.completed = ! task.completed"
>
    {{ task.body }}
    <span @click="deleteTask(task)")>x</span>
</li>
</template>

<script>
    import Vue from 'vue';
    Vue.use(require('vue-resource'));
    export default {
        ready() {

        },
        data() {
            return {
            };
        },

        computed: {

        },
        watch: {

        },
        props: ['task','tasks'],
        methods: {
                deleteTask: function(task){this.tasks.$remove(task)}
        },
    }
</script>

<style>
</style>
