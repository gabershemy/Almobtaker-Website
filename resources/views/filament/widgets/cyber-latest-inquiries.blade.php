<div class="fi-section" style="padding: 22px;">
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <span style="display: inline-flex; align-items: center; justify-content: center; width: 34px; height: 34px; border-radius: 8px; background: rgba(0, 240, 255, 0.1); color: #00f0ff; border: 1px solid rgba(0, 240, 255, 0.25);">
                <i class="fa-solid fa-inbox"></i>
            </span>
            <h3 style="font-size: 1.15rem; font-weight: 700; color: #fff;">أحدث طلبات عروض الأسعار والرسائل الواردة</h3>
        </div>
        <a href="{{ route('filament.admin.resources.inquiries.index') }}" style="color: #00f0ff; font-weight: 600; font-size: 0.9rem; text-decoration: none;">
            عرض كافة الرسائل &larr;
        </a>
    </div>

    @if($latestInquiries->isEmpty())
        <div style="text-align: center; padding: 32px 0; color: #64748b;">
            <i class="fa-regular fa-envelope-open" style="font-size: 2.2rem; margin-bottom: 12px; display: block; opacity: 0.5;"></i>
            <span>لا توجد رسائل واردة حديثاً.</span>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-start" style="font-size: 0.92rem;">
                <thead>
                    <tr style="border-bottom: 1px solid rgba(0, 240, 255, 0.15); color: #94a3b8; text-align: start;">
                        <th style="padding: 10px 12px;">العميل</th>
                        <th style="padding: 10px 12px;">الهاتف / التواصل</th>
                        <th style="padding: 10px 12px;">الخدمة المطلوبة</th>
                        <th style="padding: 10px 12px;">الرسالة</th>
                        <th style="padding: 10px 12px;">التاريخ</th>
                        <th style="padding: 10px 12px;">الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestInquiries as $item)
                        <tr style="border-bottom: 1px solid rgba(255, 255, 255, 0.05); color: #cbd5e1;">
                            <td style="padding: 12px; font-weight: 700; color: #fff;">{{ $item->name }}</td>
                            <td style="padding: 12px;" dir="ltr">{{ $item->phone ?: $item->email }}</td>
                            <td style="padding: 12px;">
                                <span class="fi-badge" style="background: rgba(0, 240, 255, 0.1); color: #00f0ff; border: 1px solid rgba(0, 240, 255, 0.3); padding: 3px 10px; border-radius: 9999px; font-size: 0.8rem;">
                                    {{ $item->service_type ?: 'استفسار عام' }}
                                </span>
                            </td>
                            <td style="padding: 12px; max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $item->message }}
                            </td>
                            <td style="padding: 12px; font-size: 0.82rem; color: #64748b;">
                                {{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}
                            </td>
                            <td style="padding: 12px;">
                                @if(!$item->is_read)
                                    <span style="background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3); padding: 3px 10px; border-radius: 9999px; font-size: 0.8rem; font-weight: 700;">
                                        جديدة
                                    </span>
                                @else
                                    <span style="background: rgba(16, 185, 129, 0.15); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.3); padding: 3px 10px; border-radius: 9999px; font-size: 0.8rem;">
                                        مقروءة
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
