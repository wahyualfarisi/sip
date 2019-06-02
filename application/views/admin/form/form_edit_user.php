<div class="col-lg-12 animated fadeIn" style="margin-top: 50px;">
  <div class="sparkline12-list shadow-reset">
      <div class="sparkline12-hd">
          <div class="main-sparkline12-hd">
              <h1 class="headingform"><span class="fa fa-pencil"></span></h1>

          </div>
      </div>
      <div class="sparkline12-graph">
         <div class="basic-login-form-ad">
             <div class="row">
                 <div class="col-lg-6">
                     <div class="all-form-element-inner">
                         <form method="post" id="form-edit-user">

                           <div class="form-group-inner">
                              <div class="row">
                                  <div class="col-lg-3">
                                      <label class="login2 pull-right pull-right-pro">Kode Panitia</label>
                                  </div>
                                  <div class="col-lg-9">
                                      <input type="text" class="form-control" name="kode_panitia_edit" id="kode_panitia_edit" disabled />
                                  </div>
                              </div>
                            </div>

                            <div class="form-group-inner">
                               <div class="row">
                                   <div class="col-lg-3">
                                       <label class="login2 pull-right pull-right-pro">Nama Panitia</label>
                                   </div>
                                   <div class="col-lg-9">
                                       <input type="text" class="form-control" name="nama_panitia_edit" id="nama_panitia_edit" />
                                   </div>
                               </div>
                             </div>


                             <div class="form-group-inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="login2 pull-right pull-right-pro">Password</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" name="password_edit" id="password_edit" />
                                    </div>
                                </div>
                              </div>

                              <div class="form-group-inner">
                                 <div class="row">
                                     <div class="col-lg-3">
                                         <label class="login2 pull-right pull-right-pro">Akses</label>
                                     </div>
                                     <div class="col-lg-9">
                                         <select class="form-control" name="akses_edit" id="akses_edit">
                                           <option value="">pilih akses</option>
                                           <option value="admin">Administrator</option>
                                           <option value="kader">Kader</option>
                                           <option value="ketua">Ketua</option>
                                         </select>
                                     </div>
                                 </div>
                              </div>

                              <div class="form-group-inner">
                                    <div class="login-btn-inner">
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-9">
                                                <div class="login-horizental cancel-wp pull-left">
                                                   <a class="btn btn-sm btn-primary login-submit-cs" href="#/user">BATAL</a>
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
  var PARAMS = '<?= $this->uri->segment(3) ?>';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/admin/form/formuser.js'  ?> "></script>
