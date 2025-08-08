// --- Workbox ---
importScripts('/workbox/workbox-sw.js');
workbox.setConfig({modulePathPrefix: '/workbox'});

// --- Caching strategies ---
const assetsStrategy = new workbox.strategies.CacheFirst({
    cacheName: 'assets',
    plugins: [new workbox.expiration.ExpirationPlugin({maxEntries: 1000, maxAgeSeconds: 31536000})]
});
workbox.routing.registerRoute(({url}) => url.pathname.startsWith('/assets'), assetsStrategy);

workbox.routing.registerRoute(
    ({request}) => request.destination === 'font',
    new workbox.strategies.CacheFirst({
        cacheName: 'fonts',
        plugins: [
            new workbox.cacheableResponse.CacheableResponsePlugin({statuses: [0, 200]}),
            new workbox.expiration.ExpirationPlugin({maxEntries: 60, maxAgeSeconds: 31536000})
        ]
    }),
    'GET'
);

workbox.routing.registerRoute(
    ({url}) => url.origin === 'https://fonts.googleapis.com',
    new workbox.strategies.StaleWhileRevalidate({cacheName: 'google-fonts-stylesheets'})
);
workbox.routing.registerRoute(
    ({url}) => url.origin === 'https://fonts.gstatic.com',
    new workbox.strategies.CacheFirst({
        cacheName: 'google-fonts-webfonts',
        plugins: [
            new workbox.cacheableResponse.CacheableResponsePlugin({statuses: [0, 200]}),
            new workbox.expiration.ExpirationPlugin({maxEntries: 30, maxAgeSeconds: 31536000})
        ]
    })
);

workbox.routing.registerRoute(
    ({request, url}) => request.destination === 'image' && !url.pathname.startsWith('/assets'),
    new workbox.strategies.CacheFirst({cacheName: 'images'})
);

workbox.routing.registerRoute(
    ({url}) => url.pathname === '/site.webmanifest',
    new workbox.strategies.StaleWhileRevalidate({cacheName: 'manifest'})
);

// --- Install / Activate ---
self.addEventListener('install', (event) => {
    // Si tu veux pré-cacher une courte liste “critique”, fais-le ici.
    self.skipWaiting();
});
self.addEventListener('activate', (event) => {
    // Optionnel: purge sélective d’anciennes versions (par prefix, pas tout !)
    event.waitUntil(self.clients.claim());
});
