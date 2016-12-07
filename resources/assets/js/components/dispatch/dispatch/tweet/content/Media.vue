<style>
</style>
<template type="text/html">
    <div v-show="dispatch.images" class="media images">
        <media-image :image="image" v-for="image in dispatch.images"></media-image>
    </div>
</template>

<script type="text/javascript">
    import MediaImage from './media/Image.vue';
    import MediaVideo from './media/Video.vue';

    export default {
        components: {
            MediaImage,
            MediaVideo,
        },
        ready() {

        },
        created() {

        },
        data() {
            return {
                classes: ['tweet']
            };
        },

        computed: {
            data: function(){
                return {};

            },
            tweetText: function(){
                if(this.data.text)
                {
                    return this.data.text;
                }else if(this.dispatch.text)
                {
                    return this.dispatch.text;
                }
            },
            tweetLink: function(){

                if (this.data.user && this.data.user.screen_name) {
                    return 'https://twitter.com/' + this.data.user.screen_name+'/status/'+this.dispatch.tweet.id;
                }
            }
        },
        watch: {

        },
        props: ['dispatch'],
        methods: {

        },
    }
</script>


