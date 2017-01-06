<template type="text/html">
    <div>
        <div class="Controller TweetController">
            <slot></slot>
        </div>
    </div>
</template>
<style>

</style>
<script type="javascript">
	export default {
		props: {
			model: {default:{}}

		},
		methods: {
            showRepliesModal(){console.log('@todo show replies')},
            showHotnessModal(){console.log('@todo show hotness')},
            showSharesModal(){console.log('@todo show shares')},
            deleteDispatch(){console.log('@todo delete dispatch')},
            activateDispatch(){console.log('@todo activate dispatch')},
            editDispatch(){console.log('@todo activate dispatch')},

		},
		components: {
		},
		filters: {

		},
		ready(){
		console.log("TweetController ready");
		},
		computed: {
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
