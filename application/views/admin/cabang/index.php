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
                    <a href="<?= base_url('Cabang/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Cabang</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    $no = 1;
                                    foreach($list as $l) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $l->cb_namacabang ?></td>
                                    <td>
                                        <a href="<?= base_url('Cabang/ubah/' . $l->cb_id) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Ubah</a>
                                        <a href="<?= base_url('Cabang/hapus/' . $l->cb_id) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php  
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>