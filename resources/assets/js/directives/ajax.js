module.exports = {
    params: ['complete'],
    bind: function () {
        //When this directive is attached to an html tag do this
        console.log(this.params);
        this.el.addEventListener('submit', this.onFormSubmission.bind(this));
    },
    update: function () {
        //Repeatedly called whenever the bound value changes

    },
    unbind: function () {
        //When the directive is unbound, trigger this method
    },
    onFormSubmission: function (e) {
        //this refers to the form that was submitted if no bind on event listener object
        e.preventDefault();
        this.vm.$http[this.getRequestType()](this.el.action)
            .then(this.onComplete.bind(this))
            .catch(this.onError.bind(this))
    },
    onComplete: function () {
        if (this.params.complete) {
            alert(this.params.complete);
        }
    },
    onError: function (response) {
        if (this.params.complete) {
            console.log(response);
            alert(response.data.message);
        }
    },
    getRequestType: function () {
        var method = this.el.querySelector('input[name="_method"]');
        return (method ? method.value : this.el.method).toLowerCase();

    },


};