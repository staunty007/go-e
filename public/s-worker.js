const cacheName = "GOENERGEECHE1";

const cacheFiles = [
    "/mobile-sys/styles/style.css",
    "/mobile-sys/styles/bootstrap.min.css",
    "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
    "/mobile-sys/js/jquery-slim.min.js",
    "/mobile-sys/js/popper.min.js",
    "/mobile-sys/js/bootstrap.min.js",
    "/mobile-sys/js/app.js",
];

// When the service worker wants to install
self.addEventListener('installing', (e) => {
    console.log('[ServiceWorker] Install');
    e.waitUntil(
        caches.open(cacheName).then( cache => {
            console.log('[ServiceWorker] Caching app shell');
            return cache.addAll(cacheFiles);
        })
    );
});

// Service Worker Activating
self.addEventListener('activate',(e) => {
    console.log('Activating [Service Worker]');
    e.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(cacheNames.map(presentCacheName => { 
                if(presentCacheName != cacheName)
                console.log('Removing Old Cache');
                return caches.delete(presentCacheName);
            }));
        })
    )
});

// When a user is fetching responses
self.addEventListener('fetch', (e) => {
    e.respondWith(
        caches.open(cacheName)
        .then((cache) => {
            return cache.match(e.request).then((response) => {
                if (response) {
                    return response;
                }

                return fetch(e.request).then((networkResponse) => {
                    cache.put(e.request, networkResponse.clone());
                    return networkResponse;
                })
            })
        })
    );
});