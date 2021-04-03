<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jadwal Ibadah</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="<?= base_url('JadwalIbadah') ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?= $action ?>">

                        <?php  
                            if($button == 'Ubah')
                            {
                        ?>

                        <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">

                        <?php  
                            }
                        ?>
                        
                        <div class="form-group">
                            <label>Nama Ibadah</label>
                            <input type="text" name="nama_ibadah" value="<?= $nama_ibadah ?>" class="form-control">
                            <?= form_error('nama_ibadah') ?>
                        </div>

                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control">
                            <?= form_error('tanggal') ?>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= $button ?></button>

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>