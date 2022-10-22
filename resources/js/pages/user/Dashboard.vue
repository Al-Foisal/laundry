<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Deliveryman Name</th>
                            <th scope="col">Deliveryman Phone</th>
                            <th scope="col">Paid Amount</th>
                            <th scope="col">Order Status</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(order, index) in orders" :key="order.id">
                            <th scope="row">{{ ++index }}</th>
                            <td>{{ order.id }}</td>
                            <td>{{ order.deliveryman.name ?? '' }}</td>
                            <td>{{ order.deliveryman.phone ?? '' }}</td>
                            <td>{{ order.paid_amount }}</td>
                            <td>{{ order.status.name }}</td>
                            <td>
                                <router-link
                                    :to="{
                                        name: 'invoice',
                                        params: { id: order.id },
                                    }"
                                >
                                    Invoice
                                </router-link>
                            </td>
                            <td>{{ order.created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    data() {
        return {
            user: [],
            orders: [],
        };
    },
    computed: {
        ...mapGetters(['isLogin']),
    },
    methods: {
        async orderList() {
            const result = await axios.get('/order-list');
            this.orders = result.data.orders;
        },
        async logout() {
            await this.$store.dispatch('logout');
            this.$router.replace({ name: 'login' });
        },
    },
    mounted() {
        this.user = this.$store.getters['user'];
        this.orderList();
    },
    // methods:{
    //     formattedDate(date){
    //         return moment(date, "YYYYMMDD").fromNow();;
    //     }
    // }
};
</script>
<style scoped>
@import 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css';
* {
    font-size: 15px;
}
</style>