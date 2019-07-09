<div class="container-fluid">
    <div style="margin-top: 30px;" >
         <h3>CEK IMUNISASI</h3>
    </div>
    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph">

            <div class="row">
            <form id="form__add__kms" method="posts">
                <div class="col-md-6">
                        <div class="form-group">
                            <label>No. Kunjungan</label>
                            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" placeholder="Masukan No. BPJS" >
                           
                        </div>

                        <div class="form-group">
                            <label>Umur</label>
                            <input type="text" class="form-control" name="tanggal_terdaftar" value="<?= date('Y-m-d') ?>" readOnly >
                        </div>

                        <div class="form-group">
                            <label>Imunisasi</label>
                            <input type="text" class="form-control" name="tanggal_terdaftar" value="" >
                        </div>
                       
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Hasil Imunisasi</label>
                            <input type="number" class="form-control" name="berat_badan" step="0.1" placeholder="dalam (kg) "  >
                        </div>

                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
               </div>
               
               <button class="btn btn-warning" type="button" id="btn__search_bpjs"><span class="fa fa-search"></span> Cari No BPJS</button>
               <button type="submit" class="btn btn-success">SIMPAN</button>
            </form>    
            </div>      
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 30px;">
    <input type="text" id="serch__KMS" class="form-control" placeholder="Cari Data Imunisasi">
</div>

<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
      
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Data KMS</h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr class="bg-warning">
                                    <th>No. </th>
                                    <th>No. KMS</th>
                                    <th>No. BPJS</th>
                                    <th>Nama Lengkap </th>
                                    <th>Tanggal Terdaftar</th>
                                    <th>Berat Badan Lahir</th>
                                    <th>Panjang Badan Lahir</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="show-kms"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div id="modalListAnak" class="modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <input type="text" id="search__anak" class="form-control" placeholder="Cari Anak" >
                <table class="table table-striped   ">
                    <thead>
                        <tr>
                            <th>No. BPJs</th>
                            <th>no. KK</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="show__list__anak" ></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>

<div id="modalDelete" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <span class="adminpro-icon adminpro-informatio modal-check-pro information-icon-pro"> </span>
                <form id="form-delete-kms" method="post">
                    <div class="form-group">
                      <label>Konfirmasi hapus</label>
                      <input type="hidden" id="no_kms" name="no_kms">
                      <input type="text" class="form-control" name="confirm" id="confirm" placeholder="ketik ( confirm ) untuk melanjutkan">
                    </div>
                    <button type="submit" class="btn btn-custome" name="button">Konfirmasi</button>
                </form>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url().'public/mynotif.js'?>"></script>