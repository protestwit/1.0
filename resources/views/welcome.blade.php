<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vue.js Navigation Menu</title>


</head>
<body>

<div id="main">

    <!-- The navigation menu will get the value of the "active" variable as a class. -->
    <!-- To stops the page from jumping when a link is clicked we use the "prevent" modifier (short for preventDefault). -->

    <nav v-bind:class="active" v-on:click.prevent>

        <!-- When a link in the menu is clicked, we call the makeActive method, defined in the JavaScript Vue instance. -->

        <a href="#" class="home" v-on:click="makeActive('home')">Home</a>
        <a href="#" class="projects" v-on:click="makeActive('projects')">Projects</a>
        <a href="#" class="services" v-on:click="makeActive('services')">Services</a>
        <a href="#" class="contact" v-on:click="makeActive('contact')">Contact</a>
    </nav>

    <!-- The mustache expression will be replaced with the value of "active".
         It will automatically update to reflect any changes. -->

    <p>You chose <b>@{{active}}</b></p>
    <p>@{{ message }}</p>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.5/vue.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
