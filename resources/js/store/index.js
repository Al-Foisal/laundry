import { createStore } from 'vuex';
import createPersistedState from 'vuex-persistedstate';
import cart from './cart.js';

const store = createStore({
    plugins: [createPersistedState()],
    modules: {
        cart,
    },
    state() {
        return {
            isLogin: false,
            user: [],
        };
    },
    mutations: {
        setLogin(state, payload) {
            state.isLogin = payload;
        },
        setUser(state, payload) {
            state.user = payload;
        },
    },
    actions: {
        async setLogin(context, payload) {
            try {
                await axios.get('/sanctum/csrf-cookie');
                const res = await axios.post('/login', payload);
                if (!res.data.success) {
                    throw res.message;
                }

                return this.dispatch('getUser');
            } catch (error) {
                throw 'Authentication failed.';
            }
        },

        async getUser(context) {
            await axios
                .get('/user')
                .then((res) => {
                    context.commit('setLogin', true);
                    context.commit('setUser', res.data);
                })
                .catch(() => {
                    context.commit('setLogin', false);
                    context.commit('setUser', null);
                });
        },

        async logout(context) {
            await axios
                .get('/logout')
                .then((res) => {
                    context.commit('setLogin', false);
                    context.commit('setUser', null);
                })
                .catch(() => {
                    context.commit('setLogin', false);
                    context.commit('setUser', null);
                });
        },
    },
    getters: {
        isLogin(state) {
            return state.isLogin;
        },
        user(state) {
            return state.user;
        },
    },
});

export default store;
