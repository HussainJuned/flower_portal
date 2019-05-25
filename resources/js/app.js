
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var delivery_date_o = new Date();
delivery_date_o = delivery_date_o.getFullYear()+'-'+(delivery_date_o.getMonth()+1)+'-'+delivery_date_o.getDate();

var app = new Vue({
    el: '#app',
    data: {
        'keywords': null,
        'sort_by': 'price',
        'delivery_date': delivery_date_o,
        'cart_products': [],
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
        }
    }
});

