<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Kelas
                </div>
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors() ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="kelas">Nama kelas</label>
                            <input type="text" class="form-control" id="kelas" name="kelas">
                        </div>
                        <div class="form-group">
                            <label for="ruang">Ruang Kelas</label>
                            <input type="text" class="form-control" id="ruang" name="ruang">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>