<div class="wrap-form-warga">
  <div class="col-lg-12 animated fadeIn">
      <div class="sparkline12-list shadow-reset mg-t-30">
          <div class="sparkline12-hd">
              <div class="main-sparkline12-hd">
                  <h1>Warga Baru</h1>
              </div>
          </div>

          <div class="sparkline12-graph" style="text-align: left">
              <div class="basic-login-form-ad">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="all-form-element-inner">
                              <form id="form-add-warga" method="post">

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">No. Kartu Keluarga</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="no_kk" id="no_kk" maxlength="16" placeholder="Masukan nomor kartu keluarga" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Alamat Email</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Alamat Email" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Nama Ayah</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukan Nama Ayah" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Nama Ibu</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukan Nama Ibu" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">Alamat</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <label class="login2 pull-right pull-right-pro">No. Telepon</label>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan No Telp" />
                                        </div>
                                    </div>
                                </div>

                                <h4>Data Anak</h4>
                                <div class="table-responsive">
                                  <table class="table table-striped" style="margin-top: 40px;" id="item_anak">
                                    <tr>
                                      <th> No. BPJS </th>
                                      <th> Nama Depan </th>
                                      <th> Nama Belakang </th>
                                      <th>Jenis Kelamin</th>
                                      <th> <button type="button" class="btn btn-custome btn-add-anak"  name="add"> <span class="fa fa-plus"></span> Tambah Anak </button> </th>
                                    </tr>
                                  </table>
                                </div>

                                <div align="center">
                                  <a href="#/listwarga" class="btn btn-warning btn-md" name="button">BATAL</a>
                                  <button type="submit" class="btn btn-custome btn-md" name="button">SIMPAN</button>
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
<script>
  var BASE_URL = '<?= base_url() ?>';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/kader/form/formwarga.js'  ?> "></script>
