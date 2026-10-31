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
        self::autoMigrate($pdo);

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
            order_num INTEGER DEFAULT 0,
            seo_title TEXT,
            seo_desc TEXT,
            seo_keywords TEXT
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
            order_num INTEGER DEFAULT 0,
            service_slug TEXT,
            seo_title TEXT,
            seo_desc TEXT,
            seo_keywords TEXT
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
            image TEXT,
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
     * Auto-migrate existing database schema (Adds SEO fields if missing)
     *
     * @param PDO $pdo
     * @return void
     */
    public static function autoMigrate(PDO $pdo): void
    {
        try {
            $driver = Config::get('db_driver', 'sqlite');

            // 1. Check projects columns
            $projectCols = [];
            if ($driver === 'sqlite') {
                $stmt = $pdo->query("PRAGMA table_info(projects)");
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $projectCols[] = strtolower($r['name']);
                }
            } else {
                $stmt = $pdo->query("SHOW COLUMNS FROM projects");
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $projectCols[] = strtolower($r['Field']);
                }
            }

            if (!in_array('seo_title', $projectCols, true)) {
                $pdo->exec("ALTER TABLE projects ADD COLUMN seo_title TEXT DEFAULT NULL");
            }
            if (!in_array('seo_desc', $projectCols, true)) {
                $pdo->exec("ALTER TABLE projects ADD COLUMN seo_desc TEXT DEFAULT NULL");
            }
            if (!in_array('seo_keywords', $projectCols, true)) {
                $pdo->exec("ALTER TABLE projects ADD COLUMN seo_keywords TEXT DEFAULT NULL");
            }

            // 2. Check services columns
            $serviceCols = [];
            if ($driver === 'sqlite') {
                $stmt = $pdo->query("PRAGMA table_info(services)");
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $serviceCols[] = strtolower($r['name']);
                }
            } else {
                $stmt = $pdo->query("SHOW COLUMNS FROM services");
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $serviceCols[] = strtolower($r['Field']);
                }
            }

            if (!in_array('service_slug', $serviceCols, true)) {
                $pdo->exec("ALTER TABLE services ADD COLUMN service_slug TEXT DEFAULT NULL");
            }
            if (!in_array('seo_title', $serviceCols, true)) {
                $pdo->exec("ALTER TABLE services ADD COLUMN seo_title TEXT DEFAULT NULL");
            }
            if (!in_array('seo_desc', $serviceCols, true)) {
                $pdo->exec("ALTER TABLE services ADD COLUMN seo_desc TEXT DEFAULT NULL");
            }
            if (!in_array('seo_keywords', $serviceCols, true)) {
                $pdo->exec("ALTER TABLE services ADD COLUMN seo_keywords TEXT DEFAULT NULL");
            }

            // 3. Check team columns
            $teamCols = [];
            if ($driver === 'sqlite') {
                $stmt = $pdo->query("PRAGMA table_info(team)");
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $teamCols[] = strtolower($r['name']);
                }
            } else {
                $stmt = $pdo->query("SHOW COLUMNS FROM team");
                while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $teamCols[] = strtolower($r['Field']);
                }
            }
            if (!in_array('image', $teamCols, true)) {
                $pdo->exec("ALTER TABLE team ADD COLUMN image TEXT DEFAULT NULL");
            }
        } catch (\Exception $e) {
            error_log("Seeder::autoMigrate Warning: " . $e->getMessage());
        }
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
            'address'       => 'دمنهور - مصر',
            'work_hours'    => 'السبت - الخميس: 9:00 ص - 9:00 م',
            'hero_title'    => 'المبتكر العربي للبرمجيات والحلول الذكية',
            'hero_subtitle' => 'شريكك التكنولوجي لتطوير أنظمة ERP السحابية، حلول الذكاء الاصطناعي، تطبيقات الموبايل والويب، والربط والفوترة الإلكترونية ZATCA.',
            'hero_p1'       => 'نحن شركة المبتكر العربي للبرمجيات، متخصصة في تطوير الحلول التقنية المتقدمة، نقدم خدمات متكاملة تشمل برمجة تطبيقات الويب وسطح المكتب، تصميم الواجهات المتجاوبة، الأمن السيبراني، والدعم الفني المستمر.',
            'about_p1'      => 'تأسست شركة المبتكر العربي للبرمجيات عام 2006، وتُعد من الشركات الرائدة في العالم العربي في مجال تطوير البرمجيات والحلول التقنية المتكاملة.',
            'about_p2'      => 'نقدم خدمات متكاملة تشمل: تصميم وتطوير مواقع الويب، تطبيقات الهواتف الذكية، الأنظمة الإدارية ERP، الذكاء الاصطناعي، وتحليل البيانات، مع التزام تام بأعلى معايير الأمان والجودة.',
            'about_p3'      => 'بفضل خبرتنا الممتدة لأكثر من 18 عامًا، نجحنا في تنفيذ أكثر من 65 منظومة متقدمة لمؤسسات ومصانع وشركات كبرى محلياً وإقليمياً.'
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
            ['د. جابر الشيمي', 'Co-Founder & CEO', 'fa-solid fa-user-tie', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&h=400&q=80', 1],
            ['م. حسام مجدي', 'Front-End Developer', 'fa-solid fa-code', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&h=400&q=80', 2],
            ['د. آية ماهر غراب', 'Social Team Manager', 'fa-solid fa-bullhorn', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&h=400&q=80', 3],
            ['م. ندى ياقوت شاهين', 'Front-End Developer', 'fa-solid fa-laptop-code', 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&h=400&q=80', 4],
            ['م. رُقيّة محمد شريط', 'UI/UX Designer', 'fa-solid fa-pen-nib', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&h=400&q=80', 5],
            ['م. سارة محمود البدري', 'UI/UX Designer', 'fa-solid fa-pen-nib', 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&h=400&q=80', 6],
            ['م. روفيده محمد البشلاوي', 'Front-End Developer', 'fa-solid fa-code', 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?auto=format&fit=crop&w=400&h=400&q=80', 7],
            ['م. ندى صبحي أبو زيد', 'Front-End Developer', 'fa-solid fa-code', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=400&h=400&q=80', 8],
            ['أحمد جابر الشيمي', 'Social Media Team', 'fa-brands fa-facebook', 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&h=400&q=80', 9],
            ['م. عمرو خالد عيسى', 'Backend Software Engineer', 'fa-solid fa-server', 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&h=400&q=80', 10],
            ['م. مصطفى العيسوي', 'Flutter Developer', 'fa-solid fa-mobile-screen', 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=400&h=400&q=80', 11],
            ['شمس صبحي الشيمي', 'Marketing Team', 'fa-solid fa-chart-pie', 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=400&h=400&q=80', 12]
        ];
        $stmtTeam = $pdo->prepare("INSERT INTO team (name, role, icon, image, order_num) VALUES (?, ?, ?, ?, ?)");
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
