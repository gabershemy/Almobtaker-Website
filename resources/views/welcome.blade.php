<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($siteTitle) ?></title>

  <!-- Google Search Console Verification -->
  <meta name="google-site-verification" content="Bs-4lJ8yW_Pvtr_vw18c_NeiO6CSSwNODn4MzVrRdOw" />

  <!-- SEO & Canonical Tags -->
  <link rel="canonical" href="<?= $siteUrl ?>/" />
  <meta name="description" content="المبتكر العربي للبرمجيات والحلول الذكية: شريكك لتطوير أنظمة ERP السحابية المتوافقة مع هيئة الزكاة ZATCA، بوتات الواتساب التفاعلية بالذكاء الاصطناعي، وتطوير التطبيقات والمواقع في السعودية ومصر والخليج." />
  <meta name="keywords" content="المبتكر العربي, شركة برمجيات, نظام ERP سحابي, ZATCA الفوترة الإلكترونية, شات بوت واتساب ذكاء اصطناعي, برمجة تطبيقات جوال, تصميم مواقع شركات, برنامج محاسبة سحابي, حلول ذكاء اصطناعي للأعمال, برمجيات دمنهور, برمجيات الرياض" />
  <meta name="author" content="المبتكر العربي للبرمجيات" />

  <!-- وسوم الاستهداف الإقليمي والجغرافي (Local & Regional SEO) -->
  <meta name="geo.region" content="SA;EG" />
  <meta name="geo.placename" content="Saudi Arabia, Egypt, Damanhour, Riyadh, Cairo" />
  <link rel="alternate" hreflang="ar-SA" href="<?= $siteUrl ?>/" />
  <link rel="alternate" hreflang="ar-EG" href="<?= $siteUrl ?>/" />
  <link rel="alternate" hreflang="ar" href="<?= $siteUrl ?>/" />
  <link rel="alternate" hreflang="x-default" href="<?= $siteUrl ?>/" />

  <!-- أوامر عناكب البحث Googlebot -->
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
  <meta name="googlebot" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?= $siteUrl ?>/" />
  <meta property="og:site_name" content="المبتكر العربي للبرمجيات" />
  <meta property="og:title" content="<?= htmlspecialchars($siteTitle) ?>" />
  <meta property="og:description" content="تطوير الأنظمة السحابية ERP، حلول الذكاء الاصطناعي، الفوترة الإلكترونية ZATCA، وتطبيقات الويب والموبايل للشركات في مصر والسعودية." />
  <meta property="og:image" content="<?= $siteUrl ?>/logo.jpg" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="630" />
  <meta property="og:locale" content="ar_AR" />

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?= htmlspecialchars($siteTitle) ?>" />
  <meta name="twitter:description" content="شريكك التكنولوجي لتطوير أنظمة ERP، حلول الذكاء الاصطناعي، والفوترة الإلكترونية ZATCA في مصر والسعودية." />
  <meta name="twitter:image" content="<?= $siteUrl ?>/logo.jpg" />

  <!-- Structured Data (Schema.org JSON-LD) -->
  <script type="application/ld+json">
  <?= $schemaJsonLd ?>
  </script>

  <meta name="theme-color" content="#08172c" />
  <link rel="icon" type="image/jpeg" href="./logo.jpg" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          fontFamily: {
            cairo: ["Cairo", "sans-serif"],
            sans: ["Cairo", "Plus Jakarta Sans", "sans-serif"],
          },
          colors: {
            cyan: { 350: "#00f0ff", 450: "#00d0f5" },
            cyber: { 950: '#071527', 900: '#0c223f', 850: '#102c52', 800: '#163c6d', 700: '#1e4e8c', 500: '#00f0ff', 400: '#38bdf8' }
          }
        }
      }
    };
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
    html, body { max-width: 100%; overflow-x: hidden !important; width: 100%; }
    body { font-family: 'Cairo', sans-serif; background-color: #08172c; color: #f0f9ff; transition: background-color 0.3s, color 0.3s; position: relative; }
    .circuit-bg { background: radial-gradient(circle at 50% 0%, #153660 0%, #0d2342 35%, #08172c 70%, #061122 100%); min-height: 100vh; }
    .glass-card { background: rgba(12, 34, 63, 0.75); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(56, 189, 248, 0.3); box-shadow: 0 12px 35px -8px rgba(0, 160, 255, 0.18), inset 0 1px 1px rgba(255, 255, 255, 0.1); }
    .glass-card-hover:hover { border-color: rgba(0, 240, 255, 0.55); transform: translateY(-4px); box-shadow: 0 20px 40px -12px rgba(0, 240, 255, 0.3); }
    .glass-nav { background: rgba(10, 26, 49, 0.92); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border-bottom: 1px solid rgba(56, 189, 248, 0.25); box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25); }
    .neon-border { border: 1px solid rgba(0, 240, 255, 0.35); box-shadow: inset 0 0 15px rgba(0, 240, 255, 0.15), 0 0 20px rgba(0, 240, 255, 0.2); }
    .gradient-cyan-text { background: linear-gradient(135deg, #ffffff 0%, #38bdf8 40%, #00f0ff 70%, #60a5fa 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .btn-cyber-primary { background: linear-gradient(135deg, #0077ff 0%, #00c0f0 50%, #00f0ff 100%); box-shadow: 0 0 25px rgba(0, 190, 255, 0.5); transition: all 0.25s ease; color: #030a16 !important; font-weight: 900; }
    .btn-cyber-primary:hover { filter: brightness(1.15); box-shadow: 0 0 35px rgba(0, 240, 255, 0.7); transform: translateY(-2px); }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #08172c; }
    ::-webkit-scrollbar-thumb { background: #163c6d; border-radius: 9999px; border: 1px solid rgba(0, 240, 255, 0.2); }
    ::-webkit-scrollbar-thumb:hover { background: #00f0ff; }
    @keyframes pulse-green {
      0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.6), 0 10px 25px -5px rgba(34, 197, 94, 0.5); }
      50% { box-shadow: 0 0 0 14px rgba(34, 197, 94, 0), 0 15px 30px -5px rgba(34, 197, 94, 0.7); }
    }
    .floating-whatsapp {
      animation: pulse-green 2.5s infinite;
    }
    @keyframes pulse-cyan {
      0%, 100% { box-shadow: 0 0 0 0 rgba(6, 182, 212, 0.6), 0 10px 25px -5px rgba(6, 182, 212, 0.5); }
      50% { box-shadow: 0 0 0 14px rgba(6, 182, 212, 0), 0 15px 30px -5px rgba(6, 182, 212, 0.7); }
    }
    .floating-scroll-top {
      animation: pulse-cyan 2.5s infinite;
    }
  </style>
</head>
<body class="selection:bg-cyan-500 selection:text-slate-950 relative circuit-bg w-full max-w-full overflow-x-hidden">
  <div class="fixed inset-0 pointer-events-none overflow-hidden z-0 w-full max-w-full">
    <div class="absolute -top-40 right-1/4 w-[300px] sm:w-[500px] h-[300px] sm:h-[500px] bg-cyan-400/20 rounded-full blur-3xl"></div>
    <div class="absolute top-1/3 left-10 w-[300px] sm:w-[450px] h-[300px] sm:h-[450px] bg-blue-500/20 rounded-full blur-3xl"></div>
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#00f0ff08_1px,transparent_1px),linear-gradient(to_bottom,#00f0ff08_1px,transparent_1px)] bg-[size:3.5rem_3.5rem]"></div>
  </div>

  <!-- STICKY TOP NAVIGATION WRAPPER (Top Bar + Main Header Fixed on Scroll) -->
  <div class="sticky top-0 z-50 w-full shadow-lg shadow-black/40">
    <!-- 1. TOP BAR -->
    <div class="top-bar-bg bg-[#08172c]/95 border-b border-cyan-500/20 text-xs py-1.5 sm:py-2 px-3 sm:px-8 text-cyan-200 w-full backdrop-blur-md">
      <div class="max-w-[1440px] mx-auto flex items-center justify-between gap-2 sm:gap-4">
        <div class="flex items-center gap-2 sm:gap-4 text-xs font-semibold">
          <a href="tel:<?= htmlspecialchars($phone) ?>" class="hover:text-cyan-400 transition flex items-center gap-1.5 font-mono dir-ltr whitespace-nowrap text-[11px] sm:text-xs">
            <i class="fa-solid fa-phone text-cyan-400 text-[10px] sm:text-[11px]"></i><span><?= htmlspecialchars($phone) ?></span>
          </a>
          <span class="text-cyan-500/40 hidden md:inline">|</span>
          <a href="mailto:<?= htmlspecialchars($email) ?>" class="hover:text-cyan-400 transition hidden md:flex items-center gap-1.5 font-mono whitespace-nowrap text-xs">
            <i class="fa-solid fa-envelope text-cyan-400 text-[11px]"></i><span><?= htmlspecialchars($email) ?></span>
          </a>
          <span class="text-cyan-500/40 hidden sm:inline">|</span>
          <a href="<?= htmlspecialchars($facebook) ?>" target="_blank" rel="noopener" class="hover:text-cyan-300 transition flex items-center gap-1.5 text-[11px] sm:text-xs text-cyan-300 font-bold whitespace-nowrap">
            <i class="fa-brands fa-facebook text-cyan-400 text-xs sm:text-sm"></i>
            <span>فيسبوك</span>
          </a>
        </div>
        <div class="flex items-center gap-2 sm:gap-3 text-xs shrink-0">
          <button onclick="toggleSearchModal()" class="hover:text-cyan-400 transition flex items-center gap-1.5 font-bold whitespace-nowrap text-[10px] sm:text-xs px-2.5 sm:px-3 py-1 rounded-lg bg-cyan-500/10 border border-cyan-500/30 text-cyan-300">
            <i class="fa-solid fa-magnifying-glass text-cyan-400 text-[10px] sm:text-xs"></i><span>بحث</span>
          </button>
        </div>
      </div>
    </div>

    <!-- 2. MAIN HEADER (Fully Mobile & Desktop Responsive) -->
    <header class="w-full glass-nav transition-all duration-300">
      <div class="max-w-[1440px] mx-auto px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-14 sm:h-20 gap-2 sm:gap-3">
          
          <!-- Logo & Brand (Right) -->
          <a href="#" class="flex items-center gap-2 sm:gap-3 group shrink-0 min-w-0">
            <div class="relative w-8 h-8 sm:w-11 sm:h-11 rounded-xl sm:rounded-2xl p-0.5 neon-border group-hover:scale-105 transition-transform duration-300 overflow-hidden bg-cyber-900 flex items-center justify-center shadow-lg shadow-cyan-500/20 shrink-0">
              <img src="./logo.jpg" alt="المبتكر العربي للبرمجيات" class="w-7 h-7 sm:w-10 sm:h-10 rounded-lg sm:rounded-[14px] object-cover" onerror="this.style.display='none'" />
            </div>
            <div class="min-w-0">
              <span class="text-xs sm:text-base lg:text-lg font-black tracking-tight text-white truncate block">المبتكر العربي للبرمجيات</span>
              <p class="text-[9px] sm:text-[10px] text-cyan-300/80 font-mono tracking-wider truncate hidden xs:block">Almobtaker Alaraby Software & AI</p>
            </div>
          </a>

          <!-- Desktop Nav Links (Hidden on mobile, centered on desktop) -->
          <nav class="hidden lg:flex flex-1 items-center justify-center gap-5 xl:gap-7 text-xs xl:text-sm font-bold text-slate-200 py-2">
            <a href="#home" class="hover:text-cyan-300 text-white font-black transition-colors whitespace-nowrap py-1">الرئيسية</a>
            <a href="#gallery" class="hover:text-cyan-300 transition-colors flex items-center gap-1.5 whitespace-nowrap py-1">
              <i class="fa-solid fa-images text-xs text-cyan-400"></i><span>معرض الصور</span>
            </a>
            <a href="#about" class="hover:text-cyan-300 transition-colors whitespace-nowrap py-1">من نحن</a>
            <a href="#services" class="hover:text-cyan-300 transition-colors whitespace-nowrap py-1">خدماتنا</a>
            <a href="#portfolio" class="hover:text-cyan-300 transition-colors flex items-center gap-1.5 text-cyan-300 font-black whitespace-nowrap py-1">
              <i class="fa-solid fa-layer-group text-xs text-cyan-400"></i><span>سابقة الأعمال</span>
            </a>
            <a href="#team" class="hover:text-cyan-300 transition-colors flex items-center gap-1.5 whitespace-nowrap py-1">
              <i class="fa-solid fa-user-group text-xs text-cyan-400"></i><span>فريق العمل</span>
            </a>
            <a href="#faq" class="hover:text-cyan-300 transition-colors whitespace-nowrap py-1">الأسئلة الشائعة</a>
            <a href="#contact" class="hover:text-cyan-300 transition-colors flex items-center gap-1.5 text-cyan-400 font-bold whitespace-nowrap py-1">
              <i class="fa-solid fa-phone text-xs"></i><span>اتصل بنا</span>
            </a>
          </nav>

          <!-- Mobile Controls (Hamburger + Quick WhatsApp) -->
          <div class="flex lg:hidden items-center gap-2">
            <a href="https://wa.me/201013688446" target="_blank" rel="noopener" class="w-9 h-9 rounded-xl bg-green-500/20 border border-green-500/40 flex items-center justify-center text-green-400 text-base shadow-sm">
              <i class="fa-brands fa-whatsapp"></i>
            </a>
            <button onclick="toggleMobileDrawer()" class="w-10 h-10 rounded-xl bg-cyan-500/15 border border-cyan-500/40 text-cyan-300 hover:bg-cyan-500/25 flex items-center justify-center text-lg transition-transform active:scale-95 shadow-md shadow-cyan-500/10">
              <i class="fa-solid fa-bars-staggered"></i>
            </button>
          </div>

        </div>
      </div>
    </header>
  </div>

  <!-- Mobile Drawer Overlay & Sidebar Menu -->
  <div id="mobileDrawer" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div onclick="toggleMobileDrawer()" class="absolute inset-0 bg-black/80 backdrop-blur-md transition-opacity"></div>
    
    <!-- Drawer Content -->
    <div class="absolute top-0 right-0 bottom-0 w-4/5 max-w-sm bg-[#08172c] border-l border-cyan-500/30 p-6 flex flex-col justify-between overflow-y-auto shadow-2xl z-10 text-right">
      
      <!-- Top Section -->
      <div class="space-y-6">
        <div class="flex items-center justify-between border-b border-cyan-500/20 pb-4">
          <div class="flex items-center gap-2.5">
            <div class="w-9 h-9 rounded-xl neon-border overflow-hidden bg-cyber-900 flex items-center justify-center">
              <img src="./logo.jpg" alt="Logo" class="w-8 h-8 rounded-lg object-cover" />
            </div>
            <div>
              <p class="font-black text-sm text-white leading-tight">المبتكر العربي</p>
              <p class="text-[9px] text-cyan-400 font-mono">للبرمجيات والـ AI</p>
            </div>
          </div>
          <button onclick="toggleMobileDrawer()" class="w-8 h-8 rounded-xl bg-rose-500/20 border border-rose-500/40 text-rose-300 flex items-center justify-center text-sm">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

        <!-- Links List -->
        <nav class="space-y-1.5 text-sm font-bold">
          <a href="#home" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-house text-cyan-400 w-5 text-center"></i><span>الرئيسية</span>
          </a>
          <a href="#gallery" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-images text-cyan-400 w-5 text-center"></i><span>معرض الصور والأنظمة</span>
          </a>
          <a href="#about" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-circle-info text-cyan-400 w-5 text-center"></i><span>من نحن</span>
          </a>
          <a href="#services" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-wand-magic-sparkles text-cyan-400 w-5 text-center"></i><span>خدماتنا التقنية</span>
          </a>
          <a href="#portfolio" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-cyan-300 bg-cyan-500/10 border border-cyan-500/30 transition">
            <i class="fa-solid fa-layer-group text-cyan-400 w-5 text-center"></i><span>سابقة الأعمال (<?= count($dbProjects) ?> مشروع)</span>
          </a>
          <a href="#team" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-user-group text-cyan-400 w-5 text-center"></i><span>فريق العمل</span>
          </a>
          <a href="#faq" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-circle-question text-cyan-400 w-5 text-center"></i><span>الأسئلة الشائعة</span>
          </a>
          <a href="#contact" onclick="toggleMobileDrawer()" class="flex items-center gap-3 p-3 rounded-2xl text-slate-200 hover:bg-cyan-500/15 hover:text-cyan-300 transition">
            <i class="fa-solid fa-phone text-cyan-400 w-5 text-center"></i><span>اتصل بنا</span>
          </a>
        </nav>
      </div>

      <!-- Bottom Contacts -->
      <div class="pt-6 border-t border-cyan-500/20 space-y-3">
        <a href="https://wa.me/201013688446" target="_blank" rel="noopener" class="w-full py-3 rounded-2xl bg-green-500 hover:bg-green-400 text-white font-black text-xs flex items-center justify-center gap-2 shadow-lg shadow-green-500/30 transition">
          <i class="fa-brands fa-whatsapp text-base"></i><span>محادثة واتساب فورية</span>
        </a>
        <div class="text-center text-[10px] text-slate-400 font-mono">
          <span><?= htmlspecialchars($phone) ?></span>
        </div>
      </div>

    </div>
  </div>



  

  

  

  <!-- SEARCH MODAL -->
  <div id="searchModal" class="fixed inset-0 bg-black/80 backdrop-blur-md z-50 hidden flex items-center justify-center p-4">
    <div class="bg-[#0c223f] border border-cyan-500/40 rounded-3xl p-6 max-w-2xl w-full space-y-4 shadow-2xl">
      <div class="flex items-center justify-between border-b border-cyan-500/20 pb-3">
        <h3 class="text-base font-bold text-white flex items-center gap-2"><i class="fa-solid fa-magnifying-glass text-cyan-400"></i><span>البحث السريع في أنظمة ومشاريع المبتكر العربي</span></h3>
        <button onclick="toggleSearchModal()" class="text-slate-400 hover:text-white text-lg font-bold">&times;</button>
      </div>
      <input type="text" id="globalModalSearch" onkeyup="modalLiveSearch()" placeholder="اكتب اسم المشروع، القطاع، أو التقنية (مثال: صيدليات، زاتكا، واتساب، تقسيط)..." class="w-full bg-[#07172b] border border-cyan-500/30 rounded-2xl px-4 py-3.5 text-sm text-white placeholder:text-slate-500 outline-none focus:border-cyan-400" />
      <div id="modalSearchResults" class="max-h-72 overflow-y-auto space-y-2 text-xs">
        <p class="text-slate-400 text-center py-4">اكتب للبدء في البحث الفوري...</p>
      </div>
    </div>
  </div>

  <main class="relative z-10">

    <!-- قسم الرئيسية (HOME) -->
    <section id="home" class="pt-10 pb-10 overflow-hidden border-b border-cyan-500/20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">

          <!-- النص الرئيسي -->
          <div class="lg:col-span-7 space-y-6 text-right">
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white leading-[1.3] tracking-tight">
              شركة <span class="gradient-cyan-text">المبتكر العربي</span><br class="hidden sm:inline" /> للبرمجيات
            </h1>

            <p class="text-base sm:text-lg text-slate-300 leading-relaxed">
              نحن شركة المبتكر العربي للبرمجيات، متخصصة في تطوير الحلول التقنية المتقدمة، نقدم خدمات متكاملة تشمل برمجة تطبيقات الويب وسطح المكتب، تصميم الواجهات المتجاوبة، الأمن السيبراني، والدعم الفني المستمر. من أبرز خدماتنا تنفيذ وتخصيص نظام Odoo ERP، أحد أقوى أنظمة تخطيط موارد المؤسسات عالميًا، بفضل مرونته وسهولة استخدامه وتكامله الشامل. نهدف إلى تقديم حلول ذكية وقابلة للتوسع تساعد عملاءنا على رفع الكفاءة التشغيلية، خفض التكاليف، واتخاذ قرارات دقيقة مبنية على البيانات.
            </p>

            <p class="text-sm text-slate-400 leading-relaxed">
              تأسست شركة المبتكر العربي للبرمجيات عام 2006، وتُعد من الشركات الرائدة في العالم العربي في مجال تطوير البرمجيات والحلول التقنية. نقدم خدمات متكاملة تشمل: تصميم وتطوير مواقع الويب، تطبيقات الموبايل، الأنظمة الإدارية، الذكاء الاصطناعي، وتحليل البيانات، مع التزام تام بأعلى معايير الأمان والجودة.
            </p>

            <div class="p-4 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 text-right space-y-1">
              <h3 class="text-sm font-bold text-cyan-300 flex items-center gap-2">
                <i class="fa-solid fa-cubes text-cyan-400"></i> خبراتنا مع Odoo :
              </h3>
              <p class="text-xs text-slate-300 leading-relaxed">
                نُعد شريكًا معتمدًا في تنفيذ وتخصيص نظام Odoo ERP، ونوفر حلولاً مخصصة لقطاعات المقاولات، التصنيع، الخدمات، والتعليم. نغطي عبر Odoo جميع الوظائف التشغيلية مثل: المحاسبة، المشتريات، المخازن، المشاريع، الموارد البشرية، CRM، نقاط البيع، والفوترة.
              </p>
            </div>

            
          </div>

          <!-- الصورة / البطاقة -->
          <div class="lg:col-span-5 relative">
            <div class="glass-card rounded-3xl p-5 shadow-2xl border border-cyan-500/30 space-y-4">
              <div class="rounded-2xl overflow-hidden border border-cyan-500/40 p-1 bg-cyber-900 group">
                <img src="./logo.jpg" alt="المبتكر العربي للبرمجيات" class="w-full h-72 object-cover rounded-xl group-hover:scale-105 transition-transform duration-500" />
              </div>
              <div class="p-4 rounded-2xl bg-[#08172c] border border-cyan-500/20 space-y-2 text-right">
                <div class="flex items-center justify-between text-cyan-300 font-bold text-xs">
                  <span>المبتكر العربي للبرمجيات</span>
                  <span class="px-2 py-0.5 rounded-lg bg-cyan-500/20 border border-cyan-400/30 text-[10px]">منذ 2006</span>
                </div>
                <div class="space-y-1 text-[11px] pt-1">
                  <div class="flex items-center gap-2 text-slate-300">
                    <i class="fa-solid fa-phone text-cyan-400 text-[10px]"></i>
                    <span class="font-mono text-cyan-300"><?= htmlspecialchars($phone) ?></span>
                  </div>
                  <div class="flex items-center gap-2 text-slate-300">
                    <i class="fa-solid fa-envelope text-cyan-400 text-[10px]"></i>
                    <span class="font-mono text-cyan-300"><?= htmlspecialchars($email) ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

<!-- قسم معرض الصور والأنظمة (GALLERY) -->
    <!-- قسم معرض الصور والأنظمة (GALLERY - مهيأ لإضافة صوركم الخاصة) -->
    <section id="gallery" class="py-12 border-b border-cyan-500/20 relative overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- العنوان -->
        <div class="text-center space-y-3">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/90 text-cyan-300 border border-cyan-500/40 text-xs font-bold shadow-md shadow-cyan-500/10">
            <i class="fa-solid fa-images text-cyan-400"></i> معرض صور وواجهات الأنظمة
          </div>
          <h2 class="text-3xl sm:text-4xl font-black text-white">معرض الشاشات والواجهات الحية</h2>
          <p class="text-xs sm:text-sm text-cyan-200/80 max-w-2xl mx-auto">
            مساحة مخصصة لمعرض صور ولقطات الأنظمة التفاعلية والتطبيقات الحصرية الخاصة بشركة المبتكر العربي
          </p>
        </div>

        <!-- فلاتر المعرض (تظهر عند إضافة الصور) -->
        <div id="galleryFiltersContainer" class="hidden flex items-center justify-center gap-2 flex-wrap text-xs">
          <button onclick="filterGallery('all')" id="gFilter-all" class="g-filter-btn px-4 py-2 rounded-xl font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-400/50 shadow-sm shadow-cyan-500/20 transition">🌟 الكل</button>
          <button onclick="filterGallery('erp')" id="gFilter-erp" class="g-filter-btn px-4 py-2 rounded-xl font-bold border border-cyan-500/20 text-slate-300 hover:border-cyan-500/40 hover:text-cyan-300 transition">📊 لوحات ERP</button>
          <button onclick="filterGallery('medical')" id="gFilter-medical" class="g-filter-btn px-4 py-2 rounded-xl font-bold border border-cyan-500/20 text-slate-300 hover:border-cyan-500/40 hover:text-cyan-300 transition">🏥 طبي ومستشفيات</button>
          <button onclick="filterGallery('industrial')" id="gFilter-industrial" class="g-filter-btn px-4 py-2 rounded-xl font-bold border border-cyan-500/20 text-slate-300 hover:border-cyan-500/40 hover:text-cyan-300 transition">⚙️ صناعي وزراعي</button>
          <button onclick="filterGallery('ai')" id="gFilter-ai" class="g-filter-btn px-4 py-2 rounded-xl font-bold border border-cyan-500/20 text-slate-300 hover:border-cyan-500/40 hover:text-cyan-300 transition">🤖 ذكاء اصطناعي وواتساب</button>
          <button onclick="filterGallery('pos')" id="gFilter-pos" class="g-filter-btn px-4 py-2 rounded-xl font-bold border border-cyan-500/20 text-slate-300 hover:border-cyan-500/40 hover:text-cyan-300 transition">💳 كاشير وفوترة ZATCA</button>
        </div>

        <!-- شبكة معرض الصور -->
        <div id="galleryGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

        <!-- كرت فارغ أنيق عند عدم وجود صور بعد -->
        <div id="galleryPlaceholder" class="glass-card rounded-3xl p-8 sm:p-12 text-center border border-cyan-500/30 space-y-4 max-w-3xl mx-auto shadow-2xl">
          <div class="w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-3xl mx-auto shadow-lg shadow-cyan-500/20">
            <i class="fa-solid fa-images"></i>
          </div>
          <div class="space-y-2">
            <h3 class="text-xl sm:text-2xl font-black text-white">معرض الشاشات والصور الحصرية</h3>
            <p class="text-xs sm:text-sm text-slate-300 max-w-xl mx-auto leading-relaxed">
              هذه المساحة مجهزة خصيصاً لإضافة صور ولقطات الأنظمة الخاصة بكم. يمكنك إضافة وتعديل الصور فوراً من لوحة التحكم لتظهر هنا مباشرة مع ميزة التكبير.
            </p>
          </div>
          
        </div>

      </div>
    </section>





    

    
    
    <!-- نافذة الشرح التفصيلي للمشروع وشاشاته Modal -->
    <!-- قسم من نحن (ABOUT) -->
    <section id="about" class="py-10 relative border-b border-cyan-500/20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

        <!-- العنوان -->
        <div class="text-center space-y-3">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/80 text-cyan-300 border border-cyan-500/30 text-xs font-bold">
            <i class="fa-solid fa-building text-cyan-400"></i> من نحن
          </div>
          <h2 class="text-3xl sm:text-4xl font-black text-white">شركة المبتكر العربي للبرمجيات</h2>
        </div>

        <!-- الفقرات -->
        <div class="max-w-4xl mx-auto space-y-6 text-right">

          <p class="text-base text-slate-300 leading-loose">
            تأسست شركة المبتكر العربي للبرمجيات عام 2005، وهي شركة متخصصة في تطوير البرمجيات والحلول التقنية المتكاملة التي تلبي احتياجات الشركات والمؤسسات في مختلف القطاعات. منذ انطلاقتها، وضعت الشركة الابتكار والجودة كأولوية، مما مكّنها من تقديم برامج وحلول تقنية متطورة تعتمد على أحدث التقنيات لضمان الأداء العالي والكفاءة الفائقة.
          </p>

          <p class="text-base text-slate-300 leading-loose">
            تضم الشركة فريق عمل متخصصًا من المهندسين والمطورين والخبراء التقنيين الذين يمتلكون خبرات واسعة في بناء وتطوير الأنظمة والتطبيقات، إلى جانب تقديم خدمات الدعم الفني والاستشارات التقنية. كما تحرص على تطبيق أفضل الممارسات والمعايير العالمية في تطوير البرمجيات لضمان أمان واستقرار الحلول المقدمة لعملائها.
          </p>

          <p class="text-base text-slate-300 leading-loose">
            بفضل خبرتها التي تمتد لسنوات في السوق، نجحت شركة المبتكر العربي للبرمجيات في بناء علاقات قوية وشراكات ناجحة مع العديد من العملاء في مختلف المجالات، وتواصل مسيرتها نحو الريادة من خلال الابتكار المستمر ومواكبة أحدث التطورات التقنية في عالم البرمجيات والتحول الرقمي.
          </p>

        </div>

      </div>
    </section>

    
    
    
    <!-- قسم خدماتنا التقنية (SERVICES - سلايدر تفاعلي ذكي واحترافي) -->
    <section id="services" class="py-16 border-t border-cyan-500/20 relative overflow-hidden bg-gradient-to-b from-[#08172c] via-[#071324] to-[#08172c]">
      
      <div class="absolute top-10 right-10 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute bottom-10 left-10 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10 relative z-10">

        <!-- Header -->
        <div class="text-center space-y-3 max-w-3xl mx-auto">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/80 text-cyan-300 border border-cyan-500/40 text-xs font-bold shadow-lg shadow-cyan-500/10">
            <i class="fa-solid fa-wand-magic-sparkles text-cyan-400"></i>
            <span>حلول برمجية متكاملة لنمو أعمالك</span>
          </div>
          <h2 class="text-3xl sm:text-5xl font-black text-white leading-tight">
            خدماتنا <span class="gradient-cyan-text">التقنية والهندسية</span>
          </h2>
          <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
            نقدم باقة متكاملة من الحلول البرمجية السحابية وتطبيقات الهواتف والذكاء الاصطناعي لتطوير أعمالك
          </p>
        </div>

        <!-- أزرار التصنيفات والعداد -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-2">
          <!-- فلاتر سريعة للخدمات -->
          <div class="flex items-center gap-2 overflow-x-auto max-w-full pb-2 sm:pb-0 scrollbar-none w-full sm:w-auto" id="servicesFilterButtons">
            <button type="button" onclick="filterServicesSlider('all')" id="srv-pill-all" class="srv-pill active px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 shadow-md shadow-cyan-500/20 whitespace-nowrap transition-all duration-200 cursor-pointer">جميع الخدمات</button>
            <button type="button" onclick="filterServicesSlider('erp')" id="srv-pill-erp" class="srv-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">أنظمة ERP وسحابية</button>
            <button type="button" onclick="filterServicesSlider('ai')" id="srv-pill-ai" class="srv-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">ذكاء اصطناعي وتطبيقات</button>
            <button type="button" onclick="filterServicesSlider('zatca')" id="srv-pill-zatca" class="srv-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">كاشير وZATCA</button>
            <button type="button" onclick="filterServicesSlider('edtech')" id="srv-pill-edtech" class="srv-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">تصميم UI/UX</button>
          </div>

          <!-- شارة العداد اللحظي -->
          <div class="flex items-center gap-3 self-end sm:self-auto">
            <span id="servicesCounterBadge" class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 whitespace-nowrap shadow-inner shadow-cyan-950">
              معروض 1 - 2
            </span>
            <button type="button" onclick="openViewAllModal('services')" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/20 hover:bg-cyan-500/35 text-cyan-300 font-bold text-xs border border-cyan-400/50 flex items-center gap-1.5 transition-all duration-300 shadow-md shadow-cyan-500/20 hover:scale-105 active:scale-95 cursor-pointer whitespace-nowrap">
              <i class="fa-solid fa-shapes text-cyan-400"></i>
              <span>عرض كل الخدمات (8)</span>
              <i class="fa-solid fa-arrow-left text-[10px]"></i>
            </button>
          </div>
        </div>

        <!-- حاوية سلايدر الخدمات مع أزرار التنقل الجانبية الاحترافية -->
        <div class="relative px-2 sm:px-14 group/srv-slider" id="servicesSliderContainer">

          <!-- زر التنقل الأيمن (السابق) -->
          <button type="button" id="srvSliderBtnPrev" onclick="servicesSliderPrev()" 
                  aria-label="الخدمات السابقة" 
                  title="الخدمات السابقة"
                  class="absolute -right-2 sm:right-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-14 sm:h-14 rounded-2xl bg-[#08172c]/95 hover:bg-cyan-500 hover:text-slate-950 text-cyan-300 border border-cyan-500/40 backdrop-blur-md shadow-[0_4px_25px_rgba(0,0,0,0.85)] hover:shadow-[0_0_25px_rgba(0,240,255,0.7)] flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-90 cursor-pointer">
            <i class="fa-solid fa-chevron-right text-base sm:text-xl"></i>
          </button>

          <!-- زر التنقل الأيسر (التالي) -->
          <button type="button" id="srvSliderBtnNext" onclick="servicesSliderNext()" 
                  aria-label="الخدمات التالية" 
                  title="الخدمات التالية"
                  class="absolute -left-2 sm:left-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-14 sm:h-14 rounded-2xl bg-[#08172c]/95 hover:bg-cyan-500 hover:text-slate-950 text-cyan-300 border border-cyan-500/40 backdrop-blur-md shadow-[0_4px_25px_rgba(0,0,0,0.85)] hover:shadow-[0_0_25px_rgba(0,240,255,0.7)] flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-90 cursor-pointer">
            <i class="fa-solid fa-chevron-left text-base sm:text-xl"></i>
          </button>

          <!-- نافذة العرض المتحركة للخدمات -->
          <div class="overflow-hidden rounded-3xl py-2" id="servicesTrackWindow">
            <div id="servicesTrack" class="flex transition-transform duration-700 ease-out gap-6" dir="ltr">
              <!-- كروت الخدمات تُعرض ديناميكياً بواسطة JavaScript -->
            </div>
          </div>

          <p id="servicesEmpty" class="hidden text-center text-slate-400 py-12">لا توجد خدمات تطابق هذا التصنيف حالياً</p>

        </div>

        <!-- شريط التحكم السفلي ومؤشرات الصفحات والتنقل التلقائي للخدمات -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-cyan-500/15">
          <div class="flex items-center gap-3">
            <button type="button" onclick="toggleServicesAutoplay()" id="srvPlayPauseBtn" class="text-xs text-slate-300 hover:text-cyan-300 flex items-center gap-2 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 bg-[#08172c]/80 transition-all hover:border-cyan-400 shadow-sm cursor-pointer">
              <i class="fa-solid fa-pause text-cyan-400" id="srvPlayPauseIcon"></i>
              <span id="srvPlayPauseText" class="font-bold">إيقاف مؤقت</span>
            </button>
            <div class="flex items-center gap-1.5 text-xs text-slate-400">
              <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
              <span>تبديل تلقائي كل 5 ثوانٍ</span>
            </div>
          </div>

          <div id="servicesDotsContainer" class="flex items-center gap-2 flex-wrap justify-center"></div>

          <div class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3 py-1 rounded-lg border border-cyan-500/30 sm:hidden" id="servicesMobileCounter">
            معروض 1 - 2
          </div>
        </div>

      </div>
    </section>






    <!-- قسم سابقة الأعمال (PORTFOLIO - سلايدر تفاعلي ذكي واحترافي يعرض 3 مشاريع ويتنقل تلقائياً) -->
    <section id="portfolio" class="py-14 border-t border-cyan-500/20 relative overflow-hidden">
      <!-- تأثيرات الإضاءة الخلفية النيون -->
      <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[650px] h-[300px] bg-gradient-to-b from-cyan-500/10 via-sky-500/5 to-transparent blur-3xl pointer-events-none -z-10"></div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- العنوان الرئيسي -->
        <div class="text-center space-y-3">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/80 text-cyan-300 border border-cyan-500/30 text-xs font-bold shadow-lg shadow-cyan-500/10">
            <i class="fa-solid fa-layer-group text-cyan-400"></i> سابقة أعمالنا المتميزة
          </div>
          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white">مشاريع ومنظومات برمجية تم تنفيذها بنجاح</h2>
          <p class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto">
            أكثر من <span class="text-cyan-400 font-bold"><?= count($dbProjects) ?></span> منظومة متكاملة تخدم قطاعات الأعمال في مصر والخليج العربي
          </p>
        </div>

        <!-- فلاتر التصنيفات وشريط التحكم العلوي -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 pt-2">
          <!-- فلاتر التصنيفات السريعة -->
          <div class="flex items-center gap-2 overflow-x-auto max-w-full pb-2 md:pb-0 scrollbar-none w-full md:w-auto" id="portfolioFilterButtons">
            <button type="button" onclick="filterPortfolioSlider('all')" id="pf-pill-all" class="pf-pill active px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 shadow-md shadow-cyan-500/20 whitespace-nowrap transition-all duration-200 cursor-pointer">الكل (<?= count($dbProjects) ?>)</button>
            <button type="button" onclick="filterPortfolioSlider('erp')" id="pf-pill-erp" class="pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">أنظمة ERP</button>
            <button type="button" onclick="filterPortfolioSlider('medical')" id="pf-pill-medical" class="pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">حلول طبية</button>
            <button type="button" onclick="filterPortfolioSlider('industrial')" id="pf-pill-industrial" class="pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">تصنيع وإنتاج</button>
            <button type="button" onclick="filterPortfolioSlider('ai')" id="pf-pill-ai" class="pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">ذكاء اصطناعي</button>
            <button type="button" onclick="filterPortfolioSlider('edtech')" id="pf-pill-edtech" class="pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">تعليم وتوظيف</button>
            <button type="button" onclick="filterPortfolioSlider('zatca')" id="pf-pill-zatca" class="pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer">فوترة ZATCA</button>
          </div>

          <!-- عداد ونطاق المشاريع الحالية -->
          <div class="flex items-center gap-3 self-end md:self-auto">
            <span id="sliderCounterBadge" class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 whitespace-nowrap shadow-inner shadow-cyan-950">
              معروض 1 - 3 من <?= count($dbProjects) ?>
            </span>
            <button type="button" onclick="openViewAllModal('portfolio')" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/20 hover:bg-cyan-500/35 text-cyan-300 font-bold text-xs border border-cyan-400/50 flex items-center gap-1.5 transition-all duration-300 shadow-md shadow-cyan-500/20 hover:scale-105 active:scale-95 cursor-pointer whitespace-nowrap">
              <i class="fa-solid fa-layer-group text-cyan-400"></i>
              <span>عرض كل المشاريع (<?= count($dbProjects) ?>)</span>
              <i class="fa-solid fa-arrow-left text-[10px]"></i>
            </button>
          </div>
        </div>

        <!-- حاوية الـ Slider مع أزرار التنقل الجانبية الاحترافية -->
        <div class="relative px-2 sm:px-14 group/slider" id="portfolioSliderContainer">

          <!-- زر التنقل الأيمن (السابق) -->
          <button type="button" id="sliderBtnPrev" onclick="portfolioSliderPrev()" 
                  aria-label="المشاريع السابقة" 
                  title="المشاريع السابقة"
                  class="absolute -right-2 sm:right-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-14 sm:h-14 rounded-2xl bg-[#08172c]/95 hover:bg-cyan-500 hover:text-slate-950 text-cyan-300 border border-cyan-500/40 backdrop-blur-md shadow-[0_4px_25px_rgba(0,0,0,0.85)] hover:shadow-[0_0_25px_rgba(0,240,255,0.7)] flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-90 cursor-pointer">
            <i class="fa-solid fa-chevron-right text-base sm:text-xl"></i>
          </button>

          <!-- زر التنقل الأيسر (التالي) -->
          <button type="button" id="sliderBtnNext" onclick="portfolioSliderNext()" 
                  aria-label="المشاريع التالية" 
                  title="المشاريع التالية"
                  class="absolute -left-2 sm:left-0 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-14 sm:h-14 rounded-2xl bg-[#08172c]/95 hover:bg-cyan-500 hover:text-slate-950 text-cyan-300 border border-cyan-500/40 backdrop-blur-md shadow-[0_4px_25px_rgba(0,0,0,0.85)] hover:shadow-[0_0_25px_rgba(0,240,255,0.7)] flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-90 cursor-pointer">
            <i class="fa-solid fa-chevron-left text-base sm:text-xl"></i>
          </button>

          <!-- نافذة العرض المتحركة (Overflow Hidden Window) -->
          <div class="overflow-hidden rounded-3xl py-2" id="portfolioTrackWindow">
            <!-- مسار السلايدر المتحرك (Track) -->
            <div id="portfolioTrack" class="flex transition-transform duration-700 ease-out gap-5" dir="ltr">
              <!-- الكروت تُعرض ديناميكياً بواسطة JavaScript -->
            </div>
          </div>

          <!-- رسالة عند عدم وجود نتائج -->
          <p id="portfolioEmpty" class="hidden text-center text-slate-400 py-12">لا توجد مشاريع تطابق هذا التصنيف حالياً</p>

        </div>

        <!-- شريط التحكم السفلي ومؤشرات الصفحات والتنقل التلقائي -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-cyan-500/15">
          <!-- زر تشغيل / إيقاف التبديل التلقائي ومؤشر الوقت -->
          <div class="flex items-center gap-3">
            <button type="button" onclick="toggleSliderAutoplay()" id="sliderPlayPauseBtn" class="text-xs text-slate-300 hover:text-cyan-300 flex items-center gap-2 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 bg-[#08172c]/80 transition-all hover:border-cyan-400 shadow-sm cursor-pointer">
              <i class="fa-solid fa-pause text-cyan-400" id="playPauseIcon"></i>
              <span id="playPauseText" class="font-bold">إيقاف مؤقت</span>
            </button>
            <div class="flex items-center gap-1.5 text-xs text-slate-400">
              <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
              <span>يتبدل تلقائياً كل 4.5 ثوانٍ</span>
            </div>
          </div>

          <!-- نقاط التقسيم التفاعلية (Pagination Dots) -->
          <div id="sliderDotsContainer" class="flex items-center gap-2 flex-wrap justify-center"></div>

          <!-- عداد الموبايل السريع -->
          <div class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3 py-1 rounded-lg border border-cyan-500/30 sm:hidden" id="sliderMobileCounter">
            معروض 1 - 3
          </div>
        </div>

      </div>
    </section>



    <!-- قسم فريق العمل (TEAM - سلايدر تفاعلي ذكي واحترافي لخبراء الشركة) -->
    <section id="team" class="py-14 border-t border-cyan-500/20 relative overflow-hidden">
      <!-- إضاءة خلفية نيون -->
      <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[500px] h-[250px] bg-gradient-to-b from-cyan-500/10 via-sky-500/5 to-transparent blur-3xl pointer-events-none -z-10"></div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- العنوان الرئيسي -->
        <div class="text-center space-y-2">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/80 text-cyan-300 border border-cyan-500/30 text-xs font-bold shadow-lg shadow-cyan-500/10">
            <i class="fa-solid fa-user-group text-cyan-400"></i> فريق العمل والخبراء
          </div>
          <h2 class="text-3xl sm:text-4xl font-black text-white">خبراؤنا في خدمتك</h2>
          <p class="text-slate-400 text-sm">نخبة متميزة من مهندسي البرمجيات ومصممي تجربة المستخدم وإدارة المشروعات</p>
        </div>

        <!-- عداد الأعضاء السريع -->
        <div class="flex items-center justify-between gap-4 pt-1">
          <div class="flex items-center gap-2 text-xs text-slate-400">
            <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
            <span class="font-bold text-white">كوادر متخصصة</span>
          </div>
          <div class="flex items-center gap-3">
            <span id="teamCounterBadge" class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 whitespace-nowrap shadow-inner shadow-cyan-950">
              معروض 1 - 4 من 12
            </span>
            <button type="button" onclick="openViewAllModal('team')" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/20 hover:bg-cyan-500/35 text-cyan-300 font-bold text-xs border border-cyan-400/50 flex items-center gap-1.5 transition-all duration-300 shadow-md shadow-cyan-500/20 hover:scale-105 active:scale-95 cursor-pointer whitespace-nowrap">
              <i class="fa-solid fa-users text-cyan-400"></i>
              <span>عرض كامل الفريق (12)</span>
              <i class="fa-solid fa-arrow-left text-[10px]"></i>
            </button>
          </div>
        </div>

        <!-- حاوية سلايدر فريق العمل مع أزرار التنقل الجانبية الاحترافية -->
        <div class="relative px-2 sm:px-14 group/team-slider" id="teamSliderContainer">

          <!-- زر التنقل الأيمن (السابق) -->
          <button type="button" id="teamSliderBtnPrev" onclick="teamSliderPrev()" 
                  aria-label="الخبراء السابقون" 
                  title="الخبراء السابقون"
                  class="absolute -right-2 sm:right-0 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-13 sm:h-13 rounded-2xl bg-[#08172c]/95 hover:bg-cyan-500 hover:text-slate-950 text-cyan-300 border border-cyan-500/40 backdrop-blur-md shadow-[0_4px_25px_rgba(0,0,0,0.85)] hover:shadow-[0_0_25px_rgba(0,240,255,0.7)] flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-90 cursor-pointer">
            <i class="fa-solid fa-chevron-right text-base sm:text-lg"></i>
          </button>

          <!-- زر التنقل الأيسر (التالي) -->
          <button type="button" id="teamSliderBtnNext" onclick="teamSliderNext()" 
                  aria-label="الخبراء التاليون" 
                  title="الخبراء التاليون"
                  class="absolute -left-2 sm:left-0 top-1/2 -translate-y-1/2 z-20 w-10 h-10 sm:w-13 sm:h-13 rounded-2xl bg-[#08172c]/95 hover:bg-cyan-500 hover:text-slate-950 text-cyan-300 border border-cyan-500/40 backdrop-blur-md shadow-[0_4px_25px_rgba(0,0,0,0.85)] hover:shadow-[0_0_25px_rgba(0,240,255,0.7)] flex items-center justify-center transition-all duration-300 hover:scale-110 active:scale-90 cursor-pointer">
            <i class="fa-solid fa-chevron-left text-base sm:text-lg"></i>
          </button>

          <!-- نافذة العرض المتحركة (Window) -->
          <div class="overflow-hidden rounded-3xl py-2" id="teamTrackWindow">
            <div id="teamTrack" class="flex transition-transform duration-700 ease-out gap-5" dir="ltr">
              <!-- كروت فريق العمل تُعرض ديناميكياً بواسطة JavaScript -->
            </div>
          </div>

        </div>

        <!-- شريط التحكم السفلي ومؤشرات الصفحات والتنقل التلقائي -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-4 border-t border-cyan-500/15">
          <div class="flex items-center gap-3">
            <button type="button" onclick="toggleTeamAutoplay()" id="teamPlayPauseBtn" class="text-xs text-slate-300 hover:text-cyan-300 flex items-center gap-2 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 bg-[#08172c]/80 transition-all hover:border-cyan-400 shadow-sm cursor-pointer">
              <i class="fa-solid fa-pause text-cyan-400" id="teamPlayPauseIcon"></i>
              <span id="teamPlayPauseText" class="font-bold">إيقاف مؤقت</span>
            </button>
            <div class="flex items-center gap-1.5 text-xs text-slate-400">
              <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
              <span>تبديل تلقائي كل 4 ثوانٍ</span>
            </div>
          </div>

          <!-- نقاط التقسيم التفاعلية -->
          <div id="teamDotsContainer" class="flex items-center gap-2 flex-wrap justify-center"></div>

          <!-- عداد الموبايل -->
          <div class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3 py-1 rounded-lg border border-cyan-500/30 sm:hidden" id="teamMobileCounter">
            معروض 1 - 2
          </div>
        </div>

      </div>
    </section>

    <!-- قسم الأسئلة الشائعة (FAQ) -->
    <section id="faq" class="py-10 border-t border-cyan-500/20 relative">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        <!-- العنوان -->
        <div class="text-center space-y-2">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/80 text-cyan-300 border border-cyan-500/30 text-xs font-bold"><i class="fa-solid fa-circle-question text-cyan-400"></i> الأسئلة الشائعة</div>
          <h2 class="text-3xl sm:text-4xl font-black text-white">كل ما تريد معرفته</h2>
          <p class="text-slate-400 text-sm">إجابات وافية على أكثر الأسئلة شيوعاً حول خدماتنا وآلية العمل</p>
        </div>

        <!-- أكورديون -->
        <div class="space-y-6">

          <!-- 1. الاتفاق والتعاقد -->
          <div class="space-y-3">
            <h3 class="text-base font-black text-cyan-300 flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-file-contract text-cyan-400"></i> الاتفاق والتعاقد
            </h3>
            <div class="space-y-2">
              <div class="faq-item glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                <button class="faq-q w-full text-right px-4 py-4 text-sm font-bold text-white flex items-center justify-between gap-3" onclick="toggleFaq(this)">
                  <span>هل يمكن توقيع عقد رسمي يضمن حقوق الطرفين؟</span><i class="fa-solid fa-chevron-down text-cyan-400 text-xs transition-transform flex-shrink-0"></i>
                </button>
                <div class="faq-a hidden px-4 pb-4 text-xs text-slate-300 leading-loose text-right">نعم، نحن نحرص على توقيع عقد رسمي يتضمن جميع تفاصيل المشروع والمواصفات المتفق عليها والجدول الزمني لضمان حقوق الطرفين.</div>
              </div>
              <div class="faq-item glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                <button class="faq-q w-full text-right px-4 py-4 text-sm font-bold text-white flex items-center justify-between gap-3" onclick="toggleFaq(this)">
                  <span>هل تقدمون استشارة أولية قبل بدء المشروع؟</span><i class="fa-solid fa-chevron-down text-cyan-400 text-xs transition-transform flex-shrink-0"></i>
                </button>
                <div class="faq-a hidden px-4 pb-4 text-xs text-slate-300 leading-loose text-right">نعم، نقدم استشارة أولية لمناقشة فكرة مشروعك وتحديد المتطلبات بدقة وتقديم التوصيات المناسبة قبل البدء في التنفيذ.</div>
              </div>
            </div>
          </div>

          <!-- 2. الخدمات والرسوم -->
          <div class="space-y-3">
            <h3 class="text-base font-black text-cyan-300 flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-hand-holding-dollar text-cyan-400"></i> الخدمات والرسوم
            </h3>
            <div class="space-y-2">
              <div class="faq-item glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                <button class="faq-q w-full text-right px-4 py-4 text-sm font-bold text-white flex items-center justify-between gap-3" onclick="toggleFaq(this)">
                  <span>ما هي تكلفة تطوير موقع أو تطبيق؟</span><i class="fa-solid fa-chevron-down text-cyan-400 text-xs transition-transform flex-shrink-0"></i>
                </button>
                <div class="faq-a hidden px-4 pb-4 text-xs text-slate-300 leading-loose text-right">التكلفة تختلف باختلاف نوع المشروع وحجمه والميزات المطلوبة والتقنيات المستخدمة ومدة التنفيذ. يمكنك التواصل معنا للحصول على عرض سعر مخصص.</div>
              </div>
              <div class="faq-item glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                <button class="faq-q w-full text-right px-4 py-4 text-sm font-bold text-white flex items-center justify-between gap-3" onclick="toggleFaq(this)">
                  <span>ما هي سياسة الدفع لديكم؟</span><i class="fa-solid fa-chevron-down text-cyan-400 text-xs transition-transform flex-shrink-0"></i>
                </button>
                <div class="faq-a hidden px-4 pb-4 text-xs text-slate-300 leading-loose text-right">يتم تحديد الدفعات وفقًا للاتفاقية، عادة يكون هناك دفعة مقدمة ثم دفعات حسب مراحل تسليم المشروع.</div>
              </div>
            </div>
          </div>

          <!-- 3. الضمان والاسترجاع -->
          <div class="space-y-3">
            <h3 class="text-base font-black text-cyan-300 flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-shield-check text-cyan-400"></i> الضمان والاسترجاع
            </h3>
            <div class="space-y-2">
              <div class="faq-item glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                <button class="faq-q w-full text-right px-4 py-4 text-sm font-bold text-white flex items-center justify-between gap-3" onclick="toggleFaq(this)">
                  <span>هل يوجد ضمان على البرمجيات والمواقع بعد التسليم؟</span><i class="fa-solid fa-chevron-down text-cyan-400 text-xs transition-transform flex-shrink-0"></i>
                </button>
                <div class="faq-a hidden px-4 pb-4 text-xs text-slate-300 leading-loose text-right">نعم، نقدم فترة ضمان بعد التسليم لإصلاح أي أخطاء برمجية قد تظهر والتأكد من استقرار النظام.</div>
              </div>
            </div>
          </div>

          <!-- 4. خدمة ما بعد البيع -->
          <div class="space-y-3">
            <h3 class="text-base font-black text-cyan-300 flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-headset text-cyan-400"></i> خدمة ما بعد البيع
            </h3>
            <div class="space-y-2">
              <div class="faq-item glass-card rounded-2xl border border-cyan-500/20 overflow-hidden">
                <button class="faq-q w-full text-right px-4 py-4 text-sm font-bold text-white flex items-center justify-between gap-3" onclick="toggleFaq(this)">
                  <span>هل تقدمون خدمات الدعم والصيانة بعد التسليم؟</span><i class="fa-solid fa-chevron-down text-cyan-400 text-xs transition-transform flex-shrink-0"></i>
                </button>
                <div class="faq-a hidden px-4 pb-4 text-xs text-slate-300 leading-loose text-right">نعم، نقدم خدمات دعم وصيانة مستمرة لضمان كفاءة وأمان النظام على المدى الطويل.</div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- قسم اتصل بنا (CONTACT) -->
    <section id="contact" class="py-12 border-t border-cyan-500/20 relative">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

        <!-- العنوان -->
        <div class="text-center space-y-2">
          <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-cyan-950/80 text-cyan-300 border border-cyan-500/30 text-xs font-bold">
            <i class="fa-solid fa-paper-plane text-cyan-400"></i>
            <span>طلب عرض سعر واستشارة مجانية</span>
          </div>
          <h2 class="text-3xl sm:text-4xl font-black text-white">تواصل معنا واطلب دراسة مشروعك</h2>
          <p class="text-slate-400 text-sm">فريقنا الهندسي جاهز لمناقشة فكرتك وتقديم دراسة فنية وعرض سعر في أقل من 24 ساعة</p>
        </div>

        <!-- شبكة نموذج الإرسال وبطاقات الاتصال السريع -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
          
          <!-- نموذج طلب عرض سعر واستفسار AJAX -->
          <div class="lg:col-span-7 glass-card rounded-3xl p-6 sm:p-8 border border-cyan-500/30 shadow-2xl space-y-6 text-right relative overflow-hidden">
            <div class="space-y-2 border-b border-cyan-500/20 pb-4">
              <h3 class="text-lg sm:text-xl font-black text-white flex items-center gap-2">
                <i class="fa-solid fa-bolt text-cyan-400"></i>
                <span>أرسل متطلبات مشروعك الآن</span>
              </h3>
              <p class="text-xs text-slate-300">املأ البيانات وسيقوم مهندس استشاري بمراجعة طلبك والتواصل معك فوراً.</p>
            </div>

            <!-- إشعار حالة الإرسال -->
            <div id="contactFormNotice" class="hidden p-4 rounded-2xl text-xs font-bold text-center transition-all"></div>

            <form id="ajaxContactForm" onsubmit="handleContactSubmit(event)" class="space-y-4">
              <!-- Honeypot Bot Trap -->
              <div style="display:none !important;" aria-hidden="true">
                <input type="text" name="company_trap" tabindex="-1" autocomplete="off" />
                <input type="text" name="website_hp" tabindex="-1" autocomplete="off" />
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-slate-200 mb-1.5">الاسم الكريم *</label>
                  <div class="relative">
                    <input type="text" name="name" required class="w-full bg-[#061224] border border-cyan-500/30 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:border-cyan-400 outline-none pl-9" placeholder="أحمد محمد">
                    <i class="fa-solid fa-user absolute left-3 top-3.5 text-cyan-400 text-xs"></i>
                  </div>
                </div>
                <div>
                  <label class="block text-xs font-bold text-slate-200 mb-1.5">رقم الهاتف / واتساب *</label>
                  <div class="relative">
                    <input type="tel" name="phone" required class="w-full bg-[#061224] border border-cyan-500/30 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:border-cyan-400 outline-none dir-ltr font-mono pl-9" placeholder="01013688446">
                    <i class="fa-solid fa-phone absolute left-3 top-3.5 text-cyan-400 text-xs"></i>
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="block text-xs font-bold text-slate-200 mb-1.5">البريد الإلكتروني (اختياري)</label>
                  <div class="relative">
                    <input type="email" name="email" class="w-full bg-[#061224] border border-cyan-500/30 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:border-cyan-400 outline-none dir-ltr font-mono pl-9" placeholder="name@example.com">
                    <i class="fa-solid fa-envelope absolute left-3 top-3.5 text-cyan-400 text-xs"></i>
                  </div>
                </div>
                <div>
                  <label class="block text-xs font-bold text-slate-200 mb-1.5">نوع الخدمة أو المنظومة</label>
                  <div class="relative">
                    <select name="service_type" class="w-full bg-[#061224] border border-cyan-500/30 rounded-xl px-4 py-3 text-xs text-white focus:border-cyan-400 outline-none appearance-none cursor-pointer">
                      <option value="منظومة ERP سحابية مخصصة للشركات">منظومة ERP سحابية مخصصة للشركات</option>
                      <option value="حلول وتخصيص Odoo للمقاولات والمصانع">حلول وتخصيص Odoo للمقاولات والمصانع</option>
                      <option value="تطبيقات الموبايل (iOS & Android) Flutter">تطبيقات الموبايل (iOS & Android) Flutter</option>
                      <option value="روبوتات الذكاء الاصطناعي وأتمتة الواتساب">روبوتات الذكاء الاصطناعي وأتمتة الواتساب</option>
                      <option value="نقاط البيع والفوترة الإلكترونية ZATCA">نقاط البيع والفوترة الإلكترونية ZATCA</option>
                      <option value="منظومات المستشفيات والمراكز الطبية HIS">منظومات المستشفيات والمراكز الطبية HIS</option>
                      <option value="إدارة مزارع الدواجن والإنتاج الصناعي">إدارة مزارع الدواجن والإنتاج الصناعي</option>
                      <option value="استشارة تقنية / مشروع مخصص">استشارة تقنية / مشروع مخصص</option>
                    </select>
                    <i class="fa-solid fa-chevron-down absolute left-3 top-3.5 text-cyan-400 text-xs pointer-events-none"></i>
                  </div>
                </div>
              </div>

              <div>
                <label class="block text-xs font-bold text-slate-200 mb-1.5">تفاصيل الفكرة أو المتطلبات *</label>
                <textarea name="message" required rows="3" class="w-full bg-[#061224] border border-cyan-500/30 rounded-xl px-4 py-3 text-xs text-white placeholder-slate-500 focus:border-cyan-400 outline-none leading-relaxed" placeholder="اشرح لنا طبيعة نشاطك وما ترغب بتنفيذه بدقة..."></textarea>
              </div>

              <button type="submit" id="contactSubmitBtn" class="w-full py-3.5 rounded-xl btn-cyber-primary text-sm font-black flex items-center justify-center gap-2 shadow-lg shadow-cyan-500/25 hover:opacity-95 transition">
                <i class="fa-solid fa-paper-plane"></i>
                <span id="contactBtnText">إرسال طلبك وفكرتك الآن</span>
              </button>
            </form>
          </div>

          <!-- قنوات الاتصال السريعة المباشرة -->
          <div class="lg:col-span-5 space-y-4">
            
            <!-- واتساب -->
            <a href="https://wa.me/201013688446" target="_blank" rel="noopener"
               class="glass-card rounded-3xl p-5 border border-green-500/30 hover:border-green-400/60 flex items-center gap-4 text-right transition-all duration-300 hover:scale-[1.02] group">
              <div class="w-12 h-12 rounded-2xl bg-green-500/10 border border-green-500/30 flex items-center justify-center text-green-400 text-2xl group-hover:bg-green-500/20 transition flex-shrink-0">
                <i class="fa-brands fa-whatsapp"></i>
              </div>
              <div class="flex-1">
                <p class="text-xs text-slate-400">محادثة واتساب مباشرة</p>
                <p class="text-sm font-black text-white font-mono dir-ltr">01013688446</p>
                <p class="text-[11px] text-green-400 font-bold mt-0.5">رد فوري على مدار الساعة ←</p>
              </div>
            </a>

            <!-- هاتف -->
            <a href="tel:<?= htmlspecialchars($phone) ?>"
               class="glass-card rounded-3xl p-5 border border-cyan-500/30 hover:border-cyan-400/60 flex items-center gap-4 text-right transition-all duration-300 hover:scale-[1.02] group">
              <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-2xl group-hover:bg-cyan-500/20 transition flex-shrink-0">
                <i class="fa-solid fa-phone"></i>
              </div>
              <div class="flex-1">
                <p class="text-xs text-slate-400">الاتصال المباشر</p>
                <p class="text-sm font-black text-white font-mono dir-ltr"><?= htmlspecialchars($phone) ?></p>
                <p class="text-[11px] text-cyan-400 font-bold mt-0.5">السبت - الخميس: 9:00 ص - 9:00 م ←</p>
              </div>
            </a>

            <!-- إيميل -->
            <a href="mailto:<?= htmlspecialchars($email) ?>"
               class="glass-card rounded-3xl p-5 border border-cyan-500/30 hover:border-cyan-400/60 flex items-center gap-4 text-right transition-all duration-300 hover:scale-[1.02] group">
              <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-2xl group-hover:bg-cyan-500/20 transition flex-shrink-0">
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="flex-1">
                <p class="text-xs text-slate-400">البريد الإلكتروني الرسمي</p>
                <p class="text-xs font-black text-white font-mono break-all"><?= htmlspecialchars($email) ?></p>
                <p class="text-[11px] text-cyan-400 font-bold mt-0.5">مراسلة قسم المشاريع ←</p>
              </div>
            </a>

            <!-- بطاقة المقر وساعات العمل -->
            <div class="glass-card rounded-3xl p-5 border border-cyan-500/20 text-right space-y-2">
              <p class="text-xs font-bold text-slate-300 flex items-center gap-2">
                <i class="fa-solid fa-location-dot text-cyan-400"></i>
                <span>المقر: <?= htmlspecialchars($address) ?></span>
              </p>
              <p class="text-[11px] text-slate-400 flex items-center gap-2">
                <i class="fa-solid fa-clock text-cyan-400"></i>
                <span>ساعات العمل: <?= htmlspecialchars($workHours) ?></span>
              </p>
            </div>

          </div>
        </div>

      </div>
    </section>

    <!-- SECTION: Topical Authority & Engineering Standards (SEO EEAT Pillars) -->
    <section class="py-16 bg-[#08172c]/80 border-t border-cyan-500/10 text-right relative overflow-hidden" id="authority-pillars">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
          <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-cyan-500/10 text-cyan-300 border border-cyan-500/30">
            <i class="fa-solid fa-award text-cyan-400"></i> ركائز الخبرة والموثوقية الهندسية (EEAT Authority)
          </span>
          <h2 class="text-2xl sm:text-3xl font-black text-white">معاييرنا الهندسية في بناء الأنظمة السحابية والذكاء الاصطناعي</h2>
          <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
            نلتزم بأعلى المقاييس العالمية في هندسة البرمجيات المؤسسية، والتوافق القانوني والضريبي، والتكامل الذكي لخدمة شركائنا في مصر والسعودية والخليج العربي.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          
          <!-- Pillar 1: ZATCA Phase 2 -->
          <div class="glass-card rounded-3xl p-6 border border-cyan-500/20 hover:border-cyan-400/40 transition-all duration-300 space-y-4">
            <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-xl">
              <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <h3 class="text-lg font-black text-white">منظومة الفوترة الإلكترونية ZATCA (المرحلة الثانية)</h3>
            <p class="text-xs text-slate-300 leading-relaxed">
              تطوير أنظمة فوترة سحابية معتمدة ومتوافقة بالكامل مع متطلبات هيئة الزكاة والضريبة والجمارك بالمملكة العربية السعودية، تدعم التشفير الرقمي الآمن (Cryptographic Stamp)، وتوليد رمز الاستجابة السريع المشفر (Cryptographic QR Code)، والتكامل اللحظي عبر بروتوكولات API الرسمية للفواتير الضريبية المبسطة والتجارية.
            </p>
            <div class="flex flex-wrap gap-2 pt-2">
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 font-mono">ZATCA Phase 2</span>
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 font-mono">UBL 2.1 XML</span>
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20">تشفير رقمي</span>
            </div>
          </div>

          <!-- Pillar 2: Cloud ERP Architecture -->
          <div class="glass-card rounded-3xl p-6 border border-cyan-500/20 hover:border-cyan-400/40 transition-all duration-300 space-y-4">
            <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-xl">
              <i class="fa-solid fa-network-wired"></i>
            </div>
            <h3 class="text-lg font-black text-white">معمارية أنظمة ERP السحابية وتكامل الأقسام</h3>
            <p class="text-xs text-slate-300 leading-relaxed">
              بناء وتخصيص منظومات تخطيط موارد المؤسسات المتكاملة التي تدير شجرة الحسابات العامة المتوافقة مع المعايير الدولية (IFRS)، وإدارة المستودعات الذكية بسياسات التقييم المالي (FIFO و LIFO)، ودورات المشتريات والمبيعات ومراكز التكلفة، وربط البنوك والتقارير المالية التحليلية لدعم اتخاذ القرار في بيئات العمل المعقدة.
            </p>
            <div class="flex flex-wrap gap-2 pt-2">
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 font-mono">Multi-Tenant Cloud ERP</span>
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 font-mono">FIFO / LIFO</span>
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20">شجرة الحسابات</span>
            </div>
          </div>

          <!-- Pillar 3: AI WhatsApp Automation -->
          <div class="glass-card rounded-3xl p-6 border border-cyan-500/20 hover:border-cyan-400/40 transition-all duration-300 space-y-4">
            <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 text-xl">
              <i class="fa-brands fa-whatsapp"></i>
            </div>
            <h3 class="text-lg font-black text-white">حلول الذكاء الاصطناعي وبوتات الواتساب الرسمية</h3>
            <p class="text-xs text-slate-300 leading-relaxed">
              أتمتة خدمة العملاء والمبيعات عبر التكامل الرسمي مع Meta WhatsApp Cloud API وربطها بنماذج الذكاء الاصطناعي التوليدي (LLMs) لمعالجة اللغة الطبيعية باللغة العربية بلهجات متعددة، ومزامنة الاستفسارات مع قواعد بيانات الـ ERP والمتجر لتتبع الشحنات، إصدار الفواتير الفورية، وتوليد العملاء المحتملين (Lead Generation) آلياً 24/7.
            </p>
            <div class="flex flex-wrap gap-2 pt-2">
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 font-mono">WhatsApp Cloud API</span>
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20 font-mono">AI Conversational Agents</span>
              <span class="text-[10px] px-2.5 py-1 rounded-lg bg-cyan-950/60 text-cyan-300 border border-cyan-500/20">أتمتة مبيعات</span>
            </div>
          </div>

        </div>

      </div>
    </section>

  </main>


  <!-- FOOTER -->
  <footer class="border-t border-cyan-500/20 bg-[#061122] text-slate-400 text-xs relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-right">
        <div class="space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-cyber-900 border border-cyan-500/40 flex items-center justify-center p-1 shadow-lg shadow-cyan-500/20">
              <img src="./logo.jpg" alt="المبتكر العربي" class="w-full h-full object-cover rounded-lg" onerror="this.style.display='none'" />
            </div>
            <div>
              <p class="font-black text-white text-sm sm:text-base">المبتكر العربي للبرمجيات</p>
              <p class="text-[10px] text-cyan-400 font-mono">Software & AI Solutions</p>
            </div>
          </div>
          <p class="text-xs text-slate-300 leading-relaxed">
            شريكك التكنولوجي الموثوق لتطوير منظومات ERP السحابية، حلول الذكاء الاصطناعي، تطبيقات الموبايل والويب، والربط والفوترة الإلكترونية ZATCA.
          </p>
          <div class="flex items-center gap-2 pt-1 text-cyan-400 text-xs">
            <i class="fa-solid fa-certificate"></i>
            <span class="font-bold text-white">سجل تجاري وخبرة برمجية منذ 2006</span>
          </div>
        </div>

        <div class="space-y-3">
          <h4 class="text-white font-black text-sm border-b border-cyan-500/20 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-link text-cyan-400"></i>
            <span>روابط سريعة</span>
          </h4>
          <ul class="space-y-2 text-xs">
            <li><a href="#home" class="hover:text-cyan-300 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-left text-[9px] text-cyan-500"></i><span>الرئيسية</span></a></li>
            <li></li>
            <li><a href="#about" class="hover:text-cyan-300 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-left text-[9px] text-cyan-500"></i><span>من نحن</span></a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-left text-[9px] text-cyan-500"></i><span>خدماتنا البرمجية</span></a></li>
            <li><a href="#portfolio" class="hover:text-cyan-300 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-left text-[9px] text-cyan-500"></i><span>سابقة الأعمال (<?= count($dbProjects) ?> مشروع)</span></a></li>
            <li><a href="#team" class="hover:text-cyan-300 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-left text-[9px] text-cyan-500"></i><span>فريق العمل والخبراء</span></a></li>
            <li><a href="#faq" class="hover:text-cyan-300 transition flex items-center gap-1.5"><i class="fa-solid fa-chevron-left text-[9px] text-cyan-500"></i><span>الأسئلة الشائعة</span></a></li>
          </ul>
        </div>

        <div class="space-y-3">
          <h4 class="text-white font-black text-sm border-b border-cyan-500/20 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-gears text-cyan-400"></i>
            <span>باقة الحلول التقنية</span>
          </h4>
          <ul class="space-y-2 text-xs">
            <li><a href="#services" class="hover:text-cyan-300 transition">تطبيقات الويب والموبايل والـ AI</a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition">منظومات ERP السحابية المخصصة</a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition">أتمتة الواتساب وبوتات الذكاء الاصطناعي</a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition">نقاط البيع والفوترة الإلكترونية ZATCA</a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition">الأمن السيبراني واختبار الاختراق</a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition">إدارة الخوادم السحابية DevOps</a></li>
            <li><a href="#services" class="hover:text-cyan-300 transition">تخصيص وتنفيذ Odoo ERP</a></li>
          </ul>
        </div>

        <div class="space-y-3">
          <h4 class="text-white font-black text-sm border-b border-cyan-500/20 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-headset text-cyan-400"></i>
            <span>تواصل معنا</span>
          </h4>
          <div class="space-y-2.5 text-xs">
            <p class="flex items-center gap-2 text-slate-300">
              <i class="fa-solid fa-phone text-cyan-400 text-xs"></i>
              <a href="tel:<?= htmlspecialchars($phone) ?>" class="font-mono hover:text-cyan-300 dir-ltr"><?= htmlspecialchars($phone) ?></a>
            </p>
            <p class="flex items-center gap-2 text-slate-300">
              <i class="fa-brands fa-whatsapp text-green-400 text-sm"></i>
              <a href="https://wa.me/201013688446" target="_blank" rel="noopener" class="hover:text-green-300 font-mono dir-ltr">01013688446</a>
            </p>
            <p class="flex items-center gap-2 text-slate-300">
              <i class="fa-solid fa-envelope text-cyan-400 text-xs"></i>
              <a href="mailto:<?= htmlspecialchars($email) ?>" class="font-mono hover:text-cyan-300 break-all"><?= htmlspecialchars($email) ?></a>
            </p>
            <p class="flex items-center gap-2 text-slate-300">
              <i class="fa-solid fa-clock text-cyan-400 text-xs"></i>
              <span>السبت - الخميس: 9:00 ص - 6:00 م</span>
            </p>
          </div>
          <div class="pt-3 flex items-center gap-2">
            <a href="https://wa.me/201013688446" target="_blank" rel="noopener" class="w-9 h-9 rounded-xl bg-green-500/10 border border-green-500/30 flex items-center justify-center text-green-400 hover:bg-green-500/20 transition"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="mailto:<?= htmlspecialchars($email) ?>" class="w-9 h-9 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 hover:bg-cyan-500/20 transition"><i class="fa-solid fa-envelope"></i></a>
            <a href="admin/index.php" class="w-9 h-9 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 hover:bg-cyan-500/20 transition" title="لوحة التحكم"><i class="fa-solid fa-lock"></i></a>
          </div>
        </div>
      </div>

      <!-- شريط المدن والمناطق المستهدفة (Regional SEO Anchors) -->
      <div class="border-t border-cyan-500/10 pt-6 text-right space-y-2">
        <p class="text-[11px] font-bold text-slate-300 flex items-center gap-2">
          <i class="fa-solid fa-map-location-dot text-cyan-400"></i>
          <span>تغطية خدماتنا البرمجية والاستشارية في الوطن العربي:</span>
        </p>
        <div class="flex flex-wrap items-center gap-x-4 gap-y-2 text-[11px] text-slate-400 leading-relaxed">
          <a href="#services" class="hover:text-cyan-300 transition">حلول برمجية وأنظمة ERP في الرياض</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">برمجة تطبيقات في جدة</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">تصميم مواقع في الدمام والخبر</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">الفوترة الإلكترونية ZATCA السعودية</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">أنظمة إدارة شركات في القاهرة والجيزة</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">برامج محاسبية ومستودعات في دمنهور والبحيرة</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">تطوير برمجيات بالمنصورة والإسكندرية</a>
          <span class="text-cyan-500/40">•</span>
          <a href="#services" class="hover:text-cyan-300 transition">حلول الذكاء الاصطناعي وبوتات الواتساب في الإمارات والخليج العربي</a>
        </div>
      </div>

      <div class="border-t border-cyan-500/10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-right text-[11px] text-slate-400">
        <p>© 2026 شركة <span class="text-white font-bold">المبتكر العربي للبرمجيات</span>. جميع الحقوق محفوظة.</p>
        <p class="font-mono text-cyan-400/80">Crafted with Excellence & Innovation in Egypt & Arab World 🚀</p>
      </div>
    </div>
  </footer>
  




  

<!-- نافذة الشرح التفصيلي للمشروع وشاشاته Modal (Fully Mobile-Responsive) -->
    <div id="projectDetailsModal" onclick="if(event.target === this) closeProjectDetailsModal()" class="fixed inset-0 z-[99999] hidden bg-black/90 backdrop-blur-xl flex items-center justify-center p-2 sm:p-4 md:p-6 overflow-hidden">
      
      <!-- Floating Top Close Button (Always visible on mobile & desktop) -->
      <button onclick="closeProjectDetailsModal()" class="fixed top-3 left-3 sm:top-5 sm:left-5 z-[100000] px-3.5 py-1.5 sm:px-4 sm:py-2 rounded-2xl bg-rose-600 hover:bg-rose-500 text-white font-black text-xs sm:text-sm flex items-center gap-1.5 sm:gap-2 shadow-2xl transition-all duration-200 border border-rose-400/50 hover:scale-105 active:scale-95">
        <i class="fa-solid fa-xmark text-sm sm:text-base"></i>
        <span>إغلاق (Esc)</span>
      </button>

      <div class="relative max-w-5xl w-full glass-card rounded-2xl sm:rounded-3xl border border-cyan-500/40 overflow-hidden shadow-2xl my-auto text-right max-h-[92vh] flex flex-col justify-between z-10">
        
        <!-- Modal Top Bar Header -->
        <div class="bg-[#0c223f] border-b border-cyan-500/30 p-3.5 sm:p-5 flex items-center justify-between flex-shrink-0">
          <div class="flex items-center gap-2 sm:gap-3">
            <span id="pdmCategory" class="px-2.5 py-1 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/40"></span>
            <span id="pdmStatus" class="px-2.5 py-1 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-bold bg-emerald-500/20 text-emerald-300 border border-emerald-500/40 flex items-center gap-1 sm:gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span><span id="pdmStatusText"></span></span>
          </div>
          <button onclick="closeProjectDetailsModal()" class="px-3 py-1.5 rounded-xl bg-rose-500/20 hover:bg-rose-500/40 text-rose-300 font-bold border border-rose-500/40 flex items-center gap-1 transition text-xs">
            <i class="fa-solid fa-xmark"></i>
            <span>إغلاق ✕</span>
          </button>
        </div>

        <!-- Modal Body (Scrollable with smooth touch momentum) -->
        <div class="p-4 sm:p-6 md:p-8 space-y-6 sm:space-y-8 overflow-y-auto flex-1 overscroll-contain">
          
          <!-- Hero Banner Section -->
          <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden border border-cyan-500/30 min-h-[160px] sm:min-h-[240px] md:min-h-[280px] flex items-end p-4 sm:p-6 md:p-8 bg-[#07172b]">
            <img id="pdmHeroImg" src="" alt="" class="absolute inset-0 w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#08172c] via-[#08172c]/80 to-transparent"></div>
            <div class="relative z-10 space-y-1.5 sm:space-y-2 max-w-3xl">
              <h2 id="pdmTitle" class="text-base sm:text-2xl md:text-3xl font-black text-white leading-tight"></h2>
              <p id="pdmTech" class="text-[10px] sm:text-xs md:text-sm font-mono text-cyan-300"></p>
            </div>
          </div>

          <!-- Section 1: Concept & Full Description -->
          <div class="space-y-2 sm:space-y-3">
            <h3 class="text-sm sm:text-base md:text-lg font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-lightbulb text-cyan-400"></i><span>فكرة وأهداف المنظومة</span>
            </h3>
            <p id="pdmFullDesc" class="text-xs sm:text-sm text-slate-300 leading-relaxed"></p>
          </div>

          <!-- Section 2: UI Screenshots Gallery -->
          <div class="space-y-2 sm:space-y-3">
            <h3 class="text-sm sm:text-base md:text-lg font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-images text-cyan-400"></i><span>معرض الشاشات والواجهات التخيلية للنظام</span>
            </h3>
            <div id="pdmScreenshots" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4"></div>
          </div>

          <!-- Section 3: Features & Specifications -->
          <div class="space-y-2 sm:space-y-3">
            <h3 class="text-sm sm:text-base md:text-lg font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-cubes text-cyan-400"></i><span>المواصفات والخصائص الفنية</span>
            </h3>
            <div id="pdmFeatures" class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 sm:gap-3"></div>
          </div>

          <!-- Section 4: Performance Metrics -->
          <div class="space-y-2 sm:space-y-3">
            <h3 class="text-sm sm:text-base md:text-lg font-black text-white flex items-center gap-2 border-b border-cyan-500/20 pb-2">
              <i class="fa-solid fa-chart-line text-cyan-400"></i><span>مؤشرات الكفاءة والتشغيل</span>
            </h3>
            <div id="pdmMetrics" class="grid grid-cols-2 sm:grid-cols-3 gap-2.5 sm:gap-3 text-center"></div>
          </div>

        </div>

        <!-- Modal Footer CTA -->
        <div class="bg-[#0c223f] border-t border-cyan-500/30 p-3.5 sm:p-5 flex flex-col sm:flex-row items-center justify-between gap-3 sm:gap-4 flex-shrink-0">
          <div class="text-center sm:text-right">
            <p class="text-xs text-slate-300 font-bold">هل ترغب في بناء منظومة مماثلة لشركتك؟</p>
            <p class="text-[10px] sm:text-[11px] text-cyan-400 font-mono">استشارة وتخطيط أولي مجاني 100%</p>
          </div>
          <div class="flex items-center gap-2 sm:gap-3 w-full sm:w-auto justify-center sm:justify-end">
            <button type="button" onclick="closeProjectDetailsModal()" class="px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-bold text-xs border border-slate-700 transition">
              إغلاق النافذة ✕
            </button>
            <a id="pdmWhatsappBtn" href="#" target="_blank" rel="noopener" class="flex-1 sm:flex-initial px-4 py-2 sm:px-6 sm:py-2.5 rounded-xl bg-green-500 hover:bg-green-400 text-white font-black text-xs sm:text-sm flex items-center justify-center gap-2 shadow-lg shadow-green-500/25 transition">
              <i class="fa-brands fa-whatsapp text-sm sm:text-base"></i><span>طلب تنفيذ عبر واتساب</span>
            </a>
          </div>
        </div>

      </div>
    </div>

    <!-- LIGHTBOX MODAL (Mobile-Responsive) -->
    <div id="galleryLightbox" onclick="if(event.target === this) closeGalleryLightbox()" class="fixed inset-0 z-[99999] hidden bg-black/95 backdrop-blur-xl flex items-center justify-center p-3 sm:p-6 overflow-y-auto">
      <div class="relative max-w-4xl w-full glass-card rounded-2xl sm:rounded-3xl border border-cyan-500/40 p-4 sm:p-7 space-y-3 sm:space-y-4 shadow-2xl my-auto text-right">
        <button onclick="closeGalleryLightbox()" class="absolute top-3 left-3 sm:top-4 sm:left-4 text-slate-400 hover:text-white text-xl font-bold z-10 w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-slate-900/80 flex items-center justify-center border border-cyan-500/30">&times;</button>
        
        <div id="lightboxVisual" class="rounded-xl sm:rounded-2xl overflow-hidden border border-cyan-500/30 bg-[#07172b] flex items-center justify-center max-h-[340px] sm:max-h-[420px] relative"></div>

        <div class="space-y-1.5 sm:space-y-2 text-right">
          <div class="flex items-center justify-between gap-2 flex-wrap">
            <h3 id="lightboxTitle" class="text-sm sm:text-xl font-black text-white"></h3>
            <span id="lightboxCategory" class="px-2.5 py-0.5 sm:px-3 sm:py-1 rounded-full text-[10px] sm:text-xs font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-500/40"></span>
          </div>
          <p id="lightboxDesc" class="text-xs sm:text-sm text-slate-300 leading-relaxed"></p>
          <div id="lightboxTech" class="flex items-center gap-1.5 sm:gap-2 flex-wrap pt-1 text-[10px] sm:text-[11px] font-mono text-cyan-300"></div>
        </div>
      </div>
    </div>

    <script>
    const serverProjectsList = <?= json_encode(!empty($dbProjects) ? $dbProjects : null, JSON_UNESCAPED_UNICODE) ?>;
    const serverServicesList = <?= json_encode(!empty($dbServices) ? $dbServices : null, JSON_UNESCAPED_UNICODE) ?>;
    const serverTeamList = <?= json_encode(!empty($dbTeam) ? $dbTeam : null, JSON_UNESCAPED_UNICODE) ?>;
    const serverFaqsList = <?= json_encode(!empty($dbFaqs) ? $dbFaqs : null, JSON_UNESCAPED_UNICODE) ?>;
    const serverGalleryList = <?= json_encode(!empty($dbGallery) ? $dbGallery : null, JSON_UNESCAPED_UNICODE) ?>;

    const rawProjects = [
  {
    "id": "almobtaker-erp",
    "title": "منظومة المبتكر ERP السحابية المتكاملة للشركات",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "Laravel 11 • Vue.js • MySQL • Multi-Tenancy",
    "description": "نظام تخطيط موارد المؤسسات المتكامل، إدارة شجرة الحسابات العامة، مراكز التكلفة، الفروع المتعددة، المشتريات والمخازن، وإدارة الموظفين والرواتب.",
    "status": "يعمل لدى 35+ شركة ومؤسسة",
    "image": "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "نظام تخطيط موارد المؤسسات المتكامل، إدارة شجرة الحسابات العامة، مراكز التكلفة، الفروع المتعددة، المشتريات والمخازن، وإدارة الموظفين والرواتب. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "يعمل لدى 35+ شركة ومؤسسة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "saas-whatsapp-bot",
    "title": "منصة أتمتة الواتساب وروبوتات الـ AI للشركات (SaaS Multi-Tenant)",
    "category": "ai",
    "categoryName": "ذكاء اصطناعي وواتساب",
    "tech": "FastAPI • OpenAI LLMs • WhatsApp Cloud API • Redis",
    "description": "منصة سحابية متعددة المستأجرين لبناء روبوتات خدمة عملاء مدعومة بالذكاء الاصطناعي، ترتبط بقواعد البيانات لجدولة المواعيد وإرسال الفواتير التلقائية.",
    "status": "+120,000 محادثة آلية شهرياً",
    "image": "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1677442136019-21780efad99a?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "منصة سحابية متعددة المستأجرين لبناء روبوتات خدمة عملاء مدعومة بالذكاء الاصطناعي، ترتبط بقواعد البيانات لجدولة المواعيد وإرسال الفواتير التلقائية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "+120,000 محادثة آلية شهرياً",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "lens-zatca",
    "title": "بوابة الربط والفوترة الإلكترونية السعودية (ZATCA Lens Hub)",
    "category": "zatca",
    "categoryName": "ZATCA وفوترة إلكترونية",
    "tech": "PHP / Laravel • Cryptographic XML • REST API",
    "description": "إصدار الفواتير الضريبية والمبسطة المتوافقة مع متطلبات المرحلة الثانية لهيئة الزكاة والضريبة والجمارك مع التوقيع الرقمي و QR Code المشفر.",
    "status": "ربط معتمد 100% بدون تأخير",
    "image": "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إصدار الفواتير الضريبية والمبسطة المتوافقة مع متطلبات المرحلة الثانية لهيئة الزكاة والضريبة والجمارك مع التوقيع الرقمي و QR Code المشفر. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "ربط معتمد 100% بدون تأخير",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "poultry-erp",
    "title": "نظام إدارة وتتبع تكاليف مزارع الدواجن والإنتاج الحيواني",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "React 19 • Python AI Solver • Gompertz Growth ML",
    "description": "تتبع هرمي للمزارع والعنابر والدورات، حساب معامل FCR ونسب النفوق، تسعير تكلفة الكتكوت يومياً، ومحاكاة تكاليف الأعلاف والتغذية بالذكاء الاصطناعي.",
    "status": "يعمل في 20+ مجمع داجني",
    "image": "https://images.unsplash.com/photo-1586771107445-d3ca888129ff?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1586771107445-d3ca888129ff?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1586771107445-d3ca888129ff?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع هرمي للمزارع والعنابر والدورات، حساب معامل FCR ونسب النفوق، تسعير تكلفة الكتكوت يومياً، ومحاكاة تكاليف الأعلاف والتغذية بالذكاء الاصطناعي. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "يعمل في 20+ مجمع داجني",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "hospital-system",
    "title": "نظام إدارة المستشفيات والمجمعات الطبية الكبرى (Hospital HIS)",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "Laravel • Vue.js • MySQL • WebSockets",
    "description": "منظومة HIS متكاملة تشمل أقسام التنويم الداخلي، غرف العمليات، العناية المركزة، الاستقبال والطوارئ، مع الربط المباشر مع المعامل والأشعة.",
    "status": "إدارة أكثر من 8 مستشفيات كبرى",
    "image": "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "منظومة HIS متكاملة تشمل أقسام التنويم الداخلي، غرف العمليات، العناية المركزة، الاستقبال والطوارئ، مع الربط المباشر مع المعامل والأشعة. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة أكثر من 8 مستشفيات كبرى",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "medical-centers-records",
    "title": "منظومة السجلات الطبية الإلكترونية EMR للمراكز التخصصية",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "React • Node.js • Express • PostgreSQL",
    "description": "إدارة ملفات المرضى الطبية التاريخية، تتبع الفحوصات والتحاليل، روشتات الأطباء الإلكترونية، ومتابعة التاريخ المرضي بدقة عالية.",
    "status": "أكثر من 250,000 ملف مريض إلكتروني",
    "image": "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة ملفات المرضى الطبية التاريخية، تتبع الفحوصات والتحاليل، روشتات الأطباء الإلكترونية، ومتابعة التاريخ المرضي بدقة عالية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "أكثر من 250,000 ملف مريض إلكتروني",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "dr-mina-clinic",
    "title": "منظومة عيادات ومراكز د. مينا التخصصية",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "PHP • Bootstrap • MySQL • SMS Gateway",
    "description": "إدارة الحجوزات الذكية، تتبع الكشوفات، حساب الإيرادات ونسب الأطباء والتمريض، وتنبيهات مواعيد المرضى عبر الرسائل القصيرة.",
    "status": "يعمل بسلاسة يومياً",
    "image": "https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة الحجوزات الذكية، تتبع الكشوفات، حساب الإيرادات ونسب الأطباء والتمريض، وتنبيهات مواعيد المرضى عبر الرسائل القصيرة. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "يعمل بسلاسة يومياً",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "dr-eldemery-clinic",
    "title": "منظومة عيادات ومراكز د. الدمرداش الطبية",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "Laravel • Livewire • Tailwind CSS",
    "description": "تتبع التشخيصات، الأجهزة الطبية، الفحوصات الدورية للمرضى، وتنظيم غرف الكشف وأوقات الانتظار.",
    "status": "خدمة أكثر من 50,000 مريض",
    "image": "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1505751172876-fa1923c5c528?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع التشخيصات، الأجهزة الطبية، الفحوصات الدورية للمرضى، وتنظيم غرف الكشف وأوقات الانتظار. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "خدمة أكثر من 50,000 مريض",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "clinic-suite",
    "title": "المنظومة الشاملة لإدارة العيادات والمراكز الطبية (Clinic Suite)",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "Vue.js • Laravel • SQLite / MySQL",
    "description": "برنامج لإدارة العيادات الفردية والمجمعة، شاشات انتظار المرضى، الروشتة الذكية وقاموس الأدوية.",
    "status": "يعمل في 40+ عيادة",
    "image": "https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1538108149393-fbbd81895907?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "برنامج لإدارة العيادات الفردية والمجمعة، شاشات انتظار المرضى، الروشتة الذكية وقاموس الأدوية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "يعمل في 40+ عيادة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "pharmacy-erp",
    "title": "نظام ERP المتكامل لإدارة وسلاسل الصيدليات",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "Laravel • Vue.js • Barcode Engine",
    "description": "تتبع تواريخ الصلاحية للأدوية، التنبيه بالنواقص، تتبع المبيعات والمشتريات وخصومات شركات التأمين والربط مع قارئ الباركود.",
    "status": "إدارة سلاسل صيدليات نشطة",
    "image": "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1471864190281-a93a3070b6de?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع تواريخ الصلاحية للأدوية، التنبيه بالنواقص، تتبع المبيعات والمشتريات وخصومات شركات التأمين والربط مع قارئ الباركود. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة سلاسل صيدليات نشطة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "drugs-stores-app",
    "title": "منظومة إدارة مستودعات ومخازن الأدوية والمستحضرات",
    "category": "medical",
    "categoryName": "طبي ومستشفيات",
    "tech": "React • Electron • SQLite / MySQL",
    "description": "إدارة مخازن الأدوية بالجملة، تتبع أرقام التشغيلات (Batch Numbers)، التحويلات بين المخازن، وفواتير التوزيع للصيدليات.",
    "status": "تتبع مئات الآلاف من الأصناف الدوائية",
    "image": "https://images.unsplash.com/photo-1471864190281-a93a3070b6de?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1471864190281-a93a3070b6de?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1471864190281-a93a3070b6de?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة مخازن الأدوية بالجملة، تتبع أرقام التشغيلات (Batch Numbers)، التحويلات بين المخازن، وفواتير التوزيع للصيدليات. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "تتبع مئات الآلاف من الأصناف الدوائية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "production-lines",
    "title": "نظام إدارة وتتبع خطوط الإنتاج والتصنيع الصناعي",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "Laravel • Vue.js • BOM Engine • IoT",
    "description": "إدارة أوامر الشغل والتصنيع، شجرة مكونات المنتج (BOM)، حساب الهالك والفاقد، وتتبع تكلفة المواد الخام والعمالة المباشرة وغير المباشرة.",
    "status": "تتبع مستمر لخطوط الإنتاج في المصانع",
    "image": "https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة أوامر الشغل والتصنيع، شجرة مكونات المنتج (BOM)، حساب الهالك والفاقد، وتتبع تكلفة المواد الخام والعمالة المباشرة وغير المباشرة. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "تتبع مستمر لخطوط الإنتاج في المصانع",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "delta-gas",
    "title": "نظام إدارة وتوزيع خطوط الغاز والمحطات (Delta Gas)",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "PHP • MySQL • Fleet Tracker",
    "description": "تتبع شحنات الغاز، أوزان الصهاريج، خطوط التوزيع اليومية، حساب الأرصدة بالمحطات وتتبع الفواتير والتحصيلات.",
    "status": "إدارة حركة النقل والتوزيع للغاز",
    "image": "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع شحنات الغاز، أوزان الصهاريج، خطوط التوزيع اليومية، حساب الأرصدة بالمحطات وتتبع الفواتير والتحصيلات. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة حركة النقل والتوزيع للغاز",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "industry-dev",
    "title": "منظومة تطوير وإدارة المشروعات الصناعية والتكاليف",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "Laravel • Filament • PostgreSQL",
    "description": "تخطيط العمليات الصناعية، جدولة الصيانة الدورية للماكينات، مراقبة كفاءة المعدات OEE، ومحاسبة التكاليف المعيارية.",
    "status": "تطبيق في كبرى المنشآت الصناعية",
    "image": "https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تخطيط العمليات الصناعية، جدولة الصيانة الدورية للماكينات، مراقبة كفاءة المعدات OEE، ومحاسبة التكاليف المعيارية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "تطبيق في كبرى المنشآت الصناعية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "agri-sense",
    "title": "منظومة الزراعة الذكية والمستشعرات الزراعية (Agri-Sense)",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "Python • IoT Sensors • MQTT • FastApi",
    "description": "مراقبة رطوبة التربة ودرجات الحرارة لحظياً عبر مستشعرات IoT، التحكم التلقائي في شبكات الري، وتنبؤات الطقس والإنتاجية.",
    "status": "إدارة مزارع نموذجية حديثة",
    "image": "https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1586771107445-d3ca888129ff?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "مراقبة رطوبة التربة ودرجات الحرارة لحظياً عبر مستشعرات IoT، التحكم التلقائي في شبكات الري، وتنبؤات الطقس والإنتاجية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة مزارع نموذجية حديثة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "elfeki-agri",
    "title": "منظومة الفقي للتنمية والاستصلاح والإنتاج الزراعي",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "Laravel • Blade • MySQL",
    "description": "إدارة مساحات الأراضي، دورات المحاصيل الزراعية، تسميد ووقاية النبات، وتتبع تكاليف الحصاد والبيع للأسواق.",
    "status": "إدارة مشاريع زراعية واسعة",
    "image": "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1500937386664-56d1dfef3854?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1530836369250-ef72a3f5cda8?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1586771107445-d3ca888129ff?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة مساحات الأراضي، دورات المحاصيل الزراعية، تسميد ووقاية النبات، وتتبع تكاليف الحصاد والبيع للأسواق. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة مشاريع زراعية واسعة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "quality-system",
    "title": "نظام إدارة وتوكيد الجودة وضبط المعايير (Quality Control ISO)",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "Laravel • Vue • Audit Trail",
    "description": "تسجيل اختبارات الجودة وعينات الفحص المخبري، تسجيل حالات عدم المطابقة NCR، وإصدار شهادات المعايرة والجودة ISO.",
    "status": "تطبيق معايير ISO 9001",
    "image": "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تسجيل اختبارات الجودة وعينات الفحص المخبري، تسجيل حالات عدم المطابقة NCR، وإصدار شهادات المعايرة والجودة ISO. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "تطبيق معايير ISO 9001",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "ai-school-new",
    "title": "منظومة المدارس الذكية المعززة بالذكاء الاصطناعي (AI School)",
    "category": "edtech",
    "categoryName": "تعليم ومنصات EdTech",
    "tech": "React • Node.js • AI Evaluation • Python",
    "description": "إدارة الطلاب والمعلمين، الجداول المدرسية الذكية، الحضور بالبصمة، التحليل التلقائي لمستويات الطلاب، وتوليد الامتحانات بالـ AI.",
    "status": "خدمة أكثر من 15 مدرسة ومؤسسة تعليمية",
    "image": "https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة الطلاب والمعلمين، الجداول المدرسية الذكية، الحضور بالبصمة، التحليل التلقائي لمستويات الطلاب، وتوليد الامتحانات بالـ AI. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "خدمة أكثر من 15 مدرسة ومؤسسة تعليمية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "eduap-pro",
    "title": "منصة الإدارة التعليمية المتطورة (EduAp Pro)",
    "category": "edtech",
    "categoryName": "تعليم ومنصات EdTech",
    "tech": "Laravel • Livewire • MySQL",
    "description": "منظومة شاملة لإدارة المصروفات المدرسية، النتائج والشهادات، بنك الأسئلة، والتواصل بين الإدارة وأولياء الأمور.",
    "status": "إدارة عشرات الآلاف من الطلاب",
    "image": "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "منظومة شاملة لإدارة المصروفات المدرسية، النتائج والشهادات، بنك الأسئلة، والتواصل بين الإدارة وأولياء الأمور. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة عشرات الآلاف من الطلاب",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "hossam-elearning",
    "title": "منصة حسام للتعليم الإلكتروني والامتحانات الرقمية",
    "category": "edtech",
    "categoryName": "تعليم ومنصات EdTech",
    "tech": "Vue.js • Laravel • Video DRM Streaming",
    "description": "بث الدروس المشفرة وحمايتها من التسجيل، الامتحانات التفاعلية ذات التقييم اللحظي، ولوحة متابعة درجات الطلاب وواجباتهم.",
    "status": "+30,000 طالب مسجل",
    "image": "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "بث الدروس المشفرة وحمايتها من التسجيل، الامتحانات التفاعلية ذات التقييم اللحظي، ولوحة متابعة درجات الطلاب وواجباتهم. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "+30,000 طالب مسجل",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "mr-mohamed-shaat",
    "title": "منصة الأستاذ محمد شحات التعليمية للثانوية العامة",
    "category": "edtech",
    "categoryName": "تعليم ومنصات EdTech",
    "tech": "React • Tailwind • Firebase • WhatsApp API",
    "description": "منصة كورسات واختبارات تفاعلية، إرسال تقارير الدرجات لأولياء الأمور آلياً عبر واتساب، وبنك تدريبات شامل.",
    "status": "تفاعل يومي لأكثر من 10,000 طالب",
    "image": "https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1501504905252-473c47e087f8?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "منصة كورسات واختبارات تفاعلية، إرسال تقارير الدرجات لأولياء الأمور آلياً عبر واتساب، وبنك تدريبات شامل. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "تفاعل يومي لأكثر من 10,000 طالب",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "language-center",
    "title": "نظام إدارة معاهد ومراكز اللغات والتدريب الدولي",
    "category": "edtech",
    "categoryName": "تعليم ومنصات EdTech",
    "tech": "PHP • MySQL • Placement Test Engine",
    "description": "إدارة قاعات ومستويات التدريب، تحديد المستوى التلقائي Placement Test، إصدار الشهادات المعتمدة، وتتبع الاشتراكات.",
    "status": "إدارة مراكز لغات معتمدة",
    "image": "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة قاعات ومستويات التدريب، تحديد المستوى التلقائي Placement Test، إصدار الشهادات المعتمدة، وتتبع الاشتراكات. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة مراكز لغات معتمدة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "laravel-installement",
    "title": "محرك إدارة عقود التقسيط والتحصيل المالي (Installment Engine)",
    "category": "fintech",
    "categoryName": "تمويل وتقسيط وكاشير",
    "tech": "Laravel 10 • MySQL • SMS Gateway",
    "description": "حساب الفوائد والجدولة الزمنية للأقساط، تتبع الضامنين والأوراق الثبوتية، إدارة المحصلين الميدانيين، وتنبيهات السداد التلقائية.",
    "status": "إدارة محافظ تمويلية ضخمة",
    "image": "https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "حساب الفوائد والجدولة الزمنية للأقساط، تتبع الضامنين والأوراق الثبوتية، إدارة المحصلين الميدانيين، وتنبيهات السداد التلقائية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة محافظ تمويلية ضخمة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "installement-motorcycle",
    "title": "منظومة تقسيط ومبيعات المركبات والدراجات النارية",
    "category": "fintech",
    "categoryName": "تمويل وتقسيط وكاشير",
    "tech": "PHP • MySQL • Contract Generator",
    "description": "إدارة أرقام الشاسيه والموتور، إبرام عقود البيع بالتقسيط، تتبع الشيكات والكمبيالات، وحساب الأرباح الشهرية والسنوية.",
    "status": "يعمل في معارض كبرى",
    "image": "https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة أرقام الشاسيه والموتور، إبرام عقود البيع بالتقسيط، تتبع الشيكات والكمبيالات، وحساب الأرباح الشهرية والسنوية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "يعمل في معارض كبرى",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "instal-hossam",
    "title": "منظومة إدارة المحافظ التمويلية والأقساط الاستهلاكية",
    "category": "fintech",
    "categoryName": "تمويل وتقسيط وكاشير",
    "tech": "Laravel • Blade • Chart.js",
    "description": "تتبع المستحقات، تقارير العملاء المتعثرين، تتبع التحصيلات اليومية للخزينة، وحساب الأرباح المحققة والمؤجلة.",
    "status": "إدارة تمويلات تجارية",
    "image": "https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1559526324-4b87b5e36e44?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع المستحقات، تقارير العملاء المتعثرين، تتبع التحصيلات اليومية للخزينة، وحساب الأرباح المحققة والمؤجلة. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة تمويلات تجارية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "pos-arabic",
    "title": "نظام نقاط البيع والكاشير العربي المتوافق مع الفاتورة الإلكترونية",
    "category": "fintech",
    "categoryName": "تمويل وتقسيط وكاشير",
    "tech": "Electron • React • Thermal Printer SDK",
    "description": "كاشير سريع فائق الاستجابة يدعم شاشات اللمس، قارئ الباركود، الموازين الإلكترونية، والطباعة الفورية للفواتير الضريبية المبسطة.",
    "status": "يعمل في أكثر من 100 متجر ومنفذ بيع",
    "image": "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1556742111-a301076d9d18?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "كاشير سريع فائق الاستجابة يدعم شاشات اللمس، قارئ الباركود، الموازين الإلكترونية، والطباعة الفورية للفواتير الضريبية المبسطة. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "يعمل في أكثر من 100 متجر ومنفذ بيع",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "adly-pos-inventory",
    "title": "منظومة عدلي للكاشير وإدارة المخزون والمبيعات السريعة",
    "category": "fintech",
    "categoryName": "تمويل وتقسيط وكاشير",
    "tech": "PHP • MySQL • Inventory Tracking",
    "description": "تتبع حركة الأصناف بالمخازن، إشعارات انخفاض المخزون، جرد المخازن الفوري، وتسجيل الإيرادات والمصروفات اليومية.",
    "status": "مستخدم في مراكز التوزيع",
    "image": "https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع حركة الأصناف بالمخازن، إشعارات انخفاض المخزون، جرد المخازن الفوري، وتسجيل الإيرادات والمصروفات اليومية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "مستخدم في مراكز التوزيع",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "almohaseb",
    "title": "برنامج المحاسب الذكي - قيود يومية وحسابات ختامية",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "PHP • MySQL • Double Entry Accounting",
    "description": "محاسبة القيد المزدوج، ميزان المراجعة، قائمة الدخل، الميزانية العمومية، إدارة الخزائن والبنوك وتسوية العهد.",
    "status": "إدارة حسابات منشآت تجارية",
    "image": "https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "محاسبة القيد المزدوج، ميزان المراجعة، قائمة الدخل، الميزانية العمومية، إدارة الخزائن والبنوك وتسوية العهد. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة حسابات منشآت تجارية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "sales-management-c",
    "title": "برنامج إدارة المبيعات والمخازن المتطور (Sales Pro)",
    "category": "fintech",
    "categoryName": "تمويل وتقسيط وكاشير",
    "tech": "C# • .NET • SQL Server",
    "description": "نظام مبيعات مكتبي قوي وسريع، معالجة فورية للمبيعات والمشتريات، إدارة حدود الائتمان للعملاء، وتقارير أرباح الأصناف.",
    "status": "أداء مستقر وسريع جداً",
    "image": "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "نظام مبيعات مكتبي قوي وسريع، معالجة فورية للمبيعات والمشتريات، إدارة حدود الائتمان للعملاء، وتقارير أرباح الأصناف. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "أداء مستقر وسريع جداً",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "sales-new",
    "title": "منظومة تتبع المندوبين والمبيعات الميدانية (Field Sales ERP)",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "Laravel • Mobile API • GPS Tracking",
    "description": "تتبع خطوط سير المناديب عبر GPS، تسجيل فواتير البيع والتحصيل من المحلات لحظياً، ومزامنة البيانات الفورية مع السيرفر المركزي.",
    "status": "إدارة أساطيل مناديب المبيعات",
    "image": "https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1556740758-90de374c12ad?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع خطوط سير المناديب عبر GPS، تسجيل فواتير البيع والتحصيل من المحلات لحظياً، ومزامنة البيانات الفورية مع السيرفر المركزي. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة أساطيل مناديب المبيعات",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "orange-lines",
    "title": "نظام إدارة أسطول النقل والشحن والخدمات اللوجستية (Orange Lines)",
    "category": "industrial",
    "categoryName": "صناعي وزراعي",
    "tech": "Laravel • GPS Tracker • Mobile App",
    "description": "تتبع الشاحنات والسيارات، بوالص الشحن والتفريغ، تتبع مصروفات وصيانة المركبات، وإدارة خطوط النقل بين المحافظات.",
    "status": "تتبع مئات الرحلات اليومية",
    "image": "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1580674684081-7617fbf3d745?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "تتبع الشاحنات والسيارات، بوالص الشحن والتفريغ، تتبع مصروفات وصيانة المركبات، وإدارة خطوط النقل بين المحافظات. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "تتبع مئات الرحلات اليومية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "vision-analytics",
    "title": "منصة الرؤية الذكية للتحليلات الإحصائية وتوقع المبيعات (Vision)",
    "category": "ai",
    "categoryName": "ذكاء اصطناعي وواتساب",
    "tech": "Python • Streamlit • Pandas • ML Forecasting",
    "description": "لوحات بيانية تفاعلية متقدمة لتحليل سلوك المستهلكين، كشف الأنماط الموسمية للمبيعات، والتنبؤ الدقيق بالإيرادات المستقبلية.",
    "status": "دعم اتخاذ القرار للإدارة العليا",
    "image": "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "لوحات بيانية تفاعلية متقدمة لتحليل سلوك المستهلكين، كشف الأنماط الموسمية للمبيعات، والتنبؤ الدقيق بالإيرادات المستقبلية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "دعم اتخاذ القرار للإدارة العليا",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "alfahd-new",
    "title": "نظام الفهد المتكامل لإدارة الأعمال والمبيعات",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "PHP • Bootstrap • MySQL",
    "description": "إدارة العملاء، عروض الأسعار، أوامر التوريد، الفواتير، ومتابعة التحصيلات المالية لشركات التجارة والتوريدات.",
    "status": "منظومة إدارة مستقرة",
    "image": "https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة العملاء، عروض الأسعار، أوامر التوريد، الفواتير، ومتابعة التحصيلات المالية لشركات التجارة والتوريدات. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "منظومة إدارة مستقرة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "saleh-tarfayah",
    "title": "نظام إدارة التجارة والتوزيع (مؤسسة صالح طرفاية)",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "Laravel • MySQL • Warehouse Multi-Loc",
    "description": "إدارة المخازن المركزية، تتبع طلبيات الفروع، تسعير الجملة والتجزئة، وإصدار كشوفات حساب العملاء والموردين.",
    "status": "مستخدم في شبكات التوزيع",
    "image": "https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1553413077-190dd305871c?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة المخازن المركزية، تتبع طلبيات الفروع، تسعير الجملة والتجزئة، وإصدار كشوفات حساب العملاء والموردين. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "مستخدم في شبكات التوزيع",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "assem-hegazy",
    "title": "منظومة إدارة المشروعات والمقاولات (عاصم حجازي)",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "Laravel • MySQL • Contracts Manager",
    "description": "إدارة عقود المشروعات، مستخلصات المقاولين والمقاولين الباطن، تتبع نسب الإنجاز، وصرف المواد والمعدات في الموقع.",
    "status": "إدارة مشروعات إنشائية",
    "image": "https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1541888946425-d0fbb186c5f7?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1581092335397-9583fe92d232?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة عقود المشروعات، مستخلصات المقاولين والمقاولين الباطن، تتبع نسب الإنجاز، وصرف المواد والمعدات في الموقع. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة مشروعات إنشائية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "osama-abokhalifa",
    "title": "نظام إدارة الأعمال والتجارة (مؤسسة أسامة أبو خليفة)",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "PHP • MySQL • Invoicing Engine",
    "description": "نظام مالي وإداري مخصص لمتابعة المبيعات، حسابات العملاء، الخزينة، والمصروفات الإدارية والتشغيلية.",
    "status": "إدارة نشطة",
    "image": "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1450133064473-71024230f91b?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "نظام مالي وإداري مخصص لمتابعة المبيعات، حسابات العملاء، الخزينة، والمصروفات الإدارية والتشغيلية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة نشطة",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "shiba-distribution",
    "title": "منظومة إدارة التوزيع والتوكيلات التجارية (مؤسسة شيبة)",
    "category": "erp",
    "categoryName": "أنظمة ERP وشركات",
    "tech": "Laravel • MySQL • POS Sync",
    "description": "إدارة التوكيلات وحصص التوزيع، متابعة خطط البيع للمناديب، تتبع مديونيات التجار، ومحاسبة الأرباح الدورية.",
    "status": "إدارة توزيع على نطاق واسع",
    "image": "https://images.unsplash.com/photo-1580674684081-7617fbf3d745?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1580674684081-7617fbf3d745?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1580674684081-7617fbf3d745?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1587293852726-70cdb56c2866?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "إدارة التوكيلات وحصص التوزيع، متابعة خطط البيع للمناديب، تتبع مديونيات التجار، ومحاسبة الأرباح الدورية. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة توزيع على نطاق واسع",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  },
  {
    "id": "job-portal",
    "title": "منصة وبوابة التوظيف الرقمية ومطابقة الكفاءات (Job Portal)",
    "category": "ai",
    "categoryName": "ذكاء اصطناعي وواتساب",
    "tech": "React • Node.js • Resume Matcher Engine",
    "description": "بوابة توظيف متطورة للشركات والباحثين عن عمل، تصفية ومطابقة السير الذاتية آلياً، جدولة المقابلات واختبارات المتقدمين.",
    "status": "إدارة آلاف السير الذاتية",
    "image": "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=900&q=80",
    "heroImage": "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=900&q=80",
    "screenshots": [
      "https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80",
      "https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=900&q=80"
    ],
    "fullDesc": "بوابة توظيف متطورة للشركات والباحثين عن عمل، تصفية ومطابقة السير الذاتية آلياً، جدولة المقابلات واختبارات المتقدمين. تم بناء هذا النظام بهندسة برمجية سحابية متقدمة تضمن استقرار الأداء وسرعة المعالجة اللحظية وقابلية التوسع لآلاف العمليات المتزامنة، مع دعم كامل للتقارير التحليلية واللوحات البيانية التفاعلية ومستويات الصلاحيات المتقدمة.",
    "features": [
      "لوحة قيادة تفاعلية مركزية وإحصائيات لحظية",
      "تكامل سحابي وقواعد بيانات مشفرة ومحمية",
      "إدارة متقدمة للصلاحيات والمستخدمين والرقابة الداخلية",
      "تصدير فوري للتقارير المالية والتشغيلية (PDF / Excel)",
      "متوافق مع أجهزة الجوال والشاشات اللمسية ومختلف المتصفحات"
    ],
    "metrics": [
      "إدارة آلاف السير الذاتية",
      "زمن استجابة < 120ms",
      "سحابي ومحمي بالكامل"
    ]
  }
];
    let storedProjects = JSON.parse(localStorage.getItem('almobtaker_projects') || 'null');
    let defaultProjectsList = rawProjects.map(rp => {
      const sp = storedProjects ? storedProjects.find(item => item.id === rp.id) : null;
      if (sp && sp.image && sp.image.includes('unsplash') && sp.image !== 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80') {
        return { ...rp, ...sp };
      }
      return rp;
    });
    let projects = serverProjectsList || defaultProjectsList;

    const categoryColors = { erp:'text-blue-300 bg-blue-500/10 border-blue-500/30', medical:'text-rose-300 bg-rose-500/10 border-rose-500/30', industrial:'text-amber-300 bg-amber-500/10 border-amber-500/30', edtech:'text-violet-300 bg-violet-500/10 border-violet-500/30', fintech:'text-emerald-300 bg-emerald-500/10 border-emerald-500/30', ai:'text-cyan-300 bg-cyan-500/10 border-cyan-500/30', zatca:'text-orange-300 bg-orange-500/10 border-orange-500/30' };
    const categoryIcons = { erp:'fa-building', medical:'fa-hospital', industrial:'fa-industry', edtech:'fa-graduation-cap', fintech:'fa-coins', ai:'fa-robot', zatca:'fa-file-invoice' };

    const defaultServices = [
      { id: 's-web-ai', title: 'تطوير تطبيقات الويب والموبايل والذكاء الاصطناعي', icon: 'fa-brands fa-react text-cyan-400', desc: 'تطوير تطبيقات ويب وموبايل مخصصة فائقة السرعة مع دمج نماذج الذكاء الاصطناعي LLM وبوابات الدفع الإلكتروني.', points: ['تطبيقات الويب التفاعلية React & Next.js و Vue.js', 'تطبيقات الهواتف الذكية Flutter لـ iOS و Android', 'واجهات برمجة التطبيقات APIs السريعة والمحمية', 'أتمتة العمليات وربط نماذج الذكاء الاصطناعي المتطورة'] },
      { id: 's-custom-erp', title: 'منظومات ERP السحابية المخصصة للشركات', icon: 'fa-solid fa-building-user text-blue-400', desc: 'بناء أنظمة تخطيط موارد المؤسسات المخصصة بالكامل وفق الهيكل الإداري والمالي لشركتك.', points: ['شجرة الحسابات العامة والقيود المحاسبية التلقائية', 'إدارة المخازن المتعددة والمشتريات والمبيعات', 'إدارة شؤون الموظفين والرواتب والعهد والـ HR', 'تقارير الأرباح والخسائر والميزانية التقديرية اللحظية'] },
      { id: 's-ai-whatsapp', title: 'حلول الذكاء الاصطناعي وروبوتات الواتساب SaaS', icon: 'fa-solid fa-robot text-emerald-400', desc: 'بناء روبوتات خدمة عملاء ذكية بالذكاء الاصطناعي تعمل 24/7 وترتبط مباشرة بقواعد بيانات شركتك.', points: ['ربط رسمي مع WhatsApp Cloud API المعتمد', 'روبوتات ذكية لحجز المواعيد والاستفسارات وتتبع الطلبات', 'إرسال الفواتير والإشعارات التلقائية للعملاء', 'لوحة تحكم مركزية للمحادثات وتحليل رضا العملاء'] },
      { id: 's-pos-zatca', title: 'نقاط البيع السريعة والفوترة الإلكترونية ZATCA', icon: 'fa-solid fa-cash-register text-amber-400', desc: 'أنظمة كاشير ونقاط بيع متطورة وشاشات لمس متوافقة 100% مع متطلبات المرحلة الثانية لهيئة الزكاة والضريبة.', points: ['إصدار الفاتورة الضريبية والمبسطة بـ QR مشفر', 'تكامل مباشر وسلس مع أجهزة الباركود والموازين', 'مزامنة لحظية للمبيعات والمخزون أوفلاين وأونلاين', 'طباعة إيصالات حرارية سريعة وتقارير الوردية'] },
      { id: 's-cybersecurity', title: 'الأمن السيبراني واختبار الاختراق وحماية البيانات', icon: 'fa-solid fa-shield-halved text-rose-400', desc: 'فحص الثغرات الأمنية واختبار اختراق الأنظمة والتطبيقات لضمان حماية بيانات عملائك ضد أي هجمات.', points: ['اختبارات الاختراق الدورية Penetration Testing', 'تشفير قواعد البيانات والاتصالات SSL / TLS', 'حماية متقدمة من هجمات الحرمان من الخدمة DDoS', 'سياسات النسخ الاحتياطي المشفر والاستعادة السريعة'] },
      { id: 's-cloud-devops', title: 'الاستضافة السحابية وإدارة الخوادم (Cloud & DevOps)', icon: 'fa-solid fa-server text-cyan-400', desc: 'تجهيز وإدارة خوادم سحابية فائقة الاستقرار والسرعة على AWS و DigitalOcean مع مراقبة 24/7.', points: ['إدارة حاويات Docker و Kubernetes للأنظمة الكبرى', 'توزيع الأحمال Load Balancing لضمان سرعة فائقة', 'نسخ احتياطي يومي تلقائي خارج الموقع', 'مراقبة الأداء واستهلاك الموارد لحظة بلحظة'] },
      { id: 's-ui-ux', title: 'تصميم واجهات وتجربة المستخدم (UI/UX Design)', icon: 'fa-solid fa-pen-ruler text-violet-400', desc: 'تصميم شاشات وواجهات رقمية عصرية مريحة للعين وسهلة الاستخدام تزيد من تفاعل عملائك ونمو مبيعاتك.', points: ['دراسة وتخطيط رحلة المستخدم Wireframing & UX Research', 'تصميم واجهات تفاعلية احترافية على Figma', 'نماذج أولية حية وتفاعلية قبل كتابة الكود', 'تصاميم متجاوبة 100% مع جميع أحجام الشاشات'] },
      { id: 's-odoo-erp', title: 'تخصيص وتنفيذ منظومة Odoo ERP المتكاملة', icon: 'fa-solid fa-cubes text-yellow-400', desc: 'تخصيص كامل لموديولات Odoo ERP للمقاولات والتصنيع MRP والتجارة والتوزيع مع الربط المحاسبي.', points: ['تخصيص موديول المقاولات وإدارة المستخلصات', 'شجرة المنتج BOM وتخطيط الإنتاج الصناعي MRP', 'تكامل المحاسبة والمخازن وإدارة علاقات العملاء CRM', 'تدريب شامل للكوادر ودعم فني مستمر'] }
    ];

    const defaultGallery = [
      { id: 'g-erp-1', category: 'erp', categoryName: 'أنظمة ERP وشركات', title: 'منظومة المبتكر ERP - لوحة التحكم المالية الموحدة', desc: 'لوحة قيادة مركزية لمتابعة الإيرادات والمصروفات ومراكز التكلفة.', tech: ['Laravel 11', 'Vue 3', 'Tailwind'], image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-chart-pie' },
      { id: 'g-medical-1', category: 'medical', categoryName: 'طبي ومستشفيات', title: 'منظومة المستشفيات HIS - شاشة إدارة غرف العمليات والتنويم', desc: 'نظام إدارة شامل للأسرة وغرف العمليات وتتبع الملف الإلكتروني.', tech: ['React', 'Node.js', 'PostgreSQL'], image: 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-hospital-user' },
      { id: 'g-poultry-1', category: 'industrial', categoryName: 'صناعي وزراعي', title: 'نظام مزارع الدواجن - محاكي التغذية والـ FCR بالذكاء الاصطناعي', desc: 'متابعة يومية دقيقة لاستهلاك العلف، نسب النفوق، ومنحنيات النمو.', tech: ['React 19', 'Python AI', 'ML'], image: 'https://images.unsplash.com/photo-1586771107445-d3ca888129ff?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-wheat-awn' },
      { id: 'g-ai-1', category: 'ai', categoryName: 'ذكاء اصطناعي وواتساب', title: 'منصة روبوتات الواتساب الذكية SaaS - شاشة بناء البوتات', desc: 'واجهة سحب وإفلات لإنشاء روبوتات رد آلي وخدمة عملاء ذكية.', tech: ['FastAPI', 'OpenAI LLM', 'WhatsApp API'], image: 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=900&q=80', icon: 'fa-brands fa-whatsapp' },
      { id: 'g-pos-1', category: 'pos', categoryName: 'كاشير وفوترة ZATCA', title: 'نظام الكاشير ونقاط البيع السريعة المعتمد من ZATCA', desc: 'شاشة لمس سريعة جداً تدعم الباركود وإصدار الفاتورة الإلكترونية.', tech: ['Electron', 'React', 'ZATCA Phase 2'], image: 'https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-cash-register' },
      { id: 'g-odoo-1', category: 'erp', categoryName: 'حلول Odoo المتكاملة', title: 'تخصيص Odoo ERP لقطاع المقاولات وإدارة المستخلصات', desc: 'واجهات مخصصة لإدارة المشروعات الإنشائية وشجرة التكاليف.', tech: ['Odoo 17', 'Python', 'PostgreSQL'], image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-helmet-safety' },
      { id: 'g-mrp-1', category: 'industrial', categoryName: 'صناعي وزراعي', title: 'منظومة التصنيع MRP - شجرة المنتج BOM وتخطيط الإنتاج', desc: 'تتبع أوامر التشغيل الصناعي، خطوط الإنتاج، ومراقبة الهالك.', tech: ['Laravel', 'Vue.js', 'BOM Engine'], image: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-industry' },
      { id: 'g-edtech-1', category: 'ai', categoryName: 'تعليم EdTech', title: 'منصة التعليم الرقمي والاختبارات الذكية (AI School)', desc: 'بوابة تعليمية متطورة مع تصحيح ذكي للامتحانات وجدولة الحصص.', tech: ['React', 'Node.js', 'Python AI'], image: 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-graduation-cap' },
      { id: 'g-cloud-1', category: 'erp', categoryName: 'سحابي وبنية تحتية', title: 'الخوادم السحابية وإدارة قواعد البيانات الموزعة Multi-Tenant', desc: 'بنية تحتية سحابية عالية الأمان والأداء تضمن استقرار الأنظمة.', tech: ['Docker', 'Kubernetes', 'AWS'], image: 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=900&q=80', icon: 'fa-solid fa-server' }
    ];

    const defaultTeam = [
      { name: 'د. جابر الشيمي', role: 'Co-Founder & CEO', icon: 'fa-solid fa-user-tie', image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. حسام مجدي', role: 'Front-End Developer', icon: 'fa-solid fa-code', image: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'د. آية ماهر غراب', role: 'Social Team Manager', icon: 'fa-solid fa-bullhorn', image: 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. ندى ياقوت شاهين', role: 'Front-End Developer', icon: 'fa-solid fa-laptop-code', image: 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. رُقيّة محمد شريط', role: 'UI/UX Designer', icon: 'fa-solid fa-pen-nib', image: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. سارة محمود البدري', role: 'UI/UX Designer', icon: 'fa-solid fa-pen-nib', image: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. روفيده محمد البشلاوي', role: 'Front-End Developer', icon: 'fa-solid fa-code', image: 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. ندى صبحي أبو زيد', role: 'Front-End Developer', icon: 'fa-solid fa-code', image: 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'أحمد جابر الشيمي', role: 'Social Media Team', icon: 'fa-brands fa-facebook', image: 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. عمرو خالد عيسى', role: 'Backend Software Engineer', icon: 'fa-solid fa-server', image: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'م. مصطفى العيسوي', role: 'Flutter Developer', icon: 'fa-solid fa-mobile-screen', image: 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=400&h=400&q=80' },
      { name: 'شمس صبحي الشيمي', role: 'Marketing Team', icon: 'fa-solid fa-chart-pie', image: 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?auto=format&fit=crop&w=400&h=400&q=80' }
    ];

    
    let galleryData = (serverGalleryList && serverGalleryList.length) ? serverGalleryList : JSON.parse(localStorage.getItem('almobtaker_gallery') || '[]');
    let teamData = serverTeamList || JSON.parse(localStorage.getItem('almobtaker_team') || JSON.stringify(defaultTeam));

    // 2. SERVICES DYNAMIC RENDERER (Synchronized with Admin)
    const richServicesData = [{"id":"s-web-ai","title":"تطوير تطبيقات الويب والموبايل والذكاء الاصطناعي","shortDesc":"بناء تطبيقات ويب وهواتف ذكية فائقة السرعة مع دمج الـ AI وبوابات الدفع الإلكتروني","icon":"fa-brands fa-react","iconColor":"text-cyan-400","tag":"⚡ تطبيقات سحابية وهجينة","image":"https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1000&q=80","desc":"نقوم بتطوير منصات وتطبيقات الويب والموبايل المخصصة بأحدث التقنيات العالمية (React, Next.js, Flutter)، مع ربط فوري لنماذج الذكاء الاصطناعي التوليدي LLM وبوابات الدفع الإلكتروني، لتقديم تجربة مستخدم استثنائية وسريعة جداً.","points":[{"title":"تطبيقات الويب التفاعلية","desc":"منصات سحابية فائقة السرعة بـ Next.js و React و Vue.js"},{"title":"تطبيقات الهواتف الذكية","desc":"تطبيقات أصلية موحدة لنظامي iOS و Android باستخدام Flutter"},{"title":"واجهات برمجية REST & GraphQL","desc":"APIs محمية وسريعة لمعالجة آلاف الطلبات المتزامنة"},{"title":"دمج الذكاء الاصطناعي وأتمتة العمليات","desc":"ربط خدمات OpenAI و Gemini والتعرف على الصور والبيانات"}],"tech":["React 19","Next.js","Flutter","FastAPI","Node.js","PostgreSQL"],"filterCat":"ai"},{"id":"s-custom-erp","title":"منظومات ERP السحابية المخصصة للشركات والمصانع","shortDesc":"تخطيط موارد المؤسسات، الحسابات العامة، المخازن المتعددة، وإدارة الـ HR","icon":"fa-solid fa-building-user","iconColor":"text-blue-400","tag":"🏢 إدارة مركزية موحدة","image":"https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1000&q=80","desc":"تصميم وبناء منظومات ERP مخصصة بالكامل تناسب طبيعة دورة عمل شركتك وهيكلك المالي، مع تغطية شاملة لشجرة الحسابات العامة، مراكز التكلفة، الفروع والمخازن المتعددة، والرقابة على المشتريات والمبيعات.","points":[{"title":"شجرة الحسابات والقيود الآلية","desc":"توليد تلقائي للقيود المحاسبية ومتابعة الميزانيات ومراكز التكلفة"},{"title":"المخازن والمشتريات والمبيعات","desc":"تتبع حركة المخزون بالجرد المستمر وإشعارات النواقص والباركود"},{"title":"إدارة شؤون الموظفين والرواتب","desc":"حساب مسيرات الرواتب، العهد، الإجازات، والجزاءات التلقائية"},{"title":"تقارير الأرباح واللوحات البيانية","desc":"تحليلات مالية فورية وقوائم الدخل والتدفقات النقدية اللحظية"}],"tech":["Laravel 11","Vue 3","MySQL Multi-Tenant","Redis","PDF Engines"],"filterCat":"erp"},{"id":"s-ai-whatsapp","title":"حلول الذكاء الاصطناعي وروبوتات الواتساب الذكية SaaS","shortDesc":"روبوتات خدمة عملاء تعمل 24/7 وترتبط بقواعد بيانات شركتك لإرسال الفواتير وجدولة المواعيد","icon":"fa-solid fa-robot","iconColor":"text-emerald-400","tag":"🤖 ذكاء اصطناعي وأتمتة WhatsApp","image":"https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=1000&q=80","desc":"نبني منصات وروبوتات ذكاء اصطناعي على تطبيق WhatsApp مرتبطة رسمياً بـ WhatsApp Cloud API، تستطيع الرد الآلي والفهم الدقيق لاحتياجات العملاء باللغة العربية والإنجليزية، وتتبع الطلبات وإصدار الفواتير الفورية.","points":[{"title":"ربط رسمي مع WhatsApp Cloud API","desc":"قنوات موثقة آمنة ترسل آلاف الإشعارات دون حظر للأرقام"},{"title":"روبوتات خدمة العملاء بالـ LLM","desc":"إجابة فورية ذكية على استفسارات المنتجات وحجز المواعيد"},{"title":"فواتير وإشعارات تلقائية للعملاء","desc":"إرسال الفواتير وملفات PDF وتأكيد الشحن فورياً عبر الواتساب"},{"title":"لوحة قيادة مركزية للمحادثات","desc":"متابعة كافة محادثات الفريق والعملاء من شاشة واحدة متكاملة"}],"tech":["FastAPI","OpenAI GPT-4o","WhatsApp API","Redis Queue","WebSockets"],"filterCat":"ai"},{"id":"s-pos-zatca","title":"نقاط البيع السريعة والفوترة الإلكترونية ZATCA","shortDesc":"أنظمة كاشير للمطاعم والمتاجر متوافقة 100% مع هيئة الزكاة والضريبة والجمارك","icon":"fa-solid fa-cash-register","iconColor":"text-amber-400","tag":"💳 معتمد من هيئة ZATCA","image":"https://images.unsplash.com/photo-1556742049-0a67c5574f73?auto=format&fit=crop&w=1000&q=80","desc":"حلول نقاط بيع وكاشير تعمل على شاشات اللمس والكمبيوتر والجوال، تدعم العمل أوفلاين وأونلاين، ومتوافقة تماماً مع متطلبات الفوترة الإلكترونية السعودية (المرحلة الثانية) مع التوقيع الرقمي والـ QR Code المشفر.","points":[{"title":"الفوترة الإلكترونية للمرحلة الثانية","desc":"إصدار الفواتير الضريبية والمبسطة بالتوقيع الرقمي المعتمد"},{"title":"دعم شاشات اللمس والباركود والموازين","desc":"واجهة بيع سريعة جداً للمطاعم والسوبرماركت ومحلات التجزئة"},{"title":"طباعة سريعة وتقارير الوردية (Z-Report)","desc":"إغلاق الخزائن وإيصالات استلام حرارية وتقارير أرباح الوردية"},{"title":"مزامنة سحابية متعددة الفروع","desc":"ربط مبيعات ومخازن كافة الفروع بالمركز الرئيسي لحظياً"}],"tech":["ZATCA Phase 2","Cryptographic XML","Electron","Thermal SDK","SQLite"],"filterCat":"zatca"},{"id":"s-cybersecurity","title":"الأمن السيبراني واختبار الاختراق وحماية البيانات","shortDesc":"فحص الثغرات، حماية السيرفرات وقواعد البيانات، واختبارات الاختراق الدورية","icon":"fa-solid fa-shield-halved","iconColor":"text-rose-400","tag":"🛡️ أمان سيبراني وتشفير عسكري","image":"https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1000&q=80","desc":"حماية شاملة لأنظمتك وبيانات عملائك من أي اختراق أو تسريب، من خلال إجراء اختبارات اختراق دورية (Penetration Testing)، وتأمين الاتصالات وقواعد البيانات، ومواجهة هجمات حجب الخدمة DDoS.","points":[{"title":"اختبارات الاختراق الدورية (Pentest)","desc":"كشف الثغرات الأمنية في التطبيقات والخوادم وإغلاقها فوراً"},{"title":"تشفير البيانات والاتصالات SSL / TLS","desc":"تشفير عالي الأمان لقواعد البيانات والاتصالات الحساسة"},{"title":"حماية متقدمة من هجمات DDoS","desc":"جدران نارية سحابية تضمن استمرار عمل أنظمتك تحت أي هجوم"},{"title":"خطط النسخ الاحتياطي والاستعادة الفورية","desc":"نسخ احتياطي مشفر يومياً لحماية البيانات من أي طارئ"}],"tech":["WAF","Cloudflare Enterprise","AES-256 Encryption","OWASP Top 10","Linux Hardening"],"filterCat":"erp"},{"id":"s-cloud-devops","title":"الاستضافة السحابية وإدارة الخوادم (Cloud & DevOps)","shortDesc":"خوادم سحابية عالية الأداء على AWS و DigitalOcean مع توزيع الأحمال والنسخ اليومي","icon":"fa-solid fa-server","iconColor":"text-indigo-400","tag":"☁️ استقرار سحابي 99.99%","image":"https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1000&q=80","desc":"إعداد وإدارة بنية تحتية سحابية متطورة تضمن أعلى سرعة استجابة واستقرار لأنظمتك، مع تفعيل تقنيات الحاويات Docker و Kubernetes وتوزيع الأحمال التلقائي لمواجهة ذروة الزيارات والعمليات.","points":[{"title":"إدارة حاويات Docker و Kubernetes","desc":"عزل تام للخدمات وسهولة التوسع والترقية بدون توقف النظام"},{"title":"توزيع الأحمال وموازنة الخوادم","desc":"Load Balancing لمضاعفة سرعة الاستجابة تحت الضغط العالي"},{"title":"مراقبة ومتابعة على مدار الساعة 24/7","desc":"لوحات مراقبة حية لاستهلاك المعالج والذاكرة والتنبيهات الفورية"},{"title":"تهيئة بيئات التطوير والإنتاج CI/CD","desc":"نشر تلقائي وآمن للتحديثات البرمجية بدون انقطاع الخدمة"}],"tech":["Docker","Kubernetes","AWS","DigitalOcean","Nginx","GitHub Actions"],"filterCat":"erp"},{"id":"s-ui-ux","title":"تصميم واجهات وتجربة المستخدم الاحترافية (UI/UX Design)","shortDesc":"دراسة رحلة المستخدم وتصميم واجهات تفاعلية جذابة وعصرية تزيد من تفاعل العملاء","icon":"fa-solid fa-pen-ruler","iconColor":"text-violet-400","tag":"🎨 تجربة مستخدم سلسة وعصرية","image":"https://images.unsplash.com/photo-1581291518857-4e27b48ff24e?auto=format&fit=crop&w=1000&q=80","desc":"نبتكر واجهات رقمية جذابة وسهلة الاستخدام ترتكز على دراسة سلوك العميل وتيسير رحلته داخل النظام أو التطبيق، مع بناء أنظمة تصميم متكاملة (Design Systems) ونماذج أولية تفاعلية قبل كتابة أي سطر كود.","points":[{"title":"أبحاث ودراسة رحلة المستخدم UX Research","desc":"تحليل سلوك الجمهور المستهدف وهندسة تدفق الصفحات"},{"title":"تصميم واجهات احترافية على Figma","desc":"واجهات فائقة الجمال والوضوح بنظام التصميم الموحد"},{"title":"نماذج أولية تفاعلية Interactive Prototypes","desc":"تجربة التطبيق والشاشات حياً قبل بدء عملية البرمجة"},{"title":"تصاميم متجاوبة 100% مع جميع الأجهزة","desc":"توافق مثالي مع شاشات الهواتف والتابلت وأجهزة الحاسوب"}],"tech":["Figma","Adobe XD","Design Systems","Wireframing","Prototyping"],"filterCat":"edtech"},{"id":"s-odoo-erp","title":"تخصيص وتنفيذ منظومة Odoo ERP المتكاملة","shortDesc":"تخصيص موديولات أودو للمقاولات والتصنيع والتجارة مع التدريب والدعم الفني الكامل","icon":"fa-solid fa-cubes","iconColor":"text-yellow-400","tag":"🧩 موديولات Odoo مخصصة","image":"https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=1000&q=80","desc":"تنفيذ وتطوير موديولات Odoo ERP المخصصة لقطاعات المقاولات والمستخلصات، التصنيع وتخطيط المواد MRP، والتوزيع، مع ربطها التام بالدورة المحاسبية ونقاط البيع وتدريب فريق عملك تدريباً شاملاً.","points":[{"title":"تخصيص موديول المقاولات والمستخلصات","desc":"تتبع بنود المشروعات والمستخلصات ونسب الإنجاز التراكمية"},{"title":"تخطيط الإنتاج والتصنيع الصناعي MRP","desc":"شجرة المنتج BOM وتتبع أوامر التشغيل وحساب الهالك والتكلفة"},{"title":"تكامل المحاسبة والمخازن والـ CRM","desc":"منظومة مترابطة تغنيك عن أي برامج خارجية مع دعم كامل"},{"title":"تدريب ونقل المعرفة ودعم مستمر","desc":"جلسات تدريبية مفصلة لكوادر الشركة مع وثائق تشغيلية واضحة"}],"tech":["Odoo 17 / 18","Python","PostgreSQL","XML-RPC","Custom Addons"],"filterCat":"erp"}];
    let servicesData = serverServicesList || JSON.parse(localStorage.getItem('almobtaker_services') || JSON.stringify(richServicesData));

    /* ====================================================================
       SERVICES SLIDER ENGINE (Responsive 2-Items Slider with Autoplay)
       ==================================================================== */
    let currentServicesCategory = 'all';
    let currentServicesSlideIndex = 0;
    let servicesAutoplayTimer = null;
    let isServicesAutoplayActive = true;
    let filteredServicesData = [];

    // Helper: Determine visible service cards count based on screen width
    function getVisibleServicesCount() {
      if (window.innerWidth >= 1024) return 2; // Desktop: 2 large detailed service cards
      return 1; // Tablet / Mobile: 1 detailed service card
    }

    // Update Services Slider Dimensions & Card Widths
    function updateServicesSliderDimensions() {
      const track = document.getElementById('servicesTrack');
      if (!track) return;
      const windowEl = document.getElementById('servicesTrackWindow');
      if (!windowEl) return;

      const containerWidth = windowEl.offsetWidth;
      const visible = getVisibleServicesCount();
      const gap = 24; // gap-6 = 24px
      const totalGaps = (visible - 1) * gap;
      const cardWidth = Math.max(280, (containerWidth - totalGaps) / visible);

      const cards = track.querySelectorAll('.service-slide-item');
      cards.forEach(card => {
        card.style.width = `${cardWidth}px`;
        card.style.flexShrink = '0';
      });

      goToServicesSlide(currentServicesSlideIndex, false);
    }

    // Render Services into the Slider Track
    function renderServicesSlider(resetIndex = true) {
      const track = document.getElementById('servicesTrack');
      const empty = document.getElementById('servicesEmpty');
      if (!track) return;

      const data = (Array.isArray(servicesData) && servicesData.length) ? servicesData : richServicesData;
      const cat = currentServicesCategory;
      filteredServicesData = data.filter(s => (cat === 'all' || s.filterCat === cat || s.category === cat));

      if (!filteredServicesData.length) {
        track.innerHTML = '';
        if (empty) empty.classList.remove('hidden');
        renderServicesDots();
        updateServicesCounters();
        return;
      }
      if (empty) empty.classList.add('hidden');

      if (resetIndex) {
        currentServicesSlideIndex = 0;
      }

      track.innerHTML = filteredServicesData.map((s) => {
        const waMsg = encodeURIComponent('مرحباً، أود الاستفسار وطلب تفاصيل وتكلفة خدمة: ' + s.title);
        const pointsArr = Array.isArray(s.points) ? s.points : [];

        return `
          <div class="service-slide-item glass-card rounded-3xl border border-cyan-500/30 overflow-hidden shadow-2xl p-6 sm:p-8 flex flex-col justify-between space-y-6 hover:border-cyan-400/60 transition-all duration-300 hover:-translate-y-1 group select-none h-full" dir="rtl">
            <div class="space-y-4">
              <div class="flex items-center justify-between gap-3 border-b border-cyan-500/20 pb-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-cyan-500/15 text-cyan-300 border border-cyan-500/30">
                  <i class="${s.icon || 'fa-solid fa-gears'} text-xs"></i>
                  <span>${s.tag || 'خدمة تقنية'}</span>
                </span>
                <div class="w-10 h-10 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-300 text-lg flex-shrink-0 group-hover:scale-110 transition-transform">
                  <i class="${s.icon || 'fa-solid fa-gears'}"></i>
                </div>
              </div>

              <div class="space-y-2 text-right">
                <h3 class="text-lg sm:text-xl font-black text-white group-hover:text-cyan-300 transition-colors leading-snug">${s.title}</h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed line-clamp-3">${s.desc}</p>
              </div>

              <div class="relative rounded-2xl overflow-hidden border border-cyan-500/25 bg-[#07172b] h-48 sm:h-52">
                <img src="${s.image}" alt="${s.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#08172c] via-[#08172c]/30 to-transparent"></div>
                <div class="absolute bottom-3 right-4 left-4 text-right">
                  <span class="text-[11px] font-mono text-cyan-300/90 font-bold drop-shadow-md">${s.shortDesc || s.tag || ''}</span>
                </div>
              </div>

              ${pointsArr.length ? `
                <div class="space-y-2 pt-2">
                  <p class="text-xs font-black text-white flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-check text-cyan-400"></i>
                    <span>أبرز المميزات والمخرجات:</span>
                  </p>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                    ${pointsArr.map(p => `
                      <div class="p-2.5 rounded-xl bg-cyan-950/40 border border-cyan-500/15 flex items-start gap-2">
                        <i class="fa-solid fa-check text-cyan-400 text-xs mt-0.5 flex-shrink-0"></i>
                        <div class="text-right">
                          <p class="text-xs font-bold text-slate-200 leading-tight">${typeof p === 'object' ? p.title : p}</p>
                          ${(typeof p === 'object' && p.desc) ? `<p class="text-[10px] text-slate-400 leading-relaxed line-clamp-2">${p.desc}</p>` : ''}
                        </div>
                      </div>
                    `).join('')}
                  </div>
                </div>
              ` : ''}
            </div>

            <div class="pt-4 border-t border-cyan-500/20 flex items-center justify-center sm:justify-end">
              <a href="https://wa.me/201013688446?text=${waMsg}" target="_blank" rel="noopener" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-green-500 hover:bg-green-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-md shadow-green-500/20 hover:shadow-green-500/40 transition whitespace-nowrap active:scale-95">
                <i class="fa-brands fa-whatsapp text-sm"></i>
                <span>طلب الخدمة عبر واتساب</span>
              </a>
            </div>
          </div>
        `;
      }).join('');

      updateServicesSliderDimensions();
      renderServicesDots();
      updateServicesCounters();
    }

    // Alias for backward compatibility
    function renderServicesSection() {
      renderServicesSlider(false);
    }

    // Go to specific services slide
    function goToServicesSlide(index, animate = true) {
      const track = document.getElementById('servicesTrack');
      if (!track || !filteredServicesData.length) return;

      const visible = getVisibleServicesCount();
      const maxIndex = Math.max(0, filteredServicesData.length - visible);

      if (index > maxIndex) {
        currentServicesSlideIndex = 0;
      } else if (index < 0) {
        currentServicesSlideIndex = maxIndex;
      } else {
        currentServicesSlideIndex = index;
      }

      const windowEl = document.getElementById('servicesTrackWindow');
      if (!windowEl) return;
      const containerWidth = windowEl.offsetWidth;
      const gap = 24;
      const totalGaps = (visible - 1) * gap;
      const cardWidth = Math.max(280, (containerWidth - totalGaps) / visible);

      const shift = currentServicesSlideIndex * (cardWidth + gap);

      track.style.transition = animate ? 'transform 0.65s cubic-bezier(0.16, 1, 0.3, 1)' : 'none';
      track.style.transform = `translateX(-${shift}px)`;

      updateActiveServicesDot();
      updateServicesCounters();
    }

    function servicesSliderNext() {
      const visible = getVisibleServicesCount();
      const maxIndex = Math.max(0, filteredServicesData.length - visible);
      if (currentServicesSlideIndex >= maxIndex) {
        goToServicesSlide(0);
      } else {
        goToServicesSlide(Math.min(currentServicesSlideIndex + visible, maxIndex));
      }
    }

    function servicesSliderPrev() {
      const visible = getVisibleServicesCount();
      const maxIndex = Math.max(0, filteredServicesData.length - visible);
      if (currentServicesSlideIndex <= 0) {
        goToServicesSlide(maxIndex);
      } else {
        goToServicesSlide(Math.max(currentServicesSlideIndex - visible, 0));
      }
    }

    function filterServicesSlider(cat) {
      currentServicesCategory = cat;
      document.querySelectorAll('.srv-pill').forEach(b => {
        b.className = 'srv-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer';
      });
      const activePill = document.getElementById('srv-pill-' + cat);
      if (activePill) {
        activePill.className = 'srv-pill active px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 shadow-md shadow-cyan-500/20 whitespace-nowrap transition-all duration-200 cursor-pointer';
      }
      renderServicesSlider(true);
      startServicesAutoplay();
    }

    function renderServicesDots() {
      const container = document.getElementById('servicesDotsContainer');
      if (!container) return;

      const visible = getVisibleServicesCount();
      const total = filteredServicesData.length;
      if (total <= visible) {
        container.innerHTML = '';
        return;
      }

      const totalPages = Math.ceil(total / visible);
      let dotsHtml = '';
      for (let i = 0; i < totalPages; i++) {
        const targetIndex = Math.min(i * visible, Math.max(0, total - visible));
        dotsHtml += `
          <button type="button" onclick="goToServicesSlide(${targetIndex})" data-srv-dot="${i}" aria-label="صفحة الخدمات ${i + 1}"
                  class="srv-slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-slate-700 hover:bg-cyan-400 cursor-pointer"></button>
        `;
      }
      container.innerHTML = dotsHtml;
      updateActiveServicesDot();
    }

    function updateActiveServicesDot() {
      const visible = getVisibleServicesCount();
      const currentPage = Math.round(currentServicesSlideIndex / visible);
      document.querySelectorAll('.srv-slider-dot').forEach((dot, idx) => {
        if (idx === currentPage) {
          dot.className = 'srv-slider-dot w-6 h-2.5 rounded-full transition-all duration-300 bg-cyan-400 shadow-[0_0_10px_rgba(0,240,255,0.8)] cursor-pointer';
        } else {
          dot.className = 'srv-slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-slate-700 hover:bg-cyan-400 cursor-pointer';
        }
      });
    }

    function updateServicesCounters() {
      const badge = document.getElementById('servicesCounterBadge');
      const mobileCounter = document.getElementById('servicesMobileCounter');
      const total = filteredServicesData.length;
      if (!total) {
        if (badge) badge.textContent = 'لا توجد خدمات';
        if (mobileCounter) mobileCounter.textContent = '0 من 0';
        return;
      }

      const visible = getVisibleServicesCount();
      const start = currentServicesSlideIndex + 1;
      const end = Math.min(currentServicesSlideIndex + visible, total);

      const text = `معروض ${start} - ${end} من ${total}`;
      if (badge) badge.textContent = text;
      if (mobileCounter) mobileCounter.textContent = `${start} - ${end} من ${total}`;
    }

    function startServicesAutoplay() {
      stopServicesAutoplay();
      if (!isServicesAutoplayActive) return;
      servicesAutoplayTimer = setInterval(() => {
        servicesSliderNext();
      }, 5000);
    }

    function stopServicesAutoplay() {
      if (servicesAutoplayTimer) {
        clearInterval(servicesAutoplayTimer);
        servicesAutoplayTimer = null;
      }
    }

    function toggleServicesAutoplay() {
      isServicesAutoplayActive = !isServicesAutoplayActive;
      const icon = document.getElementById('srvPlayPauseIcon');
      const text = document.getElementById('srvPlayPauseText');

      if (isServicesAutoplayActive) {
        startServicesAutoplay();
        if (icon) icon.className = 'fa-solid fa-pause text-cyan-400';
        if (text) text.textContent = 'إيقاف مؤقت';
      } else {
        stopServicesAutoplay();
        if (icon) icon.className = 'fa-solid fa-play text-cyan-400';
        if (text) text.textContent = 'تشغيل تلقائي';
      }
    }

    // Event listeners for Services Slider (Resize, Hover, Swipe)
    window.addEventListener('resize', () => {
      clearTimeout(window.srvSliderResizeTimeout);
      window.srvSliderResizeTimeout = setTimeout(() => {
        updateServicesSliderDimensions();
      }, 150);
    });

    document.addEventListener('DOMContentLoaded', () => {
      const container = document.getElementById('servicesSliderContainer');
      if (container) {
        // continuous autoplay
        // container.addEventListener('mouseenter', stopServicesAutoplay);
        container.addEventListener('mouseleave', () => {
          if (isServicesAutoplayActive) startServicesAutoplay();
        });

        let touchStartX = 0;
        let touchEndX = 0;
        container.addEventListener('touchstart', (e) => {
          touchStartX = e.changedTouches[0].screenX;
          stopServicesAutoplay();
        }, { passive: true });

        container.addEventListener('touchend', (e) => {
          touchEndX = e.changedTouches[0].screenX;
          const diff = touchEndX - touchStartX;
          if (Math.abs(diff) > 40) {
            if (diff < 0) {
              servicesSliderNext();
            } else {
              servicesSliderPrev();
            }
          }
          if (isServicesAutoplayActive) startServicesAutoplay();
        }, { passive: true });
      }
    });
    /* ====================================================================
       PORTFOLIO SLIDER ENGINE (Responsive 3-Items Slider with Autoplay)
       ==================================================================== */
    let currentPortfolioCategory = 'all';
    let currentSlideIndex = 0;
    let sliderAutoplayTimer = null;
    let isSliderAutoplayActive = true;
    let filteredPortfolioProjects = [];

    // Helper: Determine visible cards count based on screen width
    function getVisibleCardsCount() {
      if (window.innerWidth >= 1024) return 3; // Desktop: 3 projects
      if (window.innerWidth >= 640) return 2;  // Tablet: 2 projects
      return 1; // Mobile: 1 project
    }

    // Update Slider Dimensions & Card Widths
    function updateSliderDimensions() {
      const track = document.getElementById('portfolioTrack');
      if (!track) return;
      const windowEl = document.getElementById('portfolioTrackWindow');
      if (!windowEl) return;

      const containerWidth = windowEl.offsetWidth;
      const visible = getVisibleCardsCount();
      const gap = 20; // gap-5 = 20px
      const totalGaps = (visible - 1) * gap;
      const cardWidth = Math.max(260, (containerWidth - totalGaps) / visible);

      const cards = track.querySelectorAll('.portfolio-slide-item');
      cards.forEach(card => {
        card.style.width = `${cardWidth}px`;
        card.style.flexShrink = '0';
      });

      goToSlide(currentSlideIndex, false);
    }

    // Render Projects into the Slider Track
    function renderPortfolioSlider(resetIndex = true) {
      const track = document.getElementById('portfolioTrack');
      const empty = document.getElementById('portfolioEmpty');
      if (!track) return;

      const cat = currentPortfolioCategory;
      filteredPortfolioProjects = projects.filter(p => (cat === 'all' || p.category === cat));

      if (!filteredPortfolioProjects.length) {
        track.innerHTML = '';
        if (empty) empty.classList.remove('hidden');
        renderSliderDots();
        updateSliderCounters();
        return;
      }
      if (empty) empty.classList.add('hidden');

      if (resetIndex) {
        currentSlideIndex = 0;
      }

      const fallbackImg = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80';

      track.innerHTML = filteredPortfolioProjects.map((p) => {
        const ic = categoryIcons[p.category] || 'fa-code';
        const imgSrc = p.image || fallbackImg;

        return `
          <div class="portfolio-slide-item glass-card glass-card-hover rounded-3xl overflow-hidden border border-cyan-500/20 flex flex-col justify-between transition-all duration-300 group shadow-xl h-full select-none" dir="rtl">
            
            <div class="relative overflow-hidden bg-[#07172b] border-b border-cyan-500/20">
              <div class="bg-[#0c223f] px-4 py-2 border-b border-cyan-500/15 flex items-center justify-between text-xs">
                <div class="flex items-center gap-1.5">
                  <span class="w-2.5 h-2.5 rounded-full bg-rose-500/80"></span>
                  <span class="w-2.5 h-2.5 rounded-full bg-amber-500/80"></span>
                  <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/80"></span>
                </div>
                <span class="text-[10px] font-mono text-cyan-300/80 font-bold">${p.categoryName || p.category}</span>
              </div>
              <div class="relative h-44 overflow-hidden">
                <img src="${imgSrc}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" loading="lazy" onerror="this.src='${fallbackImg}'" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#08172c] via-transparent to-transparent"></div>
                <div class="absolute bottom-2.5 right-3 flex items-center gap-2">
                  <div class="w-8 h-8 rounded-xl bg-[#08172c]/90 border border-cyan-500/40 flex items-center justify-center text-sm shadow-md">
                    <i class="fa-solid ${ic} text-cyan-400"></i>
                  </div>
                </div>
              </div>
            </div>

            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between text-right">
              <div class="space-y-2">
                <h3 class="text-sm sm:text-base font-black text-white group-hover:text-cyan-300 transition-colors leading-snug line-clamp-1">${p.title}</h3>
                <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed min-h-[36px]">${p.description}</p>
              </div>

              <div class="space-y-3 pt-3 border-t border-cyan-500/15">
                <div class="flex items-center justify-between gap-2 pt-1">
                  <div class="flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 flex-shrink-0"></span>
                    <span class="text-[11px] text-emerald-300 font-bold truncate max-w-[125px]">${p.status}</span>
                  </div>
                  
                  <button type="button" onclick="openProjectDetailsModal('${p.id}')" class="px-3.5 py-1.5 rounded-xl bg-cyan-500/15 hover:bg-cyan-500/30 text-cyan-300 font-black text-xs border border-cyan-400/40 flex items-center gap-1.5 transition shadow-sm shadow-cyan-500/20 active:scale-95 cursor-pointer">
                    <span>المزيد والشاشات</span>
                    <i class="fa-solid fa-arrow-left text-[10px]"></i>
                  </button>
                </div>
              </div>

            </div>

          </div>
        `;
      }).join('');

      updateSliderDimensions();
      renderSliderDots();
      updateSliderCounters();
    }

    // Go to a specific slide index
    function goToSlide(index, animate = true) {
      const track = document.getElementById('portfolioTrack');
      if (!track || !filteredPortfolioProjects.length) return;

      const visible = getVisibleCardsCount();
      const maxIndex = Math.max(0, filteredPortfolioProjects.length - visible);

      // Handle wrapping circularly
      if (index > maxIndex) {
        currentSlideIndex = 0;
      } else if (index < 0) {
        currentSlideIndex = maxIndex;
      } else {
        currentSlideIndex = index;
      }

      const windowEl = document.getElementById('portfolioTrackWindow');
      if (!windowEl) return;
      const containerWidth = windowEl.offsetWidth;
      const gap = 20;
      const totalGaps = (visible - 1) * gap;
      const cardWidth = Math.max(260, (containerWidth - totalGaps) / visible);

      const shift = currentSlideIndex * (cardWidth + gap);

      track.style.transition = animate ? 'transform 0.65s cubic-bezier(0.16, 1, 0.3, 1)' : 'none';
      track.style.transform = `translateX(-${shift}px)`;

      updateActiveDot();
      updateSliderCounters();
    }

    // Navigation: Next Projects
    function portfolioSliderNext() {
      const visible = getVisibleCardsCount();
      const maxIndex = Math.max(0, filteredPortfolioProjects.length - visible);
      if (currentSlideIndex >= maxIndex) {
        goToSlide(0);
      } else {
        goToSlide(Math.min(currentSlideIndex + visible, maxIndex));
      }
    }

    // Navigation: Previous Projects
    function portfolioSliderPrev() {
      const visible = getVisibleCardsCount();
      const maxIndex = Math.max(0, filteredPortfolioProjects.length - visible);
      if (currentSlideIndex <= 0) {
        goToSlide(maxIndex);
      } else {
        goToSlide(Math.max(currentSlideIndex - visible, 0));
      }
    }

    // Filter by Category
    function filterPortfolioSlider(cat) {
      currentPortfolioCategory = cat;

      // Update Filter Pills UI
      document.querySelectorAll('.pf-pill').forEach(b => {
        b.className = 'pf-pill px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:border-cyan-500/50 hover:text-cyan-300 whitespace-nowrap transition-all duration-200 cursor-pointer';
      });
      const activePill = document.getElementById('pf-pill-' + cat);
      if (activePill) {
        activePill.className = 'pf-pill active px-4 py-2 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 shadow-md shadow-cyan-500/20 whitespace-nowrap transition-all duration-200 cursor-pointer';
      }

      renderPortfolioSlider(true);
      startSliderAutoplay();
    }

    // Alias for backward compatibility
    function filterProjects(cat) {
      filterPortfolioSlider(cat);
    }

    // Render Pagination Dots
    function renderSliderDots() {
      const container = document.getElementById('sliderDotsContainer');
      if (!container) return;

      const visible = getVisibleCardsCount();
      const total = filteredPortfolioProjects.length;
      if (total <= visible) {
        container.innerHTML = '';
        return;
      }

      const totalPages = Math.ceil(total / visible);
      // For clean UI, if totalPages > 12, show condensed page dots
      let dotsHtml = '';
      const maxDotsToShow = Math.min(totalPages, 10);
      for (let i = 0; i < maxDotsToShow; i++) {
        const targetIndex = Math.min(i * visible, Math.max(0, total - visible));
        dotsHtml += `
          <button type="button" onclick="goToSlide(${targetIndex})" data-dot-page="${i}" aria-label="الصفحة ${i + 1}"
                  class="slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-slate-700 hover:bg-cyan-400 cursor-pointer"></button>
        `;
      }
      container.innerHTML = dotsHtml;
      updateActiveDot();
    }

    // Update Active Dot
    function updateActiveDot() {
      const visible = getVisibleCardsCount();
      const currentPage = Math.round(currentSlideIndex / visible);
      document.querySelectorAll('.slider-dot').forEach((dot, idx) => {
        if (idx === currentPage) {
          dot.className = 'slider-dot w-6 h-2.5 rounded-full transition-all duration-300 bg-cyan-400 shadow-[0_0_10px_rgba(0,240,255,0.8)] cursor-pointer';
        } else {
          dot.className = 'slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-slate-700 hover:bg-cyan-400 cursor-pointer';
        }
      });
    }

    // Update Counter Text
    function updateSliderCounters() {
      const badge = document.getElementById('sliderCounterBadge');
      const mobileCounter = document.getElementById('sliderMobileCounter');
      const total = filteredPortfolioProjects.length;
      if (!total) {
        if (badge) badge.textContent = 'لا توجد مشاريع';
        if (mobileCounter) mobileCounter.textContent = '0 من 0';
        return;
      }

      const visible = getVisibleCardsCount();
      const start = currentSlideIndex + 1;
      const end = Math.min(currentSlideIndex + visible, total);

      const text = `معروض ${start} - ${end} من ${total}`;
      if (badge) badge.textContent = text;
      if (mobileCounter) mobileCounter.textContent = `${start} - ${end} من ${total}`;
    }

    // Autoplay Engine
    function startSliderAutoplay() {
      stopSliderAutoplay();
      if (!isSliderAutoplayActive) return;
      sliderAutoplayTimer = setInterval(() => {
        portfolioSliderNext();
      }, 4500);
    }

    function stopSliderAutoplay() {
      if (sliderAutoplayTimer) {
        clearInterval(sliderAutoplayTimer);
        sliderAutoplayTimer = null;
      }
    }

    function toggleSliderAutoplay() {
      isSliderAutoplayActive = !isSliderAutoplayActive;
      const icon = document.getElementById('playPauseIcon');
      const text = document.getElementById('playPauseText');

      if (isSliderAutoplayActive) {
        startSliderAutoplay();
        if (icon) icon.className = 'fa-solid fa-pause text-cyan-400';
        if (text) text.textContent = 'إيقاف مؤقت';
      } else {
        stopSliderAutoplay();
        if (icon) icon.className = 'fa-solid fa-play text-cyan-400';
        if (text) text.textContent = 'تشغيل تلقائي';
      }
    }

    // Attach Interactive Event Listeners (Swipe, Resize, Hover)
    window.addEventListener('resize', () => {
      clearTimeout(window.sliderResizeTimeout);
      window.sliderResizeTimeout = setTimeout(() => {
        updateSliderDimensions();
      }, 150);
    });

    document.addEventListener('DOMContentLoaded', () => {
      const container = document.getElementById('portfolioSliderContainer');
      if (container) {
        // Pause on mouse hover, resume on mouse leave
        // continuous autoplay
        // container.addEventListener('mouseenter', stopSliderAutoplay);
        container.addEventListener('mouseleave', () => {
          if (isSliderAutoplayActive) startSliderAutoplay();
        });

        // Touch Swipe gestures for Mobile
        let touchStartX = 0;
        let touchEndX = 0;
        container.addEventListener('touchstart', (e) => {
          touchStartX = e.changedTouches[0].screenX;
          stopSliderAutoplay();
        }, { passive: true });

        container.addEventListener('touchend', (e) => {
          touchEndX = e.changedTouches[0].screenX;
          const diff = touchEndX - touchStartX;
          if (Math.abs(diff) > 40) {
            if (diff < 0) {
              portfolioSliderNext(); // Swiped left
            } else {
              portfolioSliderPrev(); // Swiped right
            }
          }
          if (isSliderAutoplayActive) startSliderAutoplay();
        }, { passive: true });
      }
    });
    function openProjectDetailsModal(id) {
      const p = projects.find(item => item.id === id);
      if (!p) return;

      const fallbackImg = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80';
      const mainImg = p.heroImage || p.image || fallbackImg;

      document.getElementById('pdmCategory').innerText = p.categoryName || p.category;
      document.getElementById('pdmStatusText').innerText = p.status || 'يعمل بنجاح';
      document.getElementById('pdmTitle').innerText = p.title;
      document.getElementById('pdmTech').innerText = p.tech;
      document.getElementById('pdmHeroImg').src = mainImg;
      document.getElementById('pdmFullDesc').innerText = p.fullDesc || p.description;

      const screens = (Array.isArray(p.screenshots) && p.screenshots.length) ? p.screenshots : [mainImg, mainImg, mainImg];
      document.getElementById('pdmScreenshots').innerHTML = screens.map((s, sIdx) => `
        <div class="glass-card rounded-2xl overflow-hidden border border-cyan-500/30 space-y-2 p-2 group hover:border-cyan-400 transition cursor-pointer" onclick="openGalleryLightboxDirect('${s}', '${p.title} - شاشة ${sIdx + 1}')">
          <div class="relative h-36 rounded-xl overflow-hidden">
            <img src="${s}" alt="Screen ${sIdx + 1}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-300" />
            <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
              <span class="px-2.5 py-1 rounded-lg bg-black/80 text-[10px] font-bold text-cyan-300 border border-cyan-500/40">تكبير 🔍</span>
            </div>
          </div>
          <p class="text-[11px] text-slate-300 font-bold text-center">شاشة تفاعلية ${sIdx + 1}</p>
        </div>
      `).join('');

      const feats = (Array.isArray(p.features) && p.features.length) ? p.features : [
        'لوحة تحكم إدارية تفاعلية ومؤشرات أداء لحظية',
        'قواعد بيانات سحابية مشفرة ومحمية بالكامل',
        'إدارة الصلاحيات والمستخدمين والرقابة الداخلية',
        'تصدير فوري للتقارير بصيغ PDF و Excel'
      ];
      document.getElementById('pdmFeatures').innerHTML = feats.map(f => `
        <div class="p-3.5 rounded-2xl bg-cyan-950/40 border border-cyan-500/20 text-xs text-slate-300 flex items-center gap-2.5">
          <i class="fa-solid fa-circle-check text-cyan-400 text-sm flex-shrink-0"></i>
          <span>${f}</span>
        </div>
      `).join('');

      const mets = (Array.isArray(p.metrics) && p.metrics.length) ? p.metrics : [
        p.status || 'تشغيل مستقر',
        'استجابة < 100ms',
        'سحابي 100%'
      ];
      document.getElementById('pdmMetrics').innerHTML = mets.map(m => `
        <div class="glass-card rounded-2xl p-4 border border-cyan-500/20 space-y-1">
          <p class="text-base font-black text-cyan-300 font-mono">${m}</p>
          <p class="text-[10px] text-slate-400">مؤشر تشغيلي موثق</p>
        </div>
      `).join('');

      const waMsg = encodeURIComponent('مرحباً، أود الاستفسار عن تفاصيل وطلب تنفيذ نظام مماثل لمشروع: ' + p.title);
      document.getElementById('pdmWhatsappBtn').href = 'https://wa.me/201013688446?text=' + waMsg;

      document.getElementById('projectDetailsModal').classList.remove('hidden');
    }

    function closeProjectDetailsModal() {
      document.getElementById('projectDetailsModal').classList.add('hidden');
    }

    function openGalleryLightboxDirect(imgUrl, title) {
      document.getElementById('lightboxTitle').innerText = title;
      document.getElementById('lightboxCategory').innerText = 'شاشة نظام توضيحية';
      document.getElementById('lightboxDesc').innerText = 'لقطة واجهة مستخدم تفاعلية متقدمة.';
      document.getElementById('lightboxVisual').innerHTML = `<img src="${imgUrl}" alt="${title}" class="w-full max-h-[380px] object-cover rounded-2xl shadow-2xl" />`;
      document.getElementById('galleryLightbox').classList.remove('hidden');
    }

    let currentGalleryFilter = 'all';
    function renderGalleryGrid(filter = 'all') {
      currentGalleryFilter = filter;
      const grid = document.getElementById('galleryGrid');
      const placeholder = document.getElementById('galleryPlaceholder');
      const filtersCont = document.getElementById('galleryFiltersContainer');
      if (!grid) return;

      if (!galleryData || galleryData.length === 0) {
        grid.innerHTML = '';
        if (placeholder) placeholder.classList.remove('hidden');
        if (filtersCont) filtersCont.classList.add('hidden');
        return;
      }

      if (placeholder) placeholder.classList.add('hidden');
      if (filtersCont) filtersCont.classList.remove('hidden');

      document.querySelectorAll('.g-filter-btn').forEach(btn => {
        btn.className = 'g-filter-btn px-4 py-2 rounded-xl font-bold border border-cyan-500/20 text-slate-300 hover:border-cyan-500/40 hover:text-cyan-300 transition';
      });
      const activeBtn = document.getElementById('gFilter-' + filter);
      if (activeBtn) activeBtn.className = 'g-filter-btn px-4 py-2 rounded-xl font-bold bg-cyan-500/20 text-cyan-300 border border-cyan-400/50 shadow-sm shadow-cyan-500/20 transition';

      const filtered = (filter === 'all') ? galleryData : galleryData.filter(item => item.category === filter);

      if (filtered.length === 0) {
        grid.innerHTML = '<p class="text-slate-400 text-center col-span-3 py-8">لا توجد صور في هذا التصنيف حالياً</p>';
        return;
      }

      grid.innerHTML = filtered.map(item => `
        <div class="glass-card rounded-3xl overflow-hidden border border-cyan-500/25 group hover:border-cyan-400/60 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between shadow-xl cursor-pointer" onclick="openGalleryLightbox('${item.id}')">
          <div class="bg-[#0c223f] px-4 py-2.5 border-b border-cyan-500/20 flex items-center justify-between text-xs">
            <div class="flex items-center gap-1.5">
              <span class="w-2.5 h-2.5 rounded-full bg-rose-500/80"></span>
              <span class="w-2.5 h-2.5 rounded-full bg-amber-500/80"></span>
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-500/80"></span>
            </div>
            <span class="text-[10px] font-mono text-cyan-300/80">${item.categoryName || item.category}</span>
          </div>
          <div class="relative h-52 overflow-hidden group">
            <img src="${item.image}" alt="${item.title}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80'" />
            <div class="absolute inset-0 bg-gradient-to-t from-[#08172c] via-[#08172c]/30 to-transparent"></div>
            <div class="absolute top-3 left-3 z-10">
              <span class="px-2.5 py-1 rounded-lg bg-[#08172c]/85 backdrop-blur-md border border-cyan-400/40 text-[10px] font-bold text-cyan-300 flex items-center gap-1.5 shadow-lg">
                <i class="fa-solid fa-magnifying-glass-plus text-[10px]"></i> تكبير الشاشة
              </span>
            </div>
            <div class="absolute bottom-3 right-3 z-10 flex items-center gap-2">
              <div class="w-8 h-8 rounded-xl bg-[#08172c]/90 border border-cyan-500/40 flex items-center justify-center text-sm shadow-md">
                <i class="${item.icon || 'fa-solid fa-laptop-code'} text-cyan-400"></i>
              </div>
            </div>
          </div>
          <div class="p-5 space-y-3 text-right flex-1 flex flex-col justify-between">
            <div class="space-y-1.5">
              <h3 class="text-sm sm:text-base font-black text-white group-hover:text-cyan-300 transition-colors leading-snug">${item.title}</h3>
              <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed">${item.desc || ''}</p>
            </div>
            <div class="pt-3 border-t border-cyan-500/15 flex items-center justify-between">
              <div class="flex items-center gap-1.5 flex-wrap">
                ${Array.isArray(item.tech) ? item.tech.slice(0, 3).map(t => `<span class="px-2 py-0.5 rounded bg-cyan-950/80 text-[10px] font-mono text-cyan-300 border border-cyan-500/20">${t}</span>`).join('') : `<span class="px-2 py-0.5 rounded bg-cyan-950/80 text-[10px] font-mono text-cyan-300 border border-cyan-500/20">${item.tech || 'نظام سحابي'}</span>`}
              </div>
              <span class="text-cyan-400 text-xs font-bold flex items-center gap-1">معاينة <i class="fa-solid fa-arrow-left text-[10px]"></i></span>
            </div>
          </div>
        </div>
      `).join('');
    }

    function filterGallery(cat) { renderGalleryGrid(cat); }

    function openGalleryLightbox(id) {
      const item = galleryData.find(g => g.id === id);
      if (!item) return;
      document.getElementById('lightboxTitle').innerText = item.title;
      document.getElementById('lightboxCategory').innerText = item.categoryName || item.category;
      document.getElementById('lightboxDesc').innerText = item.desc || '';
      const techEl = document.getElementById('lightboxTech');
      if (techEl) {
        techEl.innerHTML = Array.isArray(item.tech) ? item.tech.map(t => `<span class="px-2.5 py-1 rounded-lg bg-cyan-950/90 text-cyan-300 border border-cyan-500/30 font-mono">${t}</span>`).join('') : `<span class="px-2.5 py-1 rounded-lg bg-cyan-950/90 text-cyan-300 border border-cyan-500/30 font-mono">${item.tech || 'نظام سحابي'}</span>`;
      }
      document.getElementById('lightboxVisual').innerHTML = `
        <div class="relative w-full overflow-hidden rounded-2xl">
          <img src="${item.image}" alt="${item.title}" class="w-full max-h-[380px] object-cover rounded-2xl shadow-2xl" />
        </div>
      `;
      document.getElementById('galleryLightbox').classList.remove('hidden');
    }

    

    /* ====================================================================
       TEAM SLIDER ENGINE (Responsive 4-Items Slider with Autoplay)
       ==================================================================== */
    let currentTeamSlideIndex = 0;
    let teamAutoplayTimer = null;
    let isTeamAutoplayActive = true;

    function getVisibleTeamCount() {
      if (window.innerWidth >= 1024) return 4; // Desktop: 4 team members
      if (window.innerWidth >= 640) return 3;  // Tablet: 3 team members
      return 2; // Mobile: 2 team members
    }

    function updateTeamSliderDimensions() {
      const track = document.getElementById('teamTrack');
      if (!track) return;
      const windowEl = document.getElementById('teamTrackWindow');
      if (!windowEl) return;

      const containerWidth = windowEl.offsetWidth;
      const visible = getVisibleTeamCount();
      const gap = 20;
      const totalGaps = (visible - 1) * gap;
      const cardWidth = Math.max(140, (containerWidth - totalGaps) / visible);

      const cards = track.querySelectorAll('.team-slide-item');
      cards.forEach(card => {
        card.style.width = `${cardWidth}px`;
        card.style.flexShrink = '0';
      });

      goToTeamSlide(currentTeamSlideIndex, false);
    }

    function renderTeamSlider() {
      const track = document.getElementById('teamTrack');
      if (!track) return;
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;

      track.innerHTML = data.map(t => {
        const iconClass = (t.icon && t.icon.includes('fa-')) ? (t.icon.includes('fa-solid') || t.icon.includes('fa-brands') ? t.icon : 'fa-solid ' + t.icon) : 'fa-solid fa-user';
        const hasCustomImage = t.image && t.image.trim() !== '' && !t.image.includes('unsplash.com');

        return `
          <div class="team-slide-item glass-card glass-card-hover rounded-3xl p-6 border border-cyan-500/25 flex flex-col items-center text-center justify-between gap-4 transition-all duration-300 group shadow-xl h-full select-none" dir="rtl">
            <div class="relative">
              ${hasCustomImage ? `
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl overflow-hidden border-2 border-cyan-500/40 p-0.5 bg-gradient-to-tr from-cyan-500/30 to-blue-500/20 shadow-lg shadow-cyan-500/10 group-hover:border-cyan-400 group-hover:shadow-[0_0_20px_rgba(0,240,255,0.4)] transition-all duration-300">
                  <img src="${t.image}" alt="${t.name}" class="w-full h-full object-cover rounded-xl group-hover:scale-108 transition-transform duration-300" loading="lazy" />
                </div>
              ` : `
                <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-2xl bg-gradient-to-tr from-cyan-950 via-[#0a2342] to-slate-900 border-2 border-cyan-500/40 flex flex-col items-center justify-center text-cyan-300 shadow-lg shadow-cyan-500/15 group-hover:border-cyan-400 group-hover:shadow-[0_0_20px_rgba(0,240,255,0.35)] transition-all duration-300">
                  <i class="${iconClass} text-2xl sm:text-3xl text-cyan-400 group-hover:scale-110 transition-transform"></i>
                </div>
              `}
              <div class="absolute -bottom-1.5 -left-1.5 w-7 h-7 rounded-lg bg-[#08172c] border border-cyan-500/50 flex items-center justify-center text-cyan-400 text-xs shadow-md">
                <i class="${iconClass}"></i>
              </div>
            </div>

            <div class="space-y-1.5 w-full">
              <p class="text-xs sm:text-sm font-black text-white group-hover:text-cyan-300 transition-colors leading-snug truncate">${t.name}</p>
              <span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] sm:text-[11px] font-bold bg-cyan-500/10 text-cyan-300 border border-cyan-500/25 truncate max-w-full">${t.role}</span>
            </div>
          </div>
        `;
      }).join('');

      updateTeamSliderDimensions();
      renderTeamDots();
      updateTeamCounters();
    }
function renderTeamGrid() {
      renderTeamSlider();
    }

    function goToTeamSlide(index, animate = true) {
      const track = document.getElementById('teamTrack');
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;
      if (!track || !data.length) return;

      const visible = getVisibleTeamCount();
      const maxIndex = Math.max(0, data.length - visible);

      if (index > maxIndex) {
        currentTeamSlideIndex = 0;
      } else if (index < 0) {
        currentTeamSlideIndex = maxIndex;
      } else {
        currentTeamSlideIndex = index;
      }

      const windowEl = document.getElementById('teamTrackWindow');
      if (!windowEl) return;
      const containerWidth = windowEl.offsetWidth;
      const gap = 20;
      const totalGaps = (visible - 1) * gap;
      const cardWidth = Math.max(140, (containerWidth - totalGaps) / visible);

      const shift = currentTeamSlideIndex * (cardWidth + gap);

      track.style.transition = animate ? 'transform 0.65s cubic-bezier(0.16, 1, 0.3, 1)' : 'none';
      track.style.transform = `translateX(-${shift}px)`;

      updateActiveTeamDot();
      updateTeamCounters();
    }

    function teamSliderNext() {
      const visible = getVisibleTeamCount();
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;
      const maxIndex = Math.max(0, data.length - visible);
      if (currentTeamSlideIndex >= maxIndex) {
        goToTeamSlide(0);
      } else {
        goToTeamSlide(Math.min(currentTeamSlideIndex + visible, maxIndex));
      }
    }

    function teamSliderPrev() {
      const visible = getVisibleTeamCount();
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;
      const maxIndex = Math.max(0, data.length - visible);
      if (currentTeamSlideIndex <= 0) {
        goToTeamSlide(maxIndex);
      } else {
        goToTeamSlide(Math.max(currentTeamSlideIndex - visible, 0));
      }
    }

    function renderTeamDots() {
      const container = document.getElementById('teamDotsContainer');
      if (!container) return;
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;
      const visible = getVisibleTeamCount();
      const total = data.length;
      if (total <= visible) {
        container.innerHTML = '';
        return;
      }

      const totalPages = Math.ceil(total / visible);
      let dotsHtml = '';
      for (let i = 0; i < totalPages; i++) {
        const targetIndex = Math.min(i * visible, Math.max(0, total - visible));
        dotsHtml += `
          <button type="button" onclick="goToTeamSlide(${targetIndex})" data-team-dot="${i}" aria-label="صفحة الخبراء ${i + 1}"
                  class="team-slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-slate-700 hover:bg-cyan-400 cursor-pointer"></button>
        `;
      }
      container.innerHTML = dotsHtml;
      updateActiveTeamDot();
    }

    function updateActiveTeamDot() {
      const visible = getVisibleTeamCount();
      const currentPage = Math.round(currentTeamSlideIndex / visible);
      document.querySelectorAll('.team-slider-dot').forEach((dot, idx) => {
        if (idx === currentPage) {
          dot.className = 'team-slider-dot w-6 h-2.5 rounded-full transition-all duration-300 bg-cyan-400 shadow-[0_0_10px_rgba(0,240,255,0.8)] cursor-pointer';
        } else {
          dot.className = 'team-slider-dot w-2.5 h-2.5 rounded-full transition-all duration-300 bg-slate-700 hover:bg-cyan-400 cursor-pointer';
        }
      });
    }

    function updateTeamCounters() {
      const badge = document.getElementById('teamCounterBadge');
      const mobileCounter = document.getElementById('teamMobileCounter');
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;
      const total = data.length;
      if (!total) return;

      const visible = getVisibleTeamCount();
      const start = currentTeamSlideIndex + 1;
      const end = Math.min(currentTeamSlideIndex + visible, total);

      const text = `معروض ${start} - ${end} من ${total}`;
      if (badge) badge.textContent = text;
      if (mobileCounter) mobileCounter.textContent = `${start} - ${end} من ${total}`;
    }

    function startTeamAutoplay() {
      stopTeamAutoplay();
      if (!isTeamAutoplayActive) return;
      teamAutoplayTimer = setInterval(() => {
        teamSliderNext();
      }, 4000);
    }

    function stopTeamAutoplay() {
      if (teamAutoplayTimer) {
        clearInterval(teamAutoplayTimer);
        teamAutoplayTimer = null;
      }
    }

    function toggleTeamAutoplay() {
      isTeamAutoplayActive = !isTeamAutoplayActive;
      const icon = document.getElementById('teamPlayPauseIcon');
      const text = document.getElementById('teamPlayPauseText');

      if (isTeamAutoplayActive) {
        startTeamAutoplay();
        if (icon) icon.className = 'fa-solid fa-pause text-cyan-400';
        if (text) text.textContent = 'إيقاف مؤقت';
      } else {
        stopTeamAutoplay();
        if (icon) icon.className = 'fa-solid fa-play text-cyan-400';
        if (text) text.textContent = 'تشغيل تلقائي';
      }
    }

    window.addEventListener('resize', () => {
      clearTimeout(window.teamResizeTimeout);
      window.teamResizeTimeout = setTimeout(() => {
        updateTeamSliderDimensions();
      }, 150);
    });
    window.addEventListener('storage', (e) => {
      if (e.key === 'almobtaker_projects') {
        projects = JSON.parse(e.newValue || '[]');
        filterProjects(currentFilter);
      }
      if (e.key === 'almobtaker_gallery') {
        galleryData = JSON.parse(e.newValue || '[]');
        renderGalleryGrid(currentGalleryFilter);
      }
      if (e.key === 'almobtaker_team') {
        teamData = JSON.parse(e.newValue || '[]');
        renderTeamGrid();
      }
      if (e.key === 'almobtaker_services') {
        servicesData = JSON.parse(e.newValue || '[]');
        renderServicesSlider();
    startServicesAutoplay();
      }
    });

    // Startup - Initialize and run all 3 sliders automatically
    renderServicesSlider();
    startServicesAutoplay();

    filterPortfolioSlider('all');
    startSliderAutoplay();

    renderTeamSlider();
    startTeamAutoplay();

    renderGalleryGrid('all');

    function toggleFaq(btn) {
      const ans = btn.nextElementSibling;
      const icon = btn.querySelector('i');
      const isOpen = !ans.classList.contains('hidden');
      btn.closest('.space-y-2').querySelectorAll('.faq-a').forEach(a => a.classList.add('hidden'));
      btn.closest('.space-y-2').querySelectorAll('.faq-q i').forEach(i => i.style.transform = '');
      if (!isOpen) {
        ans.classList.remove('hidden');
        if (icon) icon.style.transform = 'rotate(180deg)';
      }
    }

    function toggleSearchModal() {
      const modal = document.getElementById('searchModal');
      if (modal) modal.classList.toggle('hidden');
    }
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        document.getElementById('searchModal')?.classList.add('hidden');
        document.getElementById('projectDetailsModal')?.classList.add('hidden');
        document.getElementById('galleryLightbox')?.classList.add('hidden');
      }
    });
    function modalLiveSearch() {
      const q = document.getElementById('globalModalSearch')?.value.trim().toLowerCase();
      const results = document.getElementById('modalSearchResults');
      if (!q) { if (results) results.innerHTML = '<p class="text-slate-400 text-center py-4">اكتب للبدء في البحث الفوري...</p>'; return; }
      const match = projects.filter(p => p.title.toLowerCase().includes(q) || p.tech.toLowerCase().includes(q));
      if (!match.length) { if (results) results.innerHTML = '<p class="text-slate-400 text-center py-4">لا توجد نتائج...</p>'; return; }
      if (results) {
        results.innerHTML = match.slice(0, 8).map(p => `
          <a href="#portfolio" onclick="toggleSearchModal();filterProjects('${p.category}')" class="block p-3 rounded-xl bg-cyan-500/10 hover:bg-cyan-500/20 border border-cyan-500/20 transition text-right">
            <p class="font-bold text-white text-xs">${p.title}</p>
            <p class="text-[10px] text-cyan-300 font-mono">${p.tech}</p>
          </a>
        `).join('');
      }
    }
  

    // AJAX Contact Form Handler
    async function handleContactSubmit(e) {
      e.preventDefault();
      const form = e.target;
      const btn = document.getElementById('contactSubmitBtn');
      const btnText = document.getElementById('contactBtnText');
      const notice = document.getElementById('contactFormNotice');

      btn.disabled = true;
      btnText.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> جارٍ إرسال طلبك...';
      notice.className = 'hidden';

      const formData = new FormData(form);

      try {
        const res = await fetch('api/contact.php', {
          method: 'POST',
          body: formData
        });
        const data = await res.json();

        if (data.success) {
          notice.className = 'p-4 rounded-2xl bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 text-xs font-bold text-center block shadow-lg shadow-emerald-500/10 space-y-1';
          notice.innerHTML = `
            <div class="flex items-center justify-center gap-2 text-sm font-black text-emerald-300">
              <i class="fa-solid fa-circle-check"></i>
              <span>${data.message || 'تم استلام طلبك بنجاح!'}</span>
            </div>
            <p class="text-[11px] text-emerald-400 font-normal">سيتواصل معك مهندس متخصص من فريقنا خلال وقت قصير.</p>
          `;
          form.reset();
        } else {
          notice.className = 'p-3 rounded-2xl bg-rose-500/20 border border-rose-500/40 text-rose-300 text-xs font-bold text-center block';
          notice.innerHTML = '<i class="fa-solid fa-circle-exclamation ml-1"></i> ' + (data.message || 'حدث خطأ، يرجى المحاولة لاحقاً');
        }
      } catch (err) {
        notice.className = 'p-3 rounded-2xl bg-rose-500/20 border border-rose-500/40 text-rose-300 text-xs font-bold text-center block';
        notice.innerHTML = '<i class="fa-solid fa-circle-exclamation ml-1"></i> تعذر الاتصال بالخادم، يرجى التواصل مباشرة عبر واتساب.';
      } finally {
        btn.disabled = false;
        btnText.innerHTML = 'إرسال طلبك وفكرتك الآن';
      }
    }

    function toggleMobileDrawer() {
      const drawer = document.getElementById('mobileDrawer');
      if (drawer) drawer.classList.toggle('hidden');
    }

    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
</script>

  <!-- ================================================= -->
  <!-- FLOATING ACTION BUTTONS (WHATSAPP & SCROLL TOP UP) -->
  <!-- ================================================= -->
  
  <!-- 1. Floating WhatsApp Button (Bottom-Left) -->
  <div class="fixed bottom-5 left-5 z-50 flex items-center gap-3">
    <?php
      $waRaw = preg_replace('/[^0-9]/', '', $whatsapp);
      if (strpos($waRaw, '01') === 0) {
        $waRaw = '2' . $waRaw;
      }
      $waMsg = urlencode('مرحباً شركة المبتكر العربي، أود الاستفسار وطلب استشارة / عرض سعر لمشروعي البرمجي.');
      $waUrl = "https://wa.me/{$waRaw}?text={$waMsg}";
    ?>
    <a href="<?= $waUrl ?>" target="_blank" rel="noopener noreferrer" 
       aria-label="تواصل معنا عبر واتساب"
       class="floating-whatsapp group relative w-[52px] h-[52px] sm:w-[60px] sm:h-[60px] rounded-full bg-gradient-to-tr from-emerald-600 via-green-500 to-emerald-400 hover:from-emerald-500 hover:to-green-400 text-white flex items-center justify-center text-2xl sm:text-3xl shadow-2xl transition-all duration-300 hover:scale-110 active:scale-95 border-2 border-white/20">
      <i class="fa-brands fa-whatsapp drop-shadow"></i>
      
      <!-- Tooltip -->
      <span class="absolute left-full ml-3 px-3 py-1.5 rounded-xl bg-slate-900/95 text-emerald-300 text-xs font-bold border border-emerald-500/30 whitespace-nowrap opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-200 shadow-xl hidden sm:flex items-center gap-1.5">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
        <span>تواصل واتساب فوري</span>
      </span>
    </a>
  </div>

  <!-- 2. Floating Scroll To Top (UP) Button (Bottom-Right) -->
  <div class="fixed bottom-5 right-5 z-50 flex items-center gap-3">
    <button id="scrollToTopBtn" onclick="scrollToTop()" 
            aria-label="الصعود لأعلى الصفحة UP" 
            title="الصعود لأعلى الصفحة (UP)"
            class="floating-scroll-top group relative w-[52px] h-[52px] sm:w-[60px] sm:h-[60px] rounded-full bg-gradient-to-tr from-cyan-600 via-cyan-400 to-sky-300 hover:from-cyan-400 hover:to-sky-200 text-slate-950 flex flex-col items-center justify-center shadow-2xl transition-all duration-300 hover:scale-110 active:scale-95 border-2 border-white/30 cursor-pointer">
      <i class="fa-solid fa-arrow-up text-lg sm:text-xl font-black group-hover:-translate-y-1 transition-transform duration-200"></i>
      <span class="text-[9px] sm:text-[10px] font-black tracking-tighter uppercase leading-none mt-0.5">UP</span>
      
      <!-- Tooltip -->
      <span class="absolute right-full mr-3 px-3 py-1.5 rounded-xl bg-slate-900/95 text-cyan-300 text-xs font-bold border border-cyan-500/30 whitespace-nowrap opacity-0 group-hover:opacity-100 pointer-events-none transition-all duration-200 shadow-xl hidden sm:flex items-center gap-1.5">
        <i class="fa-solid fa-angles-up text-cyan-400"></i>
        <span>الصعود لأعلى الصفحة (UP)</span>
      </span>
    </button>
  </div>

  <!-- ========================================================
       MODAL: VIEW ALL (عرض الكل للمشاريع والخدمات وفريق العمل مع بحث وفلاتر)
       ======================================================== -->
  <div id="viewAllModal" class="hidden fixed inset-0 z-50 bg-[#040812]/92 backdrop-blur-xl flex flex-col items-center p-3 sm:p-6 overflow-y-auto">
    <div class="w-full max-w-7xl bg-[#07172b]/95 border border-cyan-500/35 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.9)] flex flex-col overflow-hidden my-auto max-h-[92vh]">
      
      <!-- Modal Header -->
      <div class="px-5 sm:px-8 py-5 border-b border-cyan-500/20 bg-[#0c223f]/90 flex items-center justify-between gap-4 sticky top-0 z-20 backdrop-blur-md">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl bg-cyan-500/15 border border-cyan-500/30 flex items-center justify-center text-cyan-300 text-lg shadow-md shadow-cyan-500/10">
            <i id="viewAllModalIcon" class="fa-solid fa-layer-group"></i>
          </div>
          <div>
            <h2 id="viewAllModalTitle" class="text-base sm:text-xl font-black text-white"></h2>
            <p id="viewAllModalSubtitle" class="text-xs text-slate-400"></p>
          </div>
        </div>
        <button type="button" onclick="closeViewAllModal()" aria-label="إغلاق" class="w-10 h-10 rounded-xl bg-slate-800 hover:bg-rose-500 hover:text-white text-slate-300 flex items-center justify-center transition-all duration-200 cursor-pointer">
          <i class="fa-solid fa-xmark text-lg"></i>
        </button>
      </div>

      <!-- Controls: Search & Category Filter Bar -->
      <div class="p-5 sm:px-8 border-b border-cyan-500/15 bg-[#081b33]/60 space-y-4">
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
          <!-- Live Search Input -->
          <div class="relative w-full sm:w-80">
            <input type="text" id="viewAllSearchInput" oninput="filterViewAllGrid()" placeholder="ابحث الفوري بالاسم أو التقنية..." class="w-full bg-[#040812] border border-cyan-500/30 rounded-xl px-4 py-2.5 text-xs text-white placeholder-slate-500 focus:border-cyan-400 outline-none pl-9">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-3 text-cyan-400 text-xs"></i>
          </div>

          <!-- Counter Badge -->
          <span id="viewAllCounterBadge" class="text-xs font-mono text-cyan-300 bg-cyan-950/80 px-3.5 py-1.5 rounded-xl border border-cyan-500/30 whitespace-nowrap self-end sm:self-auto">
            0 عنصر
          </span>
        </div>

        <!-- Filter Pills Bar (Shown for portfolio and services) -->
        <div id="viewAllFilterPills" class="flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none"></div>
      </div>

      <!-- Grid Content -->
      <div class="p-5 sm:p-8 overflow-y-auto flex-1">
        <div id="viewAllGridContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
        <p id="viewAllEmptyNotice" class="hidden text-center text-slate-400 py-16 text-sm">لا توجد نتائج تطابق بحثك حالياً</p>
      </div>

      <!-- Modal Footer -->
      <div class="px-6 py-4 border-t border-cyan-500/15 bg-[#0c223f]/80 flex items-center justify-between text-xs text-slate-400">
        <span>شركة المبتكر العربي للبرمجيات والحلول الذكية</span>
        <button type="button" onclick="closeViewAllModal()" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold transition">إغلاق النافذة</button>
      </div>

    </div>
  </div>

  <script>
  let currentViewAllType = 'portfolio'; // 'portfolio' | 'services' | 'team'
  let currentViewAllCat = 'all';

  function openViewAllModal(type) {
    currentViewAllType = type;
    currentViewAllCat = 'all';
    const modal = document.getElementById('viewAllModal');
    const title = document.getElementById('viewAllModalTitle');
    const subtitle = document.getElementById('viewAllModalSubtitle');
    const icon = document.getElementById('viewAllModalIcon');
    const pills = document.getElementById('viewAllFilterPills');
    const searchInput = document.getElementById('viewAllSearchInput');

    if (searchInput) searchInput.value = '';

    if (type === 'portfolio') {
      title.textContent = 'دليل جميع المشاريع والمنظومات البرمجية (65 منظومة)';
      subtitle.textContent = 'استكشف كافة الحلول السحابية وتطبيقات الهواتف والـ ERP المنفذة بنجاح';
      icon.className = 'fa-solid fa-layer-group text-cyan-400';
      pills.className = 'flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none';
      pills.innerHTML = `
        <button onclick="setViewAllFilter('all')" class="va-pill active px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 whitespace-nowrap">الكل (65)</button>
        <button onclick="setViewAllFilter('erp')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">أنظمة ERP</button>
        <button onclick="setViewAllFilter('medical')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">حلول طبية</button>
        <button onclick="setViewAllFilter('industrial')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">تصنيع وإنتاج</button>
        <button onclick="setViewAllFilter('ai')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">ذكاء اصطناعي</button>
        <button onclick="setViewAllFilter('edtech')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">تعليم وتوظيف</button>
        <button onclick="setViewAllFilter('zatca')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">فوترة ZATCA</button>
      `;
    } else if (type === 'services') {
      title.textContent = 'دليل كافة الخدمات التقنية والهندسية (8 خدمات)';
      subtitle.textContent = 'حلول برمجية سحابية وبنية تحتية وتطبيقات متكاملة لدعم أعمالك';
      icon.className = 'fa-solid fa-shapes text-cyan-400';
      pills.className = 'flex items-center gap-2 overflow-x-auto pb-1 scrollbar-none';
      pills.innerHTML = `
        <button onclick="setViewAllFilter('all')" class="va-pill active px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 whitespace-nowrap">جميع الخدمات (8)</button>
        <button onclick="setViewAllFilter('erp')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">أنظمة ERP</button>
        <button onclick="setViewAllFilter('ai')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">ذكاء اصطناعي</button>
        <button onclick="setViewAllFilter('zatca')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">كاشير وZATCA</button>
        <button onclick="setViewAllFilter('edtech')" class="va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap">تصميم UI/UX</button>
      `;
    } else if (type === 'team') {
      title.textContent = 'فريق العمل والخبراء المتخصصون (12 خبيراً)';
      subtitle.textContent = 'نخبة من مهندسي البرمجيات ومصممي الواجهات وإدارة المشروعات';
      icon.className = 'fa-solid fa-users text-cyan-400';
      pills.className = 'hidden';
      pills.innerHTML = '';
    }

    if (modal) {
      modal.classList.remove('hidden');
      document.body.classList.add('overflow-hidden');
    }
    filterViewAllGrid();
  }

  function closeViewAllModal() {
    const modal = document.getElementById('viewAllModal');
    if (modal) {
      modal.classList.add('hidden');
      document.body.classList.remove('overflow-hidden');
    }
  }

  function setViewAllFilter(cat) {
    currentViewAllCat = cat;
    document.querySelectorAll('.va-pill').forEach(b => {
      b.className = 'va-pill px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500/20 text-slate-400 hover:text-cyan-300 whitespace-nowrap transition-all cursor-pointer';
    });
    if (event && event.target) {
      event.target.className = 'va-pill active px-3.5 py-1.5 rounded-xl text-xs font-bold border border-cyan-500 bg-cyan-500/20 text-cyan-300 whitespace-nowrap transition-all cursor-pointer';
    }
    filterViewAllGrid();
  }

  function filterViewAllGrid() {
    const q = (document.getElementById('viewAllSearchInput')?.value || '').trim().toLowerCase();
    const container = document.getElementById('viewAllGridContainer');
    const badge = document.getElementById('viewAllCounterBadge');
    const empty = document.getElementById('viewAllEmptyNotice');
    if (!container) return;

    if (currentViewAllType === 'portfolio') {
      const filtered = projects.filter(p => {
        const matchCat = (currentViewAllCat === 'all' || p.category === currentViewAllCat);
        const matchQuery = !q || (p.title && p.title.toLowerCase().includes(q)) || (p.description && p.description.toLowerCase().includes(q)) || (p.tech && p.tech.toLowerCase().includes(q));
        return matchCat && matchQuery;
      });

      if (badge) badge.textContent = `${filtered.length} مشروع`;
      if (!filtered.length) {
        container.innerHTML = '';
        if (empty) empty.classList.remove('hidden');
        return;
      }
      if (empty) empty.classList.add('hidden');

      container.className = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6';
      container.innerHTML = filtered.map(p => {
        const ic = categoryIcons[p.category] || 'fa-code';
        const fallbackImg = 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=900&q=80';
        return `
          <div class="glass-card glass-card-hover rounded-3xl overflow-hidden border border-cyan-500/20 flex flex-col justify-between transition-all duration-300 group shadow-xl">
            <div class="relative overflow-hidden bg-[#07172b] border-b border-cyan-500/20">
              <div class="bg-[#0c223f] px-4 py-2 border-b border-cyan-500/15 flex items-center justify-between text-xs">
                <span class="text-[10px] font-mono text-cyan-300/80 font-bold">${p.categoryName || p.category}</span>
                <span class="text-[10px] text-emerald-400 font-bold">${p.status}</span>
              </div>
              <div class="relative h-44 overflow-hidden">
                <img src="${p.image || fallbackImg}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-500" loading="lazy" />
                <div class="absolute inset-0 bg-gradient-to-t from-[#08172c] via-transparent to-transparent"></div>
              </div>
            </div>
            <div class="p-5 space-y-3 flex-1 flex flex-col justify-between text-right">
              <div>
                <h3 class="text-sm font-black text-white group-hover:text-cyan-300 transition-colors leading-snug line-clamp-1">${p.title}</h3>
                <p class="text-xs text-slate-300 line-clamp-2 leading-relaxed mt-1">${p.description}</p>
              </div>
              <div class="pt-3 border-t border-cyan-500/15 flex items-center justify-between">
                <span class="text-[10px] font-mono text-cyan-400">${p.tech}</span>
                <button type="button" onclick="closeViewAllModal(); openProjectDetailsModal('${p.id}')" class="px-3 py-1.5 rounded-xl bg-cyan-500/20 hover:bg-cyan-500/40 text-cyan-300 font-bold text-xs border border-cyan-400/40 transition">
                  المزيد <i class="fa-solid fa-arrow-left text-[10px]"></i>
                </button>
              </div>
            </div>
          </div>
        `;
      }).join('');

    } else if (currentViewAllType === 'services') {
      const data = (Array.isArray(servicesData) && servicesData.length) ? servicesData : richServicesData;
      const filtered = data.filter(s => {
        const matchCat = (currentViewAllCat === 'all' || s.filterCat === currentViewAllCat || s.category === currentViewAllCat);
        const matchQuery = !q || (s.title && s.title.toLowerCase().includes(q)) || (s.desc && s.desc.toLowerCase().includes(q));
        return matchCat && matchQuery;
      });

      if (badge) badge.textContent = `${filtered.length} خدمة`;
      if (!filtered.length) {
        container.innerHTML = '';
        if (empty) empty.classList.remove('hidden');
        return;
      }
      if (empty) empty.classList.add('hidden');

      container.className = 'grid grid-cols-1 md:grid-cols-2 gap-6';
      container.innerHTML = filtered.map(s => {
        const waMsg = encodeURIComponent('مرحباً، أود الاستفسار وطلب تفاصيل وتكلفة خدمة: ' + s.title);
        return `
          <div class="glass-card rounded-3xl border border-cyan-500/30 overflow-hidden shadow-2xl p-6 flex flex-col justify-between space-y-5 group text-right">
            <div class="space-y-3">
              <div class="flex items-center justify-between gap-3 border-b border-cyan-500/20 pb-3">
                <span class="px-3 py-1 rounded-full text-xs font-bold bg-cyan-500/15 text-cyan-300 border border-cyan-500/30">${s.tag || 'خدمة تقنية'}</span>
                <div class="w-9 h-9 rounded-xl bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-300 text-base">
                  <i class="${s.icon || 'fa-solid fa-gears'}"></i>
                </div>
              </div>
              <h3 class="text-base font-black text-white leading-snug">${s.title}</h3>
              <p class="text-xs text-slate-300 leading-relaxed">${s.desc}</p>
            </div>
            <div class="pt-3 border-t border-cyan-500/20 flex items-center justify-between">
              <span class="text-[11px] text-cyan-400 font-mono">${s.shortDesc || ''}</span>
              <a href="https://wa.me/201013688446?text=${waMsg}" target="_blank" rel="noopener" class="px-4 py-2 rounded-xl bg-green-500 hover:bg-green-400 text-white font-bold text-xs flex items-center gap-1.5 transition">
                <i class="fa-brands fa-whatsapp text-sm"></i> طلب الخدمة
              </a>
            </div>
          </div>
        `;
      }).join('');

    } else if (currentViewAllType === 'team') {
      const data = (Array.isArray(teamData) && teamData.length) ? teamData : defaultTeam;
      const filtered = data.filter(t => !q || (t.name && t.name.toLowerCase().includes(q)) || (t.role && t.role.toLowerCase().includes(q)));

      if (badge) badge.textContent = `${filtered.length} عضو`;
      if (!filtered.length) {
        container.innerHTML = '';
        if (empty) empty.classList.remove('hidden');
        return;
      }
      if (empty) empty.classList.add('hidden');

      container.className = 'grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-5';
      container.innerHTML = filtered.map(t => {
        const iconClass = (t.icon && t.icon.includes('fa-')) ? (t.icon.includes('fa-solid') || t.icon.includes('fa-brands') ? t.icon : 'fa-solid ' + t.icon) : 'fa-solid fa-user';
        const hasCustomImage = t.image && t.image.trim() !== '' && !t.image.includes('unsplash.com');

        return `
          <div class="glass-card rounded-2xl p-5 border border-cyan-500/25 flex flex-col items-center text-center justify-between gap-3 shadow-lg">
            <div class="relative">
              ${hasCustomImage ? `
                <div class="w-18 h-18 rounded-2xl overflow-hidden border-2 border-cyan-500/40 p-0.5 shadow-md">
                  <img src="${t.image}" alt="${t.name}" class="w-full h-full object-cover rounded-xl" loading="lazy" />
                </div>
              ` : `
                <div class="w-18 h-18 rounded-2xl bg-gradient-to-tr from-cyan-950 via-[#0a2342] to-slate-900 border-2 border-cyan-500/40 flex items-center justify-center text-cyan-300 shadow-md">
                  <i class="${iconClass} text-2xl text-cyan-400"></i>
                </div>
              `}
              <div class="absolute -bottom-1 -left-1 w-6 h-6 rounded-md bg-[#08172c] border border-cyan-500/50 flex items-center justify-center text-cyan-400 text-[10px]">
                <i class="${iconClass}"></i>
              </div>
            </div>
            <div>
              <p class="text-xs sm:text-sm font-black text-white truncate max-w-[150px]">${t.name}</p>
              <p class="text-[10px] text-cyan-400 font-bold mt-0.5 truncate max-w-[150px]">${t.role}</p>
            </div>
          </div>
        `;
      }).join('');
    }
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeViewAllModal();
    }
  });
  </script>
</body>
</html>
