<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class ProductModel extends Model
{

    protected $table            = 'product';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['category_id', 'kode_produk', 'nama_produk', 'stok_produk', 'harga_produk', 'deskripsi_produk', 'foto_produk'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $fieldTable = 'product.id,category_id,kode_produk , nama_produk, stok_produk, harga_produk, deskripsi_produk, foto_produk, category_product.category';

    public function getProduct()
    {
        $this->table($this->table)
            ->select($this->fieldTable)
            ->join('category_product', 'category_product.id = product.category_id')
            ->orderBy('product.id desc');

        return [
            'product' => $this
        ];
    }

    public function getProductWhere($category)
    {
        $this->table($this->table)
            ->select($this->fieldTable)
            ->join('category_product', 'category_product.id = product.category_id')
            ->where(["category" => $category])
            ->orderBy('product.id desc');

        return [
            'product' => $this
        ];
    }

    public function getProductId($kode_produk)
    {
        return $this->table($this->table)
            ->select($this->fieldTable)
            ->join('category_product', 'category_product.id = product.category_id')
            ->where(["product.kode_produk" => $kode_produk])
            ->orderBy('product.id desc')->get()->getRowArray();
    }
}
