<?php
require_once __DIR__ . '/auth.php';
requireAdminAuth();
$admin = getLoggedInAdmin();

function renderAdminHeader($pageTitle, $activeMenu = 'dashboard') {
    global $admin;
    $pdo = getDB();
    $unreadCount = $pdo->query("SELECT COUNT(*) as c FROM inquiries WHERE is_read = 0")->fetch()['c'] ?? 0;
    $projectsCount = $pdo->query("SELECT COUNT(*) as c FROM projects")->fetch()['c'] ?? 0;
    $servicesCount = $pdo->query("SELECT COUNT(*) as c FROM services")->fetch()['c'] ?? 0;
    $teamCount = $pdo->query("SELECT COUNT(*) as c FROM team")->fetch()['c'] ?? 0;
    $faqsCount = $pdo->query("SELECT COUNT(*) as c FROM faqs")->fetch()['c'] ?? 0;
    $galleryCount = $pdo->query("SELECT COUNT(*) as c FROM gallery")->fetch()['c'] ?? 0;
    $usersCount = $pdo->query("SELECT COUNT(*) as c FROM admins")->fetch()['c'] ?? 1;
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?> | لوحة التحكم</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            cyber: { 950: '#030712', 900: '#071020', 850: '#0b162c', 500: '#00f0ff', 400: '#38bdf8' }
          },
          fontFamily: { sans: ['Cairo', 'sans-serif'] }
        }
      }
    }
  </script>
  <style>
    body { font-family: 'Cairo', sans-serif; background-color: #030712; color: #f8fafc; }
    .glass-panel { background: rgba(7, 16, 32, 0.85); backdrop-filter: blur(16px); border: 1px solid rgba(0, 240, 255, 0.15); }
    .btn-cyber { background: linear-gradient(135deg, #00f0ff 0%, #0284c7 100%); color: #020617; font-weight: 800; }
  </style>
</head>
<body class="bg-cyber-950 min-h-screen text-slate-100 flex flex-col md:flex-row">

  <!-- الشريط الجانبي Sidebar -->
  <aside class="w-full md:w-64 bg-cyber-900 border-b md:border-b-0 md:border-l border-cyan-500/20 flex-shrink-0 flex flex-col justify-between p-5 space-y-6">
    <div class="space-y-6">
      <div class="flex items-center gap-3 pb-4 border-b border-cyan-500/20">
        <img src="../logo.jpg" alt="Logo" class="w-10 h-10 rounded-xl object-cover border border-cyan-500/40">
        <div>
          <h2 class="text-sm font-black text-white">المبتكر العربي</h2>
          <p class="text-[10px] text-cyan-400">لوحة التحكم CMS</p>
        </div>
      </div>

      <nav class="space-y-1 text-sm font-bold">
        <a href="dashboard.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'dashboard' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-gauge text-cyan-400"></i><span>الرئيسية</span></div>
        </a>
        <a href="messages.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'messages' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-envelope text-cyan-400"></i><span>صندوق الرسائل</span></div>
          <?php if ($unreadCount > 0): ?>
            <span class="px-2 py-0.5 rounded-full bg-rose-500 text-white text-[10px] font-mono"><?= $unreadCount ?></span>
          <?php endif; ?>
        </a>
        <a href="gallery.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'gallery' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-images text-cyan-400"></i><span>معرض الصور</span></div>
          <span class="text-[11px] text-slate-400 font-mono">(<?= $galleryCount ?>)</span>
        </a>
        <a href="projects.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'projects' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-layer-group text-cyan-400"></i><span>سابقة الأعمال</span></div>
          <span class="text-[11px] text-slate-400 font-mono">(<?= $projectsCount ?>)</span>
        </a>
        <a href="services.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'services' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-gears text-cyan-400"></i><span>الخدمات</span></div>
          <span class="text-[11px] text-slate-400 font-mono">(<?= $servicesCount ?>)</span>
        </a>
        <a href="team.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'team' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-user-group text-cyan-400"></i><span>فريق العمل</span></div>
          <span class="text-[11px] text-slate-400 font-mono">(<?= $teamCount ?>)</span>
        </a>
        <a href="faqs.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'faqs' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-circle-question text-cyan-400"></i><span>الأسئلة الشائعة</span></div>
          <span class="text-[11px] text-slate-400 font-mono">(<?= $faqsCount ?>)</span>
        </a>
        <a href="settings.php" class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'settings' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <i class="fa-solid fa-sliders text-cyan-400"></i><span>إعدادات وبيانات الموقع</span>
        </a>
        <a href="users.php" class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition <?= $activeMenu === 'users' ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'text-slate-300 hover:bg-cyan-500/10 hover:text-cyan-300' ?>">
          <div class="flex items-center gap-2.5"><i class="fa-solid fa-user-shield text-cyan-400"></i><span>المستخدمين والصلاحيات</span></div>
          <span class="text-[11px] text-slate-400 font-mono">(<?= $usersCount ?>)</span>
        </a>
      </nav>
    </div>

    <div class="pt-4 border-t border-cyan-500/20 space-y-2 text-xs">
      <!-- بطاقة حساب المدير الحالي -->
      <a href="users.php?tab=profile" class="flex items-center gap-3 p-2.5 rounded-2xl bg-cyan-950/40 border border-cyan-500/20 hover:border-cyan-400 transition group text-right">
        <div class="w-8 h-8 rounded-xl bg-cyan-500/20 border border-cyan-500/40 flex items-center justify-center text-cyan-300 font-bold shrink-0">
          <i class="fa-solid fa-user-shield text-xs"></i>
        </div>
        <div class="truncate flex-1">
          <p class="text-xs font-bold text-white truncate"><?= htmlspecialchars($admin['full_name'] ?? 'المدير') ?></p>
          <p class="text-[10px] text-cyan-400 truncate font-mono">@<?= htmlspecialchars($admin['username'] ?? 'admin') ?></p>
        </div>
        <i class="fa-solid fa-gear text-slate-400 group-hover:text-cyan-300 text-xs"></i>
      </a>

      <a href="../index.php" target="_blank" class="flex items-center gap-2 text-cyan-400 hover:underline p-2">
        <i class="fa-solid fa-arrow-up-right-from-square"></i><span>عرض الموقع المباشر</span>
      </a>
      <a href="logout.php" class="flex items-center gap-2 text-rose-400 hover:text-rose-300 p-2">
        <i class="fa-solid fa-right-from-bracket"></i><span>تسجيل الخروج</span>
      </a>
    </div>
  </aside>

  <!-- المحتوى الرئيسي -->
  <main class="flex-1 p-4 sm:p-8 overflow-y-auto max-w-7xl">
<?php
}

function renderAdminFooter() {
?>
  </main>
</body>
</html>
<?php
}
