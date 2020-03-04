<?php
// var_dump($mahasiswa);
// var_dump($kelas);
// var_dump($matakuliah);
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Detail Mahasiswa
                </div>
                <div class="card-body">
                    <h4 class="card-title">Nama : </h4>
                    <p class="card-text"><?= $mahasiswa['nama']; ?></p>
                    <h4 class="card-title">Nim : </h4>
                    <p class="card-text"><?= $mahasiswa['nim']; ?></p>
                    <h4 class="card-title">Email : </h4>
                    <p class="card-text"><?= $mahasiswa['email']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Detail Mata Kuliah
                </div>
                <div class="card-body">
                    <h4 class="card-title">Mata Kuliah : </h4>
                    <p class="card-text"><?= $matakuliah['nama_matkul']; ?></p>
                    <h4 class="card-title">Tahun Ajaran : </h4>
                    <p class="card-text"><?= $matakuliah['tahun_ajaran']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Detail Kelas
                </div>
                <div class="card-body">
                    <h4 class="card-title">Nama Kelas : </h4>
                    <p class="card-text"><?= $kelas['nama_kelas']; ?></p>
                    <h4 class="card-title">Ruangan : </h4>
                    <p class="card-text"><?= $kelas['ruang_kelas']; ?></p>
                </div>
            </div>
            <br>
            <a href="<?= base_url(); ?>mengampu" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>