<h1 class="text-center">Jadwal Kegiatan</h1>
<div class="container">

        <div style="margin-top: 110px;">
            <div class="row">
                <div class="col-md-6">
                        <div id="show__jadwal__kegiatan"></div>
                </div>
                <div class="col-md-6 text-center">
                <img src="<?= base_url('assets/img/waiting.svg')  ?>" alt="no-activity" width="300px;" />   
                </div>
            </div>
        </div>
    
        
        <div class="show-list-antrian-anak">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No Antri</th>
                        <th>No Kunjungan</th>
                        <th>Nama Anak</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="show__list__antrian" ></tbody>

            </table>
        </div>

</div>


<!-- The Modal -->
<div class="modal" id="ModalAddAntrian">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Masukan Ke Antrian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-striped">

                <thead>
                    <tr>
                        <th>No. KK</th>
                        <th>No. Bpjs</th>
                        <th>Nama Anak</th>
                        <th>Jenis Kelamin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="show__list__anak" ></tbody>

        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script src="<?= base_url('public/warga/antrian.js') ?>" ></script>