<?php

class Pelanggan_model
{
    private $table = 'pelanggan';
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function getAllPelanggan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPelangganById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pelanggan = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataPelanggan($data)
    {
        $query = "INSERT INTO pelanggan
                    VALUES
                    (:id, :nama, :no_telepon, :alamat, :kota, :propinsi)";

        $this->db->query($query);
        $this->db->bind('id', $data['idPelanggan']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telepon', $data['noTelepon']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('propinsi', $data['propinsi']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataPelanggan($id)
    {
        $query = "DELETE FROM pelanggan WHERE id_pelanggan = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
