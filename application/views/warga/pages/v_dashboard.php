
    <h1 class="text-center site-title">Dashboard</h1>
    <div class="container"> 

        <section>
            <div class="row" >
                <div class="col-md-6" >
                    <div class="kelengkapan_data"></div>
                   

                    <div style="margin-top: 20px;" class="btn-lengkapi-data" >
                        <a href="#/profile" class="btn btn-info btn-sm"> Lengkapi Data  </a>
                    </div>
                </div>

                <div class="col-md-6" >
                <img src="<?= base_url().'assets/img/posyandu.svg' ?>" alt="" width="450px;">
                </div>
            </div>
        </section>

        
    </div>

    <div class="container">
        <h4 class="site-title">Data Anak</h4>
        <button id="btn-tambah-anak" class="btn btn-primary"> TAMBAH ANAK </button>
        <div class="row" id="show-anak">
                <div class="col-md-6 placeholderanak" style="margin-top: 20px;">
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                             <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                             <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                             <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-6 placeholderanak" style="margin-top: 20px;">
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                             <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                             <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                             <div class="progress" style="margin-top: 10px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" style="margin-top: 20px;" >
                    <div class="card" style="width: 28rem;">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div> -->

        </div>
    </div>
    <div class="clear"></div>



    <!-- The Modal -->
    <div class="modal" id="ModalEditAnak">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title text-center">Edit Data Anak</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id="form-edit-anak">
                <div class="form-group">
                    <label>No. BPJS</label>
                    <input type="text" id="no_bpjs" name="no_bpjs" class="form-control" readonly >
                </div>
                <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" id="nama_depan">
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" id="nama_belakang" name="nama_belakang" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="">--Jenis Kelamin--</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning">UPDATE</button>
            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
    </div>

    <script>
        var BASE_URL = '<?= base_url() ?>';
    </script>
    <script src="<?= base_url("public/warga/storage.js") ?>" ></script>
    <script src="<?= base_url("public/warga/dashboard.js") ?>" ></script>

    


