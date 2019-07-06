
const KmsURL = (function() {
    const uri = {
        fetchanak: BASE_URL+'master/kader/Anak/fetch_anak_json',
        addKMS: BASE_URL+'master/kader/Kms/add',
        fetch: BASE_URL+'master/kader/Kms/fetch',
        delete: BASE_URL+'master/kader/Kms/delete',
        update: BASE_URL+'master/kader/Kms/update'
    }

    return {
        getURI: () => uri
    }
})()

const KmsUI = (function() {
    const domString = {
        htmlshow: {
            showKMS: '#show-kms',
            showAnak: '#show__list__anak'
        },
        form: {
            add: '#form__add__kms',
            delete: '#form-delete-kms',
            edit: '#form-edit-kms'
        },
        field: {
            searchKMS: '#serch__KMS',
            searchAnak: '#search__anak',
            no_bpjs: '#no_bpjs',
            confirm: '#confirm',
            no_kms: '#no_kms', 
            bb_edit: '#berat__badan__edit',
            pb_edit: '#panjang__badan__edit',
            bpjs_edit: '#no__bpjs__edit',
            nama_edit: '#nama__edit',
            no_kms_edit: '#no__kms__edit'
        },
        button: {
            searchBPJS : '#btn__search_bpjs',
            pilihAnak: '#pilih__anak',
            deleteKms: '.btn__delete__kms',
            editKms: '.btn__edit__kms'
        },
        modal: {
            modalBPJS: '#modalListAnak',
            modalDelete: '#modalDelete',
            modalEdit: '#modalEditKms'
        }
    }

    const renderListAnak = (data) => {
        var html = '';
        if(data.length > 0){
            data.forEach((item) => {
                let nama_lengkap = item.nama_depan +' '+ item.nama_belakang;
                html += `
                    <tr> 
                        <td> ${item.no_bpjs} </td>
                        <td> ${item.no_kk} </td>
                        <td> ${nama_lengkap} </td>
                        <td> ${item.jenis_kelamin} </td>
                        <td> <button type="button" id="pilih__anak" data-nobpjs="${item.no_bpjs}" data-nama="${nama_lengkap}" > Pilih Anak </button> </td>
                    <tr>
                `;
            })
        }
        $(domString.htmlshow.showAnak).html(html);
    }

    const renderKms = (data) => {
        var html = '', no = 1;
        if(data.length > 0){
            data.forEach(item => {
                html += `
                    <tr>
                        <td> ${no++} </td>
                        <td> ${item.no_kms} </td>
                        <td> ${item.bpjs_number} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.tanggal_terdaftar} </td>
                        <td> ${item.bb} </td>
                        <td> ${item.pb} </td>
                        <td> <button class="btn btn-warning btn__edit__kms"
                                        data-no_bpjs="${item.bpjs_number}"
                                        data-nama_lengkap=${item.nama_lengkap}
                                        data-bb="${item.bb}"
                                        data-pb="${item.pb}"
                                        data-id="${item.no_kms}"
                             > <i class="fa fa-pencil"> </i> </button> 
                             <button class="btn btn-warning btn__delete__kms" 
                                     data-id="${item.no_kms}" 
                             > <i class="fa fa-close"> </i> </button> 
                        </td>
                        <td> <a class="btn btn-info" > Detail KMS </a> </td>
                    </tr>
                `;
            })
        }
        $(domString.htmlshow.showKMS).html(html)
    }

    const renderNotif = (data) => {
        var parse = JSON.parse(data);
        if(parse.code !== 200) return mynotifications('error','top right', parse.msg)
        mynotifications('success','top right', parse.msg)
    }

   

    return {
        getDOM: () => domString,
        getListAnak: (object) => renderListAnak(object),
        retrieveKMS: (object) =>  renderKms(object),
        notif: (data) => renderNotif(data)
    }
})()


const KmsController = (function(UI, URL) {
    const DOM = UI.getDOM();
    const url = URL.getURI()

    const eventListener = () => {

        /**
         *  event keypress no.bpjs 
         */
        $(DOM.form.add).on('keypress', DOM.field.no_bpjs, function(e) {
            if(e.which != 8 && e.which !=0 && (e.which < 48 || e.which > 57 ) ){
                return false;
            }
        })

        /**
         * show modal search BPJS
         */
        $(DOM.button.searchBPJS).on('click', () => {
            loadListAnak()
            ModalAction(DOM.modal.modalBPJS, 'show')
        })

        /**
         * search on modal (list anak) 
         */
        $(DOM.modal.modalBPJS).on('keyup', DOM.field.searchAnak, function() {
            if($(this).val() !== '') {
                loadListAnak($(this).val())
            }else{
                loadListAnak()
            }
        })

        /**
         * btn pilih anak
         */
        $(DOM.modal.modalBPJS).on('click', DOM.button.pilihAnak, function() {
            var nobpjs = $(this).data('nobpjs')
            ModalAction(DOM.modal.modalBPJS, 'hide')
            $(DOM.field.no_bpjs).val(nobpjs);
        })

        /**
         * submit form add kms
         */
        $(DOM.form.add).validate({
            rules: 
            {
                no_bpjs: {
                    required: true
                },
                tanggal_terdaftar: {
                    required: true
                },
                berat_badan: {
                    required: true
                },
                panjang_badan: {
                    required: true
                }
            },
            messages: {
                no_bpjs: {
                    required: 'No. BPJS Tidak Boleh Kosong'
                },
                berat_badan: {
                    required: 'Berat Badan Harus Diisi'
                },
                panjang_badan: {
                    required: 'Panjang Badan Harus Diisi'
                }
            },
            errorPlacement: function(error, element){
                error.css('color', 'red')
                error.insertAfter(element)
            },
            submitHandler: function(form){
                postData(url.addKMS, form, data =>  {
                    UI.notif(data);
                    $(DOM.form.add)[0].reset();
                    load_kms()
                })
            }
        })

        /**
         * event keyup search kms 
         */
        $(DOM.field.searchKMS).on('keyup', function() {
            if($(this).val() != ''){
                getData(url.fetch, $(this).val(), data => UI.retrieveKMS(data) )
            }else{
                load_kms()
            }
        })

        /**
         * Event cliked delete
         */
         $(DOM.htmlshow.showKMS).on('click', DOM.button.deleteKms, function() {
             var no_kms = $(this).data('id')
             $(DOM.field.no_kms).val(no_kms)
             ModalAction(DOM.modal.modalDelete, 'show')
         })
         $(DOM.form.delete).on('submit', function(e) {
             e.preventDefault() 
             var confirm = $(DOM.field.confirm).val() 
             if(confirm !== 'confirm') return  mynotifications('error','top right', 'Konfirmasi Salah');
             postData(url.delete, this, data => {
                UI.notif(data);
                load_kms()
                ModalAction(DOM.modal.modalDelete, 'hide') 
                $(DOM.form.delete)[0].reset()
             });
         })

         /**
          * Event cliked edit
          */
         $(DOM.htmlshow.showKMS).on('click', DOM.button.editKms, function() {
             var id = $(this).data('id'), no_bpjs = $(this).data('no_bpjs') , nama = $(this).data('nama_lengkap'), bb   = $(this).data('bb'), pb = $(this).data('pb')
             $(DOM.field.nama_edit).val(nama)
             $(DOM.field.pb_edit).val(pb)
             $(DOM.field.bb_edit).val(bb)
             $(DOM.field.no_kms_edit).val(id)
             $(DOM.field.bpjs_edit).val(no_bpjs)
             ModalAction(DOM.modal.modalEdit, 'show')
         })

         /**
          * event submit form edit kms  
          */
         $(DOM.form.edit).validate({
             rules: {
                 bb: {
                     required: true
                 },
                 pb: {
                     required: true
                 }
             },
             messages: {
                 bb:{
                     required: 'Berat Badan Tidak Boleh Kosong'
                 },
                 pb: {
                     required: 'Panjang Badan Tidak Boleh Kosong'
                 }
             },
             errorPlacement(error, element){
                 error.css('color', 'red')
                 error.insertAfter(element)
             },
             submitHandler(form){
                 postData(url.update, form, data => {
                    UI.notif(data);
                    load_kms()
                    ModalAction(DOM.modal.modalEdit, 'hide')
                 });
             }
         })
    }

    const load_kms = () => getData(url.fetch, undefined, data => UI.retrieveKMS(data));
    


    //my function//
    const loadListAnak = (query) => {
        $.ajax({
            url: url.fetchanak,
            method: 'post',
            data: {query: query},
            dataType: 'json',
            success: function(data){
                UI.getListAnak(data);
            }
        })
    }

    const ModalAction = (modalName, method) => $(modalName).modal(method);

    const getData = (url, query, callback) => {
        $.ajax({
            url, 
            method: 'post',
            data: {query: query},
            dataType: 'json',
            success(data){
                callback(data);
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
            success: function(response){
                callback(response)
            }
        })
    }
    //end my func//
    return {
        init: function(){
            eventListener()
            load_kms()
            console.log('initalize app')
            console.log(url);
        }
    }
})(KmsUI, KmsURL);

$(document).ready(function() {
    KmsController.init()
})