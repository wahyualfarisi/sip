<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
      <a href="#/addvaksin" class="btn btn-custome" name="button">Tambah Vaksin</a>
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1> <span class="fa fa-user"></span> Vaksin </h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Imuninasi</th>
                                    <th>Kriteria Usia</th>
                                    <th width="30%">Catatan</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody id="show-imunisasi"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div id="modalDeleteVaksin" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
                <form id="form-delete-vaksin" method="post">
                    <div class="form-group">
                      <label>Konfirmasi hapus</label>
                      <input type="hidden" id="targetID" name="targetID">
                      <input type="text" class="form-control" name="confirm" id="confirm" placeholder="ketik ( confirm ) untuk melanjutkan">
                    </div>
                    <button type="submit" class="btn btn-custome" name="button">Konfirmasi</button>
                </form>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" class="btn-custome" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
  var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/admin/vaksin.js'?>"></script>
