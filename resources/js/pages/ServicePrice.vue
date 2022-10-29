<template>
    <div>
        <!-- page title -->
        <section
            class="page-title centred"
            style="background-image: url(/images/home/page-title.jpg)"
        >
            <div class="container">
                <div class="content-box">
                    <div class="title"><h2>Our Services</h2></div>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- help-section -->
        <section
            class="help-section centred"
            style="background-image: url(images/home/help.jpg)"
        >
            <div class="container">
                <div class="sec-title">
                    <h2>
                        Our
                        <span>Services</span>
                    </h2>
                </div>
                <!-- :autoplay="4000"
                    :wrap-around="true" -->
                <div class="row">
                    <div class="col-sm-4" v-for="service in services" :key="service.id">
                        <router-link
                            :to="{
                                name: 'service_price',
                                params: {
                                    slug: service.slug,
                                },
                            }"
                        >
                            <div
                                class="single-help-content second-column"
                            >
                                <div>
                                    <img
                                        :src="'/'+service.image"
                                        style="
                                            width: 40%;
                                            height: 115px;
                                            margin: auto;
                                        "
                                    />
                                </div>
                                <div class="top-content">
                                    <h3>{{ service.name }}</h3>
                                </div>
                                <div class="text">
                                    {{ service.details }}
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
        <!-- help-section end -->
        <!-- pricing-section -->
        <section class="pricing-section sp-one centred">
            <div class="container">
                <div class="sec-title">
                    <h2>
                        <span> {{ singleService }} </span> Pricing Plan
                    </h2>
                </div>
                <div class="row">
                    <div
                        class="col-md-4 col-sm-6 col-xs-12 pricing-column"
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
                                <h3>TK&nbsp;</h3>
                                <h2>
                                    <span style="color: #006837">{{
                                        item.price
                                    }}</span>
                                </h2>
                                &nbsp;
                                <span>{{ item.name }}</span>
                            </div>
                            <button class="btn btn-success btn-block" @click="addToCart(item)">Get Plan</button>
                            <!-- <div class="pricing-btn">
                                <a
                                    href="javascript:void(0)"
                                    @click="addToCart(item)"
                                    >Get Plan</a
                                >
                            </div> -->
                        </div>
                    </div>
                    <!-- <div class="apps-content">
                        <div class="apps-box" style="">
                            <a
                                class="single-apps-box"
                                style="
                                    padding: 13px 28px 12px 28px;
                                    background: #006837;
                                    margin-top: 3rem;
                                "
                            >
                                <h4 style="color: white">View More Plan</h4>
                            </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- pricing-section -->
    </div>
</template>

<script>
import { Carousel, Navigation, Slide } from 'vue3-carousel';
import { useToast } from 'vue-toastification';
import 'vue3-carousel/dist/carousel.css';
export default {
    props: ['slug'],
    components: {
        Carousel,
        Slide,
        Navigation,
    },
    setup() {
        const toast = useToast();
        return { toast };
    },
    data() {
        return {
            settings: {
                itemsToShow: 1,
                snapAlign: 'center',
            },
            breakpoints: {
                // 700px and up
                700: {
                    itemsToShow: 2,
                    snapAlign: 'center',
                },
                // 1024 and up
                1024: {
                    itemsToShow: 3,
                    snapAlign: 'start',
                },
            },
            services: [],
            pricing: [],
            singleService: null,
            quantity: 1,
            price: 0,
        };
    },
    methods: {
        async serviceFeature() {
            const result = await axios.get('/front/services');
            this.services = result.data;
        },
        async servicePrice(slug) {
            const result = await axios.get('/front/service-price/' + slug);
            this.pricing = result.data.price;
            this.singleService = result.data.service.name;
            console.log(this.singleService.name);
        },
        addToCart(item) {
            this.price = parseInt(item.price);
            this.$store.dispatch('cart/addToCart', {
                id: item.id,
                service: this.singleService,
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
        this.serviceFeature();
        this.servicePrice(this.slug);
    },
    watch: {
        slug(value) {
            this.servicePrice(value);
        },
    },
};
</script>
