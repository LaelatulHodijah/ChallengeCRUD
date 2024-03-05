<?php

namespace App\Models;

use CodeIgniter\Model;

class biodatamodel extends Model
{
    protected $table      = 'biodata'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel

    protected $useAutoIncrement = true; // Gunakan auto increment pada primary key

    protected $allowedFields = ['nama', 'nim', 'jk', 'tempat_lahir', 'ttl', 'umur', 'alamat', 'no_hp', 'foto']; // Kolom yang dapat diisi

    // Fungsi untuk mendapatkan semua data biodata
    public function getAllBiodata()
    {
        return $this->findAll();
    }

    // Fungsi untuk menambahkan data biodata
    public function insertBiodata($data)
    {
        return $this->insert($data);
    }

    // Fungsi untuk mengupdate data biodata berdasarkan ID
    public function updateBiodata($id, $data)
    {
        return $this->update($id, $data);
        $this->where('id', $id)
         ->set($data)
         ->update();
    }


    // Fungsi untuk menghapus data biodata berdasarkan ID
    public function deleteBiodata($id)
    {
        return $this->delete($id);
    }

    public function savePhoto($data)
    {
        return $this->insert($data);
    }
}
