<style>

</style>
<template type="text/html">
    <div class="CompanyBody" v-show="company">
        <div v-for="place in company.places">
            <div class="row">
                <div class="col-xs-1">
                    <img v-show="place.icon" :src="place.icon"/>
                </div>
                <div class="card col-xs-8">
                    <div class="col-xs-12" v-show="place.name">
                        <h3>{{place.name}}</h3>
                    </div>
                    <div class="col-xs-9 address" v-show="place.formatted_address">
                        {{place.formatted_address}}
                    </div>
                    <div class="col-xs-9 phone-number" v-show="place.formatted_phone_number">
                        <div class="small">{{place.formatted_phone_number}}</div>
                    </div>
                    <div class="col-xs-12" v-show="place.website">
                        <a href="{{place.website}}"><span class="small">{{place.website}}</span></a>
                    </div>
                </div>
                <div class="placeMenu col-xs-3">
                    <nav class="navbar navbar-default sidebar" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Event Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Event Tools <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
                                        <ul class="dropdown-menu forAnimate" role="menu">
                                            <li><a @click="showRideShareModal(place)">Ride Share</a></li>
                                            <li><a @click="showTweetStreamModal(place)">Tweet Stream</a></li>
                                            <li><a @click="showCreatePostModal(place)">Create Post</a></li>
                                            <li class="divider"></li>
                                            <li><a @click="copyEventLink(place)">Copy Link</a></li>
                                            <li><a @click="shareEventOnTwitter(place)" href="#">Share Link On Twitter</a></li>
                                            <li><a @click="shareEventOnFacebook(place)" href="#">Share Link Of Facebook</a></li>
                                            <li class="divider"></li>
                                        </ul>
                                    </li>
                                    <li ><a @click="registerUserForEvent(place)">Register For Event<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row map">
                <div class="col-xs-12" v-show="place.geometry">
                    Map Container
                </div>
            </div>
            <div v-show="place.reviews" class="row reviews">
                <div  @click.sync="togglePlaceReviews(place)">
                    Show/Hide Reviews
                    <ul v-show="place.reviews.toggle">
                        <li v-for="review in place.reviews">
                            {{review.author_name}}
                            {{review.author_url}}
                            {{review.rating}}
                            {{review.relative_time_description}}
                            {{review.text}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>

<script type="text/javascript">
    import Place from '../place/Place.vue';
    import IconContainer from '../place/AddressContainer.vue';
    import AddressContainer from '../place/AddressContainer.vue';
    import PhoneContainer from '../place/AddressContainer.vue';
    import NameContainer from '../place/AddressContainer.vue';
    import WebsiteContainer from '../place/WebsiteContainer.vue';
    import MapContainer from '../place/WebsiteContainer.vue';
    import ReviewsContainer from '../place/WebsiteContainer.vue';

    export default {
        components: {
            Place,
            IconContainer,
            AddressContainer,
            PhoneContainer,
            NameContainer,
            WebsiteContainer,
            MapContainer,
            ReviewsContainer,
        },
        ready() {

        },
        created() {
        },
        data() {
            return {

            };
        },

        computed: {

        },
        watch: {

        },
        props: ['company'],
        methods: {
            togglePlaceReviews: function(place){
                if (typeof place.reviews.toggle === "undefined") {
                    place.reviews.toggle = true;
                }else {
                    place.reviews.toggle =! place.reviews.toggle;
                }

                console.log(place.reviews.toggle);

            },
            showRideShareModal: function(place){

            },
            showTweetStreamModal: function(place){

            },
            showCreatePostModal: function(place){

            },
            copyEventLink: function(place){

            },
            shareEventOnTwitter: function(place){

            },
            shareEventOnFacebook: function(place){

            },
        },
    }
</script>


