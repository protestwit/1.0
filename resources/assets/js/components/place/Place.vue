<style>

</style>
<template type="text/html">
    <div v-show="place">
        <div v-show="place.icon">
            <icon-container :place="place"></icon-container>
        </div>
        <div v-show="place.formatted_address">
            <address-container :place="place"></address-container>
        </div>
        <div v-show="place.formatted_phone_number">
            <phone-container :place="place"></phone-container>
        </div>
        <div v-show="place.name">
            <name-container :place="place"></name-container>
        </div>
        <div v-show="place.website">
            <website-container :place="place"></website-container>
        </div>
        <div v-show="place.website">
            <map-container :place="place"></map-container>
        </div>
        <div v-show="place.reviews">
            <reviews-container :place="place"></reviews-container>
        </div>
    </div>
</template>

<script type="text/javascript">
    import IconContainer from './AddressContainer.vue';
    import AddressContainer from './AddressContainer.vue';
    import PhoneContainer from './AddressContainer.vue';
    import NameContainer from './AddressContainer.vue';
    import WebsiteContainer from './WebsiteContainer.vue';
    import MapContainer from './WebsiteContainer.vue';
    import ReviewsContainer from './WebsiteContainer.vue';
    export default {
        components: {
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
        props: [
            'place'
        ],
        methods: {
        },
    }
</script>


