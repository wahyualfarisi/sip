const URLTumbuhAnak = (function() {
    const url = {
        listKunjungan: BASE_URL+'master/kader/TumbuhAnak/ListKunjunganOnCheckout',
        listAntroprometri: BASE_URL+'src/Antroprometri.json',
        add: BASE_URL+'master/kader/TumbuhAnak/add',
        updateToFinish: BASE_URL+'master/kader/Kunjungan/update_status_selesai',
        listCekPertumbuhan: BASE_URL+'master/kader/TumbuhAnak/fetch_list'
    }


    return {
        getURL: () => url
    }
})();



const TumbuhAnakInterface = (function() {
    const domString = {
        modal: {
            listKunjungan: '#modalListKunjungan',
            modalConfirm: '#modalConfirmCek'
        },
        html: {
            showKunjungan: '#show__list__kunjungan',
            showPertumbuhan: '#show__list_tumbuhanak'
        },
        btn: {
            showList: '#btn__show__list',
            pilihAnak: '.btn__pilih__anak',
            btnHitungGizi: '#btn__cek__gizi',
            btnFinish: '#btn__finish',
            btnNext: '#btn__next',

        },
        field: {
            searchKunjungan: '#search__kunjungan',
            no_kunjungan: '#no_kunjungan',
            nama: '#nama_anak',
            jk: '#jk',
            umur: '#umur',
            no_bpjs: '#no_bpjs',
            no_kk: '#no_kk',
            bb: '#berat_badan',
            pb: '#panjang_badan',
            statusGizi: '#status_gizi',
            id_target: '#id_target',
            searchListPertumbuhan: '#query__search__pertumbuhan'
        },
        form: {
            addPertumbuhanAnak: '#form__pertumbuhan__anak'
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

    const renderNotif = (data) => {
        var parse = JSON.parse(data);
        if(parse.code !== 200) return mynotifications('error','top right', parse.msg)
        mynotifications('success','top right', parse.msg)
    }

    const renderListPertumbuhan = object => {
        let html = '', no = 1;
        if(object.length > 0){
            object.forEach(item => {
                html += `
                     <tr> 
                        <td> ${no++} </td>
                        <td> ${item.no_cek_pertumbuhan} </td>
                        <td> ${item.no_kms} </td>
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.jk} </td>
                        <td> ${item.umur} </td>
                        <td>  ${item.tb} </td>
                        <td> ${item.bb} </td>
                        <td> ${item.hasil} </td>
                        <td> ${item.catatan} </td>
                     </tr>
                `;
            })
        }else{

        }
        $(domString.html.showPertumbuhan).html(html)
    }


    return {
        getDOM: () => domString,
        getListKunjungan: (data) => renderOnModal(data),
        getNotif: (data) => renderNotif(data),
        getListPertumbuhan: (object) => renderListPertumbuhan(object)
    }
})();


const TumbuhAnakController = (function(URL, UI) {
    const url = URL.getURL();
    const dom  = UI.getDOM();
    const eventListener = function(){
        /**
         * event show modal list kunjungan 
         */
        $(dom.btn.showList).on('click', () => ModalAction(dom.modal.listKunjungan, 'show') );
        /**
         * event keyup search kunjungan
         */
        $(dom.field.searchKunjungan).on('keyup', function() {
            if($(this).val() !== ''){
                searchListKunjungan($(this).val())
            }else{
                listKunjungan()
            }
        })

        /**
         *event click hitung gaji 
         */
        $(dom.btn.btnHitungGizi).on('click', () => {
            let rangeUmur, result;
            const bb = parseInt($(dom.field.bb).val()) 

            const pb = parseInt($(dom.field.pb).val()) 

            const umur = $(dom.field.umur).val().split(' ')

            if(umur[1] === "Hari"){
                rangeUmur = 1 // range umur dalam hitungan hari 
            }else if(umur[1] === "Bulan"){
                rangeUmur = umur[0] // range umur dalam hitungan bulan
            }else if(umur[1] === "Tahun"){
                rangeUmur = umur[0] * 12 //range umur dalam hitungan tahun , convert ke dalam jumlah bulan
            }

            if($.trim(bb) !== "" && $.trim(pb) !== ""){
                getResource(url.listAntroprometri, undefined , data => {
                   const filter_jk   =  data.filter(item => item.gender === $(dom.field.jk).val() ) // filter data berdasarkan jk

                   //filter umur jika rangeumur < item dalam source && rangeumur > rangeend
                   const filter_umur =  filter_jk[0].source.filter(item => parseInt(item.range_start) < rangeUmur && parseInt(item.range_end) > rangeUmur )
                   
                   if(filter_umur.length > 0 ){
                    const filter_pb   = filter_umur[0].data.filter(item => item.value ===  pb )

                    if(filter_pb.length > 0){
                        const median = filter_pb[0].standart[1];
 
                        //cek bb > median || bb < median 
                        if(bb < median ){
                             result = (bb - median ) / (median - filter_pb[0].standart[0])
                        }else{
                             result = (bb - median) / ( filter_pb[0].standart[2] - median )
                        }
                        console.log(result)
                        if(result > 3){
                            $(dom.field.statusGizi).val('Sangat Gemuk')
                        }else if(result > 2 || result >= 3){
                            console.log('Gemuk')
                            $(dom.field.statusGizi).val('Gemuk')
                        }else if(result > -2 || result >= 2 ){
                            console.log('Normal')
                            $(dom.field.statusGizi).val('Normal')
                        }else if(result > -3 || result < -2){
                            console.log('Kurus')
                            $(dom.field.statusGizi).val('Kurus')
                        }
                        
                        
                    }else{
                        alert('data gizi tidak di temukan ')
                    }

                    }else{
                        alert('Cek Perkembangan hanya sampai 5 tahun / 60 Bulan')
                    }

                 
                } );
            }else{
                return false;
            }
        })

        $(dom.html.showKunjungan).on('click', dom.btn.pilihAnak, function() {
            $(dom.field.no_kunjungan).val($(this).data('no_kunjungan') );
            $(dom.field.nama).val($(this).data('nama'))
            $(dom.field.jk).val($(this).data('jk') )
            $(dom.field.umur).val($(this).data('umur'))
            $(dom.field.no_bpjs).val($(this).data('no_bpjs'))
            $(dom.field.no_kk).val($(this).data('no_kk'))
            ModalAction(dom.modal.listKunjungan, 'hide')
            $(dom.btn.btnHitungGizi).css('display','block')
        })

        $(dom.form.addPertumbuhanAnak).validate(
            {
                rules: {
                    nama_anak: {
                        required: true
                    },
                    jk: {
                        required: true
                    },
                    umur: {
                        required: true
                    },
                    no_bpjs: {
                        required: true
                    },
                    no_kk: {
                        required: true
                    },
                    berat_badan: {
                        required: true
                    },
                    panjang_badan: {
                        required: true
                    },
                    status_gizi: {
                        required: true
                    }
                },
                messages: {
                    nama_anak: {
                        required: 'Nama Anak Tidak Boleh Kosong'
                    },
                    jk: {
                        required: 'Jenis Kelamin Tidak Boleh Kosong'
                    },
                    umur:{
                        required: 'Umur Tidak Boleh Kosong'
                    },
                    no_bpjs: {
                        required: 'No. Bpjs Tidak Boleh Kosong'
                    },
                    no_kk: {
                        required: 'No. KK Tidak Boleh Kosong'
                    },
                    berat_badan: {
                        required: 'Berat Badan Tidak Boleh Kosong'
                    },
                    panjang_badan: {
                        required: 'Panjang Badan Tidak Boleh Kosong'
                    },
                    status_gizi: {
                        required: 'Status Gizi Tidak Boleh Kosong'
                    }
                },
                errorPlacement: function(error,element){
                    error.css('color','red')
                    error.insertAfter(element)
                },
                submitHandler: function(form){
                    
                    postResource(url.add, form , data =>  {
                        var parse = JSON.parse(data);
                        if(parse.code === 200){
                            //show modal untuk melanjutkan ke proses cek imunisasi 
                            UI.getNotif(data);
                            load_cek_pertumbuhan()
                            listKunjungan()
                            $(dom.field.id_target).val(parse.no_kunjungan)
                            ModalAction(dom.modal.modalConfirm, 'show')

                            //load data pertumbuhan 
                        }else{
                            UI.getNotif(data)
                        }
                    });
                }
            }
        )


        $(dom.modal.modalConfirm).on('click', dom.btn.btnFinish, function(){
            const id_target = $(dom.field.id_target).val();
            $(dom.form.addPertumbuhanAnak)[0].reset();
            $.ajax({
                url: url.updateToFinish,
                method: 'post',
                data: {id_target: id_target},
                success: function(data){
                   var parse = JSON.parse(data);
                   if(parse.code === 200) {
                     ModalAction(dom.modal.modalConfirm, 'hide')
                     listKunjungan()
                   }
                }
            })
        })

        $(dom.modal.modalConfirm).on('click', dom.btn.btnNext, () => {
            ModalAction(dom.modal.modalConfirm, 'hide')
            $(dom.form.addPertumbuhanAnak)[0].reset()
        })

        $(dom.field.searchListPertumbuhan).on('keyup', function() {
            if($.trim($(this).val() !== "") ){
                searchListPertumbuhan($(this).val())
            }else{
                load_cek_pertumbuhan()
            }
        })

    }

    
    const listKunjungan = () => getResource(url.listKunjungan, undefined, data => UI.getListKunjungan(data) );
    const searchListKunjungan = (query) => getResource(url.listKunjungan, query, data => UI.getListKunjungan(data) )
    const load_cek_pertumbuhan = () => getResource(url.listCekPertumbuhan, undefined , data => UI.getListPertumbuhan(data) );
    const searchListPertumbuhan = query => getResource(url.listCekPertumbuhan, query , data => UI.getListPertumbuhan(data))


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
                callback(data)
            }
        })
    }
    return {
        init: () => {
            console.log(dom.btn.btnHitungGizi)
            $(dom.btn.btnHitungGizi).css('display','none')
            eventListener()
            listKunjungan()
            load_cek_pertumbuhan()
            $()
        }
    }
})(URLTumbuhAnak, TumbuhAnakInterface)

$(document).ready(function() {
    TumbuhAnakController.init()
})
