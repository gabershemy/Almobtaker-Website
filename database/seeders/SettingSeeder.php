<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->truncate();

        $data = array (
  0 => 
  array (
    'key_name' => 'site_title',
    'key_value' => 'المبتكر العربي للبرمجيات | Almobtaker Alaraby Software & AI Solutions',
  ),
  1 => 
  array (
    'key_name' => 'phone',
    'key_value' => '+201013688446',
  ),
  2 => 
  array (
    'key_name' => 'whatsapp',
    'key_value' => '01013688446',
  ),
  3 => 
  array (
    'key_name' => 'email',
    'key_value' => 'gabershemy@gmail.com',
  ),
  4 => 
  array (
    'key_name' => 'address',
    'key_value' => 'دمنهور - مصر',
  ),
  5 => 
  array (
    'key_name' => 'work_hours',
    'key_value' => 'السبت - الخميس: 9:00 ص - 9:00 م',
  ),
  6 => 
  array (
    'key_name' => 'hero_title',
    'key_value' => 'المبتكر العربي للبرمجيات والحلول الذكية',
  ),
  7 => 
  array (
    'key_name' => 'hero_subtitle',
    'key_value' => 'شريكك التكنولوجي لتطوير أنظمة ERP السحابية، حلول الذكاء الاصطناعي، تطبيقات الموبايل والويب، والربط والفوترة الإلكترونية ZATCA.',
  ),
  8 => 
  array (
    'key_name' => 'hero_p1',
    'key_value' => 'نحن شركة المبتكر العربي للبرمجيات، متخصصة في تطوير الحلول التقنية المتقدمة، نقدم خدمات متكاملة تشمل برمجة تطبيقات الويب وسطح المكتب، تصميم الواجهات المتجاوبة، الأمن السيبراني، والدعم الفني المستمر.',
  ),
  9 => 
  array (
    'key_name' => 'about_p1',
    'key_value' => 'تأسست شركة المبتكر العربي للبرمجيات عام 2006، وتُعد من الشركات الرائدة في العالم العربي في مجال تطوير البرمجيات والحلول التقنية المتكاملة.',
  ),
  10 => 
  array (
    'key_name' => 'about_p2',
    'key_value' => 'نقدم خدمات متكاملة تشمل: تصميم وتطوير مواقع الويب، تطبيقات الهواتف الذكية، الأنظمة الإدارية ERP، الذكاء الاصطناعي، وتحليل البيانات، مع التزام تام بأعلى معايير الأمان والجودة.',
  ),
  11 => 
  array (
    'key_name' => 'about_p3',
    'key_value' => 'بفضل خبرتنا الممتدة لأكثر من 18 عامًا، نجحنا في تنفيذ أكثر من 65 منظومة متقدمة لمؤسسات ومصانع وشركات كبرى محلياً وإقليمياً.',
  ),
  12 => 
  array (
    'key_name' => 'facebook',
    'key_value' => 'https://www.facebook.com/AlmobtakerAlaraby',
  ),
);

        DB::table('settings')->insert($data);
    }
}
