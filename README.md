# نکسا شاپ (NexaShop)

فروشگاه اینترنتی نمونه برای لوازم دیجیتال، ساخته‌شده با Laravel و Blade به‌صورت کاملاً فارسی و راست‌به‌چپ (RTL). این پروژه به‌عنوان اپلیکیشن نمونه در یک دوره آموزشی Docker، VPS و CI/CD استفاده می‌شود و به‌عمد ساده نگه داشته شده است.

## پشته فناوری

- Laravel 13 + Blade
- SQLite برای توسعه محلی (سازگار با MariaDB برای استفاده بعدی در Docker)
- Tailwind CSS v4
- فونت Vazirmatn (self-hosted از طریق Vite)

## راه‌اندازی محلی

پیش‌نیاز: PHP 8.3+، Composer، Node.js و npm.

```bash
composer install
npm install

cp .env.example .env   # اگر فایل .env از قبل وجود ندارد
php artisan key:generate

touch database/database.sqlite

php artisan migrate --seed

npm run build   # یا: npm run dev برای توسعه با هات‌ریلود

php artisan serve
```

سپس:

- فروشگاه: http://127.0.0.1:8000
- ورود مدیر: http://127.0.0.1:8000/admin/login

## اطلاعات ورود مدیر (فقط محیط توسعه)

| ایمیل | رمز عبور |
| --- | --- |
| `admin@nexashop.test` | `password` |

این کاربر توسط `database/seeders/DatabaseSeeder.php` ساخته می‌شود. **این مقادیر صرفاً برای محیط توسعه محلی هستند و نباید در محیط پروڈاکشن استفاده شوند.**

## داده‌های نمونه

سیدرها ۱۰ محصول واقعی (هدفون، کیبورد، ماوس، وبکم، هاب USB-C، شارژر، اسپیکر و لوازم جانبی) را همراه با تصاویر واقعی محصول در `public/images/products/` ایجاد می‌کنند.

برای بازسازی کامل دیتابیس محلی:

```bash
php artisan migrate:fresh --seed
```

## چه چیزی در این پروژه پیاده‌سازی شده

- صفحه اصلی، لیست محصولات و صفحه جزئیات محصول (کاملاً عمومی، بدون نیاز به ورود)
- پنل مدیریت ساده با احراز هویت (ورود/خروج) و CRUD کامل محصولات
- بدون سبد خرید، پرداخت، سفارش یا هر منطق تجاری واقعی — دکمه «افزودن به سبد خرید» فقط نمایشی است

## یادداشت‌ها برای مرحله بعد (Docker / MariaDB)

- اتصال دیتابیس در `.env` با `DB_CONNECTION=sqlite` تنظیم شده است. برای سوییچ به MariaDB در Docker Compose، مقدار را به `mariadb` تغییر داده و مقادیر کامنت‌شده `DB_HOST` / `DB_PORT` / `DB_DATABASE` / `DB_USERNAME` / `DB_PASSWORD` را از حالت کامنت خارج و تکمیل کنید. مایگریشن‌ها مستقل از دیتابیس نوشته شده‌اند و نیازی به تغییر ندارند.
- این ریپازیتوری عمداً فاقد Dockerfile، docker-compose.yml یا هرگونه پیکربندی استقرار است؛ این موارد در ادامه‌ی دوره به‌صورت دستی اضافه می‌شوند.

## تست‌ها

```bash
php artisan test
```
