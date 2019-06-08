<div class="user-profile-area" style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="row" id="show-warga-detail">
          <h1>Warga</h1>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="user-profile-wrap shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="user-profile-content">
                                        <h2>Sakila Joy</h2>
                                        <p class="profile-founder">Founder of <strong>Uttara It Park</strong>
                                        </p>
                                        <p class="profile-des">It is a long established fact that a reader will be distracted of by the readable content of a page when looking at its layout.The point of using Lorem Ipsum.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="user-profile-social-list">
                                <table class="table small m-b-xs">
                                    <tr>
                                      <th>Nama Ayah</th>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <th>Nama Ibu</th>
                                      <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="analytics-sparkle-line user-profile-sparkline">
                                <div class="analytics-content">
                                    <h5>Setting</h5>
                                    <button type="button" class="btn btn-custome" name="button">Edit Warga</button>
                                    <button type="button" class="btn btn-danger" name="button">Hapus Warga</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="user-prfile-activity-area mg-b-40 mg-t-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div id="show-anak">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <!-- <div class="widget-flot-bg shadow-reset mg-t-30">
                    <div class="admin-widget-flot-ch">
                        <h1>$5,540</h1>
                        <h3>Annual income</h3>
                        <p>Income form All Projects.</p>
                    </div>
                    <div class="flot-chart">
                        <div class="flot-chart-content" id="flot-chart88"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>



<!--- MODALS -->
<div id="modalAddAnak" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <form id="form-add-anak" method="post">
                    <div class="form-group">
                      <input type="hidden" name="no_kk" id="no_kk">
                    </div>
                    <div class="form-group">
                      <label>No. BPJS</label>
                      <input type="text" class="form-control" name="no_bpjs" maxlength="13" id="no_bpjs" placeholder="No. BPJS">
                    </div>
                    <div class="form-group">
                      <label>Nama Depan</label>
                      <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Masukan Nama Depan">
                    </div>
                    <div class="form-group">
                      <label>Nama Belakang</label>
                      <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Masukan Nama Belakang (optional)">
                    </div>
                    <div class="form-group">
                      <label>Umur (Bulan)</label>
                      <input type="text" class="form-control" name="umur" id="umur" placeholder="Masukan Umur">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamain</label>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">pilih jenis kelamin</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki - Laki</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custome" name="button">SIMPAN</button>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DELETES -->
<div id="modalDelete" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
                <form id="form-delete" method="post">
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

<div id="modalDeleteWarga" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
                <form id="form-delete-warga" method="post">
                    <div class="form-group">
                      <label>Konfirmasi hapus</label>
                      <input type="hidden" id="targetIDWarga" name="targetIDWarga">
                      <input type="text" class="form-control" name="confirm" id="confirm_warga" placeholder="ketik ( confirm ) untuk melanjutkan">
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
<div id="modalEditAnak" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <form id="form-edit-anak" method="post">
                    <div class="form-group">
                      <input type="hidden" name="no_kk" id="no_kk_edit">
                    </div>
                    <div class="form-group">
                      <label>No. BPJS</label>
                      <input type="text" class="form-control" name="no_bpjs" maxlength="13" id="no_bpjs_edit" placeholder="No. BPJS" readonly>
                    </div>
                    <div class="form-group">
                      <label>Nama Depan</label>
                      <input type="text" class="form-control" name="nama_depan" id="nama_depan_edit" placeholder="Masukan Nama Depan">
                    </div>
                    <div class="form-group">
                      <label>Nama Belakang</label>
                      <input type="text" class="form-control" name="nama_belakang" id="nama_belakang_edit" placeholder="Masukan Nama Belakang (optional)">
                    </div>
                    <div class="form-group">
                      <label>Umur</label>
                      <input type="text" class="form-control" name="umur" id="umur_edit" placeholder="Masukan Umur">
                    </div>
                    <div class="form-group">
                      <label>Jenis Kelamain</label>
                      <select class="form-control" name="jenis_kelamin" id="jenis_kelamin_edit">
                        <option value="">pilih jenis kelamin</option>
                        <option value="P">Perempuan</option>
                        <option value="L">Laki - Laki</option>
                      </select>
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

<script type="text/javascript">
  var BASE_URL = '<?= base_url() ?>';
  var PARAMS = '<?= $this->uri->segment(3) ?>';
</script>
<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/kader/warga_detail.js'  ?>"></script>
