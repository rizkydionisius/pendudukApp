# Aplikasi Penduduk

Aplikasi ini  menyajikan laporan jumlah penduduk berdasarkan provinsi dan kabupaten di Indonesia. Dibuat menggunakan framework Laravel. 

## Instalasi

1. **Clone repositori**

   ```bash
   git clone https://github.com/rizkydionisius/pendudukApp.git
   ```

2. **Pindah ke direktori projek**

   ```bash
   cd nama-projek
   ```

3. **Install dependencies PHP menggunakan Composer**

   ```bash
   composer install
   ```

4. **Salin file `.env`**

   ```bash
   cp .env.example .env
   ```

5. **Generate APP_KEY**

   ```bash
   php artisan key:generate
   ```

6. **Atur koneksi database pada file `.env`**

   Sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` dengan pengaturan database Anda.

7. **Jalankan migrasi database dan seed**

   ```bash
   php artisan migrate --seed
   ```

8. **Jalankan server lokal**

   ```bash
   php artisan serve
   ```

   Projek akan dijalankan pada `http://localhost:8000`.
