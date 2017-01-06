<style>
.completed { text-decoration: line-through;}
.dispatch {

}

</style>
<template type="text/html">
    <div class="stream-item-header">
        <a class="account-group js-account-group js-action-profile js-user-profile-link js-nav" href="{{userLink}}">
            <img class="avatar js-action-profile-avatar" v-bind:src="userAvatarUrl" alt="">
            <strong class="fullname js-action-profile-name show-popup-with-id" data-aria-label-part="">{{userName}}</strong>
            <span>‏</span><span class="username js-action-profile-name" data-aria-label-part=""><s>@</s><b>{{userScreenName}}</b></span>
        </a>
        <small class="time">
            <a target="_blank" :href="tweetLink" class="tweet-timestamp js-permalink js-nav js-tooltip" title="3:12 AM - 5 Dec 2016">
                <span class="_timestamp js-short-timestamp js-relative-timestamp">
                    {{tweetCreatedAgo}}
                </span>
                <span class="u-hiddenVisually" data-aria-label-part="last">{{tweetCreatedAgo}}</span></a>
        </small>
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
            return {
                classes: ['tweet']
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
            userAvatarUrl: function(){
                if(this.data.user && this.data.user.profile_image_url)
                {
                    return this.data.user.profile_image_url;
                }
            },
            userName: function(){
                if(this.data.user && this.data.user.name)
                {
                    return this.data.user.name;
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
            },
            tweetLink: function(){

                if (this.data.user && this.data.user.screen_name) {
                    return 'https://twitter.com/' + this.data.user.screen_name+'/status/'+this.dispatch.tweet.id;
                }
            },
            tweetCreatedAgo: function(){
                if(this.dispatch.created_ago_text)
                {
                    return this.dispatch.created_ago_text;
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


