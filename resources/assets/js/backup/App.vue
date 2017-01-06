<template>
    <div id="app">
        <pre>
        {{ $data }}
            </pre>
        <grid></grid>
        <countdemo subject="Likes"></countdemo>
        <countdemo subject="Disslikes"></countdemo>
        <skilllevel></skilllevel>
        <full-name></full-name>
        <plan-selector></plan-selector>
        <task-list></task-list>
        <alert type="danger">{{'Danger Danger' | reverse }}</alert>
        <message @new-message="handleNewMessage"></message>
        <ajax-form></ajax-form>
    </div>
</template>

<script>
	import Grid from './Grid.vue'
	import Countdemo from './Countdemo.vue'
	import Skilllevel from './Skilllevel.vue'
	import FullName from './FullName.vue'
	import PlanSelector from './PlanSelector.vue'
	import TaskList from './TaskList.vue'
	import Alert from './Alert.vue'
	import Tweet from './twitter/Tweet.vue'
	import Message from './Message.vue'
	import AjaxForm from './AjaxForm.vue'

	import Reverse from '../filters/reverse.js';


	export default {
		components: {
		Grid,
		Tweet,
		Countdemo,
		Skilllevel,
		FullName,
		PlanSelector,
		TaskList,
		Alert,
		Message,
		AjaxForm,
		},
		filters: {
		Reverse
		},
		data(){
		    return {
		    messages: [],
            }
		},
		directives: {

		},
		events: {
		    //'new-message': function(message) {
		    //    console.log('Parent is handling ' + message);
		    //}
		},
		methods: {
		    handleNewMessage: function(message){
		        this.messages.push(message);
		    }

		}


	}
</script>