<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table = 'keluar';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nama_merk', 'keluar', 'tanggalk', 'id_jenis', 'created_at', 'updated_at', 'deleted_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function saveKeluar($data)
    {
        $this->insert($data);
    }

    public function getKeluar($id = null)
    {
        if ($id != null) {
            return $this->select('keluar.*, jenis.nama_jenis')
                ->join('jenis', 'jenis.id=keluar.id_jenis')
                ->find($id);
        }
        return $this->select('keluar.*, jenis.nama_jenis')
            ->join('jenis', 'jenis.id=keluar.id_jenis')
            ->findAll();
    }
    public function getKeluarId($id)
    {
        $keluar = $this->find($id);

        if ($keluar) {
            return $keluar->id;
        }

        return null;
    }
    public function updateKeluar($id, $data)
    {
        // Pastikan $data yang dikembalikan dalam bentuk array
        $result = $this->update($id, $data);

        // Tambahkan penanganan error jika perlu
        if (!$result) {
            throw new \Exception('Gagal memperbarui keluar');
        }

        return $result;
    }

    public function deleteKeluar($id)
    {
        return $this->delete($id);
    }
}
