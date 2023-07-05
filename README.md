# Live Demo
[https://dot-sprint1.zekhoi.dev/](https://dot-sprint1.zekhoi.dev/)

# Petunjuk Instalasi

Pastikan sudah menginstall:
- git
- php
- composer
- postgresql database
- docker (opsional)

### Clone Repository

```
git clone https://github.com/zekhoi/ngedot-backend.git
```

### Install Dependencies
```
composer install
```

### Setup Environment
Sesuaikan dengan konfigurasi yang akan digunakan seperti RAJAONGKIR_API_KEY, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD, dan lain-lain.
```
cp .env.example .env
```

untuk `RAJAONGKIR_API_KEY` bisa menggunakan api key `0df6d5bf733214af6c6644eb8717c92c`

### Generate Key
```
php artisan key:generate
```

### Migrate Database
```
php artisan migrate
```

### Run Server
```
php artisan serve
```

# Petunjuk Penggunaan

### Daftar Provinsi
```
GET /search/provinces

Demo:
GET https://dot-sprint1.zekhoi.dev/search/provinces
```
| Parameter | Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `id` | false | integer | id provinsi |

Jika `id` tidak diisi, maka akan mengembalikan seluruh provinsi.

### Daftar Kabupaten/Kota
```
GET /search/cities

Demo:
GET https://dot-sprint1.zekhoi.dev/search/cities
```

| Parameter| Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `id` | false | integer | id provinsi |

Jika `id` tidak diisi, maka akan mengembalikan seluruh kabupaten/kota.