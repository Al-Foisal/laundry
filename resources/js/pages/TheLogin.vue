<template>
    <!-- contact-section -->
    <section class="contact-section sp-one">
        <div class="container">
            <div class="sec-title centred"><h2></h2></div>
            <div class="row">
                <div
                    class="contact-column"
                    style="display: flex; justify-content: center"
                >
                    <div class="contact-form-area">
                        <h3>Login with Laundry Man BD</h3>
                        <form
                            @submit.prevent="submitForm"
                            id="contact-form"
                            class="default-form"
                        >
                            <div class="row">
                                <div class="form-group">
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="Email"
                                        required
                                        v-model="email"
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        required
                                        v-model="password"
                                    />
                                </div>
                                <div class="form-group">
                                    <button
                                        type="submit"
                                        name="submit-form"
                                        class="btn btn-block"
                                        :disabled="isLoading"
                                    >
                                        {{
                                            isLoading ? 'Please wait' : 'Login'
                                        }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        <h5 class="mt-2">
                            <router-link
                                :to="{ name: 'register' }"
                                class="white"
                                >Join with us?</router-link
                            >
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    data() {
        return {
            email: '',
            password: '',
            isLoading: false,
            error: null,
        };
    },
    methods: {
        async submitForm() {
            this.isLoading = true;
            try {
                await this.$store.dispatch('setLogin', {
                    email: this.email,
                    password: this.password,
                });
                this.$router.replace({ name: 'dashboard' });
                this.isLoading = false;
            } catch (err) {
                this.error = err;
                this.isLoading = false;
            }
        },
    },
    computed: {
        ...mapGetters(['isLogin']),
    },
    mounted() {
        if (this.isLogin) {
            this.$router.push({ name: 'dashboard' });
        }
    },
};
</script>