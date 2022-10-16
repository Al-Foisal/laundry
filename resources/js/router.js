import { createRouter, createWebHistory } from 'vue-router';
import TheHome from './pages/TheHome.vue';
import TheLogin from './pages/TheLogin.vue';
import TheRegister from './pages/TheRegister.vue';
import DahboardLayout from './pages/user/Default.vue';
import Dashboard from './pages/user/Dashboard.vue';
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
        path: '/login',
        component: TheLogin,
        name: 'login',
        meta: {
            title: 'Login with laundry man bd',
            middleware: 'guest',
        },
    },
    {
        path: '/register',
        component: TheRegister,
        name: 'register',
        meta: {
            title: 'Register with laundry man bd',
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

    // This goes through the matched routes from last to first, finding the closest route with a title.
    // e.g., if we have `/some/deep/nested/route` and `/some`, `/deep`, and `/nested` have titles,
    // `/nested`'s will be chosen.
    const nearestWithTitle = to.matched
        .slice()
        .reverse()
        .find((r) => r.meta && r.meta.title);

    // Find the nearest route element with meta tags.
    const nearestWithMeta = to.matched
        .slice()
        .reverse()
        .find((r) => r.meta && r.meta.metaTags);

    const previousNearestWithMeta = from.matched
        .slice()
        .reverse()
        .find((r) => r.meta && r.meta.metaTags);

    // If a route with a title was found, set the document (page) title to that value.
    if (nearestWithTitle) {
        document.title = nearestWithTitle.meta.title;
    } else if (previousNearestWithMeta) {
        document.title = previousNearestWithMeta.meta.title;
    }

    // Remove any stale meta tags from the document using the key attribute we set below.
    Array.from(document.querySelectorAll('[data-vue-router-controlled]')).map(
        (el) => el.parentNode.removeChild(el)
    );

    // Skip rendering meta tags if there are none.
    if (!nearestWithMeta) return next();

    // Turn the meta tag definitions into actual elements in the head.
    nearestWithMeta.meta.metaTags
        .map((tagDef) => {
            const tag = document.createElement('meta');

            Object.keys(tagDef).forEach((key) => {
                tag.setAttribute(key, tagDef[key]);
            });

            // We use this to track which meta tags we create so we don't interfere with other ones.
            tag.setAttribute('data-vue-router-controlled', '');

            return tag;
        })
        // Add the meta tags to the document head.
        .forEach((tag) => document.head.appendChild(tag));

    next();
});

export default router;
