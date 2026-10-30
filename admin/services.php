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
        $pdo->prepare("DELETE FROM services WHERE id = ?")->execute([$delId]);
        $msg = 'تم حذف الخدمة بنجاح';
    }
}

// Handle Add / Edit (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['action']) || $_POST['action'] === 'save')) {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $id = intval($_POST['service_id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $tag = trim($_POST['tag'] ?? 'خدمة تقنية');
    $icon = trim($_POST['icon'] ?? 'fa-solid fa-gears');
    $short_desc = trim($_POST['short_desc'] ?? '');
    $desc = trim($_POST['desc'] ?? '');
    $image = trim($_POST['image'] ?? '');
    $tech_raw = trim($_POST['tech'] ?? '');
    $tech = array_filter(array_map('trim', explode('•', $tech_raw)));

    $serviceRepo = new \App\Repositories\ServiceRepository();
    $existing = ($id > 0) ? $serviceRepo->findById($id) : null;

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

    // Automated SEO Generation & Handling
    $service_slug = trim($_POST['service_slug'] ?? '');
    $seo_title = trim($_POST['seo_title'] ?? '');
    $seo_desc = trim($_POST['seo_desc'] ?? '');
    $seo_keywords = trim($_POST['seo_keywords'] ?? '');

    $seoService = new \App\Services\SeoService();
    $autoSeo = $seoService->generateServiceSeo([
        'title' => $title,
        'tag' => $tag,
        'desc' => $desc,
        'short_desc' => $short_desc,
        'tech' => $tech,
        'service_slug' => $service_slug
    ]);

    if (empty($service_slug)) {
        $service_slug = !empty($existing['service_slug']) ? $existing['service_slug'] : $autoSeo['service_slug'];
    }
    if (empty($seo_title)) {
        $seo_title = $autoSeo['seo_title'];
    }
    if (empty($seo_desc)) {
        $seo_desc = $autoSeo['seo_desc'];
    }
    if (empty($seo_keywords)) {
        $seo_keywords = $autoSeo['seo_keywords'];
    }

    if (!empty($title)) {
        $saved = $serviceRepo->save([
            'id' => $id,
            'title' => $title,
            'tag' => $tag,
            'icon' => $icon,
            'short_desc' => $short_desc,
            'desc' => $desc,
            'image' => $image,
            'tech' => $tech,
            'service_slug' => $service_slug,
            'seo_title' => $seo_title,
            'seo_desc' => $seo_desc,
            'seo_keywords' => $seo_keywords
        ]);

        if ($saved) {
            // Auto update sitemap
            try {
                $projectRepo = new \App\Repositories\ProjectRepository();
                $sitemapXml = $seoService->generateSitemap($projectRepo->getAll(), $serviceRepo->getAll());
                @file_put_contents(dirname(__DIR__) . '/sitemap.xml', $sitemapXml);
            } catch (\Exception $e) {
                // Ignore sitemap write error
            }

            $msg = $id > 0 ? 'تم تحديث بيانات الخدمة وتوليد إعدادات الـ SEO بنجاح!' : 'تمت إضافة الخدمة الجديدة وتوليد إعدادات الـ SEO تلقائياً!';
            if ($id > 0) {
                $editSvc = $serviceRepo->findById($id);
            }
        } else {
            $error = 'حدث خطأ أثناء حفظ بيانات الخدمة';
        }
    } else {
        $error = 'يرجى إدخال اسم الخدمة';
    }
}

$editSvc = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $serviceRepo = new \App\Repositories\ServiceRepository();
    $editSvc = $serviceRepo->findById($editId);
}

$services = (new \App\Repositories\ServiceRepository())->getAll();
renderAdminHeader('إدارة الخدمات', 'services');
?>
<div class="space-y-6 text-right">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-white">إدارة الخدمات التقنية (<?= count($services) ?> خدمات)</h1>
      <p class="text-xs text-slate-400">إضافة وتعديل وحذف باقات الخدمات المعروضة في الموقع</p>
    </div>
    <button onclick="document.getElementById('serviceFormModal').classList.toggle('hidden')" class="px-4 py-2 rounded-xl btn-cyber text-xs flex items-center gap-2">
      <i class="fa-solid fa-plus"></i><span>إضافة خدمة جديدة</span>
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

  <div id="serviceFormModal" class="glass-panel rounded-3xl p-6 border border-cyan-500/30 space-y-4 <?= $editSvc || isset($_GET['action']) ? '' : 'hidden' ?>">
    <h3 class="text-base font-black text-white flex items-center gap-2">
      <i class="fa-solid fa-pen-to-square text-cyan-400"></i>
      <span><?= $editSvc ? 'تعديل خدمة: ' . htmlspecialchars($editSvc['title']) : 'إضافة خدمة جديدة' ?></span>
    </h3>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="service_id" value="<?= $editSvc['id'] ?? 0 ?>">
      
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">اسم / عنوان الخدمة *</label>
          <input type="text" name="title" required value="<?= htmlspecialchars($editSvc['title'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">تصنيف / شارة الخدمة (Tag)</label>
          <input type="text" name="tag" value="<?= htmlspecialchars($editSvc['tag'] ?? 'خدمة تقنية') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">أيقونة FontAwesome</label>
          <input type="text" name="icon" value="<?= htmlspecialchars($editSvc['icon'] ?? 'fa-solid fa-gears') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="fa-solid fa-gears">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رفع صورة من جهازك (أو وضع رابط)</label>
          <input type="file" name="image_file" accept="image/*" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-slate-300 file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-cyan-500/20 file:text-cyan-300 hover:file:bg-cyan-500/30">
          <input type="text" name="image" value="<?= htmlspecialchars($editSvc['image'] ?? '') ?>" class="mt-2 w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2 text-xs text-white focus:border-cyan-400 outline-none dir-ltr" placeholder="أو رابط الصورة https://... أو uploads/img.jpg">
          <?php if (!empty($editSvc['image'])): ?>
            <div class="mt-2 flex items-center gap-2 p-2 rounded-xl bg-cyan-950/40 border border-cyan-500/20">
              <img src="<?= (strpos($editSvc['image'], 'http') === 0) ? htmlspecialchars($editSvc['image']) : '../' . ltrim(htmlspecialchars($editSvc['image']), './') ?>" class="w-10 h-10 object-cover rounded-lg border border-cyan-500/30" alt="معاينة" onerror="this.style.display='none'">
              <span class="text-[11px] text-cyan-300 font-mono truncate dir-ltr"><?= htmlspecialchars($editSvc['image']) ?></span>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">شريط التقنيات (مفصولة بـ • )</label>
        <?php
          $techArr = is_array($editSvc['tech'] ?? null) ? $editSvc['tech'] : (json_decode($editSvc['tech'] ?? '[]', true) ?: []);
          $techStr = implode(' • ', $techArr);
        ?>
        <input type="text" name="tech" value="<?= htmlspecialchars($techStr) ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="FastAPI • Python • Redis • AI">
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">الوصف والشرح المفصل للخدمة</label>
        <textarea name="desc" rows="3" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none"><?= htmlspecialchars($editSvc['desc'] ?? '') ?></textarea>
      </div>

      <!-- SEO Optimization Box (Auto-Generated & Editable) -->
      <div class="p-4 rounded-2xl bg-cyan-950/30 border border-cyan-500/30 space-y-3">
        <div class="flex items-center justify-between">
          <h4 class="text-xs font-black text-cyan-300 flex items-center gap-2">
            <i class="fa-solid fa-magnifying-glass-chart text-cyan-400"></i>
            <span>إعدادات تحسين محركات البحث (SEO) والظهور في جوجل (تولد تلقائياً)</span>
          </h4>
          <span class="text-[10px] bg-cyan-500/10 text-cyan-300 px-2.5 py-1 rounded-full border border-cyan-500/30">Google SERP Ready</span>
        </div>
        <p class="text-[11px] text-slate-400">إذا تركت هذه الحقول فارغة، سيقوم النظام بتوليدها تلقائياً بأفضل معايير السيو والكلمات المفتاحية لمصر والسعودية والخليج.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          <div>
            <label class="block text-[11px] font-bold text-slate-300 mb-1">مسار الرابط النظيف (Slug)</label>
            <input type="text" name="service_slug" value="<?= htmlspecialchars($editSvc['service_slug'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="cloud-erp-systems">
          </div>
          <div>
            <label class="block text-[11px] font-bold text-slate-300 mb-1">عنوان الميتا (Meta Title)</label>
            <input type="text" name="seo_title" value="<?= htmlspecialchars($editSvc['seo_title'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-white focus:border-cyan-400 outline-none" placeholder="عنوان يظهر في نتائج بحث جوجل (50-60 حرف)">
          </div>
        </div>

        <div>
          <label class="block text-[11px] font-bold text-slate-300 mb-1">وصف الميتا لمحركات البحث (Meta Description)</label>
          <textarea name="seo_desc" rows="2" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-white focus:border-cyan-400 outline-none" placeholder="وصف جذاب ومشجع على النقر يظهر في جوجل (140-160 حرف)"><?= htmlspecialchars($editSvc['seo_desc'] ?? '') ?></textarea>
        </div>

        <div>
          <label class="block text-[11px] font-bold text-slate-300 mb-1">الكلمات المفتاحية (Meta Keywords مفصولة بفواصل)</label>
          <input type="text" name="seo_keywords" value="<?= htmlspecialchars($editSvc['seo_keywords'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-3 py-2 text-xs text-white focus:border-cyan-400 outline-none" placeholder="تطوير برمجيات, أنظمة سحابية, برمجيات مصر, برمجيات السعودية">
        </div>
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs">
          <i class="fa-solid fa-check ml-1"></i> حفظ الخدمة
        </button>
        <button type="button" onclick="document.getElementById('serviceFormModal').classList.add('hidden')" class="px-4 py-2.5 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs font-bold">
          إلغاء
        </button>
      </div>
    </form>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <?php foreach ($services as $s): ?>
      <div class="glass-panel rounded-3xl p-6 border border-cyan-500/20 flex flex-col justify-between space-y-4 text-right">
        <div class="space-y-3">
          <div class="flex items-center justify-between">
            <span class="px-3 py-1 rounded-full text-xs font-bold bg-cyan-500/15 text-cyan-300 border border-cyan-500/30"><?= htmlspecialchars($s['tag'] ?: 'خدمة تقنية') ?></span>
            <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-300 text-lg">
              <i class="<?= htmlspecialchars($s['icon'] ?: 'fa-solid fa-gears') ?>"></i>
            </div>
          </div>
          <h3 class="text-base font-black text-white"><?= htmlspecialchars($s['title']) ?></h3>
          <p class="text-xs text-slate-300 line-clamp-3 leading-relaxed"><?= htmlspecialchars($s['desc']) ?></p>
        </div>
        <div class="flex items-center gap-2 pt-3 border-t border-cyan-500/15 justify-end text-xs">
          <a href="services.php?edit=<?= $s['id'] ?>" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/20 text-cyan-300 hover:bg-cyan-500/35 font-bold transition flex items-center gap-1.5">
            <i class="fa-solid fa-pen text-[10px]"></i><span>تعديل</span>
          </a>
          <form method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة؟')" class="inline">
            <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?= $s['id'] ?>">
            <button type="submit" class="px-3.5 py-1.5 rounded-xl bg-rose-500/20 text-rose-300 hover:bg-rose-500/35 font-bold transition flex items-center gap-1.5">
              <i class="fa-solid fa-trash text-[10px]"></i><span>حذف</span>
            </button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php renderAdminFooter(); ?>
