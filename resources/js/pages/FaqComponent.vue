<template>
    <div>
        <div
            class="accordion animated out"
            data-delay="0"
            data-animation="fadeInUp"
            @click="toggleFaq"
        >
            <div :class="['acc-btn', { active: isOpen }]">
                <div class="title">
                    <h3>
                        {{ item.name }}
                    </h3>
                </div>
            </div>
            <div class="acc-content collapsed">
                <div class="text">
                    {{ item.details }}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['item'],
    data() {
        return {
            isOpen: false,
        };
    },
    methods: {
        toggleFaq() {
            this.isOpen = !this.isOpen;
        },
    },
};
</script>
