<div class="static-table-area mg-b-15" style="margin-top: 50px;">

    <div class="container-fluid">
      <a href="#/adduser" class="btn btn-custome" name="button">Tambah user</a>
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1> <span class="fa fa-user"></span> User </h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Panitia</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Akses</th>
                                    <th>Login terakhir</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody id="show-user"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>


<div id="modalUserDelete" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
                <form id="form-delete-user" method="post">
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




<script>
  var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/admin/user.js'?>"></script>
