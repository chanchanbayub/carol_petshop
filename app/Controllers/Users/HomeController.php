<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\Users\CategoryModel;
use App\Models\Users\ProductModel;

class HomeController extends BaseController
{
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $product = $this->productModel->getProduct();

        $data = [
            'title' => 'Carol PetShop',
            'category' => $this->categoryModel->findAll(),
            'product' => $product["product"]->paginate(6, 'product'),
            'pager' => $product["product"]->pager,
            'newProduct' => $product["product"]->limit('4')->get()->getResultArray(),
            'produkLama' => $product["product"]->limit('2')->get()->getResultArray()

        ];

        return view('users/home', $data);
    }

    public function category($category)
    {

        $product = $this->productModel->getProductWhere($category);

        $data = [
            'title' => 'Carol PetShop',
            'category' => $this->categoryModel->findAll(),
            'product' => $product["product"]->paginate(6, "product"),
            'pager' => $product["product"]->pager

        ];

        return view('users/home', $data);
    }

    public function detail($kode_produk)
    {
        $product = $this->productModel->getProductId($kode_produk);
        // dd($product);
        $data = [
            'title' => 'Carol PetShop',
            'category' => $this->categoryModel->findAll(),
            'produk' => $product,

        ];

        return view('users/product', $data);
    }
}
