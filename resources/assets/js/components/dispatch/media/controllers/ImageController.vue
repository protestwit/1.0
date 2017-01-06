<template type="text/html">
        <div class="Controller ImageController">
            <slot></slot>
        </div>
</template>
<style type="text/css">
        .image-controller{}
        .media-container .ImageController {
                position: absolute;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(255,255,255,0.1);
                color: #fff;
        }
         .ImageController .navbar.transparent , .ImageController .navbar.transparent > nav > li:hover, .ImageController .navbar.transparent  .nav > li > a:hover, .ImageController .navbar.transparent .nav > li > a:focus {
            background: rgba(0,0,0,0.4);
            color: #fff;
        }
        .ImageController .navbar.transparent .nav > li > a:hover, .nav > li > a:focus {
            color: #000;
        }


</style>
<script type="javascript">
    export default {
        components: {

        },
        props: {
            model: {default:{}},
            classes: {default:{}},
            visible: {default:false,},
        },
        methods: {
            toggleVisibility(){this.visible =! this.visible},
            disableVisibility(){this.visible = false},
            enableVisibility(){this.visible = true},
            showEditModal(){this.visible = true},
            copyLink(){this.visible = true},
            showCommentModal(){this.visible = true},

        },
        ready(){
            console.log("image model ready");
        },
        computed: {
            src: function(){
                return this.model.url;
            }
        },

        data(){
            return {};
        },
        directives: {

        },
        events: {

        },


    }
</script>

