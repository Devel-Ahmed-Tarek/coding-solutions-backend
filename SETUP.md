# إعداد مشروع CODING SOLUTIONS

## المتطلبات
- PHP 8.2+
- Composer
- قاعدة بيانات (MySQL/SQLite/PostgreSQL)

## التثبيت

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link   # لرفع الصور
npm install && npm run build
```

## تشغيل المشروع

```bash
php artisan serve
```

الموقع: http://localhost:8000

## تسجيل الدخول للوحة التحكم

- **البريد:** admin@codingsolutions.com
- **كلمة المرور:** password

لوحة التحكم: http://localhost:8000/dashboard

## روابط API

جميع الـ API عامة (بدون مصادقة):

| الطريقة | الرابط | الوصف |
|---------|--------|-------|
| GET | /api/services | قائمة الخدمات |
| GET | /api/projects | قائمة المشاريع |
| GET | /api/technologies | قائمة التقنيات |
| GET | /api/testimonials | قائمة الشهادات |
| GET | /api/articles | قائمة المقالات |
| GET | /api/articles/{slug} | مقال واحد |
| GET | /api/contact | بيانات التواصل |

## التصميم

التصميم مستوحى من:
- بطاقات الخدمات (شبكة 3x2)
- بطاقات المشاريع مع الفئات والتقنيات
- شبكة التقنيات
- بطاقات الشهادات مع التقييم
- المقالات مع الفئات والفلترة
