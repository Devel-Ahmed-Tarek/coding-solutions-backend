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
            ['name' => 'React', 'order' => 1, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'order' => 2, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Flutter', 'order' => 3, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Node.js', 'order' => 4, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TypeScript', 'order' => 5, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vue.js', 'order' => 6, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Python', 'order' => 7, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PostgreSQL', 'order' => 8, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Firebase', 'order' => 9, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'AWS', 'order' => 10, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Docker', 'order' => 11, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Figma', 'order' => 12, 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        $techIds = Technology::pluck('id', 'name')->all();

        Service::insert([
            [
                'icon' => 'database',
                'title' => 'أنظمة إدارة الأعمال',
                'description' => 'أنظمة CRM و ERP مخصصة لتبسيط عملياتك وزيادة الإنتاجية',
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'mobile',
                'title' => 'تطبيقات الجوال',
                'description' => 'تطبيقات iOS و Android بتصميم عصري وأداء سلس يلبي احتياجات عملائك',
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'code',
                'title' => 'تطوير المواقع',
                'description' => 'مواقع ويب احترافية بأحدث التقنيات مع أداء عالي وتجربة مستخدم مميزة',
                'order' => 3,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'cloud',
                'title' => 'حلول SaaS',
                'description' => 'منصات سحابية قابلة للتوسع تخدم آلاف المستخدمين بكفاءة عالية',
                'order' => 4,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'chart',
                'title' => 'التسويق الرقمي',
                'description' => 'استراتيجيات تسويق فعّالة لزيادة الوصول والمبيعات عبر الإنترنت',
                'order' => 5,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'design',
                'title' => 'تصميم UI/UX',
                'description' => 'تصاميم جذابة وسهلة الاستخدام تحول الزوار إلى عملاء دائمين',
                'order' => 6,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $project1 = Project::create([
            'title' => 'منصة تجارة إلكترونية',
            'description' => 'منصة متكاملة لإدارة المتاجر الإلكترونية مع لوحة تحكم وتكامل مع بوابات الدفع',
            'category' => 'E-commerce',
            'image' => null,
            'link' => 'https://example.com',
            'order' => 1,
            'is_active' => true,
        ]);
        $project1->technologies()->sync([$techIds['Vue.js'], $techIds['Laravel']]);

        $project2 = Project::create([
            'title' => 'نظام إدارة العملاء',
            'description' => 'نظام CRM لإدارة العلاقات مع العملاء ومتابعة المبيعات والمشاريع',
            'category' => 'CRM',
            'image' => null,
            'link' => null,
            'order' => 2,
            'is_active' => true,
        ]);
        $project2->technologies()->sync([$techIds['Node.js'], $techIds['React']]);

        $project3 = Project::create([
            'title' => 'تطبيق حجز مواعيد',
            'description' => 'تطبيق جوال لحجز المواعيد في العيادات ومراكز الخدمات',
            'category' => 'Mobile App',
            'image' => null,
            'link' => null,
            'order' => 3,
            'is_active' => true,
        ]);
        $project3->technologies()->sync([$techIds['Flutter'], $techIds['Firebase']]);

        $project4 = Project::create([
            'title' => 'بوابة تعليمية',
            'description' => 'منصة للدورات والتدريب مع فيديوهات واختبارات وتتبع التقدم',
            'category' => 'E-learning',
            'image' => null,
            'link' => null,
            'order' => 4,
            'is_active' => true,
        ]);
        $project4->technologies()->sync([$techIds['Laravel'], $techIds['Vue.js'], $techIds['PostgreSQL']]);

        Testimonial::insert([
            [
                'name' => 'أحمد المالكي',
                'title' => 'مدير شركة تقنية',
                'quote' => 'فريق محترف وملتزم بالمواعيد، النتيجة فاقت توقعاتنا بمراحل. الجودة التقنية للكود كانت استثنائية.',
                'rating' => 5,
                'avatar' => null,
                'order' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة الحربي',
                'title' => 'صاحبة متجر إلكتروني',
                'quote' => 'ساعدونا في بناء متجر إلكتروني احترافي زاد مبيعاتنا بنسبة 200%. الدعم الفني كان متاحاً دائماً.',
                'rating' => 5,
                'avatar' => null,
                'order' => 2,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد العتيبي',
                'title' => 'رائد أعمال',
                'quote' => 'تعاملهم راقي وجودة العمل ممتازة، أنصح بهم بشدة لأي رائد أعمال يبحث عن شريك تقني حقيقي.',
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
                'title' => 'أساسيات تصميم واجهات المستخدم الحديثة',
                'description' => 'تعلم مبادئ التصميم الأساسية التي تجعل واجهات المستخدم عصرية وسهلة الاستخدام وتزيد من تفاعل المستخدمين.',
                'slug' => 'ui-design-basics',
                'category' => 'تصميم',
                'icon' => null,
                'image' => null,
                'order' => 1,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'كيف تبني تطبيق جوال ناجح من الصفر',
                'description' => 'دليل شامل يغطي جميع مراحل تطوير تطبيقات الجوال من الفكرة إلى النشر والتسويق.',
                'slug' => 'mobile-app-from-scratch',
                'category' => 'تطبيقات الجوال',
                'icon' => null,
                'image' => null,
                'order' => 2,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'أفضل 10 أطر عمل لتطوير الويب في 2026',
                'description' => 'تعرف على أحدث أطر العمل التي تسيطر على عالم تطوير الويب وأيها يناسب مشروعك.',
                'slug' => 'top-web-frameworks-2026',
                'category' => 'تطوير الويب',
                'icon' => null,
                'image' => null,
                'order' => 3,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'استراتيجيات التسويق الرقمي للناشئين',
                'description' => 'كيف تبدأ في التسويق الرقمي بميزانية محدودة وتحقق وصولاً حقيقياً لعملائك.',
                'slug' => 'digital-marketing-for-startups',
                'category' => 'التسويق الرقمي',
                'icon' => null,
                'image' => null,
                'order' => 4,
                'is_active' => true,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'أخبار الشركة: إطلاق خدمة الاستشارات التقنية',
                'description' => 'نعلن عن إطلاق خدمة استشارات تقنية جديدة لمساعدة الشركات في اختيار الحلول المناسبة.',
                'slug' => 'company-news-consulting',
                'category' => 'أخبار الشركة',
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
                'company_name' => 'CODING SOLUTIONS',
                'about_text' => 'نقدم مجموعة شاملة من الخدمات التقنية المصممة لتلبية احتياجات أعمالك',
            ]);
        }
    }
}
