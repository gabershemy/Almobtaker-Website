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
        $pdo->prepare("DELETE FROM projects WHERE id = ?")->execute([$delId]);
        $msg = 'تم حذف المشروع بنجاح';
    }
}

// Handle Add / Edit (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['action']) || $_POST['action'] === 'save')) {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $id = intval($_POST['project_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $category = trim($_POST['category'] ?? 'erp');
    $category_name = trim($_POST['category_name'] ?? 'أنظمة ERP وشركات');
    $tech = trim($_POST['tech'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $status = trim($_POST['status'] ?? 'يعمل بنجاح');
    $image = trim($_POST['image'] ?? '');
    
    $projectRepo = new \App\Repositories\ProjectRepository();
    $existing = ($id > 0) ? $projectRepo->findById($id) : null;

    // Direct file upload from computer
    if (!empty($_FILES['image_file']['name'])) {
        $uploaded = \App\Core\Uploader::uploadImage($_FILES['image_file']);
        if ($uploaded) {
            $image = $uploaded;
        } else {
            $error = 'تنبيه رفع الصورة: ' . \App\Core\Uploader::$lastError;
        }
    }

    // Preserve existing image if neither new file nor URL was provided
    if (empty($image) && $existing && !empty($existing['image'])) {
        $image = $existing['image'];
    }

    $hero_image = trim($_POST['hero_image'] ?? '');
    if (empty($hero_image)) {
        $hero_image = !empty($image) ? $image : ($existing['hero_image'] ?? '');
    }
    $full_desc = trim($_POST['full_desc'] ?? $description);

    if (!empty($title)) {
        $saved = $projectRepo->save([
            'id' => $id,
            'title' => $title,
            'category' => $category,
            'category_name' => $category_name,
            'tech' => $tech,
            'description' => $description,
            'status' => $status,
            'image' => $image,
            'hero_image' => $hero_image,
            'full_desc' => $full_desc
        ]);

        if ($saved) {
            $msg = $id > 0 ? 'تم تحديث بيانات المشروع وحفظ الصورة بنجاح!' : 'تمت إضافة المشروع الجديد وحفظ الصورة بنجاح!';
            if ($id > 0) {
                $editProject = $projectRepo->findById($id);
            }
        } else {
            $error = 'حدث خطأ أثناء حفظ بيانات المشروع في قاعدة البيانات';
        }
    } else {
        $error = 'يرجى إدخال اسم المشروع';
    }
}

$editProject = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $projectRepo = new \App\Repositories\ProjectRepository();
    $editProject = $projectRepo->findById($editId);
}

$projects = (new \App\Repositories\ProjectRepository())->getAll();
renderAdminHeader('سابقة الأعمال', 'projects');
?>
<div class="space-y-6 text-right">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-white">إدارة سابقة الأعمال (<?= count($projects) ?> مشروع)</h1>
      <p class="text-xs text-slate-400">إضافة وتعديل وحذف مشاريع الشركة المعروضة في الموقع</p>
    </div>
    <button onclick="document.getElementById('projectFormModal').classList.toggle('hidden')" class="px-4 py-2 rounded-xl btn-cyber text-xs flex items-center gap-2">
      <i class="fa-solid fa-plus"></i><span>إضافة مشروع جديد</span>
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

  <div id="projectFormModal" class="glass-panel rounded-3xl p-6 border border-cyan-500/30 space-y-4 <?= $editProject || isset($_GET['action']) ? '' : 'hidden' ?>">
    <h3 class="text-base font-black text-white flex items-center gap-2">
      <i class="fa-solid fa-pen-to-square text-cyan-400"></i>
      <span><?= $editProject ? 'تعديل مشروع: ' . htmlspecialchars($editProject['title']) : 'إضافة مشروع جديد' ?></span>
    </h3>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="project_id" value="<?= $editProject['id'] ?? 0 ?>">
      
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">اسم / عنوان المشروع *</label>
          <input type="text" name="title" required value="<?= htmlspecialchars($editProject['title'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">الفئة والتصنيف *</label>
          <select name="category" onchange="updateCatName(this)" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
            <option value="erp" <?= ($editProject['category'] ?? '') === 'erp' ? 'selected' : '' ?>>أنظمة ERP وشركات</option>
            <option value="medical" <?= ($editProject['category'] ?? '') === 'medical' ? 'selected' : '' ?>>طبي ومستشفيات</option>
            <option value="industrial" <?= ($editProject['category'] ?? '') === 'industrial' ? 'selected' : '' ?>>صناعي وزراعي</option>
            <option value="edtech" <?= ($editProject['category'] ?? '') === 'edtech' ? 'selected' : '' ?>>تعليم ومنصات EdTech</option>
            <option value="fintech" <?= ($editProject['category'] ?? '') === 'fintech' ? 'selected' : '' ?>>تمويل وتقسيط وكاشير</option>
            <option value="ai" <?= ($editProject['category'] ?? '') === 'ai' ? 'selected' : '' ?>>ذكاء اصطناعي وواتساب</option>
            <option value="zatca" <?= ($editProject['category'] ?? '') === 'zatca' ? 'selected' : '' ?>>ZATCA وفوترة إلكترونية</option>
          </select>
          <input type="hidden" name="category_name" id="category_name_input" value="<?= htmlspecialchars($editProject['category_name'] ?? 'أنظمة ERP وشركات') ?>">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">التقنيات المستخدمة</label>
          <input type="text" name="tech" value="<?= htmlspecialchars($editProject['tech'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="Laravel • Vue.js • MySQL">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">حالة المشروع</label>
          <input type="text" name="status" value="<?= htmlspecialchars($editProject['status'] ?? 'يعمل بنجاح') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رفع صورة من جهازك (أو وضع رابط)</label>
          <input type="file" name="image_file" accept="image/*" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-slate-300 file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-cyan-500/20 file:text-cyan-300 hover:file:bg-cyan-500/30">
          <input type="text" name="image" value="<?= htmlspecialchars($editProject['image'] ?? '') ?>" class="mt-2 w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2 text-xs text-white focus:border-cyan-400 outline-none dir-ltr" placeholder="أو رابط الصورة https://... أو uploads/img.jpg">
          <?php if (!empty($editProject['image'])): ?>
            <div class="mt-2 flex items-center gap-2 p-2 rounded-xl bg-cyan-950/40 border border-cyan-500/20">
              <img src="<?= (strpos($editProject['image'], 'http') === 0) ? htmlspecialchars($editProject['image']) : '../' . ltrim(htmlspecialchars($editProject['image']), './') ?>" class="w-10 h-10 object-cover rounded-lg border border-cyan-500/30" alt="معاينة" onerror="this.style.display='none'">
              <span class="text-[11px] text-cyan-300 font-mono truncate dir-ltr"><?= htmlspecialchars($editProject['image']) ?></span>
            </div>
          <?php endif; ?>
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رابط صورة الهيرو / المعاينة (اختياري)</label>
          <input type="text" name="hero_image" value="<?= htmlspecialchars($editProject['hero_image'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr" placeholder="https://...">
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">الوصف المختصر</label>
        <textarea name="description" rows="2" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none"><?= htmlspecialchars($editProject['description'] ?? '') ?></textarea>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">الشرح التفصيلي والمميزات</label>
        <textarea name="full_desc" rows="3" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none"><?= htmlspecialchars($editProject['full_desc'] ?? '') ?></textarea>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs">
          <i class="fa-solid fa-check ml-1"></i> حفظ المشروع
        </button>
        <button type="button" onclick="document.getElementById('projectFormModal').classList.add('hidden')" class="px-4 py-2.5 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs font-bold">
          إلغاء
        </button>
      </div>
    </form>
  </div>

  <div class="glass-panel rounded-3xl p-6 border border-cyan-500/20 overflow-x-auto">
    <table class="w-full text-right text-xs">
      <thead>
        <tr class="border-b border-cyan-500/20 text-slate-300 pb-3 font-bold">
          <th class="py-3.5 px-3 text-center w-12">#</th>
          <th class="py-3.5 px-4 text-right">عنوان وبيانات المشروع</th>
          <th class="py-3.5 px-3 text-center">الفئة والتصنيف</th>
          <th class="py-3.5 px-3 text-center">الحالة</th>
          <th class="py-3.5 px-4 text-center w-48">إجراءات التحكم</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-cyan-500/10">
        <?php foreach ($projects as $idx => $p): ?>
          <tr class="hover:bg-cyan-500/5 transition">
            <td class="py-3.5 px-3 text-slate-400 font-mono text-center font-bold"><?= $idx + 1 ?></td>
            <td class="py-3.5 px-4 font-bold text-white text-right">
              <div class="flex items-center gap-3.5">
                <img src="<?= htmlspecialchars($p['image'] ?: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80') ?>" alt="<?= htmlspecialchars($p['title']) ?>" class="w-12 h-12 rounded-2xl object-cover border border-cyan-500/30 flex-shrink-0 shadow-md">
                <div class="space-y-1 text-right">
                  <p class="font-black text-white text-xs sm:text-sm leading-snug"><?= htmlspecialchars($p['title']) ?></p>
                  <p class="text-[10px] text-cyan-300 font-mono truncate max-w-sm"><?= htmlspecialchars($p['tech']) ?></p>
                </div>
              </div>
            </td>
            <td class="py-3.5 px-3 text-center">
              <span class="px-3 py-1 rounded-full bg-cyan-500/15 text-cyan-300 border border-cyan-500/30 text-xs font-bold whitespace-nowrap"><?= htmlspecialchars($p['category_name']) ?></span>
            </td>
            <td class="py-3.5 px-3 text-center">
              <span class="px-3 py-1 rounded-full bg-emerald-500/15 text-emerald-300 border border-emerald-500/30 font-bold text-xs whitespace-nowrap inline-flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span><?= htmlspecialchars($p['status']) ?>
              </span>
            </td>
            <td class="py-3.5 px-4 text-center whitespace-nowrap">
              <div class="flex items-center justify-center gap-2">
                <a href="projects.php?edit=<?= $p['id'] ?>" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/20 hover:bg-cyan-500/35 text-cyan-300 font-bold transition text-xs flex items-center gap-1.5 border border-cyan-400/50 shadow-sm shadow-cyan-500/20">
                  <i class="fa-solid fa-pen text-[10px]"></i><span>تعديل</span>
                </a>
                <form method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المشروع؟')" class="inline">
                  <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?= $p['id'] ?>">
                  <button type="submit" class="px-3.5 py-1.5 rounded-xl bg-rose-500/20 hover:bg-rose-500/35 text-rose-300 font-bold transition text-xs flex items-center gap-1.5 border border-rose-500/50 shadow-sm shadow-rose-500/20">
                    <i class="fa-solid fa-trash text-[10px]"></i><span>حذف</span>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<script>
function updateCatName(select) {
  const text = select.options[select.selectedIndex].text;
  document.getElementById('category_name_input').value = text;
}
</script>
<?php renderAdminFooter(); ?>
