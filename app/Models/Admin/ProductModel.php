<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['kode_produk', 'category_id',  'nama_produk', 'stok_produk', 'harga_produk', 'deskripsi_produk', 'foto_produk'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $fieldTable = 'product.id,product.category_id, kode_produk ,nama_produk, stok_produk, harga_produk, deskripsi_produk, foto_produk, category';

    public function getProduct()
    {
        $this->table($this->table)
            ->select($this->fieldTable)
            ->join('category_product', 'category_product.id = category_id')
            ->orderBy('product.id DESC');

        return [
            'product' => $this
        ];
    }

    public function search($keyword)
    {
        $this->table($this->table)
            ->select($this->fieldTable)
            ->join('category_product', 'category_product.id = product.category_id')
            ->like('nama_produk', $keyword)
            ->orLike('kode_produk', $keyword)
            ->orderBy('product.id DESC');

        return [
            'product' => $this
        ];
    }

    public function totalProduct()
    {
        return $this->table($this->table)
            ->orderBy('id DESC')
            ->countAllResults();
    }
}
