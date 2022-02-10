<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->db->disableForeignKeyChecks();
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'kode_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => false
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'unsigned' => true
            ],
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'stok_produk' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'harga_produk' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'deskripsi_produk' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
            ],
            'foto_produk' => [
                'type' => 'varchar',
                'constraint' => 255,
                'null' => false,
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
        $this->forge->addForeignKey('category_id', 'category_product', 'id', 'CASCADE', 'CASCADE');
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('product', false, $attributes);
        $this->db->enableForeignKeyChecks();
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
