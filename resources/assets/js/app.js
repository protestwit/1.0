import io from 'socket.io-client';
const socket = io('http://localhost:8080');
var $ = global.jQuery;
window.$ = $;



import Vue from 'vue';
import store from './vuex/store';
import App from './components/App.vue';
import Home from './components/views/home/IndexView.vue';
import BoycottIndex from './components/views/boycott/IndexView.vue';
import Reverse from './filters/reverse.js';


Vue.use(require('vue-resource'));
window.addEventListener('load', function () {
new Vue({
    store,
    el: 'body',
    data: {
        currentView: {default:''},
    },
    ready(){},
    components: { 
        App,
        Home,
        BoycottIndex,
    
    },
    filters: { Reverse },
    http: {
        headers: {
            'X-CSRF-TOKEN': function(){
                if(document.querySelector('input[name="_token"]:not([value=""])'))
                {
                    return document.querySelector('input[name="_token"]:not([value=""])').value
                }
                return '';
            },
        }
    },
    
});
})