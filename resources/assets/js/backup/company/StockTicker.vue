<style>

</style>
<template type="text/html">
    <div v-show="company" class="finance-ticker">
        <div class="Stocks">
            <span class="Symbol">
                <b class="Stat"><i data-replace='Symbol'>{{company.symbol}}</i>:<i>{{ latestQuote.StockExchange}}</i></b>
                <b class="Label">( <i>{{company.name}}</i> )</b>
            </span>
            <span class="Price"><b class="Label">Last Price</b> <b class="Stat">${{latestQuote.LastTradePriceOnly}}</b></span>
            <span class="Change"><b class="Label">Change</b> <b class="Stat">{{latestQuote.Change}}</b> <b class="Stat">({{latestQuote.ChangeinPercent}})</b></span>
            <span class="Volume"><b class="Label">Volume</b> <b class="Stat">{{ latestQuote.AverageDailyVolume }}</b></span>
            <span class="MarketCapitalization"><b class="Label">Mkt Cap</b> <b class="Stat">$<i>{{latestQuote.MarketCapitalization}}</i></b></span>
            <span class="LastUpdated"><b class="Label">Last Trade</b> <b class="Stat"><i>{{latestQuote.LastTradeDate}}</i> <i>{{latestQuote.LastTradeTime}}</i> </b></span>
        </div>
    </div>
</template>

<script type="text/javascript">

    export default {
        components: {
        },
        ready() {

            // this.dispatch.json = JSON.parse(JSON.stringify(dispatch.tweet.json));
        },
        created() {
            this.fetchLiveQuote();
        },
        data() {
            return {
                latestQuote: {},
            };
        },

        computed: {

        },
        watch: {

        },
        props: ['company'],
        methods: {
            fetchLiveQuote: function(){

                var wsql = "select * from yahoo.finance.quotes where symbol in ('"+ this.company.symbol +"')";
                stockYQL = 'http://query.yahooapis.com/v1/public/yql?q='+encodeURIComponent(wsql)+'&env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json';
                var resource = this.$resource(stockYQL);


                resource.get({
                }).then(function(data){
                    this.latestQuote = data.data.query.results.quote;
                }).bind(this);
            },
        },
    }
</script>


