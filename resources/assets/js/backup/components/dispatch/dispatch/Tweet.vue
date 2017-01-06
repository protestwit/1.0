<style>
.completed { text-decoration: line-through;}
.dispatch {

}

</style>
<template type="text/html">
    <div class="stream-item">
    <div :class="classes">
        <context :dispatch="dispatch"></context>
        <content :dispatch="dispatch"></content>
    </div>
    </div>
</template>

<script type="text/javascript">
    import Context from './tweet/Context.vue';
    import Content from './tweet/Content.vue';

    export default {
        components: {
            Context,Content,
        },
        ready() {

            // this.dispatch.json = JSON.parse(JSON.stringify(dispatch.tweet.json));
        },
        created() {

        },
        data() {
            return {

            };
        },

        computed: {
            data: function(){
                if(this.dispatch)
                {
                    if(this.dispatch.tweet && this.dispatch.tweet.json)
                    {
                        tweetData = JSON.parse(this.dispatch.tweet.json);
                        //Combine the dispatch tweet json with the dispatch data
                        if(tweetData.retweeted_status)
                        {
                            Object.assign(tweetData.retweeted_status,this.dispatch);
                            Object.assign(this.dispatch,tweetData.retweeted_status);
                        }else {
                            Object.assign(tweetData,this.dispatch);
                            Object.assign(this.dispatch,tweetData);
                        }

                    }
                    return this.dispatch;
                }
                return {};

            },
            content: function(){
                if(this.data.text)
                {
                    return this.data.text;
                }
            },
            createdAt: function(){
                if(this.data.created_at)
                {
                    return this.data.created_at;
                }
            },
            tweetId: function(){
                //If it is a retweet refer to that user
                if(this.data.tweet && this.data.tweet.id)
                {
                    return this.data.tweet.id;
                }else if(this.data.id_str)
                {
                    return this.data.id_str;
                }
            },
            userAvatarUrl: function(){
                if(this.data.user && this.data.user.profile_image_url)
                {
                    return this.data.user.profile_image_url;
                }
            },
            userScreenName: function(){
                if(this.data.user && this.data.user.screen_name)
                {
                    return this.data.user.screen_name;
                }
            },
            userLink: function(){
                if (this.data.user && this.data.user.screen_name) {
                    return 'https://twitter.com/' + this.data.user.screen_name;
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


