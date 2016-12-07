<style>

</style>
<template type="text/html">
    <div class="header" v-show="company">
        <h3>{{company.name}}</h3>
        <div class="row">
            <div class="place-footer" v-show="company">
                <div class="content-footer navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li><a @click="showCreateEventModal = true">Create Event</a></li>
                                <li><a @click="showCreatePostModal(company)">New Post</a></li>
                                <li  v-show="company.posts"><a href="#contact">{{company.posts.length}} Posts</a></li>
                                <li v-show="company.comments"><a href="#contact">{{company.comments.length}} Comments</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a @click="shareEventOnTwitter(company)">Share via Twitter/a></li>
                                        <li><a @click="copyCompanyLink(company)">Copy link to Company</a></li>
                                        <li><a @click="showCreateCommentModal(place)">Comment</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <create-event-modal :company.sync="company" :show.sync="showCreateEventModal"></create-event-modal>
    <create-event-modal :company.sync="company" :show.sync="showCommentModal"></create-event-modal>
</template>

<script type="text/javascript">
    import StockTicker from './StockTicker.vue';

    export default {
        components: {
            StockTicker,
        },
        ready() {

        },
        created() {
        },
        data() {
            return {
                showEventModal: false,
                showPostModal: false,
                showCommentModal: false,
            };
        },

        computed: {

        },
        watch: {

        },
        props: ['company'],
        methods: {
            showCreateEventModal: (function(company){
                console.log('CompanyHeader showCreateEventModal');
                this.enableCreateEventModal = true;
                this.eventModalCompany = company;
            }).bind(this),
            showCreatePostModal: function(company){},
            shareEventOnTwitter: function(company){},
            copyCompanyLink: function(company){},
            showCreateCommentModal: function(company){},
        },
    }
</script>


