<template>
    <div>
        <div class="px-4 px-lg-0">
            <!-- For demo purpose -->
            <div class="container text-white py-5 text-center">
                <h1 class="display-4">Bootstrap 4 shopping cart</h1>
                <p class="lead mb-0">
                    Build a fully structred shopping cart page using Bootstrap
                    4.
                </p>
                <p class="lead">
                    Snippet by
                    <a
                        href="https://bootstrapious.com/snippets"
                        class="text-white font-italic"
                    >
                        <u>Bootstrapious</u></a
                    >
                </p>
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
                                        <tr>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="p-2 px-3 text-uppercase"
                                                >
                                                    Product
                                                </div>
                                            </th>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Price
                                                </div>
                                            </th>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
                                                <div
                                                    class="py-2 text-uppercase"
                                                >
                                                    Quantity
                                                </div>
                                            </th>
                                            <th
                                                scope="col"
                                                class="border-0 bg-light"
                                            >
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
                                                    >${{
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
                            <div
                                class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold"
                            >
                                Coupon code
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-2">
                                    If you have a coupon code, please enter it
                                    in the box below
                                </p>
                                <div
                                    class="input-group mb-4 border rounded-pill p-2"
                                >
                                    <input
                                        type="text"
                                        placeholder="Apply coupon"
                                        aria-describedby="button-addon3"
                                        class="form-control border-0"
                                    />
                                    <div class="input-group-append border-0">
                                        <button
                                            type="button"
                                            class="rounded-pill"
                                            style="
                                                padding: 13px 28px 12px 28px;
                                                background: #006837;
                                                color: white;
                                                width: 100%;
                                                text-align: center;
                                            "
                                        >
                                            <i class="fa fa-gift mr-2"></i>Apply
                                            coupon
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 text-uppercase font-weight-bold">
                                <div class="apps-content">
                                    <div class="apps-box" style="">
                                        <a
                                            class="single-apps-box"
                                            style="
                                                padding: 13px 28px 12px 28px;
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
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold"
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
                                        ><strong>$390.00</strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Shipping and handling</strong
                                        ><strong>$10.00</strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted">Tax</strong
                                        ><strong>$0.00</strong>
                                    </li>
                                    <li
                                        class="d-flex justify-content-between py-3 border-bottom"
                                    >
                                        <strong class="text-muted"
                                            >Total</strong
                                        >
                                        <h5 class="font-weight-bold">
                                            $400.00
                                        </h5>
                                    </li>
                                </ul>
                                <div class="apps-content">
                                    <div class="apps-box" style="">
                                        <a
                                            class="single-apps-box"
                                            style="
                                                padding: 13px 28px 12px 28px;
                                                background: #006837;
                                                margin-top: 3rem;
                                                width: 100%;
                                                text-align: center;
                                            "
                                        >
                                            <h4 style="color: white">
                                                Proceed To Checkout
                                            </h4>
                                        </a>
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
    methods: {
        removeFromCart(cart) {
            this.$store.commit('cart/REMOVE_FROM_CART', cart);
            this.toast.success(
                cart.name + ' TK ' + cart.price + ' remove from cart plan!',
                { timeout: 2000 }
            );
        },
    },
    computed: {
        cartContent() {
            return this.$store.getters['cart/cart'];
        },
    },
};
</script>

<style scoped>
@import '../asset/cartboot.css';
body {
    background: #eecda3;
    background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
    background: linear-gradient(to right, #eecda3, #ef629f);
    min-height: 100vh;
}
</style>
