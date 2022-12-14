import { createRouter, createWebHistory } from 'vue-router';
import TheHome from './pages/TheHome.vue';
import TheLogin from './pages/TheLogin.vue';
import TheRegister from './pages/TheRegister.vue';
import ServicePrice from './pages/ServicePrice.vue';
import TheCart from './pages/TheCart.vue';
import TheCheckout from './pages/TheCheckout.vue';
import TheFaq from './pages/TheFaq.vue';
import TheCareer from './pages/TheCareer.vue';
import CareerDetails from './pages/CareerDetails.vue';
import TheContact from './pages/TheContact.vue';
import ThePricing from './pages/ThePricing.vue';
import DahboardLayout from './pages/user/Default.vue';
import Dashboard from './pages/user/Dashboard.vue';
import TheInvoice from './pages/user/TheInvoice.vue';
import store from './store/index.js';

const routes = [
    {
        path: '/',
        component: TheHome,
        name: 'home',
        meta: {
            title: 'The home - Laundry Man BD',
            metaTags: [
                {
                    name: 'description',
                    content: 'The about page of our example app.',
                },
                {
                    property: 'og:description',
                    content: 'The about page of our example app.',
                },
            ],
        },
    },
    {
        path: '/service-price/:slug',
        component: ServicePrice,
        name: 'service_price',
        props: true,
        meta: {
            title: 'Single service price - Laundry Man BD',
        },
    },

    {
        path: '/pricing',
        component: ThePricing,
        name: 'pricing',
        meta: {
            title: 'All Pricing - Laundry Man BD',
        },
    },
    {
        path: '/faq',
        component: TheFaq,
        name: 'faq',
        meta: {
            title: 'FAQ - Laundry Man BD',
        },
    },
    {
        path: '/career',
        component: TheCareer,
        name: 'career',
        meta: {
            title: 'Career - Laundry Man BD',
        },
    },
    {
        path: '/career/:id',
        component: CareerDetails,
        name: 'career_details',
        props: true,
        meta: {
            title: 'Career Details - Laundry Man BD',
        },
    },
    {
        path: '/cantact-us',
        component: TheContact,
        name: 'contact',
        props: true,
        meta: {
            title: 'Contact us - Laundry Man BD',
        },
    },
    {
        path: '/cart',
        component: TheCart,
        name: 'cart',
        meta: {
            title: 'Cart - Laundry Man BD',
        },
    },
    {
        path: '/checkout',
        component: TheCheckout,
        name: 'checkout',
        meta: {
            title: 'Checkout - Laundry Man BD',
            requiresAuth: true,
        },
    },
    {
        path: '/login',
        component: TheLogin,
        name: 'login',
        meta: {
            title: 'Login with - Laundry Man BD',
            middleware: 'guest',
        },
    },
    {
        path: '/register',
        component: TheRegister,
        name: 'register',
        meta: {
            title: 'Register with - Laundry Man BD',
        },
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard,
        meta: {
            title: 'Dashboard',
            requiresAuth: true,
        },
    },
    {
        name: 'invoice',
        path: '/invoice/:id',
        component: TheInvoice,
        props: true,
        meta: {
            title: 'Invoice',
            requiresAuth: true,
        },
    },
    // {
    //     path: "/dd",
    //     component: DahboardLayout,
    //     meta: {
    //         requiresAuth: "auth"
    //     },
    //     children: [
    //         {
    //             name: "dashboard",
    //             path: '/',
    //             component: Dashboard,
    //             meta: {
    //                 title: `Dashboard`
    //             }
    //         }
    //     ]
    // }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
// This callback runs before every route change, including on page load.
router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!store.getters.isLogin) {
            next({ name: 'login' });
        } else {
            next();
        }
    } else {
        next(); //make sure to always call to next()
    }

    // // This goes through the matched routes from last to first, finding the closest route with a title.
    // // e.g., if we have `/some/deep/nested/route` and `/some`, `/deep`, and `/nested` have titles,
    // // `/nested`'s will be chosen.
    const nearestWithTitle = to.matched
        .slice()
        .reverse()
        .find((r) => r.meta && r.meta.title);

    // // Find the nearest route element with meta tags.
    // const nearestWithMeta = to.matched
    //     .slice()
    //     .reverse()
    //     .find((r) => r.meta && r.meta.metaTags);

    const previousNearestWithMeta = from.matched
        .slice()
        .reverse()
        .find((r) => r.meta && r.meta.metaTags);

    // // If a route with a title was found, set the document (page) title to that value.
    if (nearestWithTitle) {
        document.title = nearestWithTitle.meta.title;
    } else if (previousNearestWithMeta) {
        document.title = previousNearestWithMeta.meta.title;
    }

    // // Remove any stale meta tags from the document using the key attribute we set below.
    // Array.from(document.querySelectorAll('[data-vue-router-controlled]')).map(
    //     (el) => el.parentNode.removeChild(el)
    // );

    // // Skip rendering meta tags if there are none.
    // if (!nearestWithMeta) return next();

    // // Turn the meta tag definitions into actual elements in the head.
    // nearestWithMeta.meta.metaTags
    //     .map((tagDef) => {
    //         const tag = document.createElement('meta');

    //         Object.keys(tagDef).forEach((key) => {
    //             tag.setAttribute(key, tagDef[key]);
    //         });

    //         // We use this to track which meta tags we create so we don't interfere with other ones.
    //         tag.setAttribute('data-vue-router-controlled', '');

    //         return tag;
    //     })
    //     // Add the meta tags to the document head.
    //     .forEach((tag) => document.head.appendChild(tag));

    // // next();
});

export default router;
