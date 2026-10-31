<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('team')->truncate();

        $data = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'د. جابر الشيمي',
    'role' => 'Co-Founder & CEO',
    'icon' => 'fa-solid fa-user-tie',
    'order_num' => 1,
    'image' => NULL,
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'م. حسام مجدي',
    'role' => 'Front-End Developer',
    'icon' => 'fa-solid fa-code',
    'order_num' => 2,
    'image' => NULL,
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'د. آية ماهر غراب',
    'role' => 'Social Team Manager',
    'icon' => 'fa-solid fa-bullhorn',
    'order_num' => 3,
    'image' => NULL,
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'م. ندى ياقوت شاهين',
    'role' => 'Front-End Developer',
    'icon' => 'fa-solid fa-laptop-code',
    'order_num' => 4,
    'image' => NULL,
  ),
  4 => 
  array (
    'id' => 5,
    'name' => 'م. رُقيّة محمد شريط',
    'role' => 'UI/UX Designer',
    'icon' => 'fa-solid fa-pen-nib',
    'order_num' => 5,
    'image' => NULL,
  ),
  5 => 
  array (
    'id' => 6,
    'name' => 'م. سارة محمود البدري',
    'role' => 'UI/UX Designer',
    'icon' => 'fa-solid fa-pen-nib',
    'order_num' => 6,
    'image' => NULL,
  ),
  6 => 
  array (
    'id' => 7,
    'name' => 'م. روفيده محمد البشلاوي',
    'role' => 'Front-End Developer',
    'icon' => 'fa-solid fa-code',
    'order_num' => 7,
    'image' => NULL,
  ),
  7 => 
  array (
    'id' => 8,
    'name' => 'م. ندى صبحي أبو زيد',
    'role' => 'Front-End Developer',
    'icon' => 'fa-solid fa-code',
    'order_num' => 8,
    'image' => NULL,
  ),
  8 => 
  array (
    'id' => 9,
    'name' => 'أحمد جابر الشيمي',
    'role' => 'Social Media Team',
    'icon' => 'fa-brands fa-facebook',
    'order_num' => 9,
    'image' => NULL,
  ),
  9 => 
  array (
    'id' => 10,
    'name' => 'م. عمرو خالد عيسى',
    'role' => 'Backend Software Engineer',
    'icon' => 'fa-solid fa-server',
    'order_num' => 10,
    'image' => NULL,
  ),
  10 => 
  array (
    'id' => 11,
    'name' => 'م. مصطفى العيسوي',
    'role' => 'Flutter Developer',
    'icon' => 'fa-solid fa-mobile-screen',
    'order_num' => 11,
    'image' => NULL,
  ),
  11 => 
  array (
    'id' => 12,
    'name' => 'شمس صبحي الشيمي',
    'role' => 'Marketing Team',
    'icon' => 'fa-solid fa-chart-pie',
    'order_num' => 12,
    'image' => NULL,
  ),
);

        DB::table('team')->insert($data);
    }
}
