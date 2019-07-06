var urlKunjungan = (function() {
    const url = {
        fetch_jadwal_kegiatan: BASE_URL+'/master/kader/Kunjungan/fetch_jadwal_kegiatan'
    }

    return {
        getURL: () => url
    }
})()

const FormKunjunganUI = (function() {
    const getDomString = {
        form: {
            addkunjungan: '#form-add-kunjungan'
        },
        html: {
            detailJadwal: '#detail_jadwal'
        },
        field: {
            nokms: '#no_kms'
        }
    }

    const renderJadwal = (data) => {
        var html = ''
        if(data.length === 1 ){
            data.forEach(item => {
                html += `
                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Nama Kegiatan</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan" value="${item.nama_kegiatan}" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Lokasi</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="lokasi" id="lokasi" value="${item.lokasi}" readonly />
                            </div>  
                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">Tanggal Kegiatan </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="tanggal_kegiatan" id="tanggal_kegiatan" value="${item.tanggal_kegiatan}" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="form-group-inner">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="login2 pull-right pull-right-pro">No. KMS</label>
                            </div>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" name="no_kms" id="no_kms" placeholder="Masukan No. KMS / Cari No. KMS" />
                            </div>
                        </div>
                    </div>


                `;
            })
        }else{

            html += `
                    <div class="text-center">
                        <img src="${BASE_URL}assets/img/no_data.svg" width="300px;" />
                        <p> Tidak Ada Kegiatan Jadwal Imunisasi dan Pertumbuhan Anak </p>
                    </div>
                 `;
        }
        $(getDomString.html.detailJadwal).append(html)
    }


    return {
        getDOM: () => getDomString,
        getJadwal: (object) => renderJadwal(object),   
    }
})()


var FormKunjunganController = (function(url, UI) {
    const URL = url.getURL();
    const DOM = UI.getDOM();

    const eventListener = function(){
        $(DOM.form.addkunjungan).on('keyup', DOM.field.nokms, function() {
            console.log($(this).val() )
        })
    }

    const load_jadwal_kegiatan = () => getDATA(URL.fetch_jadwal_kegiatan, undefined,  data => UI.getJadwal(data) )
    


    const getDATA = (url, query, callback) => {
        $.ajax({
            url,
            method: 'post',
            data: {query: query},
            dataType: 'json',
            success: function(data){
                callback(data)
            }
        })
    }

    

    return {
        init: () => {
            eventListener();
            load_jadwal_kegiatan();
        }
    }
})(urlKunjungan, FormKunjunganUI)


$(document).ready(function() {
    FormKunjunganController.init()
})
