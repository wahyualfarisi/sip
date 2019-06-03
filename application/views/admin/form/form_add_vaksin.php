<div class="col-lg-12 animated fadeIn formUser" style="margin-top: 50px;">
  <div class="sparkline12-list shadow-reset">
      <div class="sparkline12-hd">
          <div class="main-sparkline12-hd">
              <h1 class="headingform"><span class="fa fa-plus"></span></h1>

          </div>
      </div>
      <div class="sparkline12-graph">
         <div class="basic-login-form-ad">
             <div class="row">
                 <div class="col-lg-6">
                     <div class="all-form-element-inner">
                         <form method="post" id="form-add-vaksin">

                           <div class="form-group-inner">
                              <div class="row">
                                  <div class="col-lg-3">
                                      <label class="login2 pull-right pull-right-pro">Nama Imunisasi</label>
                                  </div>
                                  <div class="col-lg-9">
                                      <input type="text" class="form-control" name="nama_imunisasi" id="nama_imunisasi" />
                                  </div>
                              </div>
                            </div>

                            <div class="form-group-inner">
                               <div class="row">
                                   <div class="col-lg-3">
                                       <label class="login2 pull-right pull-right-pro">Kriteria Usia</label>
                                   </div>
                                   <div class="col-lg-9">
                                       <input type="text" class="form-control" name="kriteria_usia" id="kriteria_usia" />
                                   </div>
                               </div>
                             </div>

                             <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="login2 pull-right pull-right-pro">Catatan</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="catatan" id="catatan" rows="8" cols="80"></textarea>
                                    </div>
                                </div>
                              </div>

                              <div class="form-group-inner">
                                    <div class="login-btn-inner">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-9">
                                                <div class="login-horizental cancel-wp pull-left">
                                                   <a class="btn btn-sm btn-primary login-submit-cs" href="#/imunisasi">BATAL</a>
                                                    <button class="btn btn-sm btn-primary login-submit-cs" type="submit">SIMPAN</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                         </form>
                    </div>
                </div>
            </div>
        </div>
     </div>
  </div>
</div>
<script type="text/javascript">
  var BASE_URL = '<?= base_url() ?>';
  var PARAMS = '';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/admin/form/formvaksin.js'  ?> "></script>
