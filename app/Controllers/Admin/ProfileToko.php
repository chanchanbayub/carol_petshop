<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProfileTokoModel;

class ProfileToko extends BaseController
{
    protected $profileTokoModel;
    protected $validation;

    public function __construct()
    {
        $this->profileTokoModel = new ProfileTokoModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile Toko',
            'profile' => $this->profileTokoModel->first()

        ];

        return view('administrator/profile_toko', $data);
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate([
                'nama_toko' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Toko Tidak Boleh Kosong!'
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Tidak Boleh Kosong!'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Tidak Boleh Kosong!'
                    ]
                ],
                'nomor_whatsapp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Whatsapp Tidak Boleh Kosong!'
                    ]
                ],
                'link_instagram' => [
                    'rules' => 'required|valid_url',
                    'errors' => [
                        'required' => 'Link Instagram Tidak Boleh Kosong!',
                        'valid_url' => 'Link Instagram Salah!',

                    ]
                ],
            ])) {

                $messeage = [
                    'error' => [
                        'nama_toko' => $this->validation->getError('nama_toko'),
                        'username' => $this->validation->getError('username'),
                        'password' => $this->validation->getError('password'),
                        'nomor_whatsapp' => $this->validation->getError('nomor_whatsapp'),
                        'link_instagram' => $this->validation->getError('link_instagram'),
                    ]
                ];
            } else {
                $nama_toko = $this->request->getPost('nama_toko');
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                $nomor_whatsapp = $this->request->getPost('nomor_whatsapp');
                $link_instagram = $this->request->getPost('link_instagram');

                $this->profileTokoModel->save([
                    'nama_toko' => ucwords($nama_toko),
                    'username' => ucwords($username),
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'nomor_whatsapp' => ucwords($nomor_whatsapp),
                    'link_instagram' => ucwords($link_instagram),
                ]);

                $messeage = [
                    'success' => 'Profil Toko Berhasil di Tambahkan!'
                ];
            }
            return json_encode($messeage);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $profileToko = $this->profileTokoModel->where(["id" => $id])->first();

            return json_encode($profileToko);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $nama_toko = $this->request->getPost('nama_toko');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $nomor_whatsapp = $this->request->getPost('nomor_whatsapp');
            $link_instagram = $this->request->getPost('link_instagram');

            $this->profileTokoModel->update($id, [
                'nama_toko' => ucwords($nama_toko),
                'username' => ucwords($username),
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'nomor_whatsapp' => ucwords($nomor_whatsapp),
                'link_instagram' => ucwords($link_instagram),
            ]);

            $messeage = [
                'success' => 'Profil Toko Berhasil di Update!'
            ];

            return json_encode($messeage);
        }
    }
}
