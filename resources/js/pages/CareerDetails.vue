<template>
    <div>
        <!-- page title -->
        <section
            class="page-title centred"
            style="background-image: url(/images/home/page-title.jpg)"
        >
            <div class="container">
                <div class="content-box">
                    <div class="title">
                        <h2>{{ details.name }}</h2>
                    </div>
                </div>
            </div>
        </section>
        <!--End Page Title-->

        <!-- service-details -->
        <section class="service-details">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="service-details-content">
                            <div class="content-style-one">
                                <div class="img-box">
                                    <figure>
                                        <img
                                            :src="'/' + details.image"
                                            alt=""
                                        />
                                    </figure>
                                </div>
                                <div class="title">
                                    <h3>{{ details.name }}</h3>
                                </div>
                                <div
                                    class="text"
                                    v-html="details.details"
                                ></div>
                            </div>
                        </div>

                        <!-- <div class="col-md-12 order-md-1">
                            <h1 class="mb-3" style="color: black">
                                Apply For this position
                            </h1>
                            <form @submit.prevent="submitForm"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="Full Name">Full Name</label>
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control rounded"
                                                placeholder="Full Name"
                                                ref="apply_name"
                                                required
                                            />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input
                                            type="email"
                                            class="form-control rounded"
                                            placeholder="Your email"
                                            ref="apply_email"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input
                                            type="number"
                                            class="form-control rounded"
                                            placeholder="Phone number"
                                            ref="apply_phone"
                                            required
                                        />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email"
                                            >CV (.pdf only)</label
                                        >
                                        <input
                                            ref="file"
                                            v-on:change="onChange"
                                            type="file"
                                            class="form-control rounded"
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="Experience"
                                        >Experience (if any)</label
                                    >
                                    <div class="input-group">
                                        <textarea
                                            class="form-control rounded"
                                            placeholder="Experience"
                                            ref="apply_exp"
                                            required
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
                                    Apply Now
                                </button>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- service-details end -->
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            details: [],
            apply_name: '',
            apply_email: '',
            apply_phone: '',
            file: null,
        };
    },
    methods: {
        async careerDetails() {
            const result = await axios.get('/front/job-details/' + this.id);
            this.details = result.data;
        },
    },
    onChange(e) {
        this.file = e.target.files[0];
    },
    async submitForm() {
        let existingObj = this;
        const config = {
            headers: {
                'content-type': 'multipart/form-data',
            },
        };
        let data = new FormData();
        const form_data = {
            name: this.$refs.apply_name.value,
            email: this.$refs.apply_email.value,
            phone: this.$refs.apply_phone.value,
            experience: this.$refs.exp.value,
            job_id: this.details.id,
            cv: data.append('file', this.file),
        };
        await axios
            .post('/front/submit-application', form_data, config)
            .then(function (res) {
                alert(res.data.success);
            })
            .catch(function (err) {
                existingObj.output = err;
            });
    },
    mounted() {
        this.careerDetails();
    },
};
</script>
