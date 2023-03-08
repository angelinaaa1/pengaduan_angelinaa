<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
class TanggapanController extends BaseController{

    protected $pengaduans,$tanggapans;

    function __construct()
    {
        $this->pengaduans = new Pengaduan();
        $this->tanggapans = new Tanggapan();
    }

    public function index()
    {
        $data['pengaduan']=$this->pengaduans->findAll();
        $data['tanggapan']=$this->tanggapans->findAll();
        return view('tanggapan_view',$data);
    }

    public function simpan()
    {
        $data = [
            'tgl_tanggapan'=>date('Y-m-d H:i:s'),
            'id_petugas'=>session()->get('id_petugas'),
            'tanggapan'=>$this->request->getPost('tanggapan'),
            'id_pengaduan'=>$this->request->getPost('id_pengaduan'),
        ];
        $this->tanggapans->insert($data);
        $this->pengaduans->set('status','SELESAI');
        $this->pengaduans->where('id_pengaduan',$this->request->getPost('id_pengaduan'));
        $this->pengaduans->update();
        return redirect('pengaduan');
    }

    public function getTanggapan()
    {
        //
    }


}