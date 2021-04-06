<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Jadwal Ibadah</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="<?= base_url('DetailJadwalIbadah/detail/' . $this->uri->segment(3)) ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="<?= $action ?>">

                        <?php  
                            if($button == 'Ubah')
                            {
                        ?>

                        <input type="hidden" name="id_subjadwal" value="<?= $id_subjadwal ?>">

                        <?php  
                            }
                        ?>
                        
                        <input type="hidden" name="id_jadwal" value="<?= $id_jadwal  ?>">

                        <div class="form-group">
                            <label>Cabang</label>
                            <select class="form-control" name="cabang">
                                <option value="">Pilih Salah satu</option>
                                <?php  
                                    foreach($listcabang as $l) :
                                ?>

                                <option value="<?= $l->cb_id ?>" <?= ($l->cb_id == $cabang) ? 'selected' : null ?>><?= $l->cb_namacabang ?></option>

                                <?php  
                                    endforeach;
                                ?>
                            </select>
                            <?= form_error('cabang') ?>
                        </div>


                        <div class="form-group">
                            <label>Sesi</label>
                            <select class="form-control" name="sesi">
                                <option value="">Pilih Salah satu</option>
                                <?php  
                                    foreach($listsesi as $l) :
                                ?>

                                <option value="<?= $l->ss_id ?>" <?= ($l->ss_id == $sesi) ? 'selected' : null ?>><?= $l->ss_namasesi ?></option>

                                <?php  
                                    endforeach;
                                ?>
                            </select>
                            <?= form_error('sesi') ?>
                        </div>

                        <button type="submit" class="btn btn-primary"><?= $button ?></button>

                    </form>
                </div>
            </div>
        </div>

    </div>

</div>