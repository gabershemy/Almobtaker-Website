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
        $pdo->prepare("DELETE FROM team WHERE id = ?")->execute([$delId]);
        $msg = 'تم حذف العضو بنجاح';
    }
}

// Handle Add / Edit (POST with CSRF)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && (!isset($_POST['action']) || $_POST['action'] === 'save')) {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }
    $id = intval($_POST['member_id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $icon = trim($_POST['icon'] ?? 'fa-solid fa-user');
    $image = trim($_POST['image'] ?? '');

    // Handle Image Upload if provided
    if (!empty($_FILES['image_file']['name']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $ext = strtolower(pathinfo($_FILES['image_file']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $uploadDir = __DIR__ . '/../uploads/team/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $filename = 'team_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
            if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadDir . $filename)) {
                $image = 'uploads/team/' . $filename;
            }
        }
    }

    if (!empty($name) && !empty($role)) {
        if ($id > 0) {
            $stmt = $pdo->prepare("UPDATE team SET name=?, role=?, icon=?, image=? WHERE id=?");
            $stmt->execute([$name, $role, $icon, $image, $id]);
            $msg = 'تم تحديث بيانات العضو بنجاح';
        } else {
            $stmt = $pdo->prepare("INSERT INTO team (name, role, icon, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $role, $icon, $image]);
            $msg = 'تمت إضافة العضو الجديد بنجاح';
        }
    } else {
        $error = 'يرجى إدخال الاسم والمسمى الوظيفي';
    }
}

$editMember = null;
if (isset($_GET['edit'])) {
    $editId = intval($_GET['edit']);
    $stmt = $pdo->prepare("SELECT * FROM team WHERE id = ?");
    $stmt->execute([$editId]);
    $editMember = $stmt->fetch();
}

$team = $pdo->query("SELECT * FROM team ORDER BY order_num ASC, id ASC")->fetchAll();
renderAdminHeader('فريق العمل', 'team');
?>
<div class="space-y-6 text-right">
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
    <div>
      <h1 class="text-2xl font-black text-white">فريق العمل (<?= count($team) ?> عضو)</h1>
      <p class="text-xs text-slate-400">إضافة وتعديل بيانات أعضاء الفريق والخبراء</p>
    </div>
    <button onclick="document.getElementById('teamFormModal').classList.toggle('hidden')" class="px-4 py-2 rounded-xl btn-cyber text-xs flex items-center gap-2">
      <i class="fa-solid fa-user-plus"></i><span>إضافة عضو جديد</span>
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

  <div id="teamFormModal" class="glass-panel rounded-3xl p-6 border border-cyan-500/30 space-y-4 <?= $editMember || isset($_GET['action']) ? '' : 'hidden' ?>">
    <h3 class="text-base font-black text-white flex items-center gap-2">
      <i class="fa-solid fa-pen-to-square text-cyan-400"></i>
      <span><?= $editMember ? 'تعديل عضو: ' . htmlspecialchars($editMember['name']) : 'إضافة عضو جديد' ?></span>
    </h3>
    <form method="POST" enctype="multipart/form-data" class="space-y-4">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="member_id" value="<?= $editMember['id'] ?? 0 ?>">
      
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">الاسم الكامل *</label>
          <input type="text" name="name" required value="<?= htmlspecialchars($editMember['name'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">المسمى الوظيفي *</label>
          <input type="text" name="role" required value="<?= htmlspecialchars($editMember['role'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">رابط صورة العضو (URL)</label>
          <input type="text" name="image" value="<?= htmlspecialchars($editMember['image'] ?? '') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="https://... أو مسار الصورة">
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-300 mb-1">أو رفع صورة من الجهاز</label>
          <input type="file" name="image_file" accept="image/*" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2 text-xs text-slate-300 focus:border-cyan-400 outline-none file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:bg-cyan-500/20 file:text-cyan-300">
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1">الأيقونة الاحتياطية (FontAwesome class)</label>
        <input type="text" name="icon" value="<?= htmlspecialchars($editMember['icon'] ?? 'fa-solid fa-user') ?>" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-cyan-400 outline-none dir-ltr font-mono" placeholder="fa-solid fa-user-tie">
      </div>

      <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs">
          <i class="fa-solid fa-check ml-1"></i> حفظ وتحديث
        </button>
        <button type="button" onclick="document.getElementById('teamFormModal').classList.add('hidden')" class="px-4 py-2.5 rounded-xl bg-slate-800 text-slate-300 hover:bg-slate-700 text-xs font-bold">
          إلغاء
        </button>
      </div>
    </form>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
    <?php foreach ($team as $m): ?>
      <div class="glass-panel rounded-2xl p-5 border border-cyan-500/20 flex flex-col items-center text-center justify-between gap-3">
        <div class="relative">
          <?php if (!empty($m['image'])): ?>
            <img src="<?= htmlspecialchars($m['image']) ?>" alt="<?= htmlspecialchars($m['name']) ?>" class="w-16 h-16 rounded-2xl object-cover border-2 border-cyan-500/40 shadow-lg shadow-cyan-500/20">
          <?php else: ?>
            <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-300 text-2xl">
              <i class="<?= htmlspecialchars($m['icon'] ?: 'fa-solid fa-user') ?>"></i>
            </div>
          <?php endif; ?>
        </div>
        <div>
          <p class="text-sm font-black text-white leading-snug"><?= htmlspecialchars($m['name']) ?></p>
          <p class="text-xs text-cyan-400 mt-1"><?= htmlspecialchars($m['role']) ?></p>
        </div>
        <div class="flex items-center gap-2 pt-2 border-t border-cyan-500/10 w-full justify-center text-xs">
          <a href="team.php?edit=<?= $m['id'] ?>" class="px-3 py-1 rounded-lg bg-cyan-500/15 text-cyan-300 hover:bg-cyan-500/30 font-bold transition">
            <i class="fa-solid fa-pen ml-1"></i>تعديل
          </a>
          <form method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا العضو؟')" class="inline">
            <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?= $m['id'] ?>">
            <button type="submit" class="px-3 py-1 rounded-lg bg-rose-500/15 text-rose-400 hover:bg-rose-500/30 font-bold transition">
              <i class="fa-solid fa-trash ml-1"></i>حذف
            </button>
          </form>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php renderAdminFooter(); ?>
