<?php

class Home extends Controller {

    private $dt;
    private $df;
    public function __construct() {
        $this->dt = $this->loadmodel("barang");
        $this->df = $this->loadmodel("daftarBarang");
    }

    public function index() {
        echo "anda memanggil action index \n";
    }

    public function home($data1, $data2) {
        echo "anda memanggil action home dengan data1 = $data1 dan data2 = $data2 \n ";
    }

    public function lihatdata($id) {
        $data = $this->df->getDataById($id);

        $this->loadview('template/header', ['title'=>'Detail Barang']);
        $this->loadview('home/detailbarang', $data);
        $this->loadview('template/footer');
    }

    public function listbarang() {
        $data = $this->df->getDataAll();

        $this->loadview('template/header', ['title'=>'List Barang']);
        $this->loadview('home/listbarang', $data);
        $this->loadview('template/footer');

        // foreach ($this->df->getDataAll() as $item) {
        //     echo $item['id']. " ". $item['nama']. " ". $item['qty'];
        //     echo "<br />";
        // }
    }
}