importScripts('/path/to/cache-polyfill.js');
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request).then(function(response) {
        return response || fetch(event.request).then(function(fetchResponse) {
          return caches.open('evolutec-cache').then(function(cache) {
            cache.put(event.request, fetchResponse.clone());
            return fetchResponse;
          });
        });
      })
    );
  });

  
  self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open('evolutec-cache').then(function(cache) {
        return cache.addAll([
          '/path/to/css/styles.css',
          '/path/to/js/script.js',
          '/path/to/images/logo.png',
          // Adicione mais recursos estáticos que deseja armazenar em cache
        ]);
      })
    );
  });
  