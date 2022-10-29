<template>
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Laundry Man BD</strong><br />
                                        {{ company.address }}<br />
                                        Phone: {{ company.phone_two }}<br />
                                        Email: {{ company.email }}<br />
                                        Deliveryman: {{ deliveryman }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ user.name }}</strong
                                        ><br />
                                        {{ user.address }}<br />
                                        Phone: {{ user.phone }}<br />
                                        Email: {{ user.email }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #{{ order.id }}</b
                                    ><br />
                                    <br />
                                    <!-- <b>Order:</b> -->
                                    <!-- {{ order.order_details }} items<br /> -->
                                    <b>Payment Due:</b>
                                    ৳
                                    {{
                                        order.user_payment_status == 0
                                            ? order.paid_amount.toFixed(2)
                                            : 0
                                    }}<br />
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Qty</th>
                                                <th>Product</th>
                                                <th>Service</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="details in order.order_details"
                                                :key="details.id"
                                            >
                                                <td>
                                                    {{ details.quantity }}
                                                </td>
                                                <td>{{ details.name }}</td>
                                                <td>{{ details.service }}</td>
                                                <td>
                                                    ৳
                                                    {{
                                                        (
                                                            details.price *
                                                            details.quantity
                                                        ).toFixed(2)
                                                    }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="">
                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-md-6"></div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width: 50%">
                                                        Subtotal:
                                                    </th>
                                                    <td>
                                                        ৳
                                                        {{ order.total }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>
                                                        Discount ({{
                                                            order.coupon_percentage
                                                                ? order.coupon_percentage
                                                                : 0.0
                                                        }})
                                                    </th>
                                                    <td>
                                                        ৳
                                                        {{
                                                            order.discount
                                                                ? order.discount
                                                                : 0.0
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping:</th>
                                                    <td>
                                                        ৳
                                                        {{
                                                            order.shipping_charge
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>
                                                        ৳
                                                        {{ order.paid_amount }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
    </div>
</template>
<script>
export default {
    props: ['id'],
    data() {
        return {
            order: [],
            deliverynam: [],
            company: [],
            user: [],
        };
    },
    methods: {
        async invoice() {
            const result = await axios.get('/order-invoice/' + this.id);
            this.order = result.data.order;
            this.deliverynam = result.data;
            console.log(result);
        },
        async companyInfo() {
            const result = await axios.get('/hf/company-info');
            this.company = result.data;
        },
    },
    mounted() {
        this.invoice();
        this.companyInfo();
        this.user = this.$store.getters['user'];
    },
};
</script>
<style scoped>
@import 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css';
* {
    font-size: 15px;
}
</style>
