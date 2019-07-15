const UrlImunisasi = (function() {
    const urlString = {
        listKunjungan: BASE_URL+'master/kader/TumbuhAnak/ListKunjunganOnCheckout',
        showImunisasi: BASE_URL+'master/kader/Cekimunisasi/cek_imunisasi',
        add: BASE_URL+'master/kader/Cekimunisasi/add',
        fetchDataImunisasi: BASE_URL+'master/kader/Cekimunisasi/getimunisasi'
    }

    return {
        getURL: () => urlString
    }
})()


const imunisasiInterface = (function() {
    const domString = {
        modal: {
            listKunjungan: '#modalListKunjungan'
        },
        html: {
            showKunjungan: '#show__list__kunjungan',
            showImunisasi: '#show__imunisasi',
            showListImunisasi: '#show__list__imunisasi',
            
        },
        btn: {
            showList: '#btn__show__list',
            pilihAnak: '.btn__pilih__anak',
            cekImunisasi: '#btn__cek__imunisasi',
            btnSaveImunisasi: '.btn__simpan__imunisasi',
            btnSearchByDate: '#btn__search__by__date'
        },
        field: {
            searchKunjungan: '#search__kunjungan',
            no_kunjungan: '#no_kunjungan',
            nama: '#nama_anak',
            jk: '#jk',
            umur: '#umur',
            no_bpjs: '#no_bpjs',
            no_kk: '#no_kk',
            no_kms: '#no_kms',
            searchByDate: '#search__imunisasi__by__date',
            searchImunisasi: '#serch__data__imunisasi'
        },
        form: {
            add: '#form__add__imunisasi'
        }
    }

    const renderOnModal = (object) => {
        let html = '', no = 1;
        if(object.length > 0) {
            object.forEach(item => {
                html += `
                        <tr> 
                            <td> ${no++} </td>
                            <td> ${item.no_kunjungan} </td>
                            <td> ${item.no_antri} </td>
                            <td> ${item.no_kms} </td>
                            <td> ${item.nama_lengkap} </td>
                            <td> ${item.jk} </td>
                            <td> <button
                                    class="btn btn-info btn__pilih__anak"
                                    data-no_kunjungan=${item.no_kunjungan}
                                    data-no_antri="${item.no_antri}"
                                    data-no_kms="${item.no_kms}"
                                    data-umur="${item.umur}"
                                    data-jk="${item.jk}"
                                    data-nama="${item.nama_lengkap}"
                                    data-no_bpjs="${item.no_bpjs}"
                                    data-no_kk="${item.no_kk}"
                                    
                            >Pilih Anak</td>
                        </tr>
                `;
            })
        }else{
            html += 'Tidak Ada Kunjungan Hari ini';
        }


        $(domString.html.showKunjungan).html(html)
    }

    const renderImunisasi = object => {
        let html = '';
        if(object.length > 0){
            $(domString.btn.btnSaveImunisasi).css('display','block')
            html += `<label> Pilih Imunisasi </label>`;
            html += `<select class="form-control" name="imunisasi" id="imunisasi" >`;
            html += `<option value=""> -- Pilih Imunisasi -- </option>`;
            object.forEach(item => {
                    html += `<option value="${item.id_imunisasi}"> ${item.nama_imunisasi} </option>`;
            })
            html += `</select>`;
        }else{
            $(domString.btn.btnSaveImunisasi).css('display','none')
            html = 'Imunisasi tidak memenuhi kriteria umur';
        }
        $(domString.html.showImunisasi).html(html)
    }

    const renderNotif = (data) => {
        var parse = JSON.parse(data);
        if(parse.code !== 200) return mynotifications('error','top right', parse.msg)
        mynotifications('success','top right', parse.msg)
    }

    const renderListImunisasi = object => {
        let html = '', no = 1;
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr>
                        <td> ${no++} </td>
                        <td> ${item.no_cek_imunisasi} </td>
                        <td> ${item.tgl_cek_imunisasi} </td>
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.kms} </td>
                        <td> ${item.nama_imunisasi} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.catatan} </td>
                    </tr>
                `;
            })
        }
        $(domString.html.showListImunisasi).html(html)
    }

    return {
        getDOM: () => domString,
        getListKunjungan: (data) => renderOnModal(data),
        getImunisasi: (data) => renderImunisasi(data),
        getNotif: (data) => renderNotif(data),
        getListImunisasi: (data) => renderListImunisasi(data)
    }
})()


const imunisasiController = (function(URL, UI) {
    const url = URL.getURL()
    const dom  = UI.getDOM();

    const eventListener = function(){
        $(dom.btn.showList).on('click', () => ModalAction(dom.modal.listKunjungan, 'show') )

        $(dom.html.showKunjungan).on('click', dom.btn.pilihAnak, function() {
            $(dom.field.no_kunjungan).val($(this).data('no_kunjungan') );
            $(dom.field.no_kms).val($(this).data('no_kms'))
            $(dom.field.nama).val($(this).data('nama'))
            $(dom.field.jk).val($(this).data('jk') )
            $(dom.field.umur).val($(this).data('umur'))
            $(dom.field.no_bpjs).val($(this).data('no_bpjs'))
            $(dom.field.no_kk).val($(this).data('no_kk'))

            ModalAction(dom.modal.listKunjungan, 'hide')


            let rangeUmur;
            const no_kms = $(this).data('no_kms');
            const umur   = $(this).data('umur').split(' ');

            if(umur[1] === "Hari"){
                rangeUmur = 1 // range umur dalam hitungan hari 
            }else if(umur[1] === "Bulan"){
                rangeUmur = umur[0] // range umur dalam hitungan bulan
            }else if(umur[1] === "Tahun"){
                rangeUmur = umur[0] * 12 //range umur dalam hitungan tahun , convert ke dalam jumlah bulan
            }
            $.ajax({
                url: url.showImunisasi,
                method: 'post',
                data: {no_kms: no_kms, umur: rangeUmur},
                dataType: 'json',
                success: function(data){
                   UI.getImunisasi(data);
                }
            })
        });

        $(dom.form.add).validate({
            rules: {
                no_kunjungan: {
                    required: true
                },
                no_kms: {
                    required: true
                },
                nama_anak: {
                    required: true
                },
                jk: {
                    required: true
                },
                umur: {
                    required: true
                },
                imunisasi: {
                    required: true
                },
                catatan: {
                    required: true
                }
            },
            messages: {
                no_kunjungan: {
                    required: 'No. Kunjungan tidak boleh kosong'
                },
                no_kms: {
                    required: 'No Kms Tidak Boleh Kosong'
                },
                nama_anak: {
                    required: 'Nama Anak Tidak Boleh Kosong'
                },
                jk: {
                    required: 'Jenis Kelamin Tidak Boleh Kosong'
                },
                umur: {
                    required: 'Umur Tidak Boleh Kosong'
                },
                imunisasi: {
                    required: 'Imunisasi Tidak Boleh Kosong'
                },
                catatan: {
                    required: 'Catatan Tidak Boleh Kosong'
                }
            },
            errorPlacement: function(error, element){
                error.css('color','red')
                error.insertAfter(element)
            },
            submitHandler: function(form){
                postResource(url.add, form, data => {
                    UI.getNotif(data)
                    listKunjungan()
                    load_imunisasi()
                    $(dom.form.add)[0].reset()
                    
                });
            }
        })

        $(dom.btn.btnSearchByDate).on('click', function() {
            const date = $(dom.field.searchByDate).val();
            if(date !== ""){
                load_search_by_date(date);
            }else{
                load_imunisasi()
            }
        })

        $(dom.field.searchImunisasi).on('keyup', function() {
            if($(this).val() !== ""){
                search_list_imunisasi($(this).val())
            }else{
                load_imunisasi()
            }
        })

        
    
    }

    const listKunjungan = () => getResource(url.listKunjungan, undefined, data => UI.getListKunjungan(data) );
    const load_imunisasi = () => getResource(url.fetchDataImunisasi, undefined, data => UI.getListImunisasi(data) )
    const load_search_by_date = (date) => getResource(url.fetchDataImunisasi, date, data => UI.getListImunisasi(data) )
    const search_list_imunisasi = (query) => getResource(url.fetchDataImunisasi, query, data => UI.getListImunisasi(data))


    const ModalAction = (modalName, method) => $(modalName).modal(method)

    const getResource = (url, query, callback) => {
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

    const postResource = (url, form, callback) => {
        $.ajax({
            url,
            method: 'post',
            data: new FormData(form),
            processData: false,
            contentType: false,
            async: false,
            cache: false,
            success: function(data){
                callback(data);
            }
        })
    }

    return {
        init: () => {

            $(dom.btn.btnSaveImunisasi).css('display','none')
            listKunjungan()
            eventListener()
            load_imunisasi();
        }
    }
})(UrlImunisasi, imunisasiInterface)

$(document).ready(function() {
    imunisasiController.init()
})