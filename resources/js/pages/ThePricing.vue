<template>
    <div>
        <!-- page title -->
        <section
            class="page-title centred"
            style="background-image: url(/images/home/page-title.jpg)"
        >
            <div class="container">
                <div class="content-box">
                    <div class="title"><h2>Our Pricing</h2></div>
                </div>
            </div>
        </section>
        <!--End Page Title-->
        <!-- pricing-section -->
        <section class="pricing-section sp-one centred">
            <div class="container">
                <div class="row">
                    <div
                        class="col-md-4 col-sm-6 col-xs-12 pricing-column mb-5"
                        v-for="item in pricing"
                        :key="item.id"
                    >
                        <div class="single-pricing-content">
                            <div class="icon-box">
                                <img
                                    :src="'/' + item.image"
                                    style="height: 100px"
                                />
                            </div>
                            <div class="title">
                                <span>{{ item.name }}</span>
                            </div>

                            <div class="title" v-if="!item.discount">
                                <h3>TK&nbsp;</h3>
                                <h2>
                                    <span style="color: #006837">{{
                                        item.price.toFixed(2)
                                    }}</span>
                                </h2>
                                &nbsp;
                            </div>
                            <div class="title" v-else>
                                <div>
                                    <h3>TK&nbsp;</h3>
                                    <h2>
                                        <span style="color: #006837">{{
                                            item.discount_price.toFixed(2)
                                        }}</span>
                                    </h2>
                                    &nbsp;&nbsp;&nbsp;
                                    <h2>
                                        <span style="color: #006837">
                                            <del>
                                                TK
                                                {{ item.price.toFixed(2) }}
                                            </del>
                                        </span>
                                    </h2>
                                </div>
                            </div>
                            <div class="title">
                                <span style="text-align: justify">{{
                                    item.details
                                }}</span>
                            </div>
                            <button class="btn btn-success btn-block" @click="addToCart(item)">Get Plan</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- pricing-section -->
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
            
            pricing: [],
            quantity: 1,
            price: 0,
        };
    },
    methods: {
        async allPricing() {
            const result = await axios.get('/front/all-pricing');
            this.pricing = result.data;
        },
        addToCart(item) {
            this.price = parseInt(item.price);
            this.$store.dispatch('cart/addToCart', {
                id: item.id,
                service: item.service.name,
                name: item.name,
                quantity: parseInt(this.quantity),
                price: this.price,
                image: item.image,
            });
            this.toast.success(
                item.name + ' TK ' + this.price + ' added to cart plan!',
                { timeout: 2000 }
            );
        },
    },
    computed: {},
    mounted() {
        this.allPricing();
    },
};
</script>
