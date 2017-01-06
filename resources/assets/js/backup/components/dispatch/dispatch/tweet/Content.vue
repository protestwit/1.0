<style>
</style>
<template type="text/html">

        <div class="content">
            <content-header :dispatch="dispatch"></content-header>
            <div class="js-tweet-text-container">
                <p class="TweetTextSize TweetTextSize--16px js-tweet-text tweet-text" lang="en" data-aria-label-part="4">
                    {{ tweetText }}
                    <a href="{{tweetLink}}" rel="nofollow" dir="ltr" class="twitter-timeline-link u-hidden" target="_blank" :title="tweetLink">
                        <span class="u-hiddenVidually">{{tweetLink}}</span>
                    </a>
                </p>
            </div>
            <content-media :dispatch="dispatch"></content-media>
            <content-footer :dispatch="dispatch"></content-footer>
        </div>
</template>

<script type="text/javascript">
    import ContentHeader from './content/Header.vue';
    import ContentFooter from './content/Footer.vue';
    import ContentMedia from './content/Media.vue';

    export default {
        components: {
            ContentHeader,
            ContentFooter,
            ContentMedia,
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


