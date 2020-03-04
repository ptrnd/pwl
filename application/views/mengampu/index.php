<div class="container">
    <h1>Daftar Mengampu</h1>
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong> Berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data" name="key">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
            <?php if (empty($mengampu)) : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>maaf.. pencarian tidak ditemukan :( </strong>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>mengampu/tambah" class="btn btn-primary">Tambah Data Mengampu</a>
        </div>
    </div>
    <br><br>
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th style="text-align: center;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($mengampu as $mg) : ?>
                <tr>
                    <td scope="row">
                        <?php echo $i;
                        $i++; ?>
                    </td>
                    <td> <?= $mg['nim']; ?> </td>
                    <td> <?= $mg['nama']; ?> </td>
                    <td> <?= $mg['nama_matkul']; ?> </td>
                    <td> <?= $mg['nama_kelas']; ?> </td>
                    <td>
                        <a href="<?= base_url(); ?>mengampu/hapus/<?= $mg['id_mengampu']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin Data ini akan dihapus?') ">Hapus</a>
                        <a href="<?= base_url(); ?>mengampu/edit/<?= $mg['id_mengampu']; ?>" class="badge badge-success float-right">Edit</a>
                        <a href="<?= base_url(); ?>mengampu/detail/<?= $mg['id_mengampu']; ?>" class="badge badge-primary float-right">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>