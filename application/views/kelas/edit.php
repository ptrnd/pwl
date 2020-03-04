<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Kelas
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $kelas['id_kelas']; ?>">
                        <div class="form-group">
                            <label for="kelas">Nama Kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas['nama_kelas']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="ruang">Ruang Kelas</label>
                            <input type="text" class="form-control" id="ruang" name="ruang" value="<?= $kelas['ruang_kelas']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>