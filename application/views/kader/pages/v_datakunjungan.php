<div class="container-fluid">
    <div style="margin-top: 30px;" >
         <h3>DATA KUNJUNGAN</h3>
    </div>
    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph">

            <div class="row">
            <form id="form__add__kms" method="posts">
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Jadwal Kegiatan</label>
                            <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" placeholder="Masukan No. BPJS" >
                           
                        </div>                       
                </div>
               
               <button class="btn btn-warning" type="button" id="btn__search_bpjs"><span class="fa fa-search"></span> Lihat Kunjungan </button>
            </form>    
            </div>      
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph">
            <img src="<?= base_url('assets/img/filesearching.svg') ?>" width="400px;" alt="">    
            <p>Tidak Ada Jadwal Kegiatan Hari ini</p>
            <a href="#/jadwalkegiatan" class="btn btn-info" > Tambah Jadwal Kegiatan </a>
        </div>
    </div>
</div>