<template>

    <div>
        <input type="text" class="form-control" id="main_search_inp" v-model="keyword">
        <span id="main_search_x" v-on:click="main_search_x"><i class="fas fa-times"></i></span>

        <ul id="main_s_result">
            <li v-if="loading" style="font-size: 14px; text-transform: capitalize">
                <img src="images/icons/loader.gif" alt="loading..." />
                Loading.....
            </li>

            <li v-if="no_result" class="no_result_found"><a href="#">No result found</a></li>

            <li v-for="product in products">
                <a v-bind:href="'products/' + product.id">
                    <div class="row">
                        <div class="col-9">
                            <img v-bind:src="product.photo_url" alt="" class="img-fluid">
                            <span class="p_name">
                                            {{ product.name}}
                                        </span>
                        </div>
                        <div class="col-3 text-right">
                                        <span class="p_price">
                                            ${{ product.price }}
                                        </span>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>

</template>

<script>
    export default {
        name: "main-nav-search",
        data() {
            return {
                keyword: '',
                products: [],
                loading: false,
                no_result: false,
            }
        },
        watch: {
            keyword(after, before) {
                this.fetch();
                // console.log(this.keyword);
            },
        },
        methods: {
            fetch() {
                if (this.keyword) {
                    this.loading = true;
                    axios.get('/api/flower', {
                        params: {
                            keywords: this.keyword, delivery_date: this.delivery_date,
                        }
                    }).then(response => {
                        this.loading = false;
                        this.products = response.data.data;

                        if (!$.trim(this.products)) {
                            // $('#main_s_result').html('<li> No result found</li>');
                            // console.log('no result');
                            this.no_result = true;
                        }

                        // this.page_data = response.data;
                        // console.log('np url: ' + this.page_data.next_page_url);
                        // $('.result_count').text(response.data.total);
                    }).catch(error => {
                        this.loading = false;
                    });
                } else {
                    this.products = [];
                    this.no_result = false;
                }



            },

            main_search_x () {
                $('#fixed_nav').removeClass('show_search');
                this.keyword = '';
                this.products = [];
                this.no_result = false;
            }
        },
        props: ['delivery_date']
    }
</script>

<style scoped>
    .no_result_found {
        text-transform: initial;
    }
</style>
