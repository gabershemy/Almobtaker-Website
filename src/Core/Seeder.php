<?php

namespace App\Core;

use PDO;

/**
 * Class Seeder
 * Database Schema Initializer & Initial Seeder (Single Responsibility Principle)
 */
class Seeder
{
    /**
     * Ensure all tables are created and seeded
     *
     * @param PDO $pdo
     * @return void
     */
    public static function ensureInitialized(PDO $pdo): void
    {
        self::createTables($pdo);

        $stmt = $pdo->query("SELECT COUNT(*) as count FROM admins");
        $adminCount = (int)($stmt->fetch()['count'] ?? 0);

        if ($adminCount === 0) {
            self::seedData($pdo);
        }
    }

    /**
     * Create all database tables
     *
     * @param PDO $pdo
     * @return void
     */
    public static function createTables(PDO $pdo): void
    {
        $driver = Config::get('db_driver', 'sqlite');
        $autoInc = ($driver === 'mysql' ? "AUTO_INCREMENT" : "AUTOINCREMENT");

        $pdo->exec("CREATE TABLE IF NOT EXISTS settings (
            key_name TEXT PRIMARY KEY,
            key_value TEXT
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
            id INTEGER PRIMARY KEY $autoInc,
            username TEXT UNIQUE,
            password_hash TEXT,
            full_name TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS projects (
            id INTEGER PRIMARY KEY $autoInc,
            project_slug TEXT,
            title TEXT,
            category TEXT,
            category_name TEXT,
            tech TEXT,
            description TEXT,
            status TEXT,
            image TEXT,
            hero_image TEXT,
            screenshots TEXT,
            full_desc TEXT,
            features TEXT,
            metrics TEXT,
            order_num INTEGER DEFAULT 0
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS services (
            id INTEGER PRIMARY KEY $autoInc,
            title TEXT,
            tag TEXT,
            icon TEXT,
            color_class TEXT,
            short_desc TEXT,
            desc TEXT,
            image TEXT,
            points TEXT,
            tech TEXT,
            order_num INTEGER DEFAULT 0
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS gallery (
            id INTEGER PRIMARY KEY $autoInc,
            gallery_slug TEXT,
            title TEXT,
            category TEXT,
            category_name TEXT,
            image TEXT,
            desc TEXT,
            tech TEXT,
            icon TEXT,
            order_num INTEGER DEFAULT 0
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS team (
            id INTEGER PRIMARY KEY $autoInc,
            name TEXT,
            role TEXT,
            icon TEXT,
            order_num INTEGER DEFAULT 0
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS faqs (
            id INTEGER PRIMARY KEY $autoInc,
            category TEXT,
            question TEXT,
            answer TEXT,
            order_num INTEGER DEFAULT 0
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS inquiries (
            id INTEGER PRIMARY KEY $autoInc,
            name TEXT,
            phone TEXT,
            email TEXT,
            service_type TEXT,
            message TEXT,
            is_read INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
    }

    /**
     * Seed initial seed data for new installation
     *
     * @param PDO $pdo
     * @return void
     */
    public static function seedData(PDO $pdo): void
    {
        // 1. Admin account
        $defaultPass = password_hash('admin123', PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO admins (username, password_hash, full_name) VALUES (?, ?, ?)");
        $stmt->execute(['admin', $defaultPass, 'إدارة المبتكر العربي']);

        // 2. Settings
        $settings = [
            'site_title'    => 'المبتكر العربي للبرمجيات | Almobtaker Alaraby Software & AI Solutions',
            'phone'         => '+201013688446',
            'whatsapp'      => '01013688446',
            'email'         => 'arabiccreative80@gmail.com',
            'address'       => 'مصر - الدقهلية - المنصورة / المملكة العربية السعودية',
            'work_hours'    => 'السبت - الخميس: 9:00 ص - 9:00 م',
            'hero_title'    => 'المبتكر العربي للبرمجيات والحلول الذكية',
            'hero_subtitle' => 'شريكك التكنولوجي لتطوير أنظمة ERP السحابية، حلول الذكاء الاصطناعي، تطبيقات الموبايل والويب، والربط والفوترة الإلكترونية ZATCA.',
            'hero_p1'       => 'نحن شركة المبتكر العربي للبرمجيات، متخصصة في تطوير الحلول التقنية المتقدمة، نقدم خدمات متكاملة تشمل برمجة تطبيقات الويب وسطح المكتب، تصميم الواجهات المتجاوبة، الأمن السيبراني، والدعم الفني المستمر.',
            'about_p1'      => 'تأسست شركة المبتكر العربي للبرمجيات عام 2006، وتُعد من الشركات الرائدة في العالم العربي في مجال تطوير البرمجيات والحلول التقنية المتكاملة.',
            'about_p2'      => 'نقدم خدمات متكاملة تشمل: تصميم وتطوير مواقع الويب، تطبيقات الهواتف الذكية، الأنظمة الإدارية ERP، الذكاء الاصطناعي، وتحليل البيانات، مع التزام تام بأعلى معايير الأمان والجودة.',
            'about_p3'      => 'بفضل خبرتنا الممتدة لأكثر من 18 عامًا، نجحنا في تنفيذ أكثر من 38 منظومة متقدمة لمؤسسات ومصانع وشركات كبرى محلياً وإقليمياً.'
        ];

        $driver = Config::get('db_driver', 'sqlite');
        $setSql = ($driver === 'mysql') 
            ? "INSERT INTO settings (key_name, key_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE key_value = VALUES(key_value)"
            : "INSERT OR REPLACE INTO settings (key_name, key_value) VALUES (?, ?)";

        $stmtSet = $pdo->prepare($setSql);
        foreach ($settings as $k => $v) {
            $stmtSet->execute([$k, $v]);
        }

        // 3. Team
        $team = [
            ['د. جابر الشيمي', 'Co-Founder & CEO', 'fa-user-tie', 1],
            ['م. حسام مجدي', 'Front-End Developer', 'fa-code', 2],
            ['د. آية ماهر غراب', 'Social Team Manager', 'fa-bullhorn', 3],
            ['م. ندى ياقوت شاهين', 'Front-End Developer', 'fa-laptop-code', 4],
            ['م. رُقيّة محمد شريط', 'UI/UX Designer', 'fa-pen-nib', 5],
            ['م. سارة محمود البدري', 'UI/UX Designer', 'fa-pen-nib', 6],
            ['م. روفيده محمد البشلاوي', 'Front-End Developer', 'fa-code', 7],
            ['م. ندى صبحي أبو زيد', 'Front-End Developer', 'fa-code', 8],
            ['أحمد جابر الشيمي', 'Social Media Team', 'fa-brands fa-facebook', 9],
            ['م. عمرو خالد عيسى', 'Backend Software Engineer', 'fa-server', 10],
            ['م. مصطفى العيسوي', 'Flutter Developer', 'fa-mobile-screen', 11],
            ['شمس صبحي الشيمي', 'Marketing Team', 'fa-chart-pie', 12]
        ];
        $stmtTeam = $pdo->prepare("INSERT INTO team (name, role, icon, order_num) VALUES (?, ?, ?, ?)");
        foreach ($team as $t) {
            $stmtTeam->execute($t);
        }

        // 4. FAQs
        $faqs = [
            ['contract', 'ما هي تكلفة تطوير موقع أو تطبيق؟', 'التكلفة تختلف باختلاف نوع المشروع وحجمه والميزات المطلوبة والتقنيات المستخدمة ومدة التنفيذ. يسعدنا تقديم استشارة مجانية وعرض سعر دقيق ومفصل.', 1],
            ['contract', 'ما هي سياسة الدفع المعتمدة لديكم؟', 'يتم تحديد الدفعات وفقًا لعقد مبرم وجدول زمني محدد، عادة ما يتم تقسيمها إلى دفعة مقدمة ودفعات مرحلية حسب تسليم المخرجات.', 2],
            ['contract', 'هل تقدمون تدريبًا شاملاً لفريقنا على النظام بعد التسليم؟', 'نعم بكل تأكيد، نوفر جلسات تدريب تفاعلية وشروحات فيديو ودليل مستخدم مفصل لضمان تمكن فريقك من إدارة النظام بسلاسة كاملة.', 3],
            ['services', 'ما الذي يميز شركة المبتكر العربي عن غيرها؟', 'خبرة برمجية ممتدة لأكثر من 18 عاماً، كود برمجي نظيف وسريع، حلول مخصصة 100% تناسب طبيعة أعمالكم، ودعم فني متواصل على مدار الساعة.', 4],
            ['services', 'هل أحتاج لمعرفة وخبرة برمجية لإدارة النظام؟', 'لا، نوفر لوحات تحكم عصرية فائقة السهولة باللغة العربية تمكنك من إدارة كافة العمليات والبيانات بضغطة زر دون أي تعقيد.', 5],
            ['services', 'ما هي أحدث التقنيات التي تعتمدون عليها؟', 'نعتمد على أحدث أطر العمل العالمية: Flutter لتطبيقات الموبايل، Laravel وPython للأنظمة السحابية والذكاء الاصطناعي، React وVue.js للواجهات، وDocker وAWS للبنية التحتية.', 6],
            ['warranty', 'هل تقدمون خدمات الدعم الفني والصيانة المستمرة؟', 'نعم، نوفر باقات دعم فني وصيانة دورية لضمان استقرار الخوادم وحماية البيانات وتحديث البرمجيات باستمرار.', 7],
            ['warranty', 'هل أحصل على ضمان رسمي للأداء وجودة البرمجة؟', 'نعم، نقدم ضماناً شاملاً ضد الأخطاء البرمجية مع التزام تام بسرعة الاستجابة وحل أي ملاحظات فوراً.', 8],
            ['support', 'كيف يمكنني التواصل معكم لطلب مشروع أو استشارة؟', 'يمكنك التواصل معنا عبر الواتساب على 01013688446 أو الاتصال على +201013688446 أو عبر نموذج المراسلة في الموقع.', 9],
            ['support', 'هل تدعمون الربط مع هيئة الزكاة والضريبة والجمارك ZATCA؟', 'نعم، جميع أنظمتنا وكاشيراتنا متوافقة 100% مع متطلبات المرحلة الثانية للفوترة الإلكترونية السعودية (التوقيع الرقمي والـ QR المشفر).', 10],
            ['support', 'هل تقدمون استشارات تقنية مجانية لدراسة جدوى الفكرة؟', 'نعم، نقدم جلسة استشارية تقنية مجانية لمناقشة أهداف المشروع واقتراح البنية البرمجية الأنسب لتحقيق أعلى عائد استثماري.', 11]
        ];
        $stmtFaq = $pdo->prepare("INSERT INTO faqs (category, question, answer, order_num) VALUES (?, ?, ?, ?)");
        foreach ($faqs as $f) {
            $stmtFaq->execute($f);
        }
    }
}
