<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\biodatamodel;

class Biodata extends BaseController
{
    public function index()
    {
        $model = new biodatamodel();
        $data['biodatas'] = $model->findAll();
        return view('biodata/index', $data);
    }
    public function add()
    {
        return view('biodata/add'); // Tampilkan halaman form tambah biodata
    }

    public function create()
    {
    $model = new BiodataModel();

    // Set aturan validasi
    $rules = [
        'nama' => 'required',
        'nim' => 'required|numeric',
        'jk' => 'required',
        'tempat_lahir' => 'required',
        'ttl' => 'required',
        'umur' => 'required|numeric',
        'alamat' => 'required',
        'no_hp' => 'required|numeric',
        'foto' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
    ];

    // Pesan kesalahan kustom untuk validasi
    $errors = [
        'foto' => [
            'uploaded' => 'Mohon unggah foto Anda.',
            'mime_in' => 'Hanya file gambar dengan format JPG, JPEG, atau PNG yang diizinkan.',
        ],
    ];

    // Jalankan validasi
    if (!$this->validate($rules, $errors)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }
    $image = $this->request->getFile('foto');
        $imageName = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/cover/', $imageName);

    // Ambil data dari form
    $data = [
        'nama' => $this->request->getPost('nama'),
        'nim' => $this->request->getPost('nim'),
        'jk' => $this->request->getPost('jk'),
        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        'ttl' => $this->request->getPost('ttl'),
        'umur' => $this->request->getPost('umur'),
        'alamat' => $this->request->getPost('alamat'),
        'no_hp' => $this->request->getPost('no_hp'),
        'foto' => $imageName,
    ];

    // Simpan data ke database
    $model->insert($data);
    
    // Redirect ke halaman biodata dengan pesan alert
    return redirect()->to('/biodata')->with('success', 'Data berhasil diubah!');
}


public function edit($id)
{
    $model = new BiodataModel();
    $data['biodata'] = $model->find($id); // Ambil data biodata berdasarkan ID

    return view('biodata/edit', $data); // Tampilkan halaman form edit biodata berdasarkan ID
}

public function update($id)
{
    $model = new BiodataModel();

    // Ambil data dari form
    $data = [
        'nama' => $this->request->getPost('nama'),
        'nim' => $this->request->getPost('nim'),
        'jk' => $this->request->getPost('jk'),
        'tempat_lahir' => $this->request->getPost('tempat_lahir'),
        'ttl' => $this->request->getPost('ttl'),
        'umur' => $this->request->getPost('umur'),
        'alamat' => $this->request->getPost('alamat'),
        'no_hp' => $this->request->getPost('no_hp'),
    ];

    // cek apakah ada file foto baru diunggah
    $foto = $this->request->getFile('foto');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        // Generate nama file yang unik
        $imageName = $foto->getRandomName();
        // Pindah file ke direktori penyimpanan
        $foto->move(ROOTPATH . 'public/assets/cover/', $imageName);
        // Hapus file gambar lama jika ada
        $biodata = $model->find($id);
        if ($biodata['foto'] && file_exists(ROOTPATH . 'public/assets/cover/' . $biodata['foto'])) {
            unlink(ROOTPATH . 'public/assets/cover/' . $biodata['foto']);
        }
        $data['foto'] = $imageName;
    }

    // Update data di database berdasarkan ID
    $model->update($id, $data);

    // Redirect ke halaman biodata dengan pesan alert
    return redirect()->to('/biodata')->with('success', 'Data berhasil diubah!');
}




    public function destroy($id)
    {
        $model = new BiodataModel();

        // Hapus data dari database berdasarkan ID
        $model->delete($id);

        // Redirect ke halaman biodata
        return redirect()->to('/biodata');
    }
    
}
