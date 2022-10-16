<template>
    <div class="card text-center">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <h5 class="card-title">{{ user.name }}</h5>
            <p class="card-text">
                You are registered via E-mail <i>{{ user.email }}</i>
            </p>
        </div>
        <div class="card-footer text-muted">
            <a href="#" class="nav-link" @click="logout()"
                            >Logout</a
                        >
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    data() {
        return {
            user: [],
        };
    },
    computed: {
        ...mapGetters(['isLogin']),
    },
    methods: {
        async logout() {
            await this.$store.dispatch('logout');
            this.$router.replace({ name: 'login' });
        },
    },
    mounted() {
        this.user = this.$store.getters['user'];
    },
    // methods:{
    //     formattedDate(date){
    //         return moment(date, "YYYYMMDD").fromNow();;
    //     }
    // }
};
</script>