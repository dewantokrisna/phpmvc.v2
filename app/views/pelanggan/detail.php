<div class="container mt-3">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['pelanggan']['nama_pelanggan']; ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['pelanggan']['nomor_telepon']; ?></h6>
            <p class="card-text"><?= $data['pelanggan']['alamat']; ?></p>
            <p class="card-text"><?= $data['pelanggan']['kota']; ?></p>
            <p class="card-text"><?= $data['pelanggan']['propinsi']; ?></p>
            <a href="<?= BASEURL; ?>/pelanggan" class="card-link">Kembali</a>
        </div>
    </div>

</div>