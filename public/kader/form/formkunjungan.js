var urlKunjungan = (function() {
    const url = {
        fetch_jadwal_kegiatan: BASE_URL+'/master/kader/Kunjungan/fetch_jadwal_kegiatan',
        fetch_list_kms: BASE_URL+'master/kader/Kunjungan/fetch_list_kms',
        addAntrian: BASE_URL+'master/kader/Kunjungan/addAntrian',
    }

    return {
        getURL: () => url
    }
})()

const FormKunjunganUI = (function() {
    const getDomString = {
        form: {
            addkunjungan: '#form-add-kunjungan',
            addAntrian: '#form-add-antrian'
        },
        html: {
            detailJadwal: '#detail_jadwal',
            showKMS: '#show__list__kms',
            contentModalAntrian: '#content-modal-antrian'
        },
        field: {
            nokms: '#no_kms',
            targetID: '#targetID'
        },
        button: {
            addantrian: '.btn__add__antrian'
        },
        modal: {
            addantrian: '#modalAddAntrian'
        }
    }

    const renderJadwal = data => {
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
                                <input type="text" class="form-control" name="no_kms" id="no_kms" placeholder="Masukan No. KMS / Cari No. KMS" autofocus />
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

    const renderKms = data => {
        var html = '';
        if(data.length > 0){
            html += `<table class="table table-striped" style="margin-top: 40px;">
                        <thead>
                            <tr class="bg-warning"> 
                                <th> No. KMS </th>
                                <th> No. BPJS </th>
                                <th> No. KK </th>
                                <th> Nama Lengkap </th>
                                <th> Berat Badan Lahir </th>
                                <th> Panjang Badan Lahir </th>
                                <th> Jenis Kelamin </th>
                                <th> </th>
                            </tr>
                        </thead>
            `;
                
            data.forEach(item => {
                html += `
                        <tr class="bg-info"> 
                            <td> ${item.no_kms} </td>
                            <td> ${item.bpjs_number} </td>
                            <td> ${item.no_kk} </td>
                            <td> ${item.nama_lengkap} </td>
                            <td> ${item.bb} </td>
                            <td> ${item.pb} </td>
                            <td> ${item.jk} </td>
                            <td> <button class="btn btn-info btn__add__antrian"
                                data-no_kms=${item.no_kms}
                                data-nama_lengkap=${item.nama_lengkap}
                                >Tambah Ke Antrian 
                                </button> 
                            </td>
                        </tr>
                `;
            })
            html += `</table>`
        }else{
            html += 'tidak ada data';
        }
        $(getDomString.html.showKMS).html(html)
    }

    const renderBlank = () => {
        $(getDomString.html.showKMS).html('')
    }

    const renderNotif = (data) => {
        var parse = JSON.parse(data);
        if(parse.code !== 200) return mynotifications('info','top right', parse.msg)
        mynotifications('success','top right', parse.msg)
    }


    return {
        getDOM: () => getDomString,
        getJadwal: (object) => renderJadwal(object),
        getKMS: (object) => renderKms(object),
        renderBlank: () => renderBlank(),
        notif: (data) => renderNotif(data)
    }
})()


var FormKunjunganController = (function(url, UI) {
    const URL = url.getURL();
    const DOM = UI.getDOM();

    const eventListener = function(){
        $(DOM.form.addkunjungan).on('keyup', DOM.field.nokms, function() {
            if($(this).val() !== ''){
                load_list_kms($(this).val() )
            }else{
                UI.renderBlank()
            }
        })

        $(DOM.html.showKMS).on('click', DOM.button.addantrian, function() {
            let no_kms = $(this).data('no_kms').toUpperCase();
            let nama   = $(this).data('nama_lengkap').toUpperCase();
            var html = `<h3 class="text-center" style="font-weight: bold" > ${no_kms} - ${nama}  </h3> `;
            $(DOM.field.targetID).val(no_kms);
            $(DOM.html.contentModalAntrian).html(html)
            ModalAction(DOM.modal.addantrian, 'show');
        })

        $(DOM.form.addAntrian).on('submit', function(e) {
            e.preventDefault()
            postData(URL.addAntrian, this, data => {
                ModalAction(DOM.modal.addantrian,'hide')
                UI.notif(data)
            });
        })
    }

    const load_jadwal_kegiatan = () => getDATA(URL.fetch_jadwal_kegiatan, undefined,  data => UI.getJadwal(data) )
    
    const load_list_kms = (query) => getDATA(URL.fetch_list_kms, query, data => UI.getKMS(data) );


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

    const postData = (url, form, callback) => {
        $.ajax({
            url,
            method: 'post',
            data: new FormData(form),
            processData: false,
            contentType: false,
            async: false,
            cache: false,
            success: function(data){
                callback(data)
            }
        })
    }

    const ModalAction = (modalName, method) => {
        $(modalName).modal(method)
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
