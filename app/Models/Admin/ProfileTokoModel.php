<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProfileTokoModel extends Model
{
    protected $table            = 'profile_toko';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_toko', 'username', 'password', 'nomor_whatsapp', 'link_instagram'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
