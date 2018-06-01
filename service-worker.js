/**
 * Created by rozer on 10/11/2017.
 */
var cacheName='v2';
var cacheFile=[
    './',
    './index.php',
    './include/header.php',
    './include/connection.php',
    './include/footer.php',
    './js/app.js',
    './css/style.css',
    './images/kurta1.jpg',
    './images/kurta.jpg',
    './images/kurta2.jpg',
    './images/kurta3.jpg',
    './images/kurta4.jpg',
    './images/kurta5.jpg',
    './images/kurta6.jpg',
    './images/kurta7.jpg',
    './images/kurta8.jpg',
    './images/kurta9.jpg',
    './images/jacket1.jpg',
    './images/jacket10.jpg',
    './images/jacket3.jpg',
    './images/jacket2.jpg',
    './images/jacket4.jpg',
    './images/jacket5.jpg',
    './images/jacket6.jpg',
    './images/jacket7.jpg',
    './images/jacket8.jpg',
    './images/jacket9.jpg',
    './about.php',
    './add.php',
    './cart.php',
    './cart_process.php',
    './category.php',
    './checkout.php',
    './checkout_process.php',
    './logout.php',
    './products.php',
    './thanku.php',
    './ship_detail.php',
    './anand.png',
    './anandback.jpg'

];
self.addEventListener('install', function(e) {
    console.log('[ServiceWorker] Install');
    e.waitUntil(
        caches.open(cacheName).then(function(cache) {
            console.log('[ServiceWorker] Caching app shell');
            return cache.addAll(cacheFile);
        })
    );
});
self.addEventListener('activate', function(e) {
    console.log('[ServiceWorker] Activate');
    e.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(cacheNames.map(function(thiscacheName) {
                if (thiscacheName !== cacheName) {
                    console.log('[ServiceWorker] Removing old cache',thiscacheName);
                    return caches.delete(thiscacheName);
                }
            }));
        })
    );

    return self.clients.claim();
});

self.addEventListener('fetch', function(e) {
    console.log('[Service Worker] Fetch', e.request.url);
    e.respondWith(
        caches.match(e.request).then(function(response){

            if(response){
                console.log("[serviceWorker] found in cache",e.request.url);
                return response;
            }
            return fetch(e.request);
        })

    )
});