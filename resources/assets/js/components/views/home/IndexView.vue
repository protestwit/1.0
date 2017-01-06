<template type="text/html">
    <div id="HomeView">
        <slot></slot>
    </div>
</template>

<script type="text/javascript">

import Dispatch from '../../dispatch/DispatchModel.vue'

	export default {
		components: {
            Dispatch,

		},
		filters: {

		},
		ready(){
		console.log("ready");
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