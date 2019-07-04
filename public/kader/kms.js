
const KmsURL = (function() {
    const uri = {
        fetchanak: BASE_URL+'master/kader/Anak/fetch_anak_json',
        addKMS: BASE_URL+'master/kader/Kms/add'
    }

    return {
        getURI: () => {
            return uri;
        }
    }
})()

const KmsUI = (function() {
    const domString = {
        htmlshow: {
            showKMS: '#show-kegiatan',
            showAnak: '#show__list__anak'
        },
        form: {
            add: '#form__add__kms'
        },
        field: {
            searchKMS: '#serch__KMS',
            searchAnak: '#search__anak',
            no_bpjs: '#no_bpjs'
        },
        button: {
            searchBPJS : '#btn__search_bpjs',
            pilihAnak: '#pilih__anak'
        },
        modal: {
            modalBPJS: '#modalSearchBPJS'
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

    return {
        getDOM: () => {
            return domString;
        },
        getListAnak: (object) => {
            renderListAnak(object);
        }
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
                postData(url.addKMS, form, data => console.log(data) )
            }
        })
    }


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

    const getData = (url, callback) => {
        $.ajax({
            url, 
            method: 'get',
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
            console.log('initalize app')
            console.log(url);
        }
    }
})(KmsUI, KmsURL);

$(document).ready(function() {
    KmsController.init()
})