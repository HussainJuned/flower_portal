<template>
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Shopping Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="my-3 shopping-cart">

                        <!-- <h4 v-if="delivery_date" class="text-center">Delivery Date: <span>{{ delivery_date }}</span> </h4>-->


                        <form v-bind:action=route_order_deatails_buyer id="card_order_form" method="post">
                            <input type="hidden" name="_token" :value="csrf">


                                <div class="row mb-3">
                                    <div class="col-5 text-right">Product</div>
                                    <div class="col-2 text-right">QTY</div>
                                    <div class="col-2 px-0 text-center">Price</div>
                                    <div class="col-1 px-0">Sold By</div>
                                    <div class="col-2 px-0">Total Stems</div>
                                </div>
                                <section class="item" v-for="cart_product in cart_products">
                                    <input type="number" name="product_id[]" v-bind:value="cart_product.product.id" hidden>
                                    <div class="buttons">
                                        <span class="delete-btn"></span>
                                        <span class="like-btn"></span>
                                    </div>

                                    <div class="image">
                                        <img class="img-fluid" v-bind:src="  '/' + cart_product.product.photo_url " alt=""/>
                                    </div>

                                    <div class="description">
                                        <span>{{ cart_product.product.name }}</span>
                                        <span>{{ cart_product.product.stock }} in stock</span>
                                    </div>

                                    <div class="quantity">

                                        <button class="plus-btn" type="button" name="button">
                                            <img :src=img_plus alt="+"/>
                                        </button>
                                        <input type="text" name="quantity[]" v-bind:value="cart_product.quantity" :min="cart_product.product.number_of_stem"
                                               class="q" v-bind:max="cart_product.product.stock">
                                        <button class="minus-btn" type="button" name="button">
                                            <img :src=img_minus alt="-"/>
                                        </button>
                                        <!--<div class="delivery_date">
                                        <select class="cart_order_date" name="order_date[]" required>
                                            <option selected v-for="ad in cart_product.product.ad" v-bind:value="ad">@{{ ad }}</option>
                                        </select>
                                    </div>-->

                                    </div>


                                    <div class="total-price">$ <span class="price_value"
                                                                     v-bind:data-price="cart_product.product.price">{{ cart_product.product.price*cart_product.quantity }}</span>
                                    </div>
                                    <div class="sold-type"><span class="s_type_value"
                                                                 v-bind:data-price="cart_product.product.pack">{{ cart_product.product.pack }}</span>
                                    </div>
                                    <div class="total-stem"><span class="stem_value"
                                                                  v-bind:data-price="cart_product.product.number_of_stem">{{ cart_product.product.number_of_stem*cart_product.quantity }}</span>

                                        <span id="num_of_stem_value" style="display: none;">{{ cart_product.product.number_of_stem }}</span>

                                    </div>
                                </section>

                            <input type="text" name="delivery_date" v-bind:value="delivery_date" hidden>

                        </form>


                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary"
                           id="cart_order_now" form="card_order_form" value="Check Out">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShoppingCartComponent",
        data() {
            return {
                cart_products: [],
                product_id: null,
                quantity: null,
                total_price: null,
                delivery_date: null
            }
        },
        props: ["img_plus", "img_minus", "route_order_deatails_buyer", "csrf"],
        created() {
            this.getSession();
            this.loadCart();
            $(document).ready(function () {
                $(document).on('click', '.minus-btn', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    var $input = $this.closest('div').find('input');

                    var $price = $this.closest('section').find('.price_value');
                    var price_value = parseFloat($price.attr('data-price'));
                    var value = parseInt($input.val());

                    var total_stem  = $this.closest('section').find('#num_of_stem_value').text();

                    var stem_value  = $this.closest('section').find('.stem_value');


                    if (value > 1) {
                        value = value - 1;
                    } else {
                        value = 1;
                    }

                    $input.val(value);

                    stem_value.text(total_stem*value);

                    var cal_total = (value * price_value);
                    cal_total = cal_total.toFixed(2);
                    $price.text(cal_total);

                });

                $('.shopping-cart').on('click', '.plus-btn', function(e) {
                    e.preventDefault();

                    var $this = $(this);
                    var $input = $this.closest('div').find('input');

                    var $price = $this.closest('section').find('.price_value');
                    var price_value = parseFloat($price.attr('data-price'));

                    var total_stem  = parseInt($this.closest('section').find('#num_of_stem_value').text());

                    var stem_value  = $this.closest('section').find('.stem_value');

                    var value = parseInt($input.val());
                    var max = parseInt($input.attr('max'));

                    if (value + total_stem < max ) {
                        value = value + 1;
                    } else {
                        value =max;
                    }

                    $input.val(value);

                    stem_value.text(total_stem*value);

                    var cal_total = (value * price_value);
                    cal_total = cal_total.toFixed(2);
                    $price.text(cal_total);
                });

                $('.like-btn').on('click', function() {
                    $(this).toggleClass('is-active');

                });

                $(document).on('click', '.delete-btn', function (event) {
                    $(this).parent().parent().remove();
                });

                /*$("#cart_order_now").on('click', function(){
                    console.log('clicked');
                    $(".shopping-cart form").each(function(){
                        var fd = new FormData($(this)[0]);
                        $.ajax({
                            type: "get",
                            url: "cart/try",
                            data: fd,
                            success: function(data,status) {
                                console.log(data);
                            },
                            error: function(data, status) {
                                //this will execute when get any error
                            },
                        });
                    });
                });*/


            })

        },
        methods: {
            storeSC() {
                axios.post('api/shopping_cart/store/' + this.product_id, {
                    params: {
                        quantity: this.quantity, total_price: this.total_price, delivery_date: this.delivery_date
                    }
                }).then(response => {
                    this.cart_products = response.data;
                }).catch(error => {

                });
            },
            getSession() {
                var t = this;
                axios.get('/api/session/get_order_date')
                    .then(response => {
                        //console.log("getSesseion: " + response.data);
                        t.delivery_date = response.data;
                        //console.log("getSesseion t: " + response.data);

                        this.fetch();
                        this.loadCart();
                    })
                    .catch(error => {
                    });
            },
            loadCart() {
                console.log("loadCart:");
                var t = this;
                axios.get('/api/shopping_cart/show/all', {
                    params: { delivery_date: this.delivery_date }
                }).then(response => {
                        console.log(response.data);
                        t.cart_products = response.data;
                        this.fetch();
                    })
                    .catch(error => {
                    });
            }
        }
    }
</script>

<style scoped>

</style>
