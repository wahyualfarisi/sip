<div class="container-fluid">
    <div style="margin-top: 30px;" >
         <h3>CEK IMUNISASI</h3>
    </div>
    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph">

            <div class="row">
            <form id="form__add__imunisasi" method="posts">
                <div class="col-md-6">
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
                            <label>No KMS</label>
                            <input type="text" class="form-control" name="no_kms" id="no_kms"  readOnly >
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
                            <label>Umur</label>
                            <input type="text" class="form-control" name="umur" id="umur"  readOnly >
                        </div>

                        

                        <div class="form-group" id="show__imunisasi">
                            
                        </div>
                       
                </div>
                <div class="col-md-6 btn__simpan__imunisasi">
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="catatan" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
               </div>
               
               <div class="text-center btn__simpan__imunisasi">
                    <button type="submit" class="btn btn-success" >SIMPAN</button>
               </div>
               
            </form>    
            </div>      
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 30px;">
    <input type="text" id="serch__data__imunisasi" class="form-control" placeholder="Cari Data Imunisasi">

    <div class="row" style="margin-top: 30px;">
        <div class="col-md-3">
            <label>Sortir By Tanggal</label>
            <input type="date" class="form-control" id="search__imunisasi__by__date" >
            <button class="btn btn-info" id="btn__search__by__date">Cari</button>
        </div>
    </div>

</div>

<div class="static-table-area mg-b-15" style="margin-top: 50px;">
    <div class="container-fluid">
      
      <div class="row" style="margin-top: 15px;">
        <div class="col-lg-12 animated fadeIn">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Data Imunisasi</h1>

                    </div>
                </div>
                <div class="sparkline8-graph">
                    <div class="static-table-list">
                        <table class="table">
                            <thead>
                                <tr class="bg-warning">
                                    <th>No. </th>
                                    <th>No. Cek Imunisasi</th>
                                    <th>Tanggal Cek Imunisasi</th>
                                    <th>No. Kunjungan</th>
                                    <th>No. KMS</th>
                                    <th>Imunisasi </th>
                                    <th>Nama Anak </th>
                                    <th>Catatan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="show__list__imunisasi"></tbody>
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

<script src="<?= base_url().'public/mynotif.js'?>"></script>
<script src="<?= base_url().'public/kader/imunisasi.js' ?>" ></script>