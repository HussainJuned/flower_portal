export default {

    state: {

        cart_products: []

    },

    getters: {

        getCartProductsFormGetters(state){ //take parameter state

            return state.cart_products
        }
    },

    actions: {
        allCartProductsFromDatabase(context){

            axios.get("api/shopping_cart/show/all")

                .then((response)=>{
                    console.log(response.data);
                    context.commit("cart_products",response.data) //categories will be run from mutation

                })

                .catch(()=>{

                    console.log("Error........")

                })
        }
    },

    mutations: {
        cart_products(state,data) {
            return state.cart_products = data
        }
    }
}
