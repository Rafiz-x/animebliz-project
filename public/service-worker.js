self.addEventListener('install', event => {
    // event.waitUntil(
    //     caches.open('static-v1').then(cache => {
    //         return cache.addAll([
    //             '/',
    //             '/css/app.css',
    //             '/js/app.js',
    //             '/js/default.js',
    //             '/js/nav.js',
    //             '/js/index.js',
    //             '/js/search.js',
    //             '/images/icons/icon-192x192.png',
    //             '/images/icons/icon-512x512.png'
    //         ]);
    //     })
    // );
});

self.addEventListener('fetch', event => {
    // event.respondWith(
    //     caches.match(event.request).then(response => {
    //         return response || fetch(event.request);
    //     })
    // );
});