<template type="text/html">
    <div :class="classes.video">
        <div class="Media ImageModel">
            <slot></slot>
        </div>
    </div>
</template>
<style>

</style>
<script type="javascript">
	export default {
		components: {
		},
		filters: {

		},
		props: {
		    model: {default:{}},
		    classes: {},

		},
		ready(){
		console.log("video ready");
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
