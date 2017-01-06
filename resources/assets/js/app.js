import io from 'socket.io-client';
const socket = io('http://localhost:8080');
var $ = global.jQuery;
window.$ = $;



import Vue from 'vue';
import Home from './components/views/home/IndexView.vue';
Vue.use(require('vue-resource'));
window.addEventListener('load', function () {
new Vue({
    el: 'body',
    data: {

    },
    ready(){},
    components: {
        Home,
    },
    filters: { },
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
});