<div class="cyber-stats-grid">
    {{-- 1. الرسائل والطلبات --}}
    <div class="cyber-stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-envelope"></i>
        </div>
        <div class="stat-number">{{ $inquiriesCount }}</div>
        <div class="stat-title">الرسائل والطلبات</div>
        <a href="{{ route('filament.admin.resources.inquiries.index') }}" class="stat-sub">
            @if($unreadInquiries > 0)
                <span style="color: #ff4757; font-weight: bold;">يوجد {{ $unreadInquiries }} رسائل جديدة &larr;</span>
            @else
                <span>جميع الطلبات مقروءة &larr;</span>
            @endif
        </a>
    </div>

    {{-- 2. سابقة الأعمال --}}
    <div class="cyber-stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div class="stat-number">{{ $projectsCount }}</div>
        <div class="stat-title">سابقة الأعمال</div>
        <a href="{{ route('filament.admin.resources.projects.index') }}" class="stat-sub">
            إدارة وتعديل المشاريع &larr;
        </a>
    </div>

    {{-- 3. معرض الصور --}}
    <div class="cyber-stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-images"></i>
        </div>
        <div class="stat-number">{{ $galleryCount }}</div>
        <div class="stat-title">معرض الصور</div>
        <a href="{{ route('filament.admin.resources.galleries.index') }}" class="stat-sub">
            إضافة وتعديل الشاشات &larr;
        </a>
    </div>

    {{-- 4. الخدمات --}}
    <div class="cyber-stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-gears"></i>
        </div>
        <div class="stat-number">{{ $servicesCount }}</div>
        <div class="stat-title">الخدمات</div>
        <a href="{{ route('filament.admin.resources.services.index') }}" class="stat-sub">
            تعديل باقات الخدمات &larr;
        </a>
    </div>

    {{-- 5. فريق العمل --}}
    <div class="cyber-stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-user-group"></i>
        </div>
        <div class="stat-number">{{ $teamCount }}</div>
        <div class="stat-title">فريق العمل</div>
        <a href="{{ route('filament.admin.resources.teams.index') }}" class="stat-sub">
            تعديل أعضاء الفريق &larr;
        </a>
    </div>

    {{-- 6. الأسئلة الشائعة --}}
    <div class="cyber-stat-card">
        <div class="stat-icon">
            <i class="fa-solid fa-circle-question"></i>
        </div>
        <div class="stat-number">{{ $faqsCount }}</div>
        <div class="stat-title">الأسئلة الشائعة</div>
        <a href="{{ route('filament.admin.resources.faqs.index') }}" class="stat-sub">
            إدارة الأسئلة والإجابات &larr;
        </a>
    </div>
</div>
