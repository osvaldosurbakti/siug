<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run()
    {
        $user_object = new Pelanggan();

		$user_object->insertBatch([
			[
				"user_id" => 2,
				"nik" => "1234512323",
				"alamat" => "JLN.Jamin ginting ....",
				"role" => "admin",
				"foto_ktp" => "contohfotoktp.jpg"
			]
		]);
    }
}
