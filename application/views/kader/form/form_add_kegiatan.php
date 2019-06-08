<div class="wrap-form-warga">
  <div class="col-lg-12 animated fadeIn">
      <div class="sparkline12-list shadow-reset mg-t-30">
          <div class="sparkline12-hd">
              <div class="main-sparkline12-hd">
                  <h1>Tambah Kegiatan</h1>
              </div>
          </div>

          <div class="sparkline12-graph" style="text-align: left">
              <div class="basic-login-form-ad">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="all-form-element-inner">
                              <form id="form-add-kegiatan" method="post">

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Nama Kegiatan</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" placeholder="Masukan nama kegiatan" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Tanggal Kegiatan</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="date" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Lokasi</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Masukan Lokasi Kegiatan" />
                                        </div>
                                    </div>
                                </div>


                                <div align="center">
                                  <a href="#/jadwalkegiatan" class="btn btn-warning btn-md" name="button">BATAL</a>
                                  <button type="submit" class="btn btn-custome btn-md" name="button">Simpan Kegiatan</button>
                                </div>

                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>
<script type="text/javascript">
  var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/kader/form/formkegiatan.js'?>"></script>
