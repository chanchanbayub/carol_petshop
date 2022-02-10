<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;
    protected $validation;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $category = $this->categoryModel->search($keyword);
        } else {
            $category = $this->categoryModel->getCategory();
        }
        $currentPage = $this->request->getVar('page_category_product') ? $this->request->getVar('page_category_product') : 1;

        $data = [
            'title' => 'Kategori Produk | Carol Petshop',
            'category' => $category["category"]->paginate(5, 'category_product'),
            'pager' => $category["category"]->pager,
            'currentPage' => $currentPage
        ];
        return view('administrator/category', $data);
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'category' => [
                    'rules' => 'required|matches[category]',
                    'errors' => [
                        'required' => 'Kategori Tidak Boleh Kosong!',
                        'matches' => 'Kategori Sudah Terdaftar'
                    ]
                ]
            ])) {

                $messeage = [
                    'error' => [
                        'category' => $this->validation->getError('category')
                    ]
                ];
            } else {
                $category = $this->request->getVar('category');

                $this->categoryModel->save([
                    'category' => ucwords($category)
                ]);

                $messeage = [
                    'success' => 'Category Berhasil di Tambahkan!'
                ];
            }
            return json_encode($messeage);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $category = $this->categoryModel->where(["id" => $id])->first();

            return json_encode($category);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'category' => [
                    'rules' => 'required|matches[category]',
                    'errors' => [
                        'required' => 'Kategori Tidak Boleh Kosong!',
                        'matches' => 'Kategori Sudah Terdaftar'
                    ]
                ]
            ])) {

                $messeage = [
                    'error' => [
                        'category' => $this->validation->getError('category')
                    ]
                ];
            } else {
                $id = $this->request->getVar('id');
                $category = $this->request->getVar('category');

                $this->categoryModel->update($id, [
                    'id' => $id,
                    'category' => ucwords($category)
                ]);

                $messeage = [
                    'success' => 'Category Berhasil di Update!'
                ];
            }
            return json_encode($messeage);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $this->categoryModel->delete($id);

            $messeage = [
                'success' => 'Kategori Berhasil di Hapus!'
            ];

            return json_encode($messeage);
        }
    }
}
