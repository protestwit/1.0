<style>
</style>
<template type="text/html">
    <div class="content-footer navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse collapse">
                <h3>Test{{tweetOriginatedAt}}</h3>
                <ul class="nav navbar-nav">
                    <li><a href="#about">{{tweetReplies}} replies</a></li>
                    <li><a href="#contact">{{tweetRetweets}} retweets</a></li>
                    <li><a href="#contact">{{tweetLikes}} likes</a></li>
                    <li><a href="#contact">{{tweetHotness}} Hotness</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Share via Direct Message</a></li>
                            <li><a href="#">Copy link to Dispatch</a></li>
                            <li><a href="#">Copy link to Tweet</a></li>
                            <li><a href="#">Create new related Post</a></li>
                            <li><a href="#">Comment</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</template>

<script type="text/javascript">


    export default {
        components: {

        },
        ready() {

            // this.dispatch.json = JSON.parse(JSON.stringify(dispatch.tweet.json));
        },
        created() {

        },
        data() {
            return {};
        },

        computed: {
            data: function(){

                return {};

            },
            tweetOriginatedAt: function(){
                console.log(this.dispatch.json.created_at);
                if(this.dispatch.comments)
                {
                    return this.dispatch.json.created_at;
                }
            },
            tweetReplies: function(){
                if(this.dispatch.comments)
                {
                    return this.dispatch.comments.length;
                }
            },
            tweetRetweets: function(){
                if(this.dispatch.retweet_count)
                {
                    return this.dispatch.retweet_count;
                }
            },
            tweetLikes: function(){
                if(this.dispatch.vote_count)
                {
                    return this.dispatch.vote_count;
                }
            },
            tweetHotness: function(){
                if(this.dispatch.hotness)
                {
                    return this.dispatch.hotness;
                }
            },
        },
        watch: {

        },
        props: ['dispatch'],
        methods: {

        },
    }
</script>


