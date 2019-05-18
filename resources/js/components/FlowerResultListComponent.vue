<template>
    <ul class="column fragment">
        <li class="product-col" v-for="product in products">
            <div class="product">
                <a>
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
                        <div class="price-info"><span class="price">$ {{ splitPrice1(product.price) }}<sup> {{ splitPrice2(product.price) }}</sup> <div
                            class="add_to_cart"><i
                            class="fas fa-plus"></i></div></span>
                            <span
                                class="each">Price per piece</span></div>
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
                products: []
            }
        },
        created() {
            axios.get('/api/flower/all').then(
                response => this.products = response.data.data
            );
        },
        methods: {
            splitPrice1(str) {
                var arr = str.split('.');
                return arr[0];
            },
            splitPrice2(str) {
                var arr = str.split('.');
                return arr[1];
            }
        }


    }
</script>

<style scoped>

</style>
