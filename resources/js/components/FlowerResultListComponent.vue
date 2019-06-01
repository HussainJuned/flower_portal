<template>
    <ul class="column fragment">
        <li class="product-col" v-for="product in products">
            <div class="product">
                <a v-bind:href="'/products/' + product.id">
                    <div class="images">
                        <div class="image">
                            <div class="img"
                                 v-bind:style="{backgroundImage: 'url(../'+ product.photo_url + ')' }"></div>
                        </div>
                    </div>
                    <div class="specs">
                        <ul class="clearfix">
                            <li><span>Length</span><span> {{ product.height }} </span></li>
                            <li><span>stock</span> <span>{{ product.stock }}</span></li>
                            <li><span>pack:</span> <span>{{ product.pack }}</span></li>
                            <li><span>colour:</span> <span>{{ product.colour }}</span></li>
                            <li><span style="width: 100%" class="availability"> Available from stock<div
                                v-bind:class="{green: product.status}"
                                class="product-status"></div></span></li>
                        </ul>
                    </div>

                    <div class="info exclusive">
                        <div class="product-label exclusive" v-if="product.feature === 1">SPECIAL</div>
                        <div class="product-label exclusive" v-else-if="product.feature === 2">LOW PRICE</div>
                        <div class="product-label exclusive" v-else-if="product.feature === 3">EXCLUSIVE</div>
                        <div class="product-label exclusive" v-else-if="product.feature === 4">LIMITED</div>
                        <h6>{{ product.name }}</h6>
                        <div class="price-info">
                            <span class="price">$ {{ splitPrice1(product.price) }}<sup> {{ splitPrice2(product.price) }}</sup>
                                <div class="add_to_cart" v-on:click.stop.prevent.self="addToCart(product)">
                                    <i class="fas fa-plus" v-on:click.stop.prevent.self="addToCart(product)"></i>
                                </div>
                            </span>
                            <span class="each">Price per piece</span>
                        </div>
                    </div>
                </a>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        name: "flower-result-list-component",
        data() {
            return {
                products: [],
            }
        },
        watch: {
            keywords(after, before) {
                this.fetch();
            },
            sort_by(after, before) {
                console.log(this.sort_by);
                this.fetch();
            },
            delivery_date(after, before) {
                console.log(this.delivery_date);
                this.fetch();
            },
            filter_catg(after, before) {
                // console.log(this.filter_catg);
                this.fetch();
            },


        },
        created() {
            this.getSession();
        },
        methods: {
            splitPrice1(str) {
                var arr = str.split('.');
                return arr[0];
            },
            splitPrice2(str) {
                var arr = str.split('.');
                return arr[1];
            },
            fetch() {
                axios.get('/api/flower', {
                    params: {
                        keywords: this.keywords, sort_by: this.sort_by, delivery_date: this.delivery_date,
                        filter_catg: this.filter_catg
                    }
                }).then(response => {
                        this.products = response.data.data;
                        $('.result_count').text(response.data.total);
                    })
                    .catch(error => {
                    });

            },
            getSession() {
                axios.get('/api/session/get_order_date')
                    .then(response => {
                        // console.log(response.data);
                        this.$parent.delivery_date = response.data;
                        this.fetch();
                    })
                    .catch(error => {
                    });
            },
            routeSP(product_id) {
                return "{{ route('products.show', ['product' => " + product_id + "]) }}"
            },
            addToCart(product) {
                this.cart_products.push(product);
                this.popup();
            },
            popup() {
                $('.popup').addClass('slidein');
                setTimeout(function (e) {
                    $('.popup').removeClass('slidein');
                }.bind(this), 2050);
            }
        },
        props: ['keywords', 'sort_by', 'cart_products', 'delivery_date', 'filter_catg'],
        computed: {
            resultCount() {
                return this.products.total;
            }
        }


    }
</script>

<style scoped>

</style>
