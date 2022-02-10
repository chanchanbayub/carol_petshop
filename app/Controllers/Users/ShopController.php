<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Users\ProductModel;

class ShopController extends BaseController
{

    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $product = $this->productModel->getProduct();
        $data = [
            'title' => 'Carol Petshop',
            'product' => $product["product"]->paginate(9, 'product')

        ];

        return view('users/shop', $data);
    }
}
