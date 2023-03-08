<?php 
namespace App\Models;

use CodeIgniter\Model;

class Tanggapan extends Model{
    protected $table      = 'db_tanggapan';
    // Uncomment below if you want add primary key
    protected $primaryKey = 'id_tanggapan';
    protected $allowerdFields = ['id_pengaduan','id_petugas','tgl_tanggapan','tanggapan'];
}