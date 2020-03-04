<?
var_dump($kelas);
?>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Kelas
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $kelas['nama_kelas']; ?></h5>
                    <p class="card-text">
                        <label for=""><b> Ruang Kelas : </b></label>
                        <?= $kelas['ruang_kelas']; ?>
                    </p>
                    <a href="<?= base_url(); ?>kelas" class="btn btn-primary">kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>