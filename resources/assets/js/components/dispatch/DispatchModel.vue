<template type="text/html">
    <div>
        <div class="DispatchModel dispatch">
            <slot></slot>
        </div>
    </div>
</template>
<style>

</style>
<script type="javascript">
    import ImageModel from './media/ImageModel.vue'
    import VideoModel from './media/VideoModel.vue'
    import TweetController from './controllers/TweetController.vue'
    import Tweet from './types/TweetModel.vue'
	export default {
		components: {
			Tweet,
			TweetController,
			ImageModel,
			VideoModel,
		},
		filters: {

		},
		props: {
		    model: {default:{}}

		},
		ready(){
		console.log("dispatch ready");
		},
        computed: {
            // a computed getter
            classes: function () {

                var defaults = {
                    header: 'stream-item-header',
                    time: 'time',
                    text: 'text-container',
                    media: 'media-container',
                    video: 'video-container',
                    image: 'image-container',
                    imageThumb: 'image-thumb',
                    imageController: 'image-controller',
                }

                //If the model has a class for the defaults use the models data
                if (typeof this.model.classes !== 'undefined') {
                    for (var key in defaults) {
                        if (defaults.hasOwnProperty(key)) {
                            // console.log(key + " -> " + p[key]);
                            //If the model has this class set we set that to the default
                            if (typeof this.model.classes[key] !== 'undefined') {
                            defaults[key] = this.model.classes[key];
                            }
                        }
                    }
                }

                return defaults;
            }
        },
		data(){
            return {};
		},
		directives: {

		},
		events: {

		},
		methods: {


		}


	}
</script>
