<template>
    <div id="HomeView">
        <slot></slot>
    </div>
</template>

<script>

import Message from '../../Message.vue'
import Dispatches from '../../dispatch/DispatchList.vue'
	export default {
		components: {
            Message,
            Dispatches,
		},
		filters: {

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