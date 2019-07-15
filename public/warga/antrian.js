const urlAntrian = (function() {
    const urlString = {
        fetch_jadwal_kegiatan: BASE_URL+'master/kader/Kunjungan/fetch_jadwal_kegiatan',
        fetch_total_kunjungan: BASE_URL+'master/warga/Antrian/total_kunjungan',
        fetch_anak: BASE_URL+'master/warga/Anak/get_anak',
        addAntrian: BASE_URL+'master/kader/Kunjungan/addAntrian',
        fetch_antrian: BASE_URL+'master/warga/Antrian/fetch_antrian',
        batalAntri: BASE_URL+'master/warga/Antrian/batal_antri'
    }

    return {
        getUrl: () => urlString
    }
})()


const antrianInterface = (function() {
    const domString = {
        html: {
            showJadwal: '#show__jadwal__kegiatan',
            showListAnak: '#show__list__anak',
            showListAntrian: '#show__list__antrian'
        },
        btn: {
            btnShowModal: '.btn__show__modal__antri',
            btnPilihAnak: '.btn__pilih__anak',
            btnBatalAntri: '.btn__batal__antri'
        },
        modal: {
            antrian: '#ModalAddAntrian'
        }
    }

    const renderJadwal = (data) => {
       let html = ''
       data.forEach(item => {
           localStorage.setItem('no_kegiatan', item.no_kegiatan)
            html += `
             <div>
                <div class="card" style="padding: 30px;">
                    <h3> ${item.nama_kegiatan} </h3>
                    <p> ${item.lokasi} </p>
                </div>

                <div style="margin-top: 30px;">
                      <button class="btn btn-info btn-block btn__show__modal__antri" > Ambil No. Antri </button>
                </div>
            </div>
            `;
       })
       $(domString.html.showJadwal).html(html)
    }

    const renderEmpty = () => {
        let html = '';
        html += `
            <div class="text-center">
                <img src="${BASE_URL}assets/img/no_activity.svg" alt="no-activity" />
                <h4> Tidak Ada Jadwal Kegiatan </h4>
            </div>
        `;
        $(domString.html.showJadwal).html(html)
    }

    const renderOnModal = data => {
        let html = ''
        if(data.length > 0){
            data.forEach(item => {
                html += `
                    <tr>
                        <td> ${item.no_kms} </td>
                        <td> ${item.no_bpjs} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.jenis_kelamin} </td>
                        <td> <button class="btn btn-warning btn__pilih__anak" data-no_kms="${item.no_kms}" > Pilih </button> </td>
                    </tr>
                `
            })
        }
        $(domString.html.showListAnak).html(html)
    }

    const renderListAntrian = data => {
        let html = ''
        if(data.length > 0){
            data.forEach(item => {
                    html += `
                        <tr>
                            <td> ${item.no_antri} </td>
                            <td> ${item.no_kunjungan} </td>
                            <td> ${item.nama_anak} </td>
                            <td> ${item.umur} </td>
                            <td> ${item.jk} </td>
                            <td> <button class="btn btn-danger btn-sm btn__batal__antri" data-no_kunjungan="${item.no_kunjungan}" > Batal </button> </td>
                        </tr>
                    `
            })
        }else{
            html = ''
        }
        $(domString.html.showListAntrian).html(html)

    }

    return {
        getDOM: () => domString,
        getJadwal: obj => obj.length === 1 ? renderJadwal(obj) : renderEmpty(),
        getAnak: data => renderOnModal(data),
        getListAntrian: data => renderListAntrian(data)
    }
})()


const antrianController = (function(URL, UI) {
    const dom = UI.getDOM()
    const url = URL.getUrl()


    const eventListener = function(){

        $(dom.html.showJadwal).on('click', dom.btn.btnShowModal, function() {
            getResource(url.fetch_anak, undefined, data => UI.getAnak(data))
            ModalAction(dom.modal.antrian,'show')
        })

        $(dom.html.showListAnak).on('click', dom.btn.btnPilihAnak, function() {
            const no_kms      = $(this).data('no_kms')
            const no_kegiatan = localStorage.getItem('no_kegiatan');
            $.ajax({
                url: url.addAntrian,
                method: 'post',
                data: {targetID:no_kms, no_kegiatan: no_kegiatan},
                dataType: 'json',
                success: function(data){
                    if(data.code === 200){
                        $.notify(data.msg, 'success')
                        ModalAction(dom.modal.antrian,'hide')
                        load_list_antrian()
                    }else{
                        $.notify(data.msg, 'info')
                    }
                }
            })
        })

        $(dom.html.showListAntrian).on('click', dom.btn.btnBatalAntri, function() {
            const no_kunjungan = $(this).data('no_kunjungan');
            $.ajax({
                url: url.batalAntri,
                method: 'post',
                data: {no_kunjungan: no_kunjungan},
                dataType: 'json',
                success: function(data){
                    if(data.code === 200){
                        $.notify(data.msg, 'success')
                        load_list_antrian()
                    }else{
                        $.notify(data.msg, 'info')
                    }
                }
            })
        })




    }

    
    const load_jadwal_kegiatan = () => getResource(url.fetch_jadwal_kegiatan, undefined, data => UI.getJadwal(data) );
    const load_total_kunjungan = () => getResource(url.fetch_total_kunjungan, undefined, data => console.log(data) );
    const load_list_antrian = () => getResource(url.fetch_antrian, undefined, data => UI.getListAntrian(data) );


    const getResource = (url, query, callback) => {
        $.ajax({
            url,
            method: 'post',
            data: {query, query},
            dataType: 'json',
            success: function(data){
                callback(data)
            }
        })
    }
    const ModalAction = (modalName, method) => $(modalName).modal(method)

    return {
        init: () => {
            eventListener()
            load_jadwal_kegiatan()
            load_total_kunjungan()
            load_list_antrian()
            console.log('initilize app ')
        }
    }

})(urlAntrian, antrianInterface)


$(document).ready(function() {
    antrianController.init()
})



