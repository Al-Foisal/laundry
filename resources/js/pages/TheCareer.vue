<template>
    <!-- page title -->
    <section
        class="page-title centred mb-5"
        style="background-image: url(/images/home/page-title.jpg)"
    >
        <div class="container">
            <div class="content-box">
                <div class="title"><h2>Career</h2></div>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    <div class="container mt-5">
        <div class="card mb-3" v-for="item in job" :key="item.id">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img
                        :src="item.image"
                        style="height: 200px; width: inherit"
                    />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <router-link
                            :to="{
                                name: 'career_details',
                                params: { id: item.id },
                            }"
                        >
                            <h1>{{ item.name }}</h1>
                        </router-link>
                        <p
                            class="card-text"
                            v-html="item.details.substring(0, 1000) + '...'"
                        ></p>
                        <p class="card-text">
                            <small class="text-muted"
                                >Dead line: {{ item.dead_line }}</small
                            >
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            job: [],
        };
    },
    methods: {
        async allJob() {
            const result = await axios.get('/front/job');
            this.job = result.data;
        },
    },
    mounted() {
        this.allJob();
    },
};
</script>
