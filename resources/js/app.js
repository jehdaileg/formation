require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

import { create } from 'lodash';

window.eventBus = createApp({ render: () => h(app, props) });

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


const application = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});


//window.eventBus = createInertiaApp //for sharing datas through components without pass by the parent component and refresh automaticly

InertiaProgress.init({ color: '#4B5563' });

