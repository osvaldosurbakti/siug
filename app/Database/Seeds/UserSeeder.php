<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new User();

		$user_object->insertBatch([
			[
				"name" => "Admin",
				"email" => "admin@mail.com",
				"phone_no" => "081234567890",
				"role" => "admin",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			],
			[
				"name" => "Pelanggan 1",
				"email" => "pelanggan1@mail.com",
				"phone_no" => "081122223434",
				"role" => "pelanggan",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			]
		]);
    }
}
