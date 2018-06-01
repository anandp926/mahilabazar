/**
 * Created by rozer on 10/11/2017.
 */
if ('serviceWorker' in navigator) {
    navigator.serviceWorker
        .register('./service-worker.js',{scope: './'})
        .then(function(registration) { console.log('Service Worker Registered',registration); })
        .catch(function(err){
            console.log("service worker failed to register")
        })
}
