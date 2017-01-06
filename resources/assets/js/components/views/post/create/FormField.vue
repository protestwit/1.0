<template>
    Form Field
    {{ model | json }}
    <div class="text-field" v-if="field.inputType == 'text'">
        <label class="control-label">{{ field.label }}</label>
        <div class="controls">
            <input v-model="model.value" :key="key" :placeholder="field.placeholder" class="input-xlarge form-control">
            <p class="help-block">{{ field.helpText }}</p>
        </div>
    </div>
    <div class="text-area-field" v-if="field.inputType == 'text-area'">
        <label class="control-label">{{ field.label }}</label>
        <div class="controls">
            <pre>{{field | json}}</pre>
         <textarea v-model="model.value" class="input xlarge form-control" :placeholder="field.placeholder">
         </textarea>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Vue from 'vue';
    export default {
        components: {},
        ready: function () {

        },
        filters: {},
        data(){
            return{};
        },
        directives: {},
        events: {},
        methods: {},
        props: {
            model: {
                Type: Object,
                default: function () {
                    return {};
                }
                ,
            },
            // key: {
            //     Type: String,
            //     default: 'ff_' + Math.ceil(Math.random() * 100000),
            // },
            // id: {
            //     Type: String,
            //     default: 'ff_' + Math.ceil(Math.random() * 100000),
            // },
            section: {
                Type: Object,
                default: undefined,
            },
            parent: {
                Type: Object,
                default: undefined,
            },
            field: {
                Type: Object,
                default: {},
            },
            value: {
                Type: [String, Number],
                default: '',
            },
        }


    }

</script>

