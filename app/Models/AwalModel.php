<?php namespace App\Models;

use CodeIgniter\Model;

class AwalModel extends Model
{
    protected $table;

    public function __construct() {

        parent::__construct();
        
        $db = \Config\Database::connect();
        
        $this->table = $this->db->table('data_paket');
    }

    public function get_all(){
        $this->table->join('kategori_paket', 'kategori_paket.id_kategori = data_paket.id_kategori');
        $this->table->join('data_santri', 'data_santri.NIS = data_paket.NIS');
        $this->table->join('data_asrama', 'data_asrama.id_asrama = data_paket.id_asrama');
        $this->table->select('data_paket.id_paket as id_paket');
        $this->table->select('data_paket.nama_paket as nama_paket');
        $this->table->select('data_paket.tanggal_diterima as tanggal_diterima');
        $this->table->select('kategori_paket.nama_kategori as nama_kategori');
        $this->table->select('data_santri.nama_santri as nama_santri');
        $this->table->select('data_asrama.nama_asrama as nama_asrama');
        $this->table->select('data_paket.pengirim_paket as pengirim_paket');
        $this->table->select('data_paket.isi_paket_yg_disita as isi_paket_yg_disita');
        $this->table->select('data_paket.status_paket as status_paket');
        $this->table->select('data_paket.created_at as created_at');
        $this->table->select('data_paket.updated_at as updated_at');

        return $this->table->get(5)->getResultArray();
    }
    
}