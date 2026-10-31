<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/layout.php';

$pdo = getDB();
$admin = getLoggedInAdmin();
$currentAdminId = (int)$admin['id'];

$msg = '';
$error = '';
$activeTab = $_GET['tab'] ?? 'profile';

// Handle Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'] ?? '')) {
        die('خطأ أمني: رمز الحماية غير صالح (CSRF Error)');
    }

    $action = $_POST['action'] ?? '';

    // 1. UPDATE CURRENT USER PROFILE
    if ($action === 'update_profile') {
        $fullName = trim($_POST['full_name'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $newPass = trim($_POST['new_password'] ?? '');
        $confirmPass = trim($_POST['confirm_password'] ?? '');

        if (empty($fullName) || empty($username)) {
            $error = 'يرجى إدخال الاسم الكامل واسم المستخدم.';
        } else {
            // Check if username is already taken by another admin
            $checkStmt = $pdo->prepare("SELECT id FROM admins WHERE username = ? AND id != ?");
            $checkStmt->execute([$username, $currentAdminId]);
            if ($checkStmt->fetch()) {
                $error = 'اسم المستخدم هذا مستخدم بالفعل من قبل حساب آخر.';
            } else {
                if (!empty($newPass)) {
                    if (strlen($newPass) < 6) {
                        $error = 'كلمة المرور الجديدة يجب ألا تقل عن 6 أحرف.';
                    } elseif ($newPass !== $confirmPass) {
                        $error = 'كلمة المرور الجديدة وتأكيدها غير متطابقين.';
                    } else {
                        $hash = password_hash($newPass, PASSWORD_BCRYPT);
                        $stmt = $pdo->prepare("UPDATE admins SET full_name = ?, username = ?, email = ?, password_hash = ? WHERE id = ?");
                        $stmt->execute([$fullName, $username, $email, $hash, $currentAdminId]);
                        refreshAdminSession($currentAdminId);
                        $msg = 'تم تحديث بيانات ملفك الشخصي وكلمة المرور بنجاح!';
                    }
                } else {
                    $stmt = $pdo->prepare("UPDATE admins SET full_name = ?, username = ?, email = ? WHERE id = ?");
                    $stmt->execute([$fullName, $username, $email, $currentAdminId]);
                    refreshAdminSession($currentAdminId);
                    $msg = 'تم حفظ وتحديث بيانات حسابك بنجاح!';
                }
            }
        }
        $activeTab = 'profile';
    }

    // 2. CREATE NEW USER
    elseif ($action === 'create_user') {
        $fullName = trim($_POST['new_full_name'] ?? '');
        $username = trim($_POST['new_username'] ?? '');
        $email = trim($_POST['new_email'] ?? '');
        $password = trim($_POST['new_password'] ?? '');
        $role = trim($_POST['new_role'] ?? 'editor');
        $status = isset($_POST['new_status']) ? 1 : 0;
        $perms = $_POST['new_permissions'] ?? ['all'];

        if (empty($fullName) || empty($username) || empty($password)) {
            $error = 'يرجى ملء كافة الحقول الأساسية (الاسم، اسم المستخدم، وكلمة المرور).';
        } elseif (strlen($password) < 6) {
            $error = 'كلمة المرور يجب أن لا تقل عن 6 أحرف.';
        } else {
            $checkStmt = $pdo->prepare("SELECT id FROM admins WHERE username = ?");
            $checkStmt->execute([$username]);
            if ($checkStmt->fetch()) {
                $error = 'اسم المستخدم هذا مستخدم مسبقاً، اختر اسماً آخر.';
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $permsJson = json_encode(array_values($perms), JSON_UNESCAPED_UNICODE);
                $stmt = $pdo->prepare("INSERT INTO admins (full_name, username, email, password_hash, role, status, permissions) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$fullName, $username, $email, $hash, $role, $status, $permsJson]);
                $msg = 'تمت إضافة المستخدم الجديد وتحديد صلاحياته بنجاح!';
            }
        }
        $activeTab = 'users';
    }

    // 3. EDIT EXISTING USER
    elseif ($action === 'edit_user') {
        $targetId = (int)($_POST['target_id'] ?? 0);
        $fullName = trim($_POST['edit_full_name'] ?? '');
        $username = trim($_POST['edit_username'] ?? '');
        $email = trim($_POST['edit_email'] ?? '');
        $editPass = trim($_POST['edit_password'] ?? '');
        $role = trim($_POST['edit_role'] ?? 'editor');
        $status = isset($_POST['edit_status']) ? 1 : 0;
        $perms = $_POST['edit_permissions'] ?? ['all'];

        if ($targetId > 0 && !empty($fullName) && !empty($username)) {
            // Check username uniqueness
            $checkStmt = $pdo->prepare("SELECT id FROM admins WHERE username = ? AND id != ?");
            $checkStmt->execute([$username, $targetId]);
            if ($checkStmt->fetch()) {
                $error = 'اسم المستخدم هذا مستخدم بالفعل من قبل حساب آخر.';
            } else {
                $permsJson = json_encode(array_values($perms), JSON_UNESCAPED_UNICODE);
                if (!empty($editPass)) {
                    if (strlen($editPass) < 6) {
                        $error = 'كلمة المرور الجديدة يجب ألا تقل عن 6 أحرف.';
                    } else {
                        $hash = password_hash($editPass, PASSWORD_BCRYPT);
                        $stmt = $pdo->prepare("UPDATE admins SET full_name = ?, username = ?, email = ?, password_hash = ?, role = ?, status = ?, permissions = ? WHERE id = ?");
                        $stmt->execute([$fullName, $username, $email, $hash, $role, $status, $permsJson, $targetId]);
                        $msg = 'تم تحديث بيانات المستخدم وكلمة مروره وصلاحياته بنجاح!';
                    }
                } else {
                    $stmt = $pdo->prepare("UPDATE admins SET full_name = ?, username = ?, email = ?, role = ?, status = ?, permissions = ? WHERE id = ?");
                    $stmt->execute([$fullName, $username, $email, $role, $status, $permsJson, $targetId]);
                    $msg = 'تم تحديث بيانات وصلاحيات المستخدم بنجاح!';
                }
                if ($targetId === $currentAdminId) {
                    refreshAdminSession($currentAdminId);
                }
            }
        } else {
            $error = 'بيانات المستخدم غير مكتملة.';
        }
        $activeTab = 'users';
    }

    // 4. DELETE USER
    elseif ($action === 'delete_user') {
        $targetId = (int)($_POST['target_id'] ?? 0);
        if ($targetId === $currentAdminId) {
            $error = 'لا يمكنك حذف حسابك الشخصي الحالي المُسجّل به الدخول!';
        } else {
            // Check total admin count
            $count = (int)$pdo->query("SELECT COUNT(*) FROM admins")->fetchColumn();
            if ($count <= 1) {
                $error = 'لا يمكن حذف المستخدم الوحيد في النظام!';
            } else {
                $stmt = $pdo->prepare("DELETE FROM admins WHERE id = ?");
                $stmt->execute([$targetId]);
                $msg = 'تم حذف المستخدم من النظام بنجاح.';
            }
        }
        $activeTab = 'users';
    }
}

// Fetch current user fresh data
$myStmt = $pdo->prepare("SELECT * FROM admins WHERE id = ? LIMIT 1");
$myStmt->execute([$currentAdminId]);
$myData = $myStmt->fetch(PDO::FETCH_ASSOC);

// Fetch all users
$allUsers = $pdo->query("SELECT * FROM admins ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);

$availablePermissions = [
    'all'      => ['label' => 'كامل الصلاحيات (كل الشاشات)', 'desc' => 'إدارة كاملة للنظام والمستخدمين والإعدادات'],
    'messages' => ['label' => 'صندوق الرسائل والطلبات', 'desc' => 'عرض واستقبال طلبات عروض الأسعار والرسائل'],
    'projects' => ['label' => 'سابقة الأعمال والمشاريع', 'desc' => 'إضافة وتعديل وحذف مشاريع المنظومة والسيو'],
    'services' => ['label' => 'الخدمات البرمجية', 'desc' => 'إدارة باقات الخدمات والأسعار والتفاصيل'],
    'gallery'  => ['label' => 'معرض الصور والشاشات', 'desc' => 'رفع وإدارة لقطات الشاشات للمنظومات'],
    'team'     => ['label' => 'فريق العمل والخبراء', 'desc' => 'إدارة بيانات أعضاء الفريق والصور والرتب'],
    'faqs'     => ['label' => 'الأسئلة الشائعة', 'desc' => 'إضافة وتعديل إجابات الأسئلة المتكررة'],
    'settings' => ['label' => 'إعدادات الموقع العامة', 'desc' => 'تعديل بيانات التواصل والعناوين وروابط السوشيال'],
    'users'    => ['label' => 'المستخدمين والصلاحيات', 'desc' => 'إدارة حسابات المديرين وتعيين الأذونات']
];

renderAdminHeader('إدارة المستخدمين والصلاحيات', 'users');
?>

<div class="space-y-6 text-right">
  <!-- رأس الصفحة -->
  <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-cyan-500/20">
    <div>
      <h1 class="text-2xl font-black text-white flex items-center gap-2.5">
        <i class="fa-solid fa-user-shield text-cyan-400"></i>
        <span>المستخدمين وصلاحيات لوحة التحكم</span>
      </h1>
      <p class="text-xs text-slate-400 mt-1">تعديل بيانات حسابك الشخصي، إدارة المستخدمين، وتحديد أذونات الوصول لكل عضو</p>
    </div>

    <!-- أزرار التبويب Tabs -->
    <div class="flex items-center gap-2 p-1 rounded-2xl bg-cyber-900 border border-cyan-500/30">
      <a href="?tab=profile" class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 <?= $activeTab === 'profile' ? 'bg-cyan-500 text-slate-950 font-black shadow-lg shadow-cyan-500/30' : 'text-slate-300 hover:text-white' ?>">
        <i class="fa-solid fa-id-card"></i>
        <span>بيانات حسابي الشخصي</span>
      </a>
      <a href="?tab=users" class="px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2 <?= $activeTab === 'users' ? 'bg-cyan-500 text-slate-950 font-black shadow-lg shadow-cyan-500/30' : 'text-slate-300 hover:text-white' ?>">
        <i class="fa-solid fa-users-gear"></i>
        <span>إدارة المستخدمين والصلاحيات</span>
        <span class="px-2 py-0.5 rounded-full text-[10px] <?= $activeTab === 'users' ? 'bg-slate-950 text-cyan-400' : 'bg-cyan-500/20 text-cyan-300' ?> font-mono"><?= count($allUsers) ?></span>
      </a>
    </div>
  </div>

  <!-- التنبيهات -->
  <?php if (!empty($msg)): ?>
    <div class="p-4 rounded-2xl bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 text-xs font-bold flex items-center gap-2 shadow-lg">
      <i class="fa-solid fa-circle-check text-base"></i>
      <span><?= htmlspecialchars($msg) ?></span>
    </div>
  <?php endif; ?>

  <?php if (!empty($error)): ?>
    <div class="p-4 rounded-2xl bg-rose-500/20 border border-rose-500/40 text-rose-300 text-xs font-bold flex items-center gap-2 shadow-lg">
      <i class="fa-solid fa-triangle-exclamation text-base"></i>
      <span><?= htmlspecialchars($error) ?></span>
    </div>
  <?php endif; ?>

  <!-- ================= TAB 1: MY PROFILE ================= -->
  <?php if ($activeTab === 'profile'): ?>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      
      <!-- بطاقة معلومات الحساب الحالي -->
      <div class="glass-panel rounded-3xl p-6 border border-cyan-500/25 space-y-6 flex flex-col justify-between">
        <div class="space-y-4">
          <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-cyan-600 to-blue-600 flex items-center justify-center text-white text-2xl shadow-xl shadow-cyan-500/20 font-black">
              <?= mb_substr($myData['full_name'] ?? 'م', 0, 1, 'UTF-8') ?>
            </div>
            <div>
              <h3 class="text-base font-black text-white"><?= htmlspecialchars($myData['full_name'] ?? '') ?></h3>
              <p class="text-xs text-cyan-400 font-mono">@<?= htmlspecialchars($myData['username'] ?? '') ?></p>
              <span class="inline-block mt-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/30">
                <?= ($myData['role'] ?? 'super_admin') === 'super_admin' ? 'مدير عام (Super Admin)' : htmlspecialchars($myData['role'] ?? 'مستخدم') ?>
              </span>
            </div>
          </div>

          <div class="space-y-3 pt-4 border-t border-cyan-500/15 text-xs text-slate-300">
            <div class="flex items-center justify-between">
              <span class="text-slate-400">البريد الإلكتروني:</span>
              <span class="font-mono text-white"><?= htmlspecialchars($myData['email'] ?? 'gabershemy@gmail.com') ?></span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-slate-400">حالة الحساب:</span>
              <span class="text-emerald-400 font-bold flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-400"></span> نشط ومفعّل</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-slate-400">تاريخ الإنشاء:</span>
              <span class="font-mono text-slate-400 text-[11px]"><?= htmlspecialchars($myData['created_at'] ?? '2026-08-28') ?></span>
            </div>
          </div>
        </div>

        <div class="p-3.5 rounded-2xl bg-cyan-950/40 border border-cyan-500/20 text-[11px] text-cyan-300 leading-relaxed">
          <i class="fa-solid fa-shield-halved text-cyan-400 ml-1"></i>
          يمكنك من هذا النموذج تحديث بياناتك الشخصية واسم الدخول وتغيير كلمة المرور الخاصة بك في أي وقت.
        </div>
      </div>

      <!-- نموذج تعديل بيانات الحساب وكلمة المرور -->
      <div class="lg:col-span-2 glass-panel rounded-3xl p-6 sm:p-8 border border-cyan-500/25">
        <form method="POST" action="?tab=profile" class="space-y-6">
          <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
          <input type="hidden" name="action" value="update_profile">

          <h2 class="text-lg font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-3">
            <i class="fa-solid fa-user-pen text-cyan-400"></i>
            <span>تعديل بيانات الملف الشخصي</span>
          </h2>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-300">الاسم الكامل *</label>
              <input type="text" name="full_name" value="<?= htmlspecialchars($myData['full_name'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400">
            </div>

            <div class="space-y-1.5">
              <label class="text-xs font-bold text-slate-300">اسم المستخدم (Username) *</label>
              <input type="text" name="username" value="<?= htmlspecialchars($myData['username'] ?? '') ?>" required class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400">
            </div>
          </div>

          <div class="space-y-1.5">
            <label class="text-xs font-bold text-slate-300">البريد الإلكتروني المعتمد</label>
            <input type="email" name="email" value="<?= htmlspecialchars($myData['email'] ?? 'gabershemy@gmail.com') ?>" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400">
          </div>

          <!-- قسم تغيير كلمة المرور -->
          <div class="pt-4 border-t border-cyan-500/20 space-y-4">
            <h3 class="text-sm font-black text-cyan-400 flex items-center gap-2">
              <i class="fa-solid fa-key"></i>
              <span>تغيير كلمة المرور (اتركها فارغة إذا كنت لا تريد التغيير)</span>
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-300">كلمة المرور الجديدة</label>
                <input type="password" name="new_password" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400">
                <span class="text-[10px] text-slate-400">6 أحرف على الأقل</span>
              </div>

              <div class="space-y-1.5">
                <label class="text-xs font-bold text-slate-300">تأكيد كلمة المرور الجديدة</label>
                <input type="password" name="confirm_password" placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none focus:ring-1 focus:ring-cyan-400">
              </div>
            </div>
          </div>

          <div class="pt-4 flex justify-end">
            <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs font-black shadow-lg shadow-cyan-500/30 hover:scale-[1.02] transition">
              <i class="fa-solid fa-floppy-disk ml-1.5"></i> حفظ التعديلات
            </button>
          </div>
        </form>
      </div>

    </div>
  <?php endif; ?>

  <!-- ================= TAB 2: USERS & PERMISSIONS ================= -->
  <?php if ($activeTab === 'users'): ?>
    
    <!-- زر إضافة مستخدم جديد وشريط الإحصاء -->
    <div class="flex items-center justify-between gap-4 p-4 rounded-2xl glass-panel border border-cyan-500/20">
      <div class="text-xs text-slate-300 flex items-center gap-3">
        <span class="font-bold text-white"><i class="fa-solid fa-users text-cyan-400 ml-1"></i> إجمالي المستخدمين:</span>
        <span class="font-mono text-cyan-300 font-bold"><?= count($allUsers) ?> حسابات</span>
      </div>
      <button onclick="openNewUserModal()" class="px-4 py-2 rounded-xl btn-cyber text-xs font-black flex items-center gap-2 shadow-lg shadow-cyan-500/30 hover:scale-[1.02] transition">
        <i class="fa-solid fa-user-plus"></i>
        <span>إضافة مستخدم جديد</span>
      </button>
    </div>

    <!-- جدول المستخدمين -->
    <div class="glass-panel rounded-3xl border border-cyan-500/25 overflow-hidden shadow-2xl">
      <div class="overflow-x-auto">
        <table class="w-full text-right text-xs">
          <thead class="bg-[#0b1c36] text-cyan-300 font-bold border-b border-cyan-500/20">
            <tr>
              <th class="p-4">#</th>
              <th class="p-4">الاسم والمستخدم</th>
              <th class="p-4">البريد الإلكتروني</th>
              <th class="p-4">الدور / الرتبة</th>
              <th class="p-4">الصلاحيات الممنوحة</th>
              <th class="p-4">الحالة</th>
              <th class="p-4 text-center">الإجراءات</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-cyan-500/10 text-slate-300">
            <?php foreach ($allUsers as $u): ?>
              <?php 
                $uPerms = json_decode($u['permissions'] ?? '["all"]', true);
                if (!is_array($uPerms)) $uPerms = ['all'];
                $isSuper = ($u['role'] ?? '') === 'super_admin' || in_array('all', $uPerms);
              ?>
              <tr class="hover:bg-cyan-500/5 transition">
                <td class="p-4 font-mono text-cyan-400 font-bold"><?= $u['id'] ?></td>
                <td class="p-4">
                  <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-tr from-cyan-900 to-blue-900 border border-cyan-500/30 flex items-center justify-center text-cyan-300 font-bold">
                      <?= mb_substr($u['full_name'] ?? 'م', 0, 1, 'UTF-8') ?>
                    </div>
                    <div>
                      <p class="font-black text-white"><?= htmlspecialchars($u['full_name'] ?? '') ?></p>
                      <p class="text-[10px] text-cyan-400 font-mono">@<?= htmlspecialchars($u['username'] ?? '') ?></p>
                    </div>
                  </div>
                </td>
                <td class="p-4 font-mono text-slate-300"><?= htmlspecialchars($u['email'] ?? '-') ?></td>
                <td class="p-4">
                  <span class="px-2.5 py-1 rounded-full text-[10px] font-bold <?= $isSuper ? 'bg-cyan-500/20 text-cyan-300 border border-cyan-500/40' : 'bg-blue-500/20 text-blue-300 border border-blue-500/40' ?>">
                    <?= $isSuper ? 'مدير عام (Super Admin)' : (($u['role'] === 'editor') ? 'محرر محتوى (Editor)' : 'موظف دعم (Support)') ?>
                  </span>
                </td>
                <td class="p-4">
                  <div class="flex flex-wrap gap-1 max-w-xs">
                    <?php if ($isSuper): ?>
                      <span class="px-2 py-0.5 rounded-lg bg-emerald-500/15 text-emerald-300 border border-emerald-500/30 text-[10px] font-bold">
                        <i class="fa-solid fa-check-double text-[9px]"></i> كامل الصلاحيات
                      </span>
                    <?php else: ?>
                      <?php foreach ($uPerms as $pKey): ?>
                        <?php if (isset($availablePermissions[$pKey])): ?>
                          <span class="px-1.5 py-0.5 rounded bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 text-[9px]">
                            <?= htmlspecialchars($availablePermissions[$pKey]['label']) ?>
                          </span>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </td>
                <td class="p-4">
                  <?php if ((int)($u['status'] ?? 1) === 1): ?>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/15 text-emerald-300 border border-emerald-500/30">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> مفعّل
                    </span>
                  <?php else: ?>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-500/15 text-rose-300 border border-rose-500/30">
                      <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span> معطّل
                    </span>
                  <?php endif; ?>
                </td>
                <td class="p-4 text-center">
                  <div class="flex items-center justify-center gap-2">
                    <button onclick='openEditUserModal(<?= json_encode($u, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>)' class="w-8 h-8 rounded-lg bg-cyan-500/10 border border-cyan-500/30 text-cyan-300 hover:bg-cyan-500/20 transition flex items-center justify-center" title="تعديل المستخدم">
                      <i class="fa-solid fa-pen-to-square text-xs"></i>
                    </button>
                    <?php if ((int)$u['id'] !== $currentAdminId): ?>
                      <form method="POST" action="?tab=users" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم نهائياً؟');" class="inline">
                        <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
                        <input type="hidden" name="action" value="delete_user">
                        <input type="hidden" name="target_id" value="<?= $u['id'] ?>">
                        <button type="submit" class="w-8 h-8 rounded-lg bg-rose-500/10 border border-rose-500/30 text-rose-300 hover:bg-rose-500/20 transition flex items-center justify-center" title="حذف المستخدم">
                          <i class="fa-solid fa-trash text-xs"></i>
                        </button>
                      </form>
                    <?php else: ?>
                      <span class="w-8 h-8 rounded-lg bg-slate-800/40 text-slate-500 flex items-center justify-center cursor-not-allowed text-[10px]" title="حسابك الحالي">
                        <i class="fa-solid fa-lock"></i>
                      </span>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  <?php endif; ?>
</div>

<!-- ================= MODAL: إضافة مستخدم جديد ================= -->
<div id="newUserModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md flex items-center justify-center p-4 overflow-y-auto">
  <div class="max-w-2xl w-full glass-panel rounded-3xl border border-cyan-500/40 p-6 sm:p-8 space-y-6 text-right max-h-[90vh] overflow-y-auto">
    <div class="flex items-center justify-between border-b border-cyan-500/20 pb-4">
      <h3 class="text-lg font-black text-white flex items-center gap-2">
        <i class="fa-solid fa-user-plus text-cyan-400"></i>
        <span>إضافة مستخدم جديد للوحة التحكم</span>
      </h3>
      <button onclick="closeNewUserModal()" class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-300 hover:bg-rose-500/30 flex items-center justify-center">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <form method="POST" action="?tab=users" class="space-y-5">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="action" value="create_user">

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">الاسم الكامل *</label>
          <input type="text" name="new_full_name" required placeholder="مثال: م. أحمد محمد" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs focus:border-cyan-400 focus:outline-none">
        </div>
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">اسم المستخدم (Username) *</label>
          <input type="text" name="new_username" required placeholder="مثال: ahmed_dev" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">البريد الإلكتروني</label>
          <input type="email" name="new_email" placeholder="name@domain.com" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none">
        </div>
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">كلمة المرور *</label>
          <input type="password" name="new_password" required placeholder="••••••••" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">الدور الإداري</label>
          <select name="new_role" id="newRoleSelect" onchange="handleRoleChange('new')" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs focus:border-cyan-400 focus:outline-none">
            <option value="super_admin">مدير عام (Super Admin - كامل الصلاحيات)</option>
            <option value="editor" selected>محرر محتوى (Editor - إدارة الأعمال والخدمات)</option>
            <option value="support">موظف دعم (Support - صندوق الرسائل فقط)</option>
            <option value="custom">مخصص (تحديد الصلاحيات يدوياً)</option>
          </select>
        </div>

        <div class="space-y-1.5 flex flex-col justify-end">
          <label class="flex items-center gap-2 cursor-pointer p-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30">
            <input type="checkbox" name="new_status" value="1" checked class="w-4 h-4 text-cyan-500 rounded bg-cyber-950 border-cyan-500/40 focus:ring-0">
            <span class="text-xs font-bold text-white">حساب نشط ومفعّل فوراً</span>
          </label>
        </div>
      </div>

      <!-- اختيار الصلاحيات الدقيقة -->
      <div class="space-y-2 pt-2 border-t border-cyan-500/20">
        <label class="text-xs font-bold text-cyan-400 block">الصلاحيات الممنوحة للشاشات:</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs" id="newPermissionsContainer">
          <?php foreach ($availablePermissions as $pKey => $pInfo): ?>
            <label class="flex items-start gap-2.5 p-2 rounded-xl bg-cyber-900/60 border border-cyan-500/15 cursor-pointer hover:border-cyan-500/40 transition">
              <input type="checkbox" name="new_permissions[]" value="<?= $pKey ?>" <?= in_array($pKey, ['all', 'projects', 'services']) ? 'checked' : '' ?> class="mt-0.5 w-4 h-4 text-cyan-500 rounded bg-cyber-950 border-cyan-500/40">
              <div>
                <p class="font-bold text-white"><?= $pInfo['label'] ?></p>
                <p class="text-[10px] text-slate-400"><?= $pInfo['desc'] ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="pt-4 flex items-center justify-end gap-3 border-t border-cyan-500/20">
        <button type="button" onclick="closeNewUserModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 text-slate-300 text-xs font-bold hover:bg-slate-700 transition">إلغاء</button>
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs font-black shadow-lg shadow-cyan-500/30">حفظ وإضافة المستخدم</button>
      </div>
    </form>
  </div>
</div>

<!-- ================= MODAL: تعديل مستخدم ================= -->
<div id="editUserModal" class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-md flex items-center justify-center p-4 overflow-y-auto">
  <div class="max-w-2xl w-full glass-panel rounded-3xl border border-cyan-500/40 p-6 sm:p-8 space-y-6 text-right max-h-[90vh] overflow-y-auto">
    <div class="flex items-center justify-between border-b border-cyan-500/20 pb-4">
      <h3 class="text-lg font-black text-white flex items-center gap-2">
        <i class="fa-solid fa-user-pen text-cyan-400"></i>
        <span>تعديل بيانات وصلاحيات المستخدم</span>
      </h3>
      <button onclick="closeEditUserModal()" class="w-8 h-8 rounded-lg bg-rose-500/20 text-rose-300 hover:bg-rose-500/30 flex items-center justify-center">
        <i class="fa-solid fa-xmark"></i>
      </button>
    </div>

    <form method="POST" action="?tab=users" class="space-y-5">
      <input type="hidden" name="csrf_token" value="<?= getCsrfToken() ?>">
      <input type="hidden" name="action" value="edit_user">
      <input type="hidden" name="target_id" id="editUserId">

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">الاسم الكامل *</label>
          <input type="text" name="edit_full_name" id="editFullName" required class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs focus:border-cyan-400 focus:outline-none">
        </div>
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">اسم المستخدم (Username) *</label>
          <input type="text" name="edit_username" id="editUsername" required class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">البريد الإلكتروني</label>
          <input type="email" name="edit_email" id="editEmail" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none">
        </div>
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">كلمة مرور جديدة (اختياري)</label>
          <input type="password" name="edit_password" placeholder="اتركها فارغة للإبقاء على الحالية" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs font-mono focus:border-cyan-400 focus:outline-none">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="space-y-1.5">
          <label class="text-xs font-bold text-slate-300">الدور الإداري</label>
          <select name="edit_role" id="editRoleSelect" class="w-full px-4 py-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30 text-white text-xs focus:border-cyan-400 focus:outline-none">
            <option value="super_admin">مدير عام (Super Admin)</option>
            <option value="editor">محرر محتوى (Editor)</option>
            <option value="support">موظف دعم (Support)</option>
            <option value="custom">مخصص (حسب الأذونات المحددة)</option>
          </select>
        </div>

        <div class="space-y-1.5 flex flex-col justify-end">
          <label class="flex items-center gap-2 cursor-pointer p-2.5 rounded-xl bg-cyber-900 border border-cyan-500/30">
            <input type="checkbox" name="edit_status" id="editStatus" value="1" class="w-4 h-4 text-cyan-500 rounded bg-cyber-950 border-cyan-500/40 focus:ring-0">
            <span class="text-xs font-bold text-white">حساب نشط ومفعّل</span>
          </label>
        </div>
      </div>

      <!-- الأذونات -->
      <div class="space-y-2 pt-2 border-t border-cyan-500/20">
        <label class="text-xs font-bold text-cyan-400 block">الصلاحيات الممنوحة للشاشات:</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs" id="editPermissionsContainer">
          <?php foreach ($availablePermissions as $pKey => $pInfo): ?>
            <label class="flex items-start gap-2.5 p-2 rounded-xl bg-cyber-900/60 border border-cyan-500/15 cursor-pointer hover:border-cyan-500/40 transition">
              <input type="checkbox" name="edit_permissions[]" value="<?= $pKey ?>" id="editPerm_<?= $pKey ?>" class="mt-0.5 w-4 h-4 text-cyan-500 rounded bg-cyber-950 border-cyan-500/40">
              <div>
                <p class="font-bold text-white"><?= $pInfo['label'] ?></p>
                <p class="text-[10px] text-slate-400"><?= $pInfo['desc'] ?></p>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="pt-4 flex items-center justify-end gap-3 border-t border-cyan-500/20">
        <button type="button" onclick="closeEditUserModal()" class="px-5 py-2.5 rounded-xl bg-slate-800 text-slate-300 text-xs font-bold hover:bg-slate-700 transition">إلغاء</button>
        <button type="submit" class="px-6 py-2.5 rounded-xl btn-cyber text-xs font-black shadow-lg shadow-cyan-500/30">حفظ التغييرات</button>
      </div>
    </form>
  </div>
</div>

<script>
function openNewUserModal() {
  document.getElementById('newUserModal').classList.remove('hidden');
}
function closeNewUserModal() {
  document.getElementById('newUserModal').classList.add('hidden');
}
function openEditUserModal(user) {
  document.getElementById('editUserId').value = user.id;
  document.getElementById('editFullName').value = user.full_name || '';
  document.getElementById('editUsername').value = user.username || '';
  document.getElementById('editEmail').value = user.email || '';
  document.getElementById('editRoleSelect').value = user.role || 'editor';
  document.getElementById('editStatus').checked = (parseInt(user.status) === 1);

  // Parse permissions
  let perms = [];
  try {
    perms = typeof user.permissions === 'string' ? JSON.parse(user.permissions) : (user.permissions || []);
  } catch (e) {
    perms = ['all'];
  }

  const allPermKeys = ['all', 'messages', 'projects', 'services', 'gallery', 'team', 'faqs', 'settings', 'users'];
  allPermKeys.forEach(k => {
    const el = document.getElementById('editPerm_' + k);
    if (el) {
      el.checked = perms.includes('all') || perms.includes(k);
    }
  });

  document.getElementById('editUserModal').classList.remove('hidden');
}
function closeEditUserModal() {
  document.getElementById('editUserModal').classList.add('hidden');
}
</script>

<?php require_once __DIR__ . '/layout.php'; ?>
