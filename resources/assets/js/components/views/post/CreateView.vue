<template>
    <div id="PostCreateView">
        <slot></slot>
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    Vue.use(require('vue-resource'));


    export default {
        components: {},
        ready: function () {
            // console.log(this.sectionTypes);
        },
        filters: {},
        data(){
            return {
                model: {
                    title: null,
                    content: '',
                    group: {
                        'label': ''
                    },
                    event: {
                        'label': ''
                    },
                },
                groupSearchOptions: [],
                eventSearchOptions: [],
            };
        },
        computed: {},
        directives: {},
        events: {},
        methods: {
            savePost: function () {
                var resource = this.$resource('/api/post');
                resource.save(this.model).then(
                        function (response) { //Success
                            console.log('success');
                            console.log(response);


                            var groupSlug = response.data.groups[0].slug;
                            var postId = response.data._id;


                            window.open(
                                    'http://protestwit.dev/g/'+groupSlug+'/comment/'+postId,
                                    '_blank' // <- This is what makes it open in a new window.
                            );


                            //window.location.href = '/g/'+groupSlug+'/comment/'+postId;
                        }, function (response) {//Error
                            console.log(response);

                        });
                // resource.save(
                //         this.model
                // ).then(function (response) {
                //     console.log(response);
                // }).bind(this);
            },
            searchEvents: function (text) {
                // console.log(text);
                var resource = this.$resource('/api/event/search/');

                resource.get({
                    q: text,
                }).then(function (events) {
                    this.eventSearchOptions = events.data.data;
                }).bind(this);
            },
            searchGroups: function (text) {
                // console.log(text);
                var resource = this.$resource('/api/group/search/');
                resource.get({
                    q: text,
                }).then(function (events) {
                    this.groupSearchOptions = events.data.data;
                }).bind(this);
            },
            chooseGroupFromSearch: function (option) {
                this.model.group.id = option._id;
                this.model.group.label = option.public_tag;
                this.groupSearchOptions = [];
            },
            chooseEventFromSearch: function (option) {
                this.model.event.id = option._id;
                this.model.event.label = option.name;
                this.eventSearchOptions = [];
            },
            chooseSectionType: function (type) {
                this.chosenSectionType = type;
                // console.log('chosenSectionType');
                // console.log(this.chosenSectionType);
            },
            addSection: function () {
                // console.log(this.chosenSectionType);
                if (!this.chosenSectionType) {
                    this.chosenSectionType = this.sectionTypes[0];
                }
                this.sections.push({
                    'label': this.chooseSectionType.label,
                    'fields': this.chosenSectionType.fields
                })
            },
        },
        props: {
            chosenSectionType: {},
            sections: {
                Type: Array,
                default: function () {
                    return [];
                },
            },
        }


    }

</script>

