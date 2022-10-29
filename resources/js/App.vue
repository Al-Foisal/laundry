<template>
    <div>
        <!-- .preloader -->
        <!-- <div class="preloader"></div> -->
        <!-- /.preloader -->
        <!-- menu-area -->
        <header class="main-header">
            <!-- header middle -->
            <div class="header-top">
                <div class="container">
                    <div class="logo-box">
                        <router-link :to="{ name: 'home' }">
                            <img :src="company.logo" style="height: 80px" />
                        </router-link>
                    </div>
                    <div class="header-info">
                        <div class="single-info">
                            <a :href="company.app_link">
                                <img
                                    :src="company.app"
                                    style="height: 40px; border-radius: 5px"
                                />
                            </a>
                        </div>
                        <!-- <div class="apps-box">
                            <a href="#" class="single-apps-box">
                                <div class="icon-box">
                                    <img src="images/home/apps2.png" alt="">
                                </div>
                                <div class="text white">Get it on</div>
                                <h4>Google Play</h4>
                            </a>
                        </div> -->
                        <div class="single-info">
                            <div class="icon-box">
                                <i class="fa fa-whatsapp"></i>
                            </div>
                            <div class="text">
                                Whatsapp us
                                <br />
                                {{ company.phone_three }}
                            </div>
                        </div>
                        <div
                            class="single-info"
                            style="
                                margin-left: 45px;
                                padding: 0px 0px 0px 50px;
                                top: 15px;
                            "
                        >
                            <div class="icon-box" style="top: 0px">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="text">
                                Customer care?
                                <br />
                                {{ company.phone_two }}
                            </div>
                        </div>
                        <div class="top-btn" v-if="!user">
                            <router-link :to="{ name: 'login' }"
                                >Login/Signup</router-link
                            >
                        </div>
                        <div class="top-btn" v-else>
                            <router-link :to="{ name: 'dashboard' }"
                                >DashBoard</router-link
                            >
                        </div>
                    </div>
                </div>
            </div>
            <!-- header middle end -->
            <!-- main-menu-area -->
            <div class="theme_menu stricky">
                <div class="container-fluide">
                    <div class="menu-area">
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <button
                                    type="button"
                                    class="navbar-toggle"
                                    data-toggle="collapse"
                                    data-target=".navbar-collapse"
                                    @click="toggleMenubar"
                                >
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div
                                :class="[
                                    'navbar-collapse collapse clearfix',
                                    { in: isMenubarOpen },
                                ]"
                            >
                                <ul class="navigation clearfix">
                                    <li class="current">
                                        <router-link :to="{ name: 'home' }"
                                            >Home</router-link
                                        >
                                    </li>
                                    <li class="dropdown">
                                        <router-link
                                            :to="{
                                                name: 'service_price',
                                                params: {
                                                    slug: serviceHomeLink,
                                                },
                                            }"
                                            >Services</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'pricing' }"
                                            >Pricing</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'faq' }"
                                            >FAQ</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'career' }"
                                            >Career</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'contact' }"
                                            >Contact</router-link
                                        >
                                    </li>
                                </ul>
                                <!-- mobile menu -->
                                <ul class="mobile-menu clearfix">
                                    <li class="current">
                                        <router-link :to="{ name: 'home' }"
                                            >Home</router-link
                                        >
                                    </li>
                                    <li class="dropdown">
                                        <router-link
                                            :to="{
                                                name: 'service_price',
                                                params: {
                                                    slug: serviceHomeLink,
                                                },
                                            }"
                                            >Services</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'pricing' }"
                                            >Pricing</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'faq' }"
                                            >FAQ</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'career' }"
                                            >Career</router-link
                                        >
                                    </li>
                                    <li>
                                        <router-link :to="{ name: 'contact' }"
                                            >Contact</router-link
                                        >
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="search-box-area">
                            <router-link :to="{ name: 'cart' }">
                                <div class="search-toggle">
                                    <i class="fa fa-cart-plus mr-1"></i
                                    >{{ cartCount }}
                                </div>
                            </router-link>
                            <!-- <div class="search-box">
                                <form
                                    method="post"
                                    action="http://azim.commonsupport.com/Watertown/index.html"
                                >
                                    <div class="form-group">
                                        <input
                                            type="search"
                                            name="search"
                                            placeholder="Search Here"
                                            required
                                        />
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end main-menu -->
        </header>
        <!-- end menu-area -->
        <!-- Main slider -->
        <br />
        <br />

        <router-view></router-view>

        <!-- main-footer -->
        <footer class="main-footer" style="background-color: #006837">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 footer-column">
                            <div class="logo-widget footer-widget">
                                <div class="footer-logo">
                                    <router-link :to="{ name: 'home' }">
                                        <img
                                            :src="company.logo"
                                            style="height: 100px"
                                        />
                                    </router-link>
                                </div>
                                <div class="text white">
                                    {{ company.about }}
                                </div>
                                <div class="location-box">
                                    <div class="icon-box">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="text white">
                                        {{ company.address }}
                                    </div>
                                </div>
                                <ul class="footer-social in-block">
                                    <li v-if="company.facebook">
                                        <a :href="company.facebook">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li v-if="company.twitter">
                                        <a :href="company.twitter">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li v-if="company.linkedin">
                                        <a :href="company.linkedin">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    <li v-if="company.instagram">
                                        <a :href="company.instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li v-if="company.youtube">
                                        <a :href="company.youtube">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li v-if="company.pinterest">
                                        <a :href="company.pinterest">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 footer-column">
                            <div class="service-widget footer-widget">
                                <div class="footer-title">
                                    <h4>Services</h4>
                                </div>
                                <ul class="list">
                                    <li
                                        v-for="service in services"
                                        :key="service.id"
                                    >
                                        <a href="#"
                                            >- &nbsp;{{ service.name }}</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 footer-column">
                            <div class="service-widget footer-widget">
                                <div class="footer-title">
                                    <h4>Quick Links</h4>
                                </div>
                                <ul class="list">
                                    <li>
                                        <a href="#">- &nbsp;Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#">- &nbsp;Pricing</a>
                                    </li>
                                    <li>
                                        <a href="#">- &nbsp;Career</a>
                                    </li>
                                    <li>
                                        <a href="#">- &nbsp;Corporate Offer</a>
                                    </li>
                                    <li v-for="page in pages" :key="page.id">
                                        <a href="#">- &nbsp;{{ page.title }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom centred">
                <div class="container">
                    <div class="container">
                        <div class="copyright">
                            © {{ new Date().getFullYear() }}
                            Laundry Man BD Limited . All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->
        <!--Scroll to top-->
        <div class="scroll-to-top scroll-to-target" data-target=".main-header">
            <span class="icon fa fa-angle-up"></span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            company: [],
            services: [],
            pages: [],
            serviceHomeLink: 'slug',
            user: [],
            isMenubarOpen: false,
        };
    },
    methods: {
        async companyInfo() {
            const result = await axios.get('/hf/company-info');
            this.company = result.data;
        },
        async servicesLink() {
            const result = await axios.get('/hf/services');
            this.services = result.data;
            this.serviceHomeLink = this.services[0]['slug'];
        },
        async pageLink() {
            const result = await axios.get('/hf/pages');
            this.pages = result.data;
        },
        toggleMenubar() {
            this.isMenubarOpen = !this.isMenubarOpen;
        },
    },
    computed: {
        cartCount() {
            return this.$store.getters['cart/cartCount'];
        },
    },
    mounted() {
        this.companyInfo();
        this.servicesLink();
        this.pageLink();
        this.user = this.$store.getters['user'];
    },
};
</script>
