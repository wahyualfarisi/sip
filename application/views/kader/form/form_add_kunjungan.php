<div class="wrap-form-warga">
  <div class="col-lg-12 animated fadeIn">
      <div class="sparkline12-list shadow-reset mg-t-30">
          <div class="sparkline12-hd">
              <div class="main-sparkline12-hd">
                  <h1>Tambah Kunjungan</h1>
              </div>
          </div>

          <div class="sparkline12-graph" style="text-align: left">
              <div class="basic-login-form-ad">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="all-form-element-inner">
                              <form id="form-add-kunjungan" method="post">

                                <div id="detail_jadwal"></div>

                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<br>
<div class="container-fluid"  style="margin-top: 40px;">
    <div id="show__list__kms" >
    </div>
</div>


<div id="modalAddAntrian" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <div id="content-modal-antrian"></div>
                <form id="form-add-antrian" method="post">
                    <div class="form-group">
                      <input type="hidden" id="targetID" name="targetID">
                      <input type="hidden" id="no_kegiatan"  name="no_kegiatan" value="<?= $this->uri->segment(3) ?>">
                    </div>
                    <div class="text-center" >
                      <button type="submit" class="btn btn-custome" name="button">Tambah Ke Antrian</button>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" class="btn-custome" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>


<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url('public/kader/form/formkunjungan.js') ?>" ></script>
