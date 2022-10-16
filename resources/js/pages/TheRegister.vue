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
                        <h3>Register with Laundry Man BD</h3>
                        <form
                            method="post"
                            action="http://azim.commonsupport.com/Watertown/sendemail.php"
                            id="contact-form"
                            class="default-form"
                        >
                            <div class="row">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="name"
                                        placeholder="Full name"
                                        required
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="Email"
                                        required
                                    />
                                </div>
                                <div class="form-group">
                                    <input
                                        type="password"
                                        name="password"
                                        placeholder="Password"
                                        required
                                    />
                                </div>

                                <div class="form-group">
                                    <textarea
                                        placeholder="Your full address"
                                        name="address"
                                    ></textarea>
                                </div>
                                <div class="form-group">
                                    <button
                                        type="submit"
                                        name="submit-form"
                                        class="btn btn-block"
                                    >
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                        <h5 class="mt-2">
                            <router-link :to="{ name: 'login' }" class="white"
                                >Already have an account?</router-link
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
import { mapActions } from 'vuex';
export default {
    name: 'register',
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
                address: '',
            },
            validationErrors: {},
            processing: false,
        };
    },
    methods: {
        ...mapActions({
            signIn: 'auth/login',
        }),
        async register() {
            this.processing = true;
            await axios.get('/sanctum/csrf-cookie');
            await axios
                .post('/register', this.user)
                .then((response) => {
                    this.validationErrors = {};
                    this.signIn();
                })
                .catch(({ response }) => {
                    if (response.status === 422) {
                        this.validationErrors = response.data.errors;
                    } else {
                        this.validationErrors = {};
                        alert(response.data.message);
                    }
                })
                .finally(() => {
                    this.processing = false;
                });
        },
    },
};
</script>
