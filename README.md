# Up2Date - Portal Berita dengan Laravel & Filament

Up2Date adalah sebuah aplikasi portal berita yang bersih dan modern, dibangun menggunakan framework Laravel 11. Aplikasi ini bertujuan untuk menyajikan berita dengan cepat dan antarmuka yang tidak berantakan (*uncluttered*). Dilengkapi dengan panel admin yang efisien berkat Filament, memungkinkan manajemen konten yang mudah dan terstruktur.

🌟 **Tentang Proyek**

Proyek ini bertujuan untuk menyediakan platform portal berita yang cepat, aman, dan mudah digunakan, baik dari sisi pembaca maupun dari sisi administrator. Fokus utama proyek ini adalah menciptakan pengalaman membaca yang nyaman dan sistem pengelolaan konten (artikel, kategori, penulis, dan iklan) yang terpusat dan intuitif.

🚀 **Dibangun Dengan**

* **Laravel 11** - Framework PHP yang elegan untuk membangun aplikasi web.
* **Filament 3** - Admin panel yang kuat dan cepat untuk TALL Stack.
* **Tailwind CSS** - CSS framework yang mengutamakan utilitas untuk desain yang modern.
* **MySQL** - Sistem manajemen basis data relasional yang andal.

✨ **Fitur Utama**

* **Tampilan Publik:**
    * Halaman depan yang dinamis menampilkan artikel *featured* dan terbaru.
    * Halaman detail artikel yang fokus pada keterbacaan.
    * Halaman khusus untuk melihat semua berita per kategori.
    * Halaman profil untuk setiap penulis beserta daftar artikelnya.
    * Pencarian berita

* **Panel Admin yang Efisien:**
    * Manajemen Artikel (CRUD - *Create, Read, Update, Delete*).
    * Manajemen Kategori (CRUD).
    * Manajemen Penulis (CRUD).
    * Manajemen Iklan Banner (CRUD).

🔧 **Instalasi & Konfigurasi**

Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut.

**Prasyarat**

Pastikan server lokal Anda (seperti **XAMPP**) memenuhi persyaratan berikut:
* PHP 8.2 atau lebih tinggi
* Composer
* Database (MySQL/MariaDB)

**Langkah-langkah Instalasi**

1.  **Clone Repository**
    ```bash
    git clone [git clone [https://github.com/Nopanilham/Up2Date.git](https://github.com/Nopanilham/Up2Date.git)
    cd up2date
    ```
    

2.  **Install Dependensi PHP**
    ```bash
    composer install
    ```

3.  **Buat & Konfigurasi File Environment**
    Salin file `.env.example`, lalu generate kunci aplikasi.
    * Untuk Windows: `copy .env.example .env`
    * Untuk macOS/Linux: `cp .env.example .env`
    ```bash
    php artisan key:generate
    ```

4.  **Setup Database (Import dari File .sql)**

    a. Buka XAMPP Control Panel dan jalankan layanan **Apache** & **MySQL**.
    
    b. Buka `http://localhost/phpmyadmin` di browser Anda.
    
    c. Buat database baru yang masih kosong dengan nama **`up2date`**.
    
    d. Buka file `.env` dan pastikan konfigurasi database Anda sudah benar. Seharusnya terlihat seperti ini:
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=up2date
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    e. Kembali ke `phpMyAdmin`, klik pada database **`up2date`** yang baru Anda buat di panel kiri.
    
    f. Buka tab **"Import"**.
    
    g. Klik tombol **"Choose File"** dan pilih file `.sql` yang sudah tersedia di dalam folder proyek ini.

5.  **Instalasi Aset Gambar (Manual)**
    
    Aplikasi ini menggunakan aset gambar (seperti *thumbnail* artikel) yang perlu diinstal secara manual dari file `public.zip` yang telah disediakan bersama proyek. Ikuti langkah-langkah berikut:
    * Cari dan **ekstrak (Unzip)** file `public.zip` tersebut. Anda akan mendapatkan sebuah folder baru bernama `public` dari hasil ekstraksi.
    * **Pindahkan (Cut/Move)** atau **salin (Copy)** seluruh folder `public` tersebut.
    * **Tempel (Paste)** folder itu ke dalam direktori `storage/app/`.
    * **Pastikan** hasil akhirnya Anda memiliki struktur folder seperti ini: `[folder-proyek]/storage/app/public/`.

6.  **Buat Symbolic Link untuk Storage**
    Setelah semua file gambar fisik berada di tempatnya, jalankan perintah ini untuk membuat "jalan pintas" agar browser dapat mengakses dan menampilkannya.
    ```bash
    php artisan storage:link
    ```
    Perintah ini wajib dijalankan untuk memastikan gambar tidak tampil rusak (*broken image*).

**Jalankan Aplikasi**

1.  **Jalankan Server Laravel**
    ```bash
    php artisan serve
    ```

2.  **Akses Aplikasi**
    * **Halaman Publik**: http://127.0.0.1:8000
    * **Panel Admin**: http://127.0.0.1:8000/admin
    * Email : up2date@gmail.com
    * Password : 12345

