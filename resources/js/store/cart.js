let cart = localStorage.getItem('cart');
let cartCount = localStorage.getItem('cartCount');

export default {
    namespaced: true,
    state() {
        return {
            cart: cart ? JSON.parse(cart) : [],
            cartCount: cartCount ? parseInt(cartCount) : 0,
        };
    },
    mutations: {
        ADD_TO_CART(state, payload) {
            let found = state.cart.find((item) => item.id == payload.id);
            if (found) {
                found.quantity += payload.quantity;
            } else {
                state.cart.push(payload);
            }
            state.cartCount += payload.quantity;
            this.commit('cart/SAVE_CART');
        },
        REMOVE_FROM_CART(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                let item = state.cart[index];
                console.log(item);
                state.cartCount -= item.quantity;

                state.cart.splice(index, 1);
            }
            this.commit('SAVE_CART');
        },
        SAVE_CART(state) {
            localStorage.setItem('cart', JSON.stringify(state.cart));
            localStorage.setItem('cartCount', state.cartCount);
        },
        // async ADD_TO_CART(state, payload) {
        //     const result = await axios.post("/api/add-to-cart", {
        //         id: payload.id,
        //         color: payload.color,
        //         size: payload.size,
        //         quantity: payload.quantity,
        //     });
        //     state.cart = result.data.cart_content;
        //     state.cartCount = result.data.cart_count;
        //     console.log(result.data);
        // },
        // async CART_COUNT(state){
        //     const result = await axios.get('/api/cart-count');
        //     state.cartCount=result.data;
        //     console.log(result.data.count);
        // }
    },
    actions: {
        addToCart(context, payload) {
            // console.log(payload);
            context.commit('ADD_TO_CART', payload);
        },
        cartCount(context) {
            context.commit('CART_COUNT');
        },
    },
    getters: {
        cart(state) {
            return state.cart;
        },
        cartCount(state) {
            return state.cartCount;
        },
    },
};
