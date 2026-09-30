<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/layout.php';
$pdo = getDB();
$msg = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }

    $keys = [
        'site_title', 'phone', 'whatsapp', 'email', 'address', 'work_hours',
        'hero_title', 'hero_subtitle', 'hero_p1', 'about_p1', 'about_p2', 'about_p3'
    ];

    $settingRepo = new \App\Repositories\SettingRepository();
    $dataToSave = [];
    foreach ($keys as $k) {
        if (isset($_POST[$k])) {
            $dataToSave[$k] = trim($_POST[$k]);
        }
    }
    $settingRepo->setMany($dataToSave);

    // Admin password change if requested
    $newPass = trim($_POST['new_password'] ?? '');
    if (!empty($newPass)) {
        if (strlen($newPass) >= 6) {
            $hash = password_hash($newPass, PASSWORD_BCRYPT);
            $stmtPass = $pdo->prepare("UPDATE admins SET password_hash = ? WHERE username = ?");
            $stmtPass->execute([$hash, $_SESSION['admin_username'] ?? 'admin']);
            $msg = 'تم حفظ الإعدادات وتحديث كلمة مرور المدير بنجاح!';
        } else {
            $error = 'كلمة المرور الجديدة يجب ألا تقل عن 6 أحرف';
        }
    } else {
        $msg = 'تم حفظ وتحديث إعدادات وبيانات الموقع بنجاح!';
    }
}

$site_title = getSetting('site_title', 'المبتكر العربي للبرمجيات');
$phone = getSetting('phone', '+201013688446');
$whatsapp = getSetting('whatsapp', '01013688446');
$email = getSetting('email', 'arabiccreative80@gmail.com');
$address = getSetting('address', 'مصر - الدقهلية - المنصورة / المملكة العربية السعودية');
$work_hours = getSetting('work_hours', 'السبت - الخميس: 9:00 ص - 9:00 م');
$hero_title = getSetting('hero_title', 'المبتكر العربي للبرمجيات والحلول الذكية');
$hero_subtitle = getSetting('hero_subtitle', 'شريكك التكنولوجي لتطوير أنظمة ERP السحابية، حلول الذكاء الاصطناعي، وتطبيقات الموبايل والويب.');
$hero_p1 = getSetting('hero_p1', '');
$about_p1 = getSetting('about_p1', '');
$about_p2 = getSetting('about_p2', '');
$about_p3 = getSetting('about_p3', '');

renderAdminHeader('إعدادات وبيانات الموقع', 'settings');
?>
<div class="space-y-6 text-right">
  <div>
    <h1 class="text-2xl font-black text-white">إعدادات وبيانات الموقع العامة</h1>
    <p class="text-xs text-slate-400">تعديل بيانات التواصل وهاتف الشركة ونصوص الواجهة وكلمة مرور لوحة التحكم</p>
  </div>

  <?php if ($msg): ?>
    <div class="p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold text-center">
      <i class="fa-solid fa-circle-check ml-1"></i> <?= htmlspecialchars($msg) ?>
    </div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="p-3 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-bold text-center">
      <i class="fa-solid fa-circle-exclamation ml-1"></i> <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form method="POST" class="space-y-6">
    <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">

    <!-- بيانات الاتصال -->
    <div class="glass-panel rounded-3xl p-6 border border-cyan-500/20 space-y-4">
      <h3 class="text-sm font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-3">
        <i class="fa-solid fa-phone text-cyan-400"></i>
        <span>بيانات التواصل والاتصال</span>
      </h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رقم الهاتف الأساسي</label>
          <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رقم الواتساب</label>
          <input type="text" name="whatsapp" value="<?= htmlspecialchars($whatsapp) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">البريد الإلكتروني</label>
          <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">العنوان والمقر</label>
          <input type="text" name="address" value="<?= htmlspecialchars($address) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">ساعات العمل</label>
          <input type="text" name="work_hours" value="<?= htmlspecialchars($work_hours) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">عنوان الموقع (Site Title)</label>
          <input type="text" name="site_title" value="<?= htmlspecialchars($site_title) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
      </div>
    </div>

    <!-- أمان لوحة التحكم -->
    <div class="glass-panel rounded-3xl p-6 border border-cyan-500/20 space-y-4">
      <h3 class="text-sm font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-3">
        <i class="fa-solid fa-lock text-cyan-400"></i>
        <span>أمان وكلمة مرور لوحة التحكم</span>
      </h3>
      <div class="max-w-md">
        <label class="block text-xs font-bold text-slate-300 mb-1">تغيير كلمة المرور (اتركه فارغاً إن لم ترغب بالتغيير)</label>
        <input type="password" name="new_password" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none" placeholder="كلمة المرور الجديدة (6 أحرف على الأقل)">
      </div>
    </div>

    <button type="submit" class="px-8 py-3.5 rounded-xl btn-cyber text-sm flex items-center gap-2 shadow-lg shadow-cyan-500/25">
      <i class="fa-solid fa-floppy-disk"></i><span>حفظ كافة الإعدادات</span>
    </button>
  </form>
</div>
<?php renderAdminFooter(); ?>
