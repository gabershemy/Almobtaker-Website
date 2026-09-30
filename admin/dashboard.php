<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/layout.php';
$pdo = getDB();

$projectsCount = $pdo->query("SELECT COUNT(*) as c FROM projects")->fetch()['c'] ?? 0;
$servicesCount = $pdo->query("SELECT COUNT(*) as c FROM services")->fetch()['c'] ?? 0;
$teamCount = $pdo->query("SELECT COUNT(*) as c FROM team")->fetch()['c'] ?? 0;
$faqsCount = $pdo->query("SELECT COUNT(*) as c FROM faqs")->fetch()['c'] ?? 0;
$galleryCount = $pdo->query("SELECT COUNT(*) as c FROM gallery")->fetch()['c'] ?? 0;
$inquiriesCount = $pdo->query("SELECT COUNT(*) as c FROM inquiries")->fetch()['c'] ?? 0;
$unreadInquiries = $pdo->query("SELECT COUNT(*) as c FROM inquiries WHERE is_read = 0")->fetch()['c'] ?? 0;

$recentInquiries = $pdo->query("SELECT * FROM inquiries ORDER BY id DESC LIMIT 5")->fetchAll();

renderAdminHeader('الرئيسية والإحصائيات', 'dashboard');
?>
<div class="space-y-6 text-right">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-white">مرحباً بك في لوحة تحكم المبتكر العربي</h1>
      <p class="text-xs text-slate-400">إدارة محتوى الموقع والرسائل والمشاريع وقواعد البيانات الحية</p>
    </div>
    <a href="../index.php" target="_blank" class="px-4 py-2 rounded-xl btn-cyber text-xs flex items-center gap-2">
      <i class="fa-solid fa-globe"></i><span>معاينة الموقع الحي</span>
    </a>
  </div>

  <!-- بطاقات الإحصائيات -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
    <a href="messages.php" class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 hover:border-cyan-400 transition group">
      <div class="flex items-center justify-between">
        <span class="text-xs text-slate-400 font-bold">الرسائل والطلبات</span>
        <i class="fa-solid fa-envelope text-cyan-400 text-lg group-hover:scale-110 transition"></i>
      </div>
      <div class="text-2xl font-black text-white font-mono"><?= $inquiriesCount ?></div>
      <span class="text-[11px] <?= $unreadInquiries > 0 ? 'text-rose-400' : 'text-emerald-400' ?> font-bold block">
        <?= $unreadInquiries > 0 ? "$unreadInquiries طلب جديد غير مقروء" : "جميع الطلبات مقروءة" ?>
      </span>
    </a>

    <a href="projects.php" class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 hover:border-cyan-400 transition group">
      <div class="flex items-center justify-between">
        <span class="text-xs text-slate-400 font-bold">سابقة الأعمال</span>
        <i class="fa-solid fa-layer-group text-cyan-400 text-lg group-hover:scale-110 transition"></i>
      </div>
      <div class="text-2xl font-black text-white font-mono"><?= $projectsCount ?></div>
      <span class="text-[11px] text-cyan-400 block">إدارة وتعديل المشاريع ←</span>
    </a>

    <a href="gallery.php" class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 hover:border-cyan-400 transition group">
      <div class="flex items-center justify-between">
        <span class="text-xs text-slate-400 font-bold">معرض الصور</span>
        <i class="fa-solid fa-images text-cyan-400 text-lg group-hover:scale-110 transition"></i>
      </div>
      <div class="text-2xl font-black text-white font-mono"><?= $galleryCount ?></div>
      <span class="text-[11px] text-cyan-400 block">إضافة وتعديل الشاشات ←</span>
    </a>

    <a href="services.php" class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 hover:border-cyan-400 transition group">
      <div class="flex items-center justify-between">
        <span class="text-xs text-slate-400 font-bold">الخدمات</span>
        <i class="fa-solid fa-gears text-cyan-400 text-lg group-hover:scale-110 transition"></i>
      </div>
      <div class="text-2xl font-black text-white font-mono"><?= $servicesCount ?></div>
      <span class="text-[11px] text-cyan-400 block">تعديل باقات الخدمات ←</span>
    </a>

    <a href="team.php" class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 hover:border-cyan-400 transition group">
      <div class="flex items-center justify-between">
        <span class="text-xs text-slate-400 font-bold">فريق العمل</span>
        <i class="fa-solid fa-user-group text-cyan-400 text-lg group-hover:scale-110 transition"></i>
      </div>
      <div class="text-2xl font-black text-white font-mono"><?= $teamCount ?></div>
      <span class="text-[11px] text-cyan-400 block">تعديل أعضاء الفريق ←</span>
    </a>

    <a href="faqs.php" class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 hover:border-cyan-400 transition group">
      <div class="flex items-center justify-between">
        <span class="text-xs text-slate-400 font-bold">الأسئلة الشائعة</span>
        <i class="fa-solid fa-circle-question text-cyan-400 text-lg group-hover:scale-110 transition"></i>
      </div>
      <div class="text-2xl font-black text-white font-mono"><?= $faqsCount ?></div>
      <span class="text-[11px] text-cyan-400 block">إدارة الأسئلة والإجابات ←</span>
    </a>
  </div>

  <!-- آخر الرسائل الواردة -->
  <div class="glass-panel rounded-3xl p-6 border border-cyan-500/20 space-y-4">
    <div class="flex items-center justify-between border-b border-cyan-500/20 pb-3">
      <h2 class="text-base font-black text-white flex items-center gap-2">
        <i class="fa-solid fa-inbox text-cyan-400"></i>
        <span>أحدث طلبات عروض الأسعار والرسائل الواردة</span>
      </h2>
      <a href="messages.php" class="text-xs text-cyan-400 hover:underline font-bold">عرض كافة الرسائل ←</a>
    </div>

    <?php if (empty($recentInquiries)): ?>
      <p class="text-xs text-slate-400 text-center py-4">لا توجد رسائل واردة حديثاً.</p>
    <?php else: ?>
      <div class="space-y-3">
        <?php foreach ($recentInquiries as $inq): ?>
          <div class="p-3.5 rounded-xl bg-cyan-950/30 border border-cyan-500/15 flex items-center justify-between gap-4 text-xs">
            <div class="space-y-0.5">
              <p class="font-black text-white"><?= htmlspecialchars($inq['name']) ?> <span class="text-[10px] text-cyan-400 font-mono dir-ltr mr-2"><?= htmlspecialchars($inq['phone']) ?></span></p>
              <p class="text-slate-300 text-[11px] line-clamp-1"><?= htmlspecialchars($inq['message']) ?></p>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
              <span class="px-2.5 py-0.5 rounded-full <?= $inq['is_read'] ? 'bg-slate-800 text-slate-400' : 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' ?> text-[10px] font-bold">
                <?= $inq['is_read'] ? 'مقروء' : 'جديد' ?>
              </span>
              <a href="messages.php" class="text-cyan-400 hover:underline font-bold text-xs">عرض والتفاصيل</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php renderAdminFooter(); ?>
