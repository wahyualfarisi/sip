<div class="container-fluid">
    <div style="margin-top: 30px;" >
         <h3>DATA KUNJUNGAN</h3>
    </div>
</div>

<form id="form__add__kms" method="posts">
    <div class="col-md-6">
            <div class="form-group">
                <select name="select__kegiatan" id="select__kegiatan" class="form-control">
                    <option value="">-- Pilih Kegiatan --</option>
                    <?php foreach($jadwal->result() as $key): ?>
                        <option> <?= $key->nama_kegiatan ?> -  </option>
                    <?php endforeach ?>
                </select>
            </div>     
            <button class="btn btn-warning" type="submit" id="btn__search_bpjs"><span class="fa fa-search"></span> Lihat Kunjungan </button>                  
    </div>
</form>    


<div class="container-fluid" style="margin-top: 140px;">
    <div class="sparkline12-list shadow-reset mg-t-30">
        <div class="sparkline12-graph">
            <img src="<?= base_url('assets/img/filesearching.svg') ?>" width="400px;" alt="">    
            
            
        </div>
    </div>
</div>

<script src="<?= base_url('public/kader/datakunjungan.js') ?>" ></script>