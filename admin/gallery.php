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
        $pdo->prepare("DELETE FROM gallery WHERE id = ?")->execute([$delId]);
        $msg = 'تم حذف الصورة من المعرض بنجاح';
    }
}

// Handle Add / Edit (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['action']) || $_POST['action'] === 'save')) {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $id = intval($_POST['gallery_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'erp');
    $category_name = trim($_POST['category_name'] ?? 'أنظمة ERP وشركات');
    $image = trim($_POST['image'] ?? '');
    $desc = trim($_POST['desc'] ?? '');
    $tech = trim($_POST['tech'] ?? '');
    $icon = trim($_POST['icon'] ?? 'fa-solid fa-laptop-code');

    // Direct file upload from computer
    if (!empty($_FILES['image_file']['name'])) {
        $uploaded = \App\Core\Uploader::uploadImage($_FILES['image_file']);
        if ($uploaded) {
            $image = $uploaded;
        }
    }

    if (!empty($title) && !empty($image)) {
        $galleryRepo = new \App\Repositories\GalleryRepository();
        $saved = $galleryRepo->save([
            'id' => $id,
            'title' => $title,
            'category' => $category,
            'category_name' => $category_name,
            'image' => $image,
            'desc' => $desc,
            'tech' => $tech,
            'icon' => $icon
        ]);

        if ($saved) {
            $msg = $id > 0 ? 'تم تحديث الشاشة في المعرض بنجاح!' : 'تمت إضافة الشاشة الجديدة إلى المعرض بنجاح!';
        } else {
            $error = 'حدث خطأ أثناء حفظ الشاشة في المعرض';
        }
    } else {
        $error = 'يرجى إدخال عنوان الشاشة ورابط الصورة أو رفع صورة من جهازك';
    }
}

$editItem = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $stmt = $pdo->prepare("SELECT * FROM gallery WHERE id = ?");
    $stmt->execute([$editId]);
    $editItem = $stmt->fetch();
}

$galleryItems = $pdo->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
renderAdminHeader('معرض الصور والشاشات', 'gallery');
?>
<div class="space-y-6 text-right">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-white">إدارة معرض الصور والشاشات (<?= count($galleryItems) ?> صورة)</h1>
      <p class="text-xs text-slate-400">إضافة وتعديل وحذف شاشات الأنظمة المعروضة في قسم المعرض التفاعلي</p>
    </div>
    <button onclick="document.getElementById('galleryFormModal').classList.toggle('hidden')" class="px-4 py-2 rounded-xl btn-cyber text-xs flex items-center gap-2">
      <i class="fa-solid fa-plus"></i><span>إضافة شاشة جديدة</span>
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

  <div id="galleryFormModal" class="glass-panel rounded-3xl p-6 border border-cyan-500/30 space-y-4 <?= $editItem || isset($_GET['action']) ? '' : 'hidden' ?>">
    <h3 class="text-base font-black text-white flex items-center gap-2">
      <i class="fa-solid fa-pen-to-square text-cyan-400"></i>
      <span><?= $editItem ? 'تعديل الشاشة: ' . htmlspecialchars($editItem['title']) : 'إضافة شاشة جديدة للمعرض' ?></span>
    </h3>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="gallery_id" value="<?= $editItem['id'] ?? 0 ?>">
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">عنوان الشاشة / النظام *</label>
          <input type="text" name="title" required value="<?= htmlspecialchars($editItem['title'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none" placeholder="مثال: شاشة لوحة القيادة المالية ERP">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">الفئة والتصنيف *</label>
          <select name="category" onchange="updateGalleryCat(this)" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
            <option value="erp" <?= ($editItem['category'] ?? '') === 'erp' ? 'selected' : '' ?>>أنظمة ERP وشركات</option>
            <option value="medical" <?= ($editItem['category'] ?? '') === 'medical' ? 'selected' : '' ?>>طبي ومستشفيات</option>
            <option value="industrial" <?= ($editItem['category'] ?? '') === 'industrial' ? 'selected' : '' ?>>صناعي وزراعي</option>
            <option value="edtech" <?= ($editItem['category'] ?? '') === 'edtech' ? 'selected' : '' ?>>تعليم ومنصات EdTech</option>
            <option value="fintech" <?= ($editItem['category'] ?? '') === 'fintech' ? 'selected' : '' ?>>تمويل وتقسيط وكاشير</option>
            <option value="ai" <?= ($editItem['category'] ?? '') === 'ai' ? 'selected' : '' ?>>ذكاء اصطناعي وواتساب</option>
            <option value="zatca" <?= ($editItem['category'] ?? '') === 'zatca' ? 'selected' : '' ?>>ZATCA وفوترة إلكترونية</option>
          </select>
          <input type="hidden" name="category_name" id="gallery_cat_name" value="<?= htmlspecialchars($editItem['category_name'] ?? 'أنظمة ERP وشركات') ?>">
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رفع صورة من جهازك (أو وضع رابط)</label>
          <input type="file" name="image_file" accept="image/*" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-slate-300 file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-cyan-500/20 file:text-cyan-300 hover:file:bg-cyan-500/30">
          <input type="text" name="image" value="<?= htmlspecialchars($editItem['image'] ?? '') ?>" class="mt-2 w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2 text-xs text-white focus:border-cyan-400 outline-none dir-ltr" placeholder="أو رابط الصورة https://... أو uploads/img.jpg">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">التقنيات المستخدمة</label>
          <input type="text" name="tech" value="<?= htmlspecialchars($editItem['tech'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="Laravel • Vue.js • Tailwind">
        </div>
      </div>
      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">وصف مختصر للشاشة</label>
        <textarea name="desc" rows="2" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none" placeholder="نبذة توضيحية حول الوظيفة التي تؤديها هذه الشاشة..."><?= htmlspecialchars($editItem['desc'] ?? '') ?></textarea>
      </div>
      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs">
          <i class="fa-solid fa-check ml-1"></i> حفظ وتحديث
        </button>
        <button type="button" onclick="document.getElementById('galleryFormModal').classList.add('hidden')" class="px-4 py-2.5 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs font-bold">
          إلغاء
        </button>
      </div>
    </form>
  </div>

  <?php if (empty($galleryItems)): ?>
    <div class="glass-panel rounded-3xl p-10 text-center border border-cyan-500/30 space-y-4 max-w-xl mx-auto my-6">
      <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-2xl mx-auto shadow-md">
        <i class="fa-solid fa-images"></i>
      </div>
      <div class="space-y-1">
        <h3 class="text-base font-black text-white">معرض الصور فارغ حالياً</h3>
        <p class="text-xs text-slate-400">يمكنك البدء بالضغط على الزر أدناه لإضافة شاشات وصور أنظمتكم لتظهر في الموقع فوراً.</p>
      </div>
      <button onclick="document.getElementById('galleryFormModal').classList.remove('hidden')" class="px-5 py-2.5 rounded-xl btn-cyber text-xs flex items-center gap-2 mx-auto shadow-lg shadow-cyan-500/20">
        <i class="fa-solid fa-plus"></i><span>إضافة أول شاشة للمعرض</span>
      </button>
    </div>
  <?php else: ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($galleryItems as $item): ?>
        <div class="glass-panel rounded-2xl overflow-hidden border border-cyan-500/20 space-y-3 flex flex-col justify-between p-4">
          <div class="relative h-44 rounded-xl overflow-hidden border border-cyan-500/30 bg-[#040812]">
            <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="w-full h-full object-cover">
            <span class="absolute top-2 right-2 px-2.5 py-0.5 rounded-lg bg-[#08172c]/90 text-[10px] font-bold text-cyan-300 border border-cyan-500/30"><?= htmlspecialchars($item['category_name']) ?></span>
          </div>
          <div class="space-y-1 text-right flex-1">
            <h3 class="text-sm font-black text-white leading-snug"><?= htmlspecialchars($item['title']) ?></h3>
            <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed"><?= htmlspecialchars($item['desc']) ?></p>
            <p class="text-[11px] font-mono text-cyan-400 dir-ltr truncate pt-1"><?= htmlspecialchars($item['tech']) ?></p>
          </div>
          <div class="flex items-center gap-2 pt-2 border-t border-cyan-500/10 justify-end text-xs">
            <a href="gallery.php?edit=<?= $item['id'] ?>" class="px-3 py-1.5 rounded-lg bg-cyan-500/15 text-cyan-300 hover:bg-cyan-500/30 font-bold transition">
              <i class="fa-solid fa-pen ml-1"></i>تعديل
            </a>
            <form method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الشاشة من المعرض؟')" class="inline">
              <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
              <input type="hidden" name="action" value="delete">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <button type="submit" class="px-3 py-1.5 rounded-lg bg-rose-500/15 text-rose-400 hover:bg-rose-500/30 font-bold transition">
                <i class="fa-solid fa-trash ml-1"></i>حذف
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<script>
function updateGalleryCat(select) {
  const text = select.options[select.selectedIndex].text;
  document.getElementById('gallery_cat_name').value = text;
}
</script>
<?php renderAdminFooter(); ?>
