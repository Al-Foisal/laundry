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

        <!--faq-section -->
        <section class="faq-section">
            <div class="container">
                <div class="accordion-box">
                    <faq-component
                        v-for="item in faq"
                        :key="item.id"
                        :item="item"
                    ></faq-component>
                </div>
            </div>
        </section>
        <!-- faq-section end -->
    </div>
</template>

<script>
import FaqComponent from './FaqComponent.vue';
export default {
    components:{
        FaqComponent
    },
    data() {
        return {
            faq: [],
        };
    },
    methods: {
        async allFaq() {
            const result = await axios.get('/front/faq');
            this.faq = result.data;
            console.log(this.faq)
        },
    },
    mounted() {
        this.allFaq();
    },
};
</script>
