<template>
    <div>
        <div class="px-4 px-lg-0">
            <!-- For demo purpose -->
            <div class="container text-white py-5 text-center">
                <h1 style="color: black">Your Shopping Cart</h1>
            </div>
            <!-- End -->

            <div class="pb-5">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5"
                        >
                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr
                                            style="
                                                background: #006837;
                                                color: white;
                                            "
                                        >
                                            <th scope="col" class="border-0">
                                                <div
                                                    class="p-2 px-3 text-uppercase"
                                                >
                                                    Product
                                                </div>
                                            </th>
                                            <th scope="col" class="border-0">
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Price
                                                </div>
                                            </th>
                                            <th scope="col" class="border-0">
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Quantity
                                                </div>
                                            </th>
                                            <th scope="col" class="border-0">
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Remove
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="cart in cartContent"
                                            :key="cart.id"
                                        >
                                            <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img
                                                        :src="cart.image"
                                                        alt=""
                                                        width="70"
                                                        class="img-fluid rounded shadow-sm"
                                                    />
                                                    <div
                                                        class="ml-3 d-inline-block align-middle"
                                                    >
                                                        <h5 class="mb-0">
                                                            <a
                                                                href="#"
                                                                class="text-dark d-inline-block align-middle"
                                                                >{{
                                                                    cart.name
                                                                }}</a
                                                            >
                                                        </h5>
                                                        <span
                                                            class="text-muted font-weight-normal font-italic d-block"
                                                            >Service:
                                                            {{
                                                                cart.service
                                                            }}</span
                                                        >
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle">
                                                <strong
                                                    >???{{
                                                        cart.price.toFixed(2)
                                                    }}</strong
                                                >
                                            </td>
                                            <td class="border-0 align-middle">
                                                <strong>{{
                                                    cart.quantity
                                                }}</strong>
                                            </td>
                                            <td class="border-0 align-middle">
                                                <a
                                                    href="javascript:void(0)"
                                                    @click="
                                                        removeFromCart(cart)
                                                    "
                                                    class="text-dark"
                                                    ><i class="fa fa-trash"></i
                                                ></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">
                            <div v-if="!coupon">
                                <div
                                    class="rounded-pill px-4 py-3 text-uppercase font-weight-bold"
                                    style="background: #006837; color: white"
                                >
                                    Coupon code
                                </div>
                                <div class="p-4">
                                    <p class="font-italic mb-2">
                                        If you have a coupon code, please enter
                                        it in the box below
                                    </p>
                                    <div class="input-group mb-4 p-2">
                                        <input
                                            type="text"
                                            placeholder="Apply coupon"
                                            aria-describedby="button-addon3"
                                            class="form-control"
                                            style="
                                                height: 52px;
                                                font-size: 20px;
                                            "
                                            ref="coupon"
                                            value=""
                                        />
                                        <div
                                            class="input-group-append border-0"
                                            @click="applyCoupon"
                                        >
                                            <button
                                                type="button"
                                                style="
                                                    padding: 13px 28px 12px 28px;
                                                    background: #006837;
                                                    color: white;
                                                    width: 100%;
                                                    text-align: center;
                                                "
                                            >
                                                <i class="fa fa-gift mr-2"></i
                                                >Apply coupon
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="rounded-pill px-4 py-3 text-uppercase font-weight-bold"
                                style="background: #006837; color: white"
                            >
                                Order summary
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">
                                    Shipping and additional costs are calculated
                                    based on values you have entered.
                                </p>
                                <ul class="list-unstyled mb-4">
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Order Subtotal </strong
                                        ><strong
                                            >???{{ cartTotal.toFixed(2) }}</strong
                                        >
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                        v-if="coupon"
                                    >
                                        <strong class="text-muted"
                                            >Coupon Discount</strong
                                        ><strong>???{{ discount }}</strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Total</strong
                                        >
                                        <h5 class="font-weight-bold">
                                            ???{{ paidAmount.toFixed(2) }}
                                        </h5>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="apps-content">
                                            <div class="apps-box" style="">
                                                <a
                                                    class="single-apps-box"
                                                    style="
                                                        padding: 13px 28px 12px
                                                            28px;
                                                        background: #006837;
                                                        margin-top: 3rem;
                                                        width: 100%;
                                                        text-align: center;
                                                    "
                                                >
                                                    <h4 style="color: white">
                                                        View More Plan
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="apps-content">
                                            <div class="apps-box" style="">
                                                <router-link
                                                    :to="{ name: 'checkout' }"
                                                    class="single-apps-box"
                                                    style="
                                                        padding: 13px 28px 12px
                                                            28px;
                                                        background: #006837;
                                                        margin-top: 3rem;
                                                        width: 100%;
                                                        text-align: center;
                                                    "
                                                >
                                                    <h4 style="color: white">
                                                        Proceed To Checkout
                                                    </h4>
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            total: 0,
            coupon: [],
            discount: 0,
        };
    },
    methods: {
        calculateCouponDiscount() {
            const services = this.$store.getters['cart/cart'];
            const package_id = this.coupon.package_id;
            const service_id = [];
            for (var ser of services) {
                service_id.push(ser.id);
            }

            const output = package_id.filter((ele) =>
                service_id.includes(parseInt(ele))
            );
            if (this.coupon.coupon_type == 1) {
                let s_total = 0;
                let c_discount = 0;
                for (let serv of services) {
                    for (let o of output) {
                        if (serv.id == o) {
                            s_total = s_total + serv.price * serv.quantity;
                            c_discount = parseInt(
                                (s_total * this.coupon.percentage) / 100
                            );
                        }
                    }
                }
                this.discount = c_discount;
                localStorage.setItem('c_discount', JSON.stringify(c_discount));
            } else {
                let s_total = 0;
                let c_discount = 0;
                for (let serv of services) {
                    for (let o of output) {
                        if (serv.id == o) {
                            s_total = s_total + serv.price * serv.quantity;
                            c_discount = this.coupon.percentage;
                        }
                    }
                }
                this.discount = c_discount;
                localStorage.setItem('c_discount', JSON.stringify(c_discount));
            }
        },
        async applyCoupon() {
            const couponValue = this.$refs.coupon.value;
            if (!couponValue) {
                return;
            } else {
                localStorage.removeItem('coupon');

                const result = await axios.post('/cart/apply-coupon', {
                    coupon_code: couponValue,
                });

                if (!result.data.status) {
                    this.toast.error(result.data.message, {
                        timeout: 5000,
                    });
                    return;
                }

                if (result.data.coupon.cart_amount < this.cartTotal) {
                    // const discount = parseInt(
                    //     (parseInt(this.cartTotal) *
                    //         parseInt(result.data.coupon.percentage)) /
                    //         100
                    // );
                    this.coupon = {
                        code: result.data.coupon.code,
                        percentage: result.data.coupon.percentage,
                        cart_amount: result.data.coupon.cart_amount,
                        coupon_type: result.data.coupon.coupon_type,
                        package_id: result.data.coupon.package_id.split(' '),
                    };
                    localStorage.setItem('coupon', JSON.stringify(this.coupon));
                    this.toast.success('Coupon applied successfully', {
                        timeout: 5000,
                    });
                    this.coupon = JSON.parse(localStorage.getItem('coupon'));
                    this.calculateCouponDiscount();
                } else {
                    this.toast.error(
                        'Make plan more than ' +
                            result.data.coupon.cart_amount +
                            ' TK to apply this coupon.',
                        { timeout: 5000 }
                    );
                }
            }

            this.$refs.coupon.value = '';
        },
        removeCoupon() {
            localStorage.removeItem('coupon');
            this.toast.success('Coupon removed successfully', {
                timeout: 5000,
            });
        },
        removeFromCart(cart) {
            this.$store.commit('cart/REMOVE_FROM_CART', cart);
            this.toast.success(
                cart.name + ' TK ' + cart.price + ' remove from cart plan!',
                { timeout: 5000 }
            );
        },
    },
    computed: {
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
            if (this.coupon) {
                return this.cartTotal - this.discount;
            } else {
                return this.cartTotal;
            }
        },
    },
    mounted() {
        this.coupon = JSON.parse(localStorage.getItem('coupon'));
        if (this.coupon) {
            this.calculateCouponDiscount();
        }
    },
};
</script>

<style scoped>
/* @import '../asset/cartboot.css'; */
body {
    background: #eecda3;
    background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
    background: linear-gradient(to right, #eecda3, #ef629f);
    min-height: 100vh;
}
</style>
