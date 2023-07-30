<p>Petunjuk penginsatalan</p>
<small>sebelum di jalankan install aplikasi berikut terlebih dahulu</small>
<ul>
<li>Xampp (php 8.0)</li>
<li>Composer</li>
<li>Visual studio code</li>
<li>git (optional)</li>
</ul>

<p>- Setelah itu download repo github diatas</p>
<p>- buat database dengan nama sesuai repo</p>
<p>- extrak hasil download di manapun</p>
<p>- buka hasil extrak di vscode</p>
<p>- duplikat vile .env.example lalu rename ke .env</p>
<p>- buka hasil ekstrak di cmd / terminal lalu jalankan php artisan key:generate </p>
<p>- lalu jalankan perintah php artisan migrate:fresh --seed</p>
<p>- lalu terakhir jalankan perintah php artisan serve </p>
<p>- buka browser dan akses halaman http://127.0.0.1:8000</p>
