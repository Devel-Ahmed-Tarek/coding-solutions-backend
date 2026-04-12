<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ContactInfo;
use App\Models\Project;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@codingsolutions.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        Technology::insert([
            ['name_ar' => 'React', 'name_en' => 'React', 'order' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Laravel', 'name_en' => 'Laravel', 'order' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Flutter', 'name_en' => 'Flutter', 'order' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Node.js', 'name_en' => 'Node.js', 'order' => 4, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'TypeScript', 'name_en' => 'TypeScript', 'order' => 5, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Vue.js', 'name_en' => 'Vue.js', 'order' => 6, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Python', 'name_en' => 'Python', 'order' => 7, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'PostgreSQL', 'name_en' => 'PostgreSQL', 'order' => 8, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Firebase', 'name_en' => 'Firebase', 'order' => 9, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'AWS', 'name_en' => 'AWS', 'order' => 10, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Docker', 'name_en' => 'Docker', 'order' => 11, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name_ar' => 'Figma', 'name_en' => 'Figma', 'order' => 12, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        $techIds = Technology::pluck('id', 'name_en')->all();

        Service::insert([
            [
                'icon' => 'database',
                'title_ar' => 'أنظمة إدارة الأعمال',
                'title_en' => 'Business Management Systems',
                'description_ar' => 'أنظمة CRM و ERP مخصصة لتبسيط عملياتك وزيادة الإنتاجية',
                'description_en' => 'Custom CRM and ERP systems to streamline operations and boost productivity.',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'mobile',
                'title_ar' => 'تطبيقات الجوال',
                'title_en' => 'Mobile Applications',
                'description_ar' => 'تطبيقات iOS و Android بتصميم عصري وأداء سلس يلبي احتياجات عملائك',
                'description_en' => 'Modern iOS and Android apps with smooth performance for your users.',
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'code',
                'title_ar' => 'تطوير المواقع',
                'title_en' => 'Web Development',
                'description_ar' => 'مواقع ويب احترافية بأحدث التقنيات مع أداء عالي وتجربة مستخدم مميزة',
                'description_en' => 'Professional websites with modern tech, high performance, and great UX.',
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'cloud',
                'title_ar' => 'حلول SaaS',
                'title_en' => 'SaaS Solutions',
                'description_ar' => 'منصات سحابية قابلة للتوسع تخدم آلاف المستخدمين بكفاءة عالية',
                'description_en' => 'Scalable cloud platforms serving thousands of users efficiently.',
                'order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'chart',
                'title_ar' => 'التسويق الرقمي',
                'title_en' => 'Digital Marketing',
                'description_ar' => 'استراتيجيات تسويق فعّالة لزيادة الوصول والمبيعات عبر الإنترنت',
                'description_en' => 'Effective strategies to grow reach and online sales.',
                'order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'design',
                'title_ar' => 'تصميم UI/UX',
                'title_en' => 'UI/UX Design',
                'description_ar' => 'تصاميم جذابة وسهلة الاستخدام تحول الزوار إلى عملاء دائمين',
                'description_en' => 'Engaging, easy-to-use designs that turn visitors into loyal customers.',
                'order' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $project1 = Project::create([
            'title_ar' => 'منصة تجارة إلكترونية',
            'title_en' => 'E-commerce Platform',
            'description_ar' => 'منصة متكاملة لإدارة المتاجر الإلكترونية مع لوحة تحكم وتكامل مع بوابات الدفع',
            'description_en' => 'Full e-commerce management with dashboard and payment gateway integration.',
            'category_ar' => 'E-commerce',
            'category_en' => 'E-commerce',
            'image' => null,
            'link' => 'https://example.com',
            'order' => 1,
            'is_active' => true,
        ]);
        $project1->technologies()->sync([$techIds['Vue.js'], $techIds['Laravel']]);

        $project2 = Project::create([
            'title_ar' => 'نظام إدارة العملاء',
            'title_en' => 'Customer Management System',
            'description_ar' => 'نظام CRM لإدارة العلاقات مع العملاء ومتابعة المبيعات والمشاريع',
            'description_en' => 'CRM for customer relationships, sales, and project tracking.',
            'category_ar' => 'CRM',
            'category_en' => 'CRM',
            'image' => null,
            'link' => null,
            'order' => 2,
            'is_active' => true,
        ]);
        $project2->technologies()->sync([$techIds['Node.js'], $techIds['React']]);

        $project3 = Project::create([
            'title_ar' => 'تطبيق حجز مواعيد',
            'title_en' => 'Appointment Booking App',
            'description_ar' => 'تطبيق جوال لحجز المواعيد في العيادات ومراكز الخدمات',
            'description_en' => 'Mobile app for booking appointments at clinics and service centers.',
            'category_ar' => 'Mobile App',
            'category_en' => 'Mobile App',
            'image' => null,
            'link' => null,
            'order' => 3,
            'is_active' => true,
        ]);
        $project3->technologies()->sync([$techIds['Flutter'], $techIds['Firebase']]);

        $project4 = Project::create([
            'title_ar' => 'بوابة تعليمية',
            'title_en' => 'E-learning Portal',
            'description_ar' => 'منصة للدورات والتدريب مع فيديوهات واختبارات وتتبع التقدم',
            'description_en' => 'Courses, videos, quizzes, and progress tracking.',
            'category_ar' => 'E-learning',
            'category_en' => 'E-learning',
            'image' => null,
            'link' => null,
            'order' => 4,
            'is_active' => true,
        ]);
        $project4->technologies()->sync([$techIds['Laravel'], $techIds['Vue.js'], $techIds['PostgreSQL']]);

        Testimonial::insert([
            [
                'name_ar' => 'أحمد المالكي',
                'name_en' => 'Ahmed Al-Maliki',
                'job_title_ar' => 'مدير شركة تقنية',
                'job_title_en' => 'Tech Company Manager',
                'quote_ar' => 'فريق محترف وملتزم بالمواعيد، النتيجة فاقت توقعاتنا بمراحل. الجودة التقنية للكود كانت استثنائية.',
                'quote_en' => 'Professional team, on time, results exceeded expectations. Code quality was exceptional.',
                'rating' => 5,
                'avatar' => null,
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'سارة الحربي',
                'name_en' => 'Sara Al-Harbi',
                'job_title_ar' => 'صاحبة متجر إلكتروني',
                'job_title_en' => 'E-commerce Store Owner',
                'quote_ar' => 'ساعدونا في بناء متجر إلكتروني احترافي زاد مبيعاتنا بنسبة 200%. الدعم الفني كان متاحاً دائماً.',
                'quote_en' => 'They built a professional store; sales up 200%. Support was always available.',
                'rating' => 5,
                'avatar' => null,
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_ar' => 'محمد العتيبي',
                'name_en' => 'Mohammed Al-Otaibi',
                'job_title_ar' => 'رائد أعمال',
                'job_title_en' => 'Entrepreneur',
                'quote_ar' => 'تعاملهم راقي وجودة العمل ممتازة، أنصح بهم بشدة لأي رائد أعمال يبحث عن شريك تقني حقيقي.',
                'quote_en' => 'Great communication and quality. I highly recommend them as a true tech partner.',
                'rating' => 5,
                'avatar' => null,
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Article::insert([
            [
                'title_ar' => 'أساسيات تصميم واجهات المستخدم الحديثة',
                'title_en' => 'Modern UI Design Fundamentals',
                'description_ar' => 'تعلم مبادئ التصميم الأساسية التي تجعل واجهات المستخدم عصرية وسهلة الاستخدام وتزيد من تفاعل المستخدمين.',
                'description_en' => 'Learn core principles for modern, usable UIs that boost engagement.',
                'slug_ar' => 'ui-design-basics',
                'slug_en' => 'ui-design-basics-en',
                'category_ar' => 'تصميم',
                'category_en' => 'Design',
                'icon' => null,
                'image' => null,
                'order' => 1,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_ar' => 'كيف تبني تطبيق جوال ناجح من الصفر',
                'title_en' => 'How to Build a Successful Mobile App from Scratch',
                'description_ar' => 'دليل شامل يغطي جميع مراحل تطوير تطبيقات الجوال من الفكرة إلى النشر والتسويق.',
                'description_en' => 'A full guide from idea to launch and marketing.',
                'slug_ar' => 'mobile-app-from-scratch',
                'slug_en' => 'mobile-app-from-scratch-en',
                'category_ar' => 'تطبيقات الجوال',
                'category_en' => 'Mobile',
                'icon' => null,
                'image' => null,
                'order' => 2,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_ar' => 'أفضل 10 أطر عمل لتطوير الويب في 2026',
                'title_en' => 'Top 10 Web Frameworks in 2026',
                'description_ar' => 'تعرف على أحدث أطر العمل التي تسيطر على عالم تطوير الويب وأيها يناسب مشروعك.',
                'description_en' => 'Discover leading frameworks and which fits your project.',
                'slug_ar' => 'top-web-frameworks-2026',
                'slug_en' => 'top-web-frameworks-2026-en',
                'category_ar' => 'تطوير الويب',
                'category_en' => 'Web',
                'icon' => null,
                'image' => null,
                'order' => 3,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_ar' => 'استراتيجيات التسويق الرقمي للناشئين',
                'title_en' => 'Digital Marketing for Startups',
                'description_ar' => 'كيف تبدأ في التسويق الرقمي بميزانية محدودة وتحقق وصولاً حقيقياً لعملائك.',
                'description_en' => 'Start digital marketing on a budget and reach real customers.',
                'slug_ar' => 'digital-marketing-for-startups',
                'slug_en' => 'digital-marketing-for-startups-en',
                'category_ar' => 'التسويق الرقمي',
                'category_en' => 'Marketing',
                'icon' => null,
                'image' => null,
                'order' => 4,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_ar' => 'أخبار الشركة: إطلاق خدمة الاستشارات التقنية',
                'title_en' => 'Company News: Tech Consulting Launch',
                'description_ar' => 'نعلن عن إطلاق خدمة استشارات تقنية جديدة لمساعدة الشركات في اختيار الحلول المناسبة.',
                'description_en' => 'Announcing our new tech consulting service to help companies choose the right solutions.',
                'slug_ar' => 'company-news-consulting',
                'slug_en' => 'company-news-consulting-en',
                'category_ar' => 'أخبار الشركة',
                'category_en' => 'Company News',
                'icon' => null,
                'image' => null,
                'order' => 5,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        if (! ContactInfo::exists()) {
            ContactInfo::create([
                'company_name_ar' => 'CODING SOLUTIONS',
                'company_name_en' => 'CODING SOLUTIONS',
                'about_text_ar' => 'نقدم مجموعة شاملة من الخدمات التقنية المصممة لتلبية احتياجات أعمالك',
                'about_text_en' => 'We offer a full range of technical services tailored to your business needs.',
            ]);
        }
    }
}
