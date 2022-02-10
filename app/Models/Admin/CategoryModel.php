<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'category_product';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['category'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getCategory()
    {

        $this->table($this->table)
            ->orderBy('id desc');

        return [
            'category' => $this
        ];
    }

    public function search($keyword)
    {
        $this->table($this->table)
            ->like("category", $keyword)
            ->orderBy('id desc');

        return [
            'category' => $this
        ];
    }

    public function totalCategory()
    {
        return $this->table($this->table)
            ->countAllResults();
    }
}
