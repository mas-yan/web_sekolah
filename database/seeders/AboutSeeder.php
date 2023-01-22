<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'name' => 'SMK ALMUSYAFA',
            'moto' => "SEKOLAH BERBASIS PONDOK PESANTREN AL MUSYAFFA'",
            'telp' => ' 012-345-6789',
            'email' => 'info@smkalmusyaffa.sch.id',
            'address' => 'Jl. Kampir, Sudi Kampir, Sudipayung, Kec. Ngampel, Kabupaten Kendal',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit voluptate veritatis vitae odit fugiat. Architecto, labore blanditiis cupiditate ipsa repellat libero eum ducimus facilis cum aliquid autem, esse accusamus quibusdam.',
            'full_address' => 'smk al-musyaffa, Jl. Kampir, Area Persawahan, Sudipayung, Kec. Ngampel, Kabupaten Kendal, Jawa Tengah 51357',
            'visi' => 'Ini adalah visi',
            'misi' => 'Ini adalah misi',
            'map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1400.1764564269818!2d110.197456429925!3d-6.974235383729255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705d9a8eff7b3d%3A0xc287770f6dad83b8!2sSmk%20Al%20Musyaffa&#39;!5e0!3m2!1sid!2sid!4v1674089496989!5m2!1sid!2sid" class="rounded map" style="border:0; width:100%;"  loading="lazy"></iframe>',
        ]);
    }
}
