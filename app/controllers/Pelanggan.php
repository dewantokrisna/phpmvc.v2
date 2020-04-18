<?php

class Pelanggan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getAllPelanggan();
        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Pelanggan';
        $data['pelanggan'] = $this->model('Pelanggan_model')->getPelangganById($id);
        $this->view('templates/header', $data);
        $this->view('pelanggan/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Pelanggan_model')->tambahDataPelanggan($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }


    public function hapus($id)
    {
        if ($this->model('Pelanggan_model')->hapusDataPelanggan($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    }
}
