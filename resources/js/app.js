/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Croppie = require('croppie');
require('exif-js');
require('@fortawesome/fontawesome-free');
require('selectize');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('flower-result-list-component', require('./components/FlowerResultListComponent').default);
Vue.component('main-nav-search', require('./components/MainNavSearch').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var delivery_date_o = new Date();
delivery_date_o = delivery_date_o.getFullYear() + '-' + (delivery_date_o.getMonth() + 1) + '-' + delivery_date_o.getDate();

$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
    if (results==null){
        return null;
    }
    else{
        return results[1] || 0;
    }
};


// console.log($.urlParam('search_flower'));
var url_keyword = '';
if ($.urlParam('search_flower')) {
    // $('#mini_search').val(decodeURIComponent($.urlParam('search_flower')));
    url_keyword = decodeURIComponent($.urlParam('search_flower'));
}


var app = new Vue({
    el: '#app',
    data: {
        'keywords': url_keyword,
        'sort_by': 'price',
        'delivery_date': delivery_date_o,
        'cart_products': [],
        'filter_catg': [],
        'filter_length': [],
    },
    methods: {
        sortBy(sort_by) {
            this.sort_by = sort_by;
        },
        changeView(type) {
            let $resultContainer = $('.result_column_container');
            switch (type) {
                case 1:
                    if ($resultContainer.hasClass('thinner')) {
                        $resultContainer.removeClass('thinner');
                    }
                    $resultContainer.addClass('wider');
                    break;
                case 2:
                    if ($resultContainer.hasClass('thinner')) {
                        $resultContainer.removeClass('thinner');
                    }
                    if ($resultContainer.hasClass('wider')) {
                        $resultContainer.removeClass('wider');
                    }
                    break;
                case 3:
                    if ($resultContainer.hasClass('wider')) {
                        $resultContainer.removeClass('wider');
                    }
                    $resultContainer.addClass('thinner');
                    break;

            }
        },
        onDDChange(event) {
            this.delivery_date = event.target.value;
            axios.get('/api/session/set_order_date', {params: {order_date: this.delivery_date}})
                .then(response => {
                    // console.log(response.data);
                    // this.delivery_date = response.data;
                })
                .catch(error => {
                });
        },
        catgFilter(catg_id) {
            if(this.filter_catg.includes(catg_id)) {
                var index = this.filter_catg.indexOf(catg_id);
                if (index !== -1) this.filter_catg.splice(index, 1);
                // this.filter_catg.pop($catg_id);
            } else {
                this.filter_catg.push(catg_id);
            }

        },

        lengthFilter(catg_id) {
            if(this.filter_length.includes(catg_id)) {
                var index = this.filter_length.indexOf(catg_id);
                if (index !== -1) this.filter_length.splice(index, 1);
                // this.filter_catg.pop($catg_id);
            } else {
                this.filter_length.push(catg_id);
            }

        },


    }
});

