<template>
    <div id="BoycotIndexView">
        <slot name="boycott_index"></slot>
    </div>
</template>

<script>
    import BoycottList from '../../boycott/BoycottList.vue'
	export default {
		components: {
            BoycottList
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

		},
		methods: {


		}


	}
</script>