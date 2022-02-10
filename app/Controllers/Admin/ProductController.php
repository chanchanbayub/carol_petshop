<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
    protected $validation;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        $product_data = $this->productModel->countAllResults();

        $number = (int)$product_data + 1;

        $now = date('dmy');

        $kode_unique = "KB" . $now . -$number;

        if ($keyword) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = $this->productModel->getProduct();
        }

        $currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;

        $data = [
            'title' => 'Product | Carol Petshop',
            'category' => $this->categoryModel->findAll(),
            'kode_unique' => $kode_unique,
            'product' => $product["product"]->paginate(10, 'product'),
            'pager' => $product["product"]->pager,
            'currentPage' => $currentPage,


        ];

        return view('administrator/product', $data);
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'category_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kategori Tidak Boleh Kosong!',
                    ]
                ],
                'nama_produk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Produk Tidak Boleh Kosong!',

                    ]
                ],
                'stok_produk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Stok Produk Tidak Boleh Kosong!',
                    ]
                ],
                'harga_produk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Stok Produk Tidak Boleh Kosong!',
                    ]
                ],
                'deskripsi_produk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Deskripsi Produk Tidak Boleh Kosong!',
                    ]
                ],
                'foto_produk' => [
                    'rules' => 'uploaded[foto_produk]|max_size[foto_produk,1024]|is_image[foto_produk]',
                    'errors' => [
                        'uploaded' => 'Foto Produk Tidak Boleh Kosong!',
                        'max_size' => 'Foto Tidak Boleh Lebih Dari 2mb!',
                        'is_image' => 'Yang Anda Upload Bukan Gambar',
                        'mime_in' => 'Format Foto Harus jpg, png',
                    ]
                ],
            ])) {

                $messeage = [
                    'error' => [
                        'category_id' => $this->validation->getError('category_id'),
                        'nama_produk' => $this->validation->getError('nama_produk'),
                        'stok_produk' => $this->validation->getError('stok_produk'),
                        'harga_produk' => $this->validation->getError('harga_produk'),
                        'deskripsi_produk' => $this->validation->getError('deskripsi_produk'),
                        'foto_produk' => $this->validation->getError('foto_produk'),
                    ]
                ];
            } else {
                $kode_produk = $this->request->getVar('kode_produk');
                $category_id = $this->request->getVar('category_id');
                $nama_produk = $this->request->getVar('nama_produk');
                $stok_produk = $this->request->getVar('stok_produk');
                $harga_produk = $this->request->getVar('harga_produk');
                $deskripsi_produk = $this->request->getVar('deskripsi_produk');
                $foto_produk = $this->request->getFile('foto_produk');

                $file = $foto_produk->getRandomName();

                $foto_produk->move('img_product/', $file);

                $this->productModel->save([
                    'kode_produk' => $kode_produk,
                    'category_id' => $category_id,
                    'nama_produk' => ucwords($nama_produk),
                    'stok_produk' => $stok_produk,
                    'harga_produk' => $harga_produk,
                    'deskripsi_produk' => ucwords($deskripsi_produk),
                    'foto_produk' => $file,
                ]);

                $messeage = [
                    'success' => 'Produk Berhasil di Tambahkan!'
                ];
            }
            return json_encode($messeage);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $product = $this->productModel->where(["id" => $id])->first();

            return json_encode($product);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $product = $this->productModel->where(["id" => $id])->first();

            unlink('img_product/' . $product["foto_produk"]);

            $this->productModel->delete($product['id']);

            $messeage = [
                'success' => 'Produk Berhasil di Hapus!'
            ];

            return json_encode($messeage);
        }
    }

    public function edit_product($id)
    {

        $data = [
            'title' => 'Edit Product',
            'category' => $this->categoryModel->findAll(),
            'product' => $this->productModel->where(["id" => $id])->first()

        ];

        return view('administrator/edit_product', $data);
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');
            $kode_produk = $this->request->getVar('kode_produk');
            $category_id = $this->request->getVar('category_id');
            $nama_produk = $this->request->getVar('nama_produk');
            $stok_produk = $this->request->getVar('stok_produk');
            $harga_produk = $this->request->getVar('harga_produk');
            $deskripsi_produk = $this->request->getVar('deskripsi_produk');
            $foto_produk = $this->request->getFile('foto_produk');
            $foto_pertama = $this->request->getVar('foto_pertama');

            if ($foto_produk->getError() == 4) {
                $nama_foto = $foto_pertama;
            } else {
                $foto_lama = "img_product/" . $foto_pertama;
                if (file_exists($foto_lama)) {
                    unlink($foto_lama);
                }
                $nama_foto = $foto_produk->getRandomName();
                $foto_produk->move('img_product/', $nama_foto);
            }

            $this->productModel->update($id, [
                'id' => $id,
                'kode_produk' => $kode_produk,
                'category_id' => $category_id,
                'nama_produk' => ucwords($nama_produk),
                'stok_produk' => $stok_produk,
                'harga_produk' => $harga_produk,
                'deskripsi_produk' => ucwords($deskripsi_produk),
                'foto_produk' => $nama_foto,
            ]);

            $messeage = [
                'success' => 'Produk Berhasil di Update',
                'url' => '/administrator/product'
            ];

            return json_encode($messeage);
        }
    }
}
