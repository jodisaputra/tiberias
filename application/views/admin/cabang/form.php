<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cabang</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="<?= base_url('Cabang') ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?= $action ?>">

                        <?php  
                            if($button == 'Ubah')
                            {
                        ?>

                        <input type="hidden" name="id_cabang" value="<?= $id_cabang ?>">

                        <?php  
                            }
                        ?>
                        
                        <div class="form-group">
                            <label>Nama Cabang</label>
                            <input type="text" name="nama_cabang" value="<?= $nama_cabang ?>" class="form-control">
                            <?= form_error('nama_cabang') ?>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= $button ?></button>

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>