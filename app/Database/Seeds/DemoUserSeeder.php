<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')
            ->where('username', 'demo')
            ->update([
                'password' => password_hash('demo12345', PASSWORD_DEFAULT),
            ]);
    }
}
