
    <h1 class="text-center">Dashboard</h1>
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
        <h4>Data Anak</h4>
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


    <script>
        var BASE_URL = '<?= base_url() ?>';
    </script>
    <script src="<?= base_url("public/warga/storage.js") ?>" ></script>
    <script src="<?= base_url("public/warga/dashboard.js") ?>" ></script>

    


