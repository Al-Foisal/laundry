<template>
    <div>
        <div class="container">
            <div class="py-5 text-center">
                <img
                    class="d-block mx-auto mb-4"
                    src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg"
                    alt=""
                    width="72"
                    height="72"
                />
                <h2>Checkout form</h2>
            </div>

            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h2
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <span class="text-muted">Your cart</span>
                        <span class="badge badge-secondary badge-pill">{{
                            cartCount
                        }}</span>
                    </h2>
                    <ul class="list-group mb-3">
                        <li
                            class="list-group-item d-flex justify-content-between lh-condensed"
                            v-for="cart in cartContent"
                            :key="cart.id"
                        >
                            <div>
                                <h3 class="my-0">{{ cart.name }}</h3>
                                <small class="text-muted"
                                    >Service: {{ cart.service }}</small
                                >
                            </div>
                            <span class="text-muted"
                                >${{ cart.price * cart.quantity }}</span
                            >
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between bg-light"
                            v-if="coupon"
                        >
                            <div class="text-success">
                                <h4 class="my-0">Promo code</h4>
                                <small>{{ coupon.code }}</small>
                            </div>
                            <span class="text-success"
                                >-${{ coupon.discount }}</span
                            >
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between"
                        >
                            <span>Total (USD)</span>
                            <strong>${{ paidAmount }}</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <h1 class="mb-3" style="color: black">Billing address</h1>
                    <form>
                        <div class="mb-3">
                            <label for="Full Name">Full Name</label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control rounded"
                                    placeholder="Full Name"
                                    v-model="checkout.name"
                                    required
                                />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control rounded"
                                    placeholder="Your email"
                                    v-model="checkout.email"
                                    required
                                />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone</label>
                                <input
                                    type="number"
                                    class="form-control rounded"
                                    placeholder="Phone number"
                                    v-model="checkout.phone"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="City">City</label>
                                <select
                                    class="custom-select d-block w-100"
                                    id="City"
                                    required
                                >
                                    <option value="">Choose...</option>
                                    <option>United States</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Area">Area</label>
                                <select
                                    class="custom-select d-block w-100"
                                    id="Area"
                                    required
                                >
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Full Address">Full Address</label>
                            <div class="input-group">
                                <textarea
                                    class="form-control rounded"
                                    placeholder="Full Address"
                                    required
                                    v-model="checkout.address"
                                    
                                ></textarea>
                            </div>
                        </div>

                        <button
                            class="rounded mb-5"
                            style="
                                padding: 13px 28px 12px 28px;
                                background: #006837;
                                margin-top: 3rem;
                                width: 100%;
                                text-align: center;
                                color: white;
                            "
                            type="submit"
                        >
                            Continue to checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            coupon: [],
            user: '',
            checkout: {
                name: this.user.name,
                email: this.user.email,
                phone: this.user.phone,
                address: this.user.address,
                city_id: this.user.city_id,
                area_id: this.user.area_id
            },
        };
    },
    computed: {
        // isLogin(){
        //     return this.$store.getters.isLogin;
        // },
        cartCount() {
            return this.$store.getters['cart/cartCount'];
        },
        cartContent() {
            return this.$store.getters['cart/cart'];
        },
        cartTotal() {
            var total = 0;
            for (var item of this.cartContent) {
                total += item.price * item.quantity;
            }
            return total;
        },
        paidAmount() {
            if (this.coupon.discount) {
                return this.cartTotal - this.coupon.discount;
            } else {
                return this.cartTotal;
            }
        },
    },
    mounted() {
        this.coupon = JSON.parse(localStorage.getItem('coupon'));
        this.user = this.$store.getters['user'];
    },
};
</script>
<style scoped>
@import '../asset/cartboot.css';
body {
    font-size: 2rem;
    color: black;
}
.form-control,
.custom-select {
    height: 50px;
    font-size: 20px;
}
</style>
