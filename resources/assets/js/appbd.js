var Vue = require('vue')

Vue.config.debug = true // Comment this line for production
Vue.config.delimiters = ['<%', '%>'];
window.Vue = Vue;

var validator = require('vue-validator');
var resource = require('vue-resource');

// Vue.use(validator);
// Vue.use(resource);

global.jQuery = require('jquery');
var $ = global.jQuery;
window.$ = $;
