<template type="text/html">
    <h1>Task List</h1>
    <h2>Remaining Tasks
        <span v-show="remaining">({{remaining}})</span></h2>
    <ul v-show="tasks.length">
        <div v-for="task in tasks">
            <task :task="task" :tasks="tasks"></task>
        </div>
    </ul>
    <span v-else>
      No Tasks Available
    </span>
    <button v-show="tasks.filter(this.isCompleted).length" @click="archiveCompleted">Archive</button>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    import Task from './tasklist/Task.vue'
    Vue.use(require('vue-resource'));

    export default {
        components: {
        Task,
        },
        ready() {

        },
        created() {
            this.fetchTasks();
        },
        data() {
            return {
                tasks: [],
            };
        },

        computed: {
            remaining: function(){
                return this.tasks.filter(this.inProgress).length;
            },
        },
        watch: {

        },
        props: [],
        methods: {
            fetchTasks: function(){
                var resource = this.$resource('api/task/{id}');

                resource.get().then(function(tasks){
                    this.tasks = tasks;
                }).bind(this);
            },
            fetchTask: function(task){
                var resource = this.$resource('api/task/{id}');
                resource.get({id : task.id}).then(function(task){

                }).bind(this);
            },
            updateTask: function(task){
                var resource = this.$resource('api/task/{id}');
                resource.update({id : task.id},{ body: task.body }).then(function(task){

                }).bind(this);
            },

            isCompleted: function(task){
                return task.completed;
            },
            inProgress: function(task){
                return ! this.isCompleted(task);
            },
            archiveCompleted: function(){
                this.tasks = this.tasks.filter(this.inProgress);
            }
        },
    }
</script>

<style>
.completed { text-decoration: line-through;}

</style>
