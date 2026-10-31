<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Inquiry;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dbProjects = Project::orderBy('order_num')->get()->toArray();
        $dbServices = Service::orderBy('order_num')->get()->toArray();
        $dbTeam = Team::orderBy('order_num')->get()->toArray();
        $dbGallery = Gallery::orderBy('order_num')->get()->toArray();
        $dbFaqs = Faq::orderBy('order_num')->get()->toArray();

        $settings = Setting::pluck('key_value', 'key_name')->toArray();

        $siteTitle = $settings['site_title'] ?? 'المبتكر العربي للبرمجيات | Almobtaker Alaraby Software & AI Solutions';
        $phone = $settings['phone'] ?? '+201013688446';
        $whatsapp = $settings['whatsapp'] ?? '01013688446';
        $email = $settings['email'] ?? 'gabershemy@gmail.com';
        $facebook = $settings['facebook'] ?? 'https://www.facebook.com/AlmobtakerAlaraby';
        $address = $settings['address'] ?? 'دمنهور - مصر';
        $workHours = $settings['work_hours'] ?? 'السبت - الخميس: 9:00 ص - 9:00 م';
        $heroTitle = $settings['hero_title'] ?? 'المبتكر العربي للبرمجيات والحلول الذكية';
        $heroSubtitle = $settings['hero_subtitle'] ?? 'شريكك التكنولوجي لتطوير أنظمة ERP السحابية، حلول الذكاء الاصطناعي، وتطبيقات الموبايل والويب.';

        $siteUrl = 'https://mobtakeraraby.com';
        $seoService = new \App\Services\SeoService();
        $schemaJsonLd = $seoService->generateSchemaOrg([
            'site_url' => $siteUrl,
            'phone' => $phone,
            'email' => $email
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

    public function submitInquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:100',
            'service_type' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        Inquiry::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'service_type' => $validated['service_type'] ?? null,
            'message' => $validated['message'] ?? null,
            'is_read' => false,
            'created_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'تم استلام طلبكم بنجاح! سيتواصل معكم فريقنا الهندسي في أسرع وقت.'
        ]);
    }
}
