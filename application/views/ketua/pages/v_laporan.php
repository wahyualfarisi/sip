<div class="container-fluid">
<div style="margin-top: 30px;" >
         <h3>LAPORAN</h3>
</div>
</div>

<div class="col-lg-12 animated fadeIn formUser" style="margin-top: 50px;">
  <div class="sparkline12-list shadow-reset">
      <div class="sparkline12-hd">
          <div class="main-sparkline12-hd">
              <h1 class="headingform"><span class="fa fa-print"></span></h1>


              <form id="form-search-laporan">

                <div class="form-group">
                    <label>Dari Tanggal</label>
                    <input type="date" name="dari_tgl" id="dari_tgl" class="form-control">
                </div>
              
                <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="sampai_tgl" id="sampai_tgl" class="form-control">
                </div>

                <div class="form-group">
                    <label>Jenis Laporan</label>
                    <select name="jenis_laporan" id="jenis_laporan" class="form-control">
                        <option value="">-- Jenis Laporan --- </option>
                        <option value="imunisasi">IMUNISASI</option>
                        <option value="pertumbuhan">Pertumbuhan</option>
                    </select>
                </div>

                <button type="submit" id="cari-laporan" class="btn btn-info">Cari Laporan</button>

              </form>

          </div>
      </div>
   </div>
</div>

<div class="container-fluid">
<br><br>
<br><br>
<div style="margin-top: 40px; margin-bottom: 16px;" id="show__btn__print">
    <button class="btn btn-warning" id="btn__print__area" >PRINT</button>
</div>
</div>


<div class="col-lg-12 animated fadeIn formUser" style="margin-top: 50px;" id="wrapper-report">
  <div class="sparkline12-list shadow-reset">
      <div class="sparkline12-hd">
          <div class="main-sparkline12-hd">
              <h1 class="headingform"><span class="fa fa-print"></span></h1>

              
              

             
               
                <table class="table table-bordered" id="table-imunisasi">
                    <thead>
                        <tr>
                            <th>No Cek Imunisasi</th>
                            <th>No.Kunjungan</th>
                            <th>No.KMS</th>
                            <th>Nama Anak</th>
                            <th>JK</th>
                            <th>Umur</th>
                            <th>No. KK</th>
                            <th>Nama Ibu</th>
                            <th>Kegiatan</th>
                            <th>Imunisasi</th>
                            <th>Tanggal Cek</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody id="show__list__imunisasi"></tbody>
                </table>

                <table class="table table-bordered" id="table-pertumbuhan">
                    <thead>
                        <tr>
                            <th>No Cek Pertumbuhan</th>
                            <th>No.Kunjungan</th>
                            <th>No.KMS</th>
                            <th>Nama Anak</th>
                            <th>JK</th>
                            <th>Umur</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Hasil</th>
                            <th>Catatan</th>
                            <th>Tanggal Cek</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="show__list__pertumbuhan"></tbody>
                </table>

          

          </div>
      </div>
   </div>
</div>

<script src="<?= base_url('public/myLib.js') ?>" ></script>
<script src="<?= base_url('assets/js/printArea.js') ?>"></script>
<script src="<?= base_url('public/ketua/laporan.js') ?>" ></script>