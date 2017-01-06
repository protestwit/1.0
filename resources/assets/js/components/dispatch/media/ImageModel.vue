<template type="text/html">
    <div :class="classes.image">
        <div class="Media ImageModel">
            <slot></slot>
        </div>
    </div>
</template>
<style>
    .image-container img{max-width:100%}
    .image-container {position:relative;}
    .media-container .image-thumb img{height:50px}
</style>
<script type="javascript">
    import ImageController from './controllers/ImageController.vue'
    import ImagePost from '../types/PostModel.vue'
	export default {
		components: {
            ImageController,
            ImagePost,
		},
		props: {
		    model: {default:{}},
		    classes: {default:{}},
            visible: {default:false,},
		},
        methods: {
            toggleVisibility(){this.visible =! this.visible},
            disableVisibility(){this.visible = false},
            enableVisibility(){this.visible = true},

        },
		ready(){
		console.log("image model ready");
		},
        computed: {
            src: function(){
                return this.model.url;
            }
        },

		data(){
            return {};
		},
		directives: {

		},
		events: {

		},


	}
</script>
