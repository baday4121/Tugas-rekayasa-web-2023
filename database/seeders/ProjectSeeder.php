<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Sistem Point of Sale (POS) F&B',
                'description' => 'Aplikasi kasir berbasis cloud untuk manajemen transaksi, inventaris, dan laporan penjualan outlet makanan.',
                'technology' => 'Laravel, Vue.js, Inertia.js',
                'image' => 'pos-project1.webp',
                'status' => 'In Development'
            ],
            [
                'title' => 'Maintenance Helpdesk Ticketing',
                'description' => 'Sistem pengelolaan tiket keluhan dan BAP untuk memudahkan tracking perbaikan oleh tim teknisi.',
                'technology' => 'Laravel, Bootstrap, MySQL',
                'image' => 'helpdesk-project2.webp',
                'status' => 'Completed'
            ],
            [
                'title' => 'Personal Portfolio Website',
                'description' => 'Website portofolio personal untuk menampilkan profil, keahlian, dan riwayat pekerjaan.',
                'technology' => 'Laravel, TailwindCSS',
                'image' => 'portfolio-project3.png',
                'status' => 'Completed'
            ],
            [
                'title' => 'REST API Gateway',
                'description' => 'Integrasi API untuk menjembatani komunikasi antar layanan aplikasi internal perusahaan.',
                'technology' => 'Laravel, Postman, MongoDB',
                'image' => 'restapi-project4.png',
                'status' => 'Completed'
            ],
            [
                'title' => 'Server Monitoring Dashboard',
                'description' => 'Dasbor untuk memantau resource server Ubuntu dan container docker secara realtime.',
                'technology' => 'Grafana, Prometheus, Docker',
                'image' => 'monitoring-project5.png',
                'status' => 'Completed'
            ],
            [
                'title' => 'Company Profile',
                'description' => 'Website profil perusahaan resmi yang dilengkapi optimasi SEO dan sistem manajemen konten.',
                'technology' => 'Laravel, Bootstrap, MySQL',
                'image' => 'company-profile-project6.avif',
                'status' => 'Completed'
            ],
            [
                'title' => 'Asset & Inventory Management System',
                'description' => 'Sistem pelacakan inventaris aset IT perusahaan terpusat dengan fitur laporan berkala.',
                'technology' => 'Laravel, Bootstrap, PostgreSQL',
                'image' => 'asset-management-project7.png',
                'status' => 'In Development'
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}