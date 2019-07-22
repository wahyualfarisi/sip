<div class="container-fluid">
    <div style="margin-top: 30px;" >
         <h3>DATA KUNJUNGAN</h3>
    </div>
</div>

<form id="form__add__kms" method="post">

    <div class="row">
    
    

    <div class="col-md-6">
            <div class="form-group">
                <select name="select__kegiatan" id="select__kegiatan" class="form-control">
                    <option value="">-- Pilih Kegiatan --</option>
                    <?php foreach($jadwal->result() as $key): ?>
                        <option value="<?= $key->no_kegiatan ?>" > <?= $key->nama_kegiatan ?> </option>
                    <?php endforeach ?>
                </select>
            </div>     
            <button class="btn btn-warning" type="button" id="btn__search_kunjungan"><span class="fa fa-search"></span> Lihat Kunjungan </button>                  
    </div>

    <div class="col-md-6">
        
         <div class="showkegiatan"></div>

        <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30" style="margin-top: 10px;">
            <div class="income-title">
                <div class="main-income-head">
                    <h2 class="text-center" > Jumlah Kunjungan </h2>
                </div>
            </div>
            <div class="income-dashone-pro">
                <div class="income-rate-total">
                    <div class="price-adminpro-rate">
                        <h3 class="text-center"><span class="counter" id="jumlah__kunjungan"></span></h3>
                    </div>
                    <div class="price-graph">
                        <span id="sparkline6"></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    </div>

</form>    


<div class="container-fluid" style="margin-top: 16px;">
    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph" >

            <div class="no-kunjungan">
                <img src="<?= base_url('assets/img/filesearching.svg') ?>" width="200px;" alt="">            
                <h4>Cari Daftar Kunjungan</h4>
            </div>

            <div >
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Kunjungan</th>
                            <th>No. Antri</th>
                            <th>Tanggal Kunjungan</th>
                            <th>No. KMS</th>
                            <th class="bg-warning">Status</th>
                            <th>No. BPJS</th>
                            <th>Nama Anak</th>
                            <th>Jenis Kelamin</th>
                            <th>No. KK</th>
                            <th>Nama Ibu</th>
                        </tr>
                    </thead>
                    <tbody id="show__daftar__kunjungan" ></tbody>
                </table>
            </div>
           
        </div>
    </div>
</div>

<script src="<?= base_url('public/myLib.js') ?>" ></script>
<script src="<?= base_url('public/kader/datakunjungan.js') ?>" ></script>