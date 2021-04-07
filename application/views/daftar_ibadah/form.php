<!-- Masthead-->
<header class="masthead">
    <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center text-white">
            <div class="col-12">
                <img src="<?= base_url('assets/images/tiberias_main_logo_white.png') ?>" width="10%">
                <p style="margin-top: 30px; font-size: 26px; font-weight: bold;">Mempersiapkan Jemaat yang Kudus, Misionaris, dan Siap ke Sorga</p>
            </div>
        </div>
    </div>
</header>
<section class="projects-section bg-light" id="form">
    <div class="container">

        <div class="alert alert-warning" role="alert">
          <b><?= $title ?></b>
        </div>

        <form method="POST" action="<?= $action ?>">
            
            <div class="col-12 mt-5">

                <input type="hidden" name="id_subjadwal" value="<?= $id_subjadwal ?>">
                <input type="hidden" name="id_jadwal" value="<?= $id_jadwal ?>">

                <div class="form-group">
                    <label>Sesi </label>
                    <input type="text" name="sesi" value="<?= $sesi ?>" class="form-control" readonly>
                    <input type="hidden" name="id_sesi" value="<?= $id_sesi ?>">
                </div>

                <div class="form-group">
                    <label>Cabang </label>
                    <input type="text" name="cabang" value="<?= $cabang ?>" class="form-control" readonly>
                    <input type="hidden" name="id_cabang" value="<?= $id_sesi ?>">
                </div>

                <div class="form-group">
                    <label>Jemaat</label>
                    <select class="form-control js-example-basic-multiple" name="jemaat[]" id="jemaat" multiple="multiple">
                        <option value="<?= $id_jemaat ?>"><?= $nama_jemaat ?></option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Simpan</button>

            </div>

        </form>


        
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?= base_url('assets/select2/') ?>select2.min.js"></script>

<script type="text/javascript">
    $('#jemaat').select2({
      minimumInputLength: 4,
      placeholder: 'Masukan nama Jemaat',
      allowClear: true,
      ajax: {
        dataType: 'json',
        url: '<?php echo base_url();?>DaftarJemaat/listjemaat',
        delay: 800,
        data: function (params) {
          return {
            search: params.term
          }
        },
        processResults: function (data, page) {
          return {
            results: data
          };
        },
      },
    });
</script>

