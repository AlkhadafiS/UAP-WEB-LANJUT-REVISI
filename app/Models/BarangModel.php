<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_merk', 'stok', 'id_jenis'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function saveBarang($data)
    {
        $this->insert($data);
    }

    public function getBarang($id = null)
    {
        if ($id != null) {
            return $this->select('barang.*, jenis.nama_jenis')
                ->join('jenis', 'jenis.id=barang.id_jenis')->find($id);
        }
        return $this->select('barang.*, jenis.nama_jenis')
            ->join('jenis', 'jenis.id=barang.id_jenis')->findAll();
    }

    public function getBarangByMerkAndJenis($namaMerk, $idJenis)
    {
        return $this->select('*')->where(['nama_merk' => $namaMerk, 'id_jenis' => $idJenis])->first();
    }

    public function updateBarang($data, $id)
    {
        return $this->update($id, $data);
    }

    public function deleteBarang($id)
    {
        return $this->delete($id);
    }
}
