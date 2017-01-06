<template type="text/html">
    <div>
        <div class="Type PostModel">
            <slot></slot>
        </div>
    </div>
</template>
<style>

</style>
<script type="javascript">
	import PostController from '../controllers/PostController.vue'
	import ImageModel from '../media/ImageModel.vue'
	import VideoModel from '../media/VideoModel.vue'
	export default {
		components: {
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
		console.log("post ready");
		},
        computed:{
        },
		data(){
			return {
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
