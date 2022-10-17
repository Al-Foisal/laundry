<template>
    <div>
        <section class="main-slider">
            <div class="container-fluid">
                <div class="row slider-wrapper">
                    <div class="col-md-6">
                        <form>
                            <div
                                class="row"
                                style="padding: 13rem 10rem 0 10rem"
                            >
                                <div class="col-sm-6">
                                    <div class="form-group" style="width: 100%">
                                        <select
                                            class="form-control"
                                            style="
                                                height: 60px;
                                                font-size: 16px;
                                                border-radius: 3px;
                                            "
                                            v-model="city_id"
                                        >
                                            <option>Select City</option>
                                            <option
                                                v-for="city in cities"
                                                :key="city.id"
                                                :value="city.id"
                                            >
                                                {{ city.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" style="width: 100%">
                                        <select
                                            class="form-control"
                                            style="
                                                height: 60px;
                                                font-size: 16px;
                                                border-radius: 3px;
                                            "
                                        >
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
                            </div>
                            <div style="padding: 1rem 10rem 10rem 10rem">
                                <button
                                    style="
                                        width: 100%;
                                        line-height: 3;
                                        font-size: 22px;
                                        letter-spacing: 1px;
                                        background-color: #0f724a;
                                        color: white;
                                        font-weight: 600;
                                        border-radius: 3px;
                                    "
                                >
                                    Order Now
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 image">
                        <img src="images/slider/3.jpg" />
                    </div>
                </div>
            </div>
        </section>
        <!-- main-slider end -->
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
                <Carousel
                    :settings="settings"
                    :breakpoints="breakpoints"
                >
                    <Slide v-for="service in services" :key="service.id">
                        <div class="carousel__item">
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
                                    style="margin: 1rem"
                                >
                                    <div>
                                        <img
                                            :src="service.image"
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
                    </Slide>
                </Carousel>
            </div>
        </section>
        <!-- help-section end -->
        <!-- working-section -->
        <section class="working-section sp-one centred">
            <div class="container">
                <div class="sec-title">
                    <h2>
                        How
                        <span>Laundry Man BD</span>
                        Works
                    </h2>
                </div>

                <div class="row">
                    <div
                        class="col-md-3 col-sm-6 col-xs-12 working-column"
                        v-for="work in workingProcess"
                        :key="work.id"
                    >
                        <div class="single-working-content">
                            <div class="icon-box">
                                <div class="icon">
                                    <img
                                        :src="work.image"
                                        style="height: 60px"
                                    />
                                </div>
                            </div>
                            <h3>{{ work.name }}</h3>
                            <div
                                style="
                                    padding: 0 24px;
                                    text-align: justify;
                                    padding-bottom: 24px;
                                "
                            >
                                {{ work.details }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- working-section end -->
        <!-- pricing-section -->
        <section class="pricing-section sp-one centred">
            <div class="container">
                <div class="sec-title">
                    <h2>Pricing <span>Plan</span></h2>
                </div>
                <div class="row">
                    <div
                        class="col-md-4 col-sm-6 col-xs-12 pricing-column"
                        v-for="price in pricing"
                        :key="price.id"
                    >
                        <div class="single-pricing-content">
                            <div class="icon-box">
                                <img :src="price.image" style="height: 100px" />
                            </div>
                            <div class="title">
                                <h3>TK&nbsp;</h3>
                                <h2>
                                    <span style="color: #006837">{{
                                        price.price
                                    }}</span>
                                </h2>
                                &nbsp;
                                <span>{{ price.name }}</span>
                                <br />
                                <h3>{{ price.service.name }}</h3>
                            </div>
                            <!-- <div class="pricing-btn">
                                <a href="#">Get Plan</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="apps-content">
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
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-section -->

        <!-- service-section -->
        <section class="service-section centred">
            <div class="container">
                <div class="sec-title">
                    <h2>
                        Why
                        <span>Laundry Man </span>Best
                    </h2>
                </div>
                <div class="row">
                    <div
                        class="col-md-4 col-sm-6 col-xs-12 service-column"
                        v-for="best in whyBest"
                        :key="best.id"
                    >
                        <div
                            class="single-service-content"
                            style="
                                margin-bottom: 30px;
                                box-shadow: 0px -1px 7px -1px
                                    rgb(204 204 204 / 50%);
                                border-radius: 10px;
                            "
                        >
                            <div class="row" style="padding: 35px 0 20px 15px">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <img
                                        :src="best.image"
                                        style="height: 70px"
                                    />
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <div class="card-body text-left">
                                        <h4>
                                            {{ best.name }}
                                        </h4>
                                        <p class="card-text">
                                            {{ best.details }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-section end -->

        <!-- loundry-apps -->
        <section
            class="loundry-apps sp-one"
            style="background-color: white; padding: 90px 0 0 0"
        >
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 apps-column">
                        <div class="apps-content">
                            <div class="top-text">
                                <!-- Tap, Clean, Deliver Even faster -->
                            </div>
                            <div class="title">
                                <h2>
                                    <span
                                        >Order Home Laundry Service from your
                                        smartphone</span
                                    >
                                </h2>
                            </div>
                            <div class="apps-box">
                                <a
                                    :href="company.app_link"
                                    class="single-apps-box"
                                >
                                    <div class="icon-box">
                                        <img
                                            src="images/home/apps2.png"
                                            alt=""
                                        />
                                    </div>
                                    <div class="text">Get it on</div>
                                    <h4>Google Play</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 video-column">
                        <div class="video-gallery">
                            <img
                                src="images/65749.png"
                                style="height: 42rem; width: 70%"
                                alt="Awesome Video Gallery"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- loundry-apps end -->
    </div>
</template>

<script>
import { Carousel, Navigation, Slide } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';
export default {
    components: {
        Carousel,
        Slide,
        Navigation,
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
            city_id: null,
            area_id: null,
            cities: [],
            areas: [],
            services: [],
            pricing: [],
            workingProcess: [],
            whyBest: [],
            company: [],
        };
    },
    methods: {
        async activeCity() {
            const result = await axios.get('/front/cities');
            this.cities = result.data;
        },
        cityValue(id) {
            const result = axios.get('/front/city-area/' + id);
            this.areas = result.data;
            console.log(this.areas);
        },
        async serviceFeature() {
            const result = await axios.get('/front/services');
            this.services = result.data;
        },
        async frontPricing() {
            const result = await axios.get('/front/front-pricing');
            this.pricing = result.data;
        },
        async workingProcessFeature() {
            const result = await axios.get('/front/working-process');
            this.workingProcess = result.data;
        },
        async whyBestsFeature() {
            const result = await axios.get('/front/why-bests');
            this.whyBest = result.data;
        },
        async companyInfo() {
            const result = await axios.get('/hf/company-info');
            this.company = result.data;
        },
    },
    computed: {},
    mounted() {
        this.activeCity();
        this.serviceFeature();
        this.frontPricing();
        this.workingProcessFeature();
        this.whyBestsFeature();
        this.companyInfo();
    },
    watch: {
        city_id(value) {
            this.cityValue(value);
        },
    },
};
</script>
