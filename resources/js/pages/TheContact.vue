<template>
    <div>
        <!-- page title -->
        <section
            class="page-title centred"
            style="background-image: url(/images/home/page-title.jpg)"
        >
            <div class="container">
                <div class="content-box">
                    <div class="title"><h2>Contact Us</h2></div>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- contact-section -->
        <section class="contact-section sp-one">
            <div class="container">
                <div class="sec-title centred"><h2>Contact us</h2></div>
                <div class="title-text centred">
                    {{ company.about }}
                </div>
                <div class="row">
                    <div class="col-md-6 contact-column">
                        <div class="contact-info">
                            <div class="single-item">
                                <h3>Address</h3>
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="text pt-3">
                                        {{ company.address }}
                                    </div>
                                </div>
                            </div>
                            <div class="single-item">
                                <h3>Phone</h3>
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="text">
                                        Partner Info: {{ company.phone_one }}
                                    </div>
                                    <div class="text">
                                        Customer Care: {{ company.phone_two }}
                                    </div>
                                    <div class="text">
                                        Whatsapp: {{ company.phone_three }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 contact-column">
                        <div class="contact-info">
                            <div class="single-item">
                                <h3>Mail</h3>
                                <div class="info-box">
                                    <div class="icon-box">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="text pt-3">{{ company.email }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="social-info">
                            <h4>Get Social With Us</h4>
                            <ul class="social in-block">
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
                    <!-- <div class="col-md-7 col-sm-8 col-xs-12 contact-column">
                        <div class="contact-form-area">
                            <h3>Get In Touch</h3>
                            <div class="text">
                                Ut enim ad minima veniam, quis nostrum
                                exercitationem ullam corporis suscipit
                                laboriosam, nisi ut aliquid ex ea commodi
                                consequatur?
                            </div>
                            <form
                                method="post"
                                action="http://azim.commonsupport.com/Watertown/sendemail.php"
                                id="contact-form"
                                class="default-form"
                            >
                                <div class="row">
                                    <div
                                        class="form-group col-md-6 col-sm-6 col-xs-12"
                                    >
                                        <input
                                            type="text"
                                            name="username"
                                            placeholder="Your Name *"
                                            required
                                        />
                                    </div>
                                    <div
                                        class="form-group col-md-6 col-sm-6 col-xs-12"
                                    >
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="Email Address *"
                                            required
                                        />
                                    </div>
                                    <div
                                        class="form-group col-md-6 col-sm-12 col-xs-12"
                                    >
                                        <input
                                            type="text"
                                            name="subject"
                                            placeholder="Subject"
                                            required
                                        />
                                    </div>
                                    <div
                                        class="form-group col-md-6 col-sm-12 col-xs-12"
                                    >
                                        <input
                                            type="text"
                                            name="phone"
                                            placeholder="Phone"
                                            required
                                        />
                                    </div>
                                    <div
                                        class="form-group col-md-12 col-sm-12 col-xs-12"
                                    >
                                        <textarea
                                            placeholder="Your Message"
                                            name="message"
                                        ></textarea>
                                    </div>
                                    <div
                                        class="form-group col-md-12 col-sm-12 col-xs-12"
                                    >
                                        <button
                                            type="submit"
                                            name="submit-form"
                                        >
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>
        <!-- contact-section end -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            company: [],
        };
    },
    methods: {
        async companyInfo() {
            const result = await axios.get('/hf/company-info');
            this.company = result.data;
        },
    },
    mounted() {
        this.companyInfo();
    },
};
</script>
