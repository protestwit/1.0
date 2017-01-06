<template type="text/html">
    <div>
        <pre>$data:{{ $data | json }}</pre>
        <pre>Fields:{{ fields | json }}</pre>
        <div v-for="field in fields">
            <form-field :field="field"  v-bind:model="field" v-if="field"></form-field>
        </div>

    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    import FormField from './FormField.vue';

    export default {
        components: {
            FormField,
        },
        ready: function () {


        },
        filters: {},
        data: function () {
            return {
                fields: this.section.fields
            }
        },
        watch: {

        },
        directives: {},
        events: {},
        methods: {},
        computed:{

        },
        props: {
            section: {
                Type: Object,
                default: function () {
                    return {};
                },
            },
            key: {
                Type: String,
                default: 'fs_' + Math.ceil(Math.random() * 100000),
            },
            id: {
                Type: String,
                default: 'fs_' + Math.ceil(Math.random() * 100000),
            },

            children: {
                Type: String,
                default: 'nodes',
            },
            //Css to apply to form section
            class: {
                Type: String,
                default: '',
            },
            labelname: {
                Type: String,
                default: 'label',
            },
        }


    }

</script>

