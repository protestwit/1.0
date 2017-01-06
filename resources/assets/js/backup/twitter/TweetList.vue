<template>
    <tr v-for="(rowIndex, entry) in data">
        <td v-for="(columnIndex, key) in columns"
            class="cell"
            :class="{activeRow: rowIndex == activeRowIndex,
                                 activeColumn: columnIndex == activeColumnIndex}"
        >
            <div class="view">
                <label @click="makeCellActive(rowIndex, columnIndex)"
                >{{ entry[key] }}</label>
            </div>
        </td>
    <tr>
</template>

<script>
    import Vue from 'vue';
    Vue.use(require('vue-resource'));

	import Tweet from './Tweet.vue'
	import { updateNewTweet } from '../vuex/actions';

export default {
        vuex: {
            actions: {
                // es6 shorthand
                updateNewTweet
            },
            getters: {
                columns: state => state.tweets,
                data: state => state.data,

                // add active cell highlight
                activeRowIndex: state => state.activeRowIndex,
                activeColumnIndex: state => state.activeColumnIndex
            }
        },

        ready() {
            socket.on('clicked-cell-channel:App\\Events\\UserChangedActiveCell', function(data) {

                this.updateActiveCellPosition(data.rowIndex, data.columnIndex);

            }.bind(this));
        },

        methods: {
            // called on as a result of user clicking on cell
            makeCellActive(rowIndex, columnIndex) {
                Vue.http.post('api/updateActiveCell', { rowIndex, columnIndex });
            }
        }
    }
</script>

<style>

</style>
