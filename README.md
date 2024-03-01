<p align="center">
    <a href="https://id.wikipedia.org/wiki/SMK_Negeri_2_Bandung" target="_blank">
        <img src="https://i.pinimg.com/564x/00/57/e6/0057e6e8eef771ce6b160d981dc038bc.jpg" height="100px">
    </a>
    <h1 align="center">Website Perpustakaan Online </h1>
    <br>
</p>

## Deskripsi

Website perpustakaan online adalah projek aplikasi berbasis web dengan fitur :

- List Buku
- List Peminjaman
- Meminjam Buku
- Mengatur Peminjaman
- Membuat Koleksi Pribadi Buku
- Membuat Ulasan Buku

## Installasi

> Sebelum menginstall, pastikan sudah menginstall xampp

### Download melalui ZIP

1. **Download ZIP :** Tekan tombol `code` di repository github dan pilih `download ZIP`

2. **Ekstrak ZIP :** Setelah file zip terdownload, ekstrak filenya ke folder `htdocs` di dalam folder installasi xampp, _contoh :_ `C:\xampp\htdocs\`.

## Konfigurasi

### Website

- Masukkan cookie validation key di file `config/web.php` dengan random string:

```php
'request' => [
    // !!! isi secret key dibawah (jika kosong) - ini diwajibkan untuk validasi cookie
    'cookieValidationKey' => '<secret random string goes here>',
],
```

- Buka Terminal dengan mengetik `cmd` di pencarian lalu pilih `command prompt`.
- Ketikkan `cd C:\xampp\htdocs\projek-kamu`, ubah projek-kamu dengan nama folder yang sudah diekstrak.
- Ketikkan

```bash
php init
```

- dan pilih `[0]development`

### Database

- Buat Database baru `yii2advanced` di phpMyAdmin, atau buka file `config/db.php` lalu ganti dbname di line 5 dengan database yang dimiliki.
- Jalani

```bash
php yii migrate
```

- dan ketik `yes`.

## Menjalani Server

Untuk Menjalani server, ketik

```bash
php yii serve
```

Secara default, server akan berjalan di [localhost:8080](https://localhost:8080)

## Kontribusi

pull requests diperbolehkan. Untuk perubahan besar, mohon untuk membuat issue baru untuk mendiskusi apa yang mau diubah.

## Lisensi

MIT License

Copyright (c) 2024 irsyad456

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

### Framework

Website ini dibuat menggunakan framework [Yii 2 Basic](https://www.yiiframework.com/).

[![Latest Stable Version Yii2](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads Yii2](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build Yii2](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)
