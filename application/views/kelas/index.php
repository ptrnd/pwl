<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Kelas<strong> Berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>kelas/tambah" class="btn btn-primary">Tambah Data Kelas</a>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Kelas" name="key">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Kelas</h2>

            <!-- alert -->
            <?php if (empty($kelas)) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>maaf.. pencarian tidak ditemukan :( </strong>
                </div>
            <?php endif; ?>

            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>No.</th>
                        <th>Nama kelas</th>
                        <th>Ruang Kelas</th>
                        <th colspan="2" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($kelas as $kls) : ?>
                        <tr>
                            <td scope="row"><?php echo $i;
                                            $i++; ?></td>
                            <td><?= $kls['nama_kelas']; ?></td>
                            <td><?= $kls['ruang_kelas']; ?></td>
                            <td><a href="<?= base_url(); ?>kelas/edit/<?= $kls['id_kelas']; ?>" class="badge badge-success float-right">Edit</a></td>
                            <td><a href="<?= base_url(); ?>kelas/hapus/<?= $kls['id_kelas']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin Data ini akan dihapus?') ">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>