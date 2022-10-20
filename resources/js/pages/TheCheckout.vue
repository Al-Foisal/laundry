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
                                >৳{{ cart.price * cart.quantity }}</span
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
                                >-৳{{ coupon.discount }}</span
                            >
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between bg-light"
                            v-if="areaDetails"
                        >
                            <div class="text-success">
                                <h4 class="my-0">Shipping Charge</h4>
                                <small>Area: {{ areaDetails.name }}</small>
                            </div>
                            <span class="text-success"
                                >৳{{ areaDetails.shipping_charge }}</span
                            >
                        </li>
                        <li
                            class="list-group-item d-flex justify-content-between"
                        >
                            <span>Total (BDT)</span>
                            <strong>৳{{ AmountToBePaid }}</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8 order-md-1">
                    <h1 class="mb-3" style="color: black">Billing address</h1>
                    <form @submit.prevent="submitForm">
                        <div class="mb-3">
                            <label for="Full Name">Full Name</label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control rounded"
                                    placeholder="Full Name"
                                    ref="name"
                                    :value="user.name"
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
                                    ref="email"
                                    :value="user.email"
                                    required
                                />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone</label>
                                <input
                                    type="number"
                                    class="form-control rounded"
                                    placeholder="Phone number"
                                    ref="phone"
                                    :value="user.phone"
                                    required
                                />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="City">City</label>
                                <select
                                    class="custom-select d-block w-100"
                                    v-model="city_id"
                                    required
                                >
                                    <option value="">Choose...</option>
                                    <option
                                        v-for="city in cities"
                                        :key="city.id"
                                        :value="city.id"
                                    >
                                        {{ city.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="Area">Area</label>
                                <select
                                    class="custom-select d-block w-100"
                                    v-model="area_id"
                                    required
                                >
                                    <option value="">Choose...</option>
                                    <option
                                        v-for="area in areas"
                                        :key="area.id"
                                        :value="area.id"
                                    >
                                        {{ area.name }}
                                    </option>
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
                                    ref="address"
                                    :value="user.address"
                                ></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input
                                                    id="cod"
                                                    required
                                                    v-model="payment_method"
                                                    value="cod"
                                                    type="radio"
                                                    class="form-control"
                                                />
                                                <label
                                                    for="cod"
                                                    style="
                                                        padding: 5px 10px 0 10px;
                                                        font-size: 15px;
                                                    "
                                                    >Cash on Delivery</label
                                                >
                                            </div>
                                        </div>
                                        <!-- <input
                                            type="text"
                                            class="form-control"
                                            aria-label="Text input with radio button"
                                            value="Cash on Delivery"
                                            readonly
                                        /> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input
                                                    id="bkash"
                                                    required
                                                    v-model="payment_method"
                                                    value="bkash"
                                                    type="radio"
                                                    class="form-control"
                                                />
                                                <label
                                                    for="bkash"
                                                    style="
                                                        padding: 5px 10px 0 10px;
                                                        font-size: 15px;
                                                    "
                                                    >Bkash Payment</label
                                                >
                                            </div>
                                        </div>
                                        <!-- <input
                                            type="text"
                                            class="form-control"
                                            aria-label="Text input with radio button"
                                            value="Cash on Delivery"
                                            readonly
                                        /> -->
                                    </div>
                                </div>
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
import { useToast } from 'vue-toastification';
export default {
    setup() {
        const toast = useToast();
        return { toast };
    },
    data() {
        return {
            coupon: [],
            user: [],
            city_id: '',
            area_id: '',
            payment_method: '',
            cities: [],
            areas: [],
            areaDetails: '',
            AmountToBePaid: 0,
        };
    },
    methods: {
        async submitForm() {
            if (!this.payment_method) {
                this.toast.error('Please select payment method.', {
                    timeout: 5000,
                });
                return;
            }
            const formData = {
                //identity
                name: this.$refs.name.value,
                email: this.$refs.email.value,
                phone: this.$refs.phone.value,
                address: this.$refs.address.value,
                city_id: this.city_id,
                area_id: this.area_id,

                //order
                user_id: this.user.id,
                user_payment_method: this.payment_method,

                coupon_code: this.coupon ? this.coupon.code : null,
                coupon_percentage: this.coupon ? this.coupon.percentage : null,

                total: this.cartTotal,
                discount: this.coupon ? this.coupon.discount : null,
                shipping_charge: this.areaDetails.shipping_charge,
                paid_amount: this.AmountToBePaid,

                status: 1,

                cart: JSON.stringify(this.$store.getters['cart/cart']),
            };
            
            await axios.post('/order/save', formData);
            this.toast.success('Your order placed successfully.', {
                timeout: 5000,
            });

            // for (var cart in this.cartContent) {
            //     this.$store.commit('cart/REMOVE_FROM_CART', cart);
            // }
            localStorage.removeItem('cart');
            localStorage.removeItem('coupon');
            localStorage.removeItem('cartCount');

            this.$router.push({ name: 'home' });
        },
        async activeCity() {
            const result = await axios.get('/front/cities');
            this.cities = result.data;
        },
        async cityValue(id) {
            const result = await axios.get('/front/city-area/' + id);
            this.areas = result.data;
        },
        shippingCharge() {
            const result = this.areas.find((area) => area.id == this.area_id);
            this.areaDetails = result;
        },
        paidAmount() {
            const discount = this.coupon ? this.coupon.discount : 0;
            const ship = this.areaDetails.shipping_charge
                ? this.areaDetails.shipping_charge
                : 0;
            console.log(discount);
            if (discount > 0) {
                this.AmountToBePaid = this.cartTotal + ship - discount;
            } else {
                this.AmountToBePaid = this.cartTotal + ship;
            }
        },
    },
    computed: {
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
    },
    mounted() {
        this.activeCity();
        this.paidAmount();
        this.coupon = JSON.parse(localStorage.getItem('coupon'));
        this.user = this.$store.getters['user'];
    },
    watch: {
        city_id(value) {
            this.cityValue(value);
        },
        area_id(_) {
            this.shippingCharge();
            this.paidAmount();
        },
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
