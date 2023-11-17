<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nama_merk', 'transaksi', 'tanggal', 'id_jenis', 'created_at', 'updated_at', 'deleted_at'];

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

    public function saveTransaksi($data)
    {
        $this->insert($data);
    }

    public function getTransaksi($id = null)
    {
        if ($id != null) {
            return $this->select('transaksi.*, jenis.nama_jenis')
                ->join('jenis', 'jenis.id=transaksi.id_jenis')
                ->find($id);
        }
        return $this->select('transaksi.*, jenis.nama_jenis')
            ->join('jenis', 'jenis.id=transaksi.id_jenis')
            ->findAll();
    }
    public function getTransactionId($id)
    {
        $transaksi = $this->find($id);

        if ($transaksi) {
            return $transaksi->id;
        }

        return null;
    }
    public function updateTransaksi($id, $data)
    {
        // Pastikan $data yang dikembalikan dalam bentuk array
        $result = $this->update($id, $data);

        // Tambahkan penanganan error jika perlu
        if (!$result) {
            throw new \Exception('Gagal memperbarui transaksi');
        }

        return $result;
    }

    public function deleteTransaksi($id)
    {
        return $this->delete($id);
    }
}
