<div class="container-fluid">
    <div style="margin-top: 30px;" >
         <h3>CEK PERTUMBUHAN ANAK</h3>
    </div>

    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph">
            <div class="row">
            <form id="form__pertumbuhan__anak">
                <div class="col-md-4">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group custom-go-button">
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary" id="btn__show__list"><span class="fa fa-search"></span> Cari No. Kunjungan</button></span>
                                        <input type="text" id="no_kunjungan" name="no_kunjungan" placeholder="no. kunjungan" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama Anak</label>
                            <input type="text" class="form-control" name="nama_anak" id="nama_anak"  readOnly >
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jk" id="jk"  readOnly >
                        </div>

                    
                        <div class="form-group">
                            <label>Umur Saat ini</label>
                            <input type="text" class="form-control" name="umur" id="umur"  readOnly >
                        </div>

                         <div class="form-group">
                            <label>No Bpjs</label>
                            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs"  readOnly >
                        </div>

                         <div class="form-group">
                            <label>No KK</label>
                            <input type="text" class="form-control" name="no_kk" id="no_kk"  readOnly >
                        </div>
                </div>
                <div class="col-md-3">
                         <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Berat Badan</label>
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group custom-go-button">
                                        <input type="number" class="form-control" id="berat_badan" name="berat_badan">
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary">kg</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Panjang Badan</label>
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group custom-go-button">
                                        <input type="number" class="form-control" id="panjang_badan" name="panjang_badan">
                                        <span class="input-group-btn"><button type="button" class="btn btn-primary">cm</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <button type="button" class="btn btn-success" id="btn__cek__gizi">CEK</button>
               </div>
            
               <div class="col-md-5" >
                        <div class="form-group">
                            <label>Status Gizi</label>
                            <input type="text" class="form-control" name="status_gizi" id="status_gizi" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="catatan" class="form-control" id="catatan" cols="30" rows="10"></textarea>
                        </div>       

                       <div class="text-center" >
                           <button type="submit" class="btn btn-success">SIMPAN</button> 
                       </div>                
               </div>

               
               </form>
            </div>      
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 30px;">
    <input type="text" id="query__search__pertumbuhan" class="form-control" placeholder="Cari Data Pertumbuhan Anak">
</div>

<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
      
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Data Pertumbuhan Anak</h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr class="bg-warning">
                                    <th>No. </th>
                                    <th>No. Cek Pertumbuhan</th>
                                    <th>Tanggal Cek</th>
                                    <th>No. KMS</th>
                                    <th>No. Kunjungan</th>
                                    <th>Nama Anak</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Panjang Badan</th>
                                    <th>Berat Badan</th>
                                    <th>Hasil</th>
                                    <th>Catatan</th>
                                </tr>
                            </thead>
                            <tbody id="show__list_tumbuhanak"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>

<div id="modalListKunjungan" class="modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <input type="text" id="search__kunjungan" class="form-control" placeholder="Cari Kunjungan" >
                <table class="table table-striped   ">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Kunjungan</th>
                            <th>No. Antri </th>
                            <th>No. KMS</th>
                            <th>Nama Anak</th>
                            <th>Jenis Kelamin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="show__list__kunjungan" ></tbody>
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


<div id="modalConfirmCek" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Ingin Meneruskan Melakukan Cek Imunisasi</p>
                <div class="row">
                    <input type="text" name="id_target" id="id_target" class="form-control" >
                    <div class="col-md-6" >
                        <button class="btn btn-success btn-block" id="btn__finish" >Hanya Cek Pertumbuhan Saja</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info btn-block" id="btn__next">Lakukan Cek Imunisasi</button>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Cancel</a>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/kader/tumbuhanak.js' ?>"></script>
