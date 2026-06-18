<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $orgs = [
            [
                'name' => 'Dewan Pembina',
                'section' => 'pembina',
                'sort_order' => 1,
                'members' => ['FIRMAN', 'HAMSA ALI TOPAN, S.Ip', 'SUGIANTO FATTAH, S.Ip']
            ],
            [
                'name' => 'Dewan Pengawas Organisasi',
                'section' => 'pengawas',
                'sort_order' => 1,
                'members' => ['DIAN NOVITASARI', 'AR FACHMI TANNIPALLU', 'MUH. IKRAN']
            ],
            [
                'name' => 'Ketua Umum',
                'section' => 'ketua',
                'sort_order' => 1,
                'members' => ['Andi Bani Aulia Ahmad']
            ],
            [
                'name' => 'Sekretaris Umum',
                'section' => 'sekretaris',
                'sort_order' => 1,
                'members' => ['RIFKY']
            ],
            [
                'name' => 'Bendahara Umum',
                'section' => 'bendahara',
                'sort_order' => 1,
                'members' => ['Nur Santi Syamtar']
            ],
            [
                'name' => 'Kewirausahaan',
                'section' => 'divisi',
                'sort_order' => 1,
                'members' => ['Muh. Eril Pitra', 'Rahma', 'Muliani', 'Nur Fadila', 'Rasdia Kamil']
            ],
            [
                'name' => 'Keagamaan',
                'section' => 'divisi',
                'sort_order' => 2,
                'members' => ['Suci nasra', 'Dwiputri', 'Sulhijrah', 'Nurul Awwalul fadlliah']
            ],
            [
                'name' => 'Humas',
                'section' => 'divisi',
                'sort_order' => 3,
                'members' => ['Abdianto', 'Irfan', 'Mutmainna', 'Andi Airin Anggraeni']
            ],
            [
                'name' => 'Teknologi Informasi',
                'section' => 'divisi',
                'sort_order' => 4,
                'members' => ['Deananda', 'Nur Atika Putri', 'Wahyuni Lestari Yasin']
            ],
            [
                'name' => 'Keilmuan & Kaderisasi',
                'section' => 'divisi',
                'sort_order' => 5,
                'members' => ['Ridwan', 'Muh Fajrin', 'Muh Halfian', 'Risal Subroto', 'Muhammad Gufran']
            ],
        ];

        foreach ($orgs as $orgData) {
            $org = Organization::create([
                'name' => $orgData['name'],
                'section' => $orgData['section'],
                'sort_order' => $orgData['sort_order'],
            ]);

            foreach ($orgData['members'] as $index => $memberName) {
                $org->members()->create([
                    'name' => $memberName,
                    'sort_order' => $index + 1,
                ]);
            }
        }
    }
}
