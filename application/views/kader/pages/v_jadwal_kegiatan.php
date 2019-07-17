<div class="container-fluid">
<div style="margin-top: 30px;" >
         <h3>Jadwal Dan Kegiatan</h3>
</div>
</div>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                        <form role="search" class="">
                      						<input type="text" placeholder="Cari Kegiatan" id="search__kegiatan" name="search__kegiatan" class="form-control">
                      						<a href=""><i class="fa fa-search"></i></a>
                      					</form>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><span class="bread-blod">Data Kegiatan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
      <a href="#/addkegiatan" class="btn btn-custome" name="button">Tambah Jadwal Kegiatan</a>
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1> <span class="fa fa-user"></span> Jadwal Kegiatan </h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th width="30%">Lokasi</th>
                                    <th>Ditambahkan Oleh</th>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody id="show-kegiatan"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>


<div id="modalDeleteKegiatan" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
                <form id="form-delete-kegiatan" method="post">
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

<!-- MODAL EDIT -->
<div id="modalEditKegiatan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <form id="form-edit-kegiatan" method="post">
                    <div class="form-group">
                      <input type="hidden" name="no_kegiatan" id="no_kegiatan">
                    </div>
                    <div class="form-group">
                      <label>Nama Kegiatan</label>
                      <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukan Nama Kegiatan">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Kegiatan</label>
                      <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan">
                    </div>
                    <div class="form-group">
                      <label>Lokasi</label>
                      <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custome" name="button">UPDATE</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/kader/kegiatan.js'  ?> "></script>
