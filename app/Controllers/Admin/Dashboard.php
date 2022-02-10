<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;

class Dashboard extends BaseController
{
    protected $categoryModel;
    protected $productModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {


        $data = [
            'title' => 'Carol Petshop',
            'totalCategory' => $this->categoryModel->totalCategory(),
            'totalProduct' => $this->productModel->totalProduct()
        ];

        return view('administrator/dashboard', $data);
    }
}
