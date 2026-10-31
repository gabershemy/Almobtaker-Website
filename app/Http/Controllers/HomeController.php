<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use App\Services\SeoService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Render the high-performance Landing Page.
     * Implements Dependency Inversion Principle (DIP) via SeoService injection.
     */
    public function index(SeoService $seoService): View
    {
        $dbProjects = Project::orderBy('order_num')->get()->toArray();
        $dbServices = Service::orderBy('order_num')->get()->toArray();
        $dbTeam     = Team::orderBy('order_num')->get()->toArray();
        $dbGallery  = Gallery::orderBy('order_num')->get()->toArray();
        $dbFaqs     = Faq::orderBy('order_num')->get()->toArray();

        $settings = Setting::pluck('key_value', 'key_name')->toArray();

        $siteTitle    = $settings['site_title'] ?? 'المبتكر العربي للبرمجيات | Almobtaker Alaraby Software & AI Solutions';
        $phone        = $settings['phone'] ?? '+201013688446';
        $whatsapp     = $settings['whatsapp'] ?? '01013688446';
        $email        = $settings['email'] ?? 'gabershemy@gmail.com';
        $facebook     = $settings['facebook'] ?? 'https://www.facebook.com/AlmobtakerAlaraby';
        $address      = $settings['address'] ?? 'دمنهور - مصر';
        $workHours    = $settings['work_hours'] ?? 'السبت - الخميس: 9:00 ص - 9:00 م';
        $heroTitle    = $settings['hero_title'] ?? 'المبتكر العربي للبرمجيات والحلول الذكية';
        $heroSubtitle = $settings['hero_subtitle'] ?? 'شريكك التكنولوجي لتطوير أنظمة ERP السحابية، حلول الذكاء الاصطناعي، وتطبيقات الموبايل والويب.';

        $siteUrl = 'https://mobtakeraraby.com';
        $schemaJsonLd = $seoService->generateSchemaOrg([
            'site_url' => $siteUrl,
            'phone'    => $phone,
            'email'    => $email
        ], $dbProjects, $dbServices, $dbFaqs);

        return view('welcome', compact(
            'dbProjects',
            'dbServices',
            'dbTeam',
            'dbGallery',
            'dbFaqs',
            'siteTitle',
            'phone',
            'whatsapp',
            'email',
            'facebook',
            'address',
            'workHours',
            'heroTitle',
            'heroSubtitle',
            'siteUrl',
            'schemaJsonLd'
        ));
    }

    /**
     * Handle incoming contact inquiries securely with validation and XSS sanitization.
     */
    public function submitInquiry(InquiryRequest $request): JsonResponse
    {
        $data = $request->sanitized();

        Inquiry::create([
            'name'         => $data['name'],
            'phone'        => $data['phone'],
            'email'        => $data['email'],
            'service_type' => $data['service_type'],
            'message'      => $data['message'],
            'is_read'      => false,
            'created_at'   => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم استلام طلبكم بنجاح! سيتواصل معكم فريقنا الهندسي في أسرع وقت.'
        ]);
    }
}
