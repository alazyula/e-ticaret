# Docker Çalıştırma Talimatı



## Disclaimer: Docker hakkında fazla bir bilgim yok. İnternetten gördüğüm kadarı ile yapmaya çalıştım, umarım çalışır

ilk olarak Veri tabanının tohumlanması gerekiyor bunun için  `docker-compose run --rm artisan migrate:refresh --seed` 
komutu kullanılabilir.
front end componentlarını derlemek için `docker-compose run --rm npm run dev` komutu kullanılabilir.

docker-compose up -d --build

ile çalışıtrabilirsiniz



Not: Bu projede Vue.js, Vue Router ve Vuex kullanılmıştır, bildiğim kadarıyla bunların tekrar indirilmesine gerek yoktur.
 Ama gerek olması durumunda:

-docker-compose run --rm npm install Vue
-docker-compose run --rm npm install Vue-Router
-docker-compose run --rm npm install Vuex

Komutları ile indirilebilir olmalılar 

Bana vaktinizi ayırdığınız için teşekkür ederim.

Alaz
