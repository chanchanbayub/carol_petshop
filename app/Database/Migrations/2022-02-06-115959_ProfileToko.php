<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProfileToko extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama_toko' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'username' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'password' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'nomor_whatsapp' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'link_instagram' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false
            ],
            'created_at' => [
                'type' => 'datetime',
                'null' => false
            ],
            'updated_at' => [
                'type' => 'datetime',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('profile_toko', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('profile_toko');
    }
}
