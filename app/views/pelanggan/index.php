<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formPelangganModal">
                Tambah Data Pelanggan
            </button>
            <br><br>
            <h3>Daftar Pelanggan</h3>

            <ul class="list-group">
                <?php foreach ($data['pelanggan'] as $plgn) : ?>
                    <li class="list-group-item">
                        <?= $plgn['nama_pelanggan']; ?>
                        <a href="<?= BASEURL; ?>/pelanggan/hapus/<?= $plgn['id_pelanggan'] ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('yakin?')">hapus</a>
                        <a href="<?= BASEURL; ?>/pelanggan/ubah/<?= $plgn['id_pelanggan'] ?>" class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formPelangganModal">edit</a>
                        <a href="<?= BASEURL; ?>/pelanggan/detail/<?= $plgn['id_pelanggan'] ?>" class="badge badge-info float-right ml-1">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>






        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="formPelangganModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formPelangganModalLabel">Tambah Data Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/pelanggan/tambah" method="post">

                    <div class="form-group">
                        <label for="idPelanggan">ID Pelanggan</label>
                        <input type="text" class="form-control" id="idPelanggan" name="idPelanggan">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="noTelepon">No Telepon</label>
                        <input type="tel" class="form-control" id="noTelepon" name="noTelepon">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>

                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota">
                    </div>

                    <div class="form-group">
                        <label for="propinsi">Propinsi</label>
                        <select class="form-control" id="propinsi" name="propinsi">
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Jawa Barat">Jawa Barat</option>

                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>