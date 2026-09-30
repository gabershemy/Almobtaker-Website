<?php
require_once __DIR__ . '/auth.php';

$auth = getAuthService();
$error = '';

if ($auth->isAuthenticated()) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!empty($username) && !empty($password)) {
        if ($auth->login($username, $password)) {
            header('Location: dashboard.php');
            exit;
        } else {
            $error = 'اسم المستخدم أو كلمة المرور غير صحيحة، أو تم تجاوز عدد المحاولات المسموح بها.';
        }
    } else {
        $error = 'يرجى إدخال اسم المستخدم وكلمة المرور';
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>لوحة التحكم | تسجيل الدخول</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Cairo', sans-serif; background-color: #030712; }
    .glass-card { background: rgba(11, 22, 44, 0.85); backdrop-filter: blur(16px); border: 1px solid rgba(0, 240, 255, 0.2); }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 text-slate-100">
  <div class="glass-card rounded-3xl p-8 max-w-md w-full shadow-2xl space-y-6 text-right">
    <div class="text-center space-y-2">
      <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 mx-auto flex items-center justify-center text-cyan-400 text-2xl shadow-lg shadow-cyan-500/20">
        <i class="fa-solid fa-shield-halved"></i>
      </div>
      <h2 class="text-2xl font-black text-white">لوحة تحكم الموقع</h2>
      <p class="text-xs text-slate-400">شركة المبتكر العربي للبرمجيات</p>
    </div>

    <?php if ($error): ?>
      <div class="p-3 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 text-xs font-bold text-center">
        <i class="fa-solid fa-circle-exclamation ml-1"></i> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1.5">اسم المستخدم</label>
        <div class="relative">
          <input type="text" name="username" required value="admin" class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-white focus:border-cyan-400 outline-none pl-10" placeholder="admin">
          <i class="fa-solid fa-user absolute left-3.5 top-3.5 text-slate-500 text-sm"></i>
        </div>
      </div>

      <div>
        <label class="block text-xs font-bold text-slate-300 mb-1.5">كلمة المرور</label>
        <div class="relative">
          <input type="password" name="password" required class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-3 text-sm text-white focus:border-cyan-400 outline-none pl-10" placeholder="••••••••">
          <i class="fa-solid fa-key absolute left-3.5 top-3.5 text-slate-500 text-sm"></i>
        </div>
      </div>

      <button type="submit" class="w-full py-3.5 rounded-xl bg-gradient-to-r from-cyan-400 to-blue-600 text-slate-950 font-black text-sm hover:opacity-95 transition shadow-lg shadow-cyan-500/25">
        دخول لوحة التحكم
      </button>
    </form>

    <div class="pt-4 border-t border-cyan-500/10 text-center">
      <a href="../index.php" class="text-xs text-cyan-400 hover:underline">
        <i class="fa-solid fa-arrow-right ml-1"></i> العودة للموقع الرئيسي
      </a>
    </div>
  </div>
</body>
</html>
