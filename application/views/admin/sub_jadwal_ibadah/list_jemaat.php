<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Jemaat</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header text-right">
                    <a href="<?= base_url('DetailJadwalIbadah/detail/' . $id_jadwal) ?>" class="btn btn-danger btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">#</th>
                                    <th>Nama Jemaat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                    foreach($list as $l) :
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="<?= base_url('DetailJadwalIbadah/batalkan_jemaat/' . $l->ji_id . '/' . $l->sjd_jadwal . '/' . $l->sjd_id) ?>" onclick="return confirm('Apakah anda yakin ingin membatalkan Jemaat ini ?')" class="btn btn-danger" title="Batalkan Jemaat Ini ?"><i class="fas fa-times"></i></a>
                                    </td>
                                    <td><?= $l->jmt_nama ?></td>
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