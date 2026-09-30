<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/layout.php';
$pdo = getDB();
$msg = '';
$error = '';

// Handle Delete (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $delId = intval($_POST['id'] ?? 0);
    if ($delId > 0) {
        $pdo->prepare("DELETE FROM faqs WHERE id = ?")->execute([$delId]);
        $msg = 'تم حذف السؤال بنجاح';
    }
}

// Handle Add / Edit (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['action']) || $_POST['action'] === 'save')) {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $id = intval($_POST['faq_id'] ?? 0);
    $question = trim($_POST['question'] ?? '');
    $answer = trim($_POST['answer'] ?? '');
    $category = trim($_POST['category'] ?? 'services');

    if (!empty($question) && !empty($answer)) {
        if ($id > 0) {
            $stmt = $pdo->prepare("UPDATE faqs SET question=?, answer=?, category=? WHERE id=?");
            $stmt->execute([$question, $answer, $category, $id]);
            $msg = 'تم تحديث السؤال بنجاح';
        } else {
            $stmt = $pdo->prepare("INSERT INTO faqs (question, answer, category) VALUES (?, ?, ?)");
            $stmt->execute([$question, $answer, $category]);
            $msg = 'تمت إضافة السؤال الجديد بنجاح';
        }
    } else {
        $error = 'يرجى إدخال السؤال والإجابة';
    }
}

$editFaq = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $stmt = $pdo->prepare("SELECT * FROM faqs WHERE id = ?");
    $stmt->execute([$editId]);
    $editFaq = $stmt->fetch();
}

$faqs = $pdo->query("SELECT * FROM faqs ORDER BY order_num ASC, id ASC")->fetchAll();
renderAdminHeader('الأسئلة الشائعة', 'faqs');
?>
<div class="space-y-6 text-right">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-white">الأسئلة الشائعة (<?= count($faqs) ?> سؤال)</h1>
      <p class="text-xs text-slate-400">إضافة وتعديل بنك الأسئلة المتكررة في الموقع</p>
    </div>
    <button onclick="document.getElementById('faqFormModal').classList.toggle('hidden')" class="px-4 py-2 rounded-xl btn-cyber text-xs flex items-center gap-2">
      <i class="fa-solid fa-plus"></i><span>إضافة سؤال جديد</span>
    </button>
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

  <div id="faqFormModal" class="glass-panel rounded-3xl p-6 border border-cyan-500/30 space-y-4 <?= $editFaq || isset($_GET['action']) ? '' : 'hidden' ?>">
    <h3 class="text-base font-black text-white flex items-center gap-2">
      <i class="fa-solid fa-pen-to-square text-cyan-400"></i>
      <span><?= $editFaq ? 'تعديل السؤال' : 'إضافة سؤال جديد' ?></span>
    </h3>
    <form method="POST" class="space-y-4">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="faq_id" value="<?= $editFaq['id'] ?? 0 ?>">
      
      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">نص السؤال *</label>
        <input type="text" name="question" required value="<?= htmlspecialchars($editFaq['question'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">التصنيف</label>
        <select name="category" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
          <option value="contract" <?= ($editFaq['category'] ?? '') === 'contract' ? 'selected' : '' ?>>التعاقد والأسعار والتدريب</option>
          <option value="services" <?= ($editFaq['category'] ?? '') === 'services' ? 'selected' : '' ?>>الخدمات والمميزات والتقنيات</option>
          <option value="warranty" <?= ($editFaq['category'] ?? '') === 'warranty' ? 'selected' : '' ?>>الضمان والصيانة والدعم الفني</option>
          <option value="support" <?= ($editFaq['category'] ?? '') === 'support' ? 'selected' : '' ?>>التواصل والربط والاستشارات</option>
        </select>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">نص الإجابة *</label>
        <textarea name="answer" required rows="3" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none"><?= htmlspecialchars($editFaq['answer'] ?? '') ?></textarea>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs">
          <i class="fa-solid fa-check ml-1"></i> حفظ وتحديث
        </button>
        <button type="button" onclick="document.getElementById('faqFormModal').classList.add('hidden')" class="px-4 py-2.5 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs font-bold">
          إلغاء
        </button>
      </div>
    </form>
  </div>

  <div class="space-y-3">
    <?php foreach ($faqs as $f): ?>
      <div class="glass-panel rounded-2xl p-5 border border-cyan-500/20 space-y-2 text-right">
        <div class="flex items-start justify-between gap-4">
          <h3 class="text-sm font-black text-white flex items-center gap-2">
            <i class="fa-solid fa-circle-question text-cyan-400"></i>
            <span><?= htmlspecialchars($f['question']) ?></span>
          </h3>
          <div class="flex items-center gap-2 flex-shrink-0 text-xs">
            <a href="faqs.php?edit=<?= $f['id'] ?>" class="px-2.5 py-1 rounded-lg bg-cyan-500/15 text-cyan-300 hover:bg-cyan-500/30 font-bold transition">
              <i class="fa-solid fa-pen ml-1"></i>تعديل
            </a>
            <form method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا السؤال؟')" class="inline">
              <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" name="id" value="<?= $f['id'] ?>">
              <button type="submit" class="px-2.5 py-1 rounded-lg bg-rose-500/15 text-rose-400 hover:bg-rose-500/30 font-bold transition">
                <i class="fa-solid fa-trash ml-1"></i>حذف
              </button>
            </form>
          </div>
        </div>
        <p class="text-xs text-slate-300 leading-relaxed pr-6"><?= nl2br(htmlspecialchars($f['answer'])) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php renderAdminFooter(); ?>
