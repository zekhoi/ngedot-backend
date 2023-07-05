# Live Demo
[https://dot-sprint2.zekhoi.dev/](https://dot-sprint2.zekhoi.dev/)

# Petunjuk Instalasi

Pastikan sudah menginstall:
- git
- php
- composer
- postgresql database
- docker (opsional)

### Clone Repository

```
git clone https://github.com/zekhoi/ngedot-backend.git --branch sprint-2
```

### Install Dependencies
```
composer install
```

### Composer Autoload
```
composer dump-autoload
```

### Setup Environment Variables
Setelah mengcopy file `.env`, sesuaikan dengan konfigurasi yang akan digunakan seperti RAJAONGKIR_API_KEY, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD, dan lain-lain.
```
cp .env.example .env
```

untuk `RAJAONGKIR_API_KEY` bisa menggunakan api key `0df6d5bf733214af6c6644eb8717c92c`

### Swappable Source
```
RAJAONGKIR_SOURCE=api
```
or
```
RAJAONGKIR_SOURCE=db
```

### Generate App Key
```
php artisan key:generate
```

### Generate JWT Secret
```
php artisan jwt:secret
```

### Migrate Database
```
php artisan migrate
```

### Fetch Data
```
php artisan fetch:provinces
php artisan fetch:cities
```

### Run Server
```
php artisan serve
```

# Petunjuk Penggunaan
## Data dummy
| Email | Password |
| --- | --- |
| `test@example.com` | `password` |

### Register
```
POST /register

Demo:
POST https://dot-sprint2.zekhoi.dev/auth/register
```

| Parameter | Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `name` | true | string | nama |
| `email` | true | string | email |
| `password` | true | string | password |

### Login
```
POST /login

Demo:
POST https://dot-sprint2.zekhoi.dev/auth/login
```
| Parameter | Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `email` | true | string | email |
| `password` | true | string | password |

### Daftar Provinsi
```
GET /search/provinces

Demo:
GET https://dot-sprint2.zekhoi.dev/search/provinces
```
| Header | Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `Authorization` | true | string | Bearer token |

Login untuk mendapatkan token.

| Parameter | Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `id` | false | integer | id provinsi |


Jika `id` tidak diisi, maka akan mengembalikan seluruh provinsi.

### Daftar Kabupaten/Kota
```
GET /search/cities

Demo:
GET https://dot-sprint2.zekhoi.dev/search/cities
```

| Header | Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `Authorization` | true | string | Bearer token |

Login untuk mendapatkan token.

| Parameter| Required | Tipe Data | Keterangan |
| --- | --- | --- | --- |
| `id` | false | integer | id provinsi |

Jika `id` tidak diisi, maka akan mengembalikan seluruh kabupaten/kota.