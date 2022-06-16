<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendas')->insert([
            'nama' => 'hesti',
            'mapel' => 'PROGDAS',
            'materi' => 'html',
            'jenis' => 'PTM',
            'link' => '-',
            'absensi' => '-',
            'foto' => '-',
            'kelas' => 'XI RPL 1',
            'mulai' => '07:00',
            'selesai' => '08:00',
            'keterangan' => '-',
        ]);
    }
}
