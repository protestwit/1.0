<template type="text/html">
    <div>
        <div class="Type TweetModel">
            <slot></slot>
        </div>
    </div>
</template>
<style>

</style>
<script type="javascript">
	import TweetController from '../controllers/TweetController.vue'
	import ImageModel from '../media/ImageModel.vue'
	import VideoModel from '../media/VideoModel.vue'
	export default {
		components: {
			TweetController,
			ImageModel,
			VideoModel,
		},
		props: {
		    model: {default:{
                classes : {
                    header: 'stream-item-header'
                }
            }}

		},
		ready(){
		console.log("tweet ready");
		},
        computed:{
            test: 'orange',
        },
		data(){
			return {
                test: 'green',
            };
		},
		directives: {

		},
		events: {

		},
		methods: {


		},
        filters: {

        },


	}
</script>
