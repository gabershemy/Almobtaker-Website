<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/layout.php';
$pdo = getDB();
$msg = '';

// Handle Delete (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $delId = intval($_POST['id'] ?? 0);
    if ($delId > 0) {
        $pdo->prepare("DELETE FROM inquiries WHERE id = ?")->execute([$delId]);
        $msg = 'تم حذف الرسالة بنجاح';
    }
}

// Mark as Read (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'mark_read') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $readId = intval($_POST['id'] ?? 0);
    if ($readId > 0) {
        $pdo->prepare("UPDATE inquiries SET is_read = 1 WHERE id = ?")->execute([$readId]);
        $msg = 'تم تعيين الرسالة كمقروءة';
    }
}

$inquiries = $pdo->query("SELECT * FROM inquiries ORDER BY id DESC")->fetchAll();
renderAdminHeader('صندوق الرسائل والطلبات', 'messages');
?>
<div class="space-y-6 text-right">
  <div>
    <h1 class="text-2xl font-black text-white">صندوق الرسائل وطلبات عروض الأسعار (<?= count($inquiries) ?> رسالة)</h1>
    <p class="text-xs text-slate-400">متابعة كافة الاستفسارات والطلبات الواردة من زوار وعملاء الموقع</p>
  </div>

  <?php if ($msg): ?>
    <div class="p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 text-xs font-bold text-center">
      <i class="fa-solid fa-circle-check ml-1"></i> <?= htmlspecialchars($msg) ?>
    </div>
  <?php endif; ?>

  <?php if (empty($inquiries)): ?>
    <div class="glass-panel rounded-3xl p-10 text-center border border-cyan-500/30 space-y-3 max-w-md mx-auto my-8">
      <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-2xl mx-auto">
        <i class="fa-solid fa-inbox"></i>
      </div>
      <h3 class="text-base font-black text-white">لا توجد رسائل واردة حالياً</h3>
      <p class="text-xs text-slate-400">ستظهر هنا كافة الاستفسارات المرسلة عبر نموذج التواصل بالموقع فور ورودها.</p>
    </div>
  <?php else: ?>
    <div class="space-y-4">
      <?php foreach ($inquiries as $inq): ?>
        <?php
          $waNumber = preg_replace('/[^0-9]/', '', $inq['phone']);
          if (strpos($waNumber, '01') === 0) {
              $waNumber = '2' . $waNumber;
          }
          $replyWaText = urlencode("مرحباً أستاذ " . $inq['name'] . "، بخصوص استفسارك عبر موقع المبتكر العربي للبرمجيات عن: " . $inq['service_type']);
        ?>
        <div class="glass-panel rounded-2xl p-5 border <?= $inq['is_read'] ? 'border-cyan-500/20' : 'border-emerald-500/40 bg-emerald-950/10' ?> space-y-3 text-right">
          <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-cyan-500/15 pb-3">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-300 font-black">
                <?= mb_substr($inq['name'], 0, 1, 'UTF-8') ?>
              </div>
              <div>
                <h3 class="text-sm font-black text-white flex items-center gap-2">
                  <span><?= htmlspecialchars($inq['name']) ?></span>
                  <?php if (!$inq['is_read']): ?>
                    <span class="px-2 py-0.5 rounded-full bg-emerald-500 text-slate-950 font-bold text-[10px]">جديد</span>
                  <?php endif; ?>
                </h3>
                <p class="text-xs text-cyan-400 font-mono dir-ltr inline-block"><?= htmlspecialchars($inq['phone']) ?></p>
                <?php if (!empty($inq['email'])): ?>
                  <span class="text-xs text-slate-400 mr-2 font-mono"><?= htmlspecialchars($inq['email']) ?></span>
                <?php endif; ?>
              </div>
            </div>
            <div class="text-[11px] text-slate-400 font-mono">
              <i class="fa-regular fa-clock ml-1"></i> <?= htmlspecialchars($inq['created_at']) ?>
            </div>
          </div>

          <div class="space-y-1">
            <span class="px-2.5 py-0.5 rounded-md bg-cyan-950/80 text-cyan-300 text-[11px] font-bold border border-cyan-500/30 inline-block">
              الخدمة المطلوبة: <?= htmlspecialchars($inq['service_type'] ?: 'استفسار عام') ?>
            </span>
            <p class="text-xs text-slate-200 leading-relaxed pt-1 whitespace-pre-wrap"><?= htmlspecialchars($inq['message']) ?></p>
          </div>

          <div class="flex items-center justify-between pt-2 border-t border-cyan-500/10 text-xs">
            <div class="flex items-center gap-2">
              <?php if (!empty($inq['phone'])): ?>
                <a href="https://wa.me/<?= $waNumber ?>?text=<?= $replyWaText ?>" target="_blank" class="px-3 py-1.5 rounded-xl bg-green-500 hover:bg-green-400 text-white font-bold transition flex items-center gap-1.5 shadow-sm">
                  <i class="fa-brands fa-whatsapp"></i><span>مراسلة واتساب</span>
                </a>
                <a href="tel:<?= htmlspecialchars($inq['phone']) ?>" class="px-3 py-1.5 rounded-xl bg-cyan-500/20 text-cyan-300 hover:bg-cyan-500/35 font-bold transition flex items-center gap-1.5">
                  <i class="fa-solid fa-phone"></i><span>اتصال</span>
                </a>
              <?php endif; ?>
            </div>

            <div class="flex items-center gap-2">
              <?php if (!$inq['is_read']): ?>
                <form method="POST" class="inline">
                  <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                  <input type="hidden" name="action" value="mark_read">
                  <input type="hidden" name="id" value="<?= $inq['id'] ?>">
                  <button type="submit" class="px-3 py-1.5 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 font-bold transition">
                    <i class="fa-solid fa-check ml-1"></i>تعيين كمقروء
                  </button>
                </form>
              <?php endif; ?>
              <form method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')" class="inline">
                <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?= $inq['id'] ?>">
                <button type="submit" class="px-3 py-1.5 rounded-xl bg-rose-500/15 text-rose-400 hover:bg-rose-500/30 font-bold transition">
                  <i class="fa-solid fa-trash ml-1"></i>حذف
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
<?php renderAdminFooter(); ?>
