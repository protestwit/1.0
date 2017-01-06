<template>
    <div id="BoycotIndexView">
        <pre>{{ data | json }}
        <slot name="boycott_index"></slot>
    </div>
</template>

<script>

	export default {
		components: {

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