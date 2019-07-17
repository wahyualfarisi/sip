var urlDetailKms = (function() {

    var urlString = {
        fetch_detail: BASE_URL+`master/warga/Anak/detail_anak/${PARAMS}`
    }

    return {
        getURL: () => urlString
    }

})()



var detailKMSInterface = (function() {
    const domString = {
       html: {
            showBPJS: '#show__no__bpjs',
            showNama: '#show__nama__anak',
            showKK: '#show__no__kk',
            showJK: '#show__jk',
            showTglLahir: '#show__tgl__lahir',
            showUmur: '#show__umur',
            showKMS: '#show__list__nokms',
            showTglTerdaftar: '#show__list__tgl_terdaftar',
            showPB: '#show__list__panjang__badan',
            showBB: '#show__berat__badan',
            showKunjungan: '#show__kunjungan',
            showImunisasi: '#show__list__imunisasi',
            showPertumbuhan: '#show__list__pertumbuhan'
       },
       btn: {
           clickme: '#btn__clicked'
       }   
    }
    
    const renderDetail = obj => {
        const {no_bpjs:bpjs, nama_anak, no_kk, jk, tgl_lahir, umur} = obj
        const {no_kms, tgl_terdaftar, pb_lahir, bb_lahir} = obj.kms;

        $(domString.html.showBPJS).html(bpjs);
        $(domString.html.showNama).html(nama_anak)
        $(domString.html.showKK).html(no_kk)
        $(domString.html.showJK).html(jk)
        $(domString.html.showTglLahir).html(tgl_lahir)
        $(domString.html.showUmur).html(umur)

        
        $(domString.html.showKMS).html(no_kms)
        $(domString.html.showTglTerdaftar).html(tgl_terdaftar)
        $(domString.html.showPB).html(pb_lahir)
        $(domString.html.showBB).html(bb_lahir)
    }

    const renderKunjungan = object => {
        let html = ''
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr> 
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.no_antri} </td>
                        <td> ${item.status} </td>
                        <td> ${item.imunisasi.no_cek_imunisasi} </td>
                        <td> ${item.imunisasi.nama_imunisasi} </td>
                        <td> ${item.perkembangan.no_cek_pertumbuhan} </td>
                        <td> ${item.perkembangan.bb} </td>
                        <td> ${item.perkembangan.pb} </td>
                        <td> ${item.perkembangan.hasil} </td>
                    </tr>
                `;
            })
        }
        $(domString.html.showKunjungan).html(html)
    }

    const renderImunisasi = object => {
        let html = ''
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr> 
                        <td> ${item.no_cek_imunisasi} </td>
                        <td> ${item.nama_imunisasi} </td>
                        <td> ${item.umur_cek_imunisasi} </td>
                        <td> ${item.tgl_cek_imunisasi} </td>
                        <td> ${item.catatan_imunisasi} </td>
                    </tr>
                `
            })
        }
        $(domString.html.showImunisasi).html(html)
    }

    const renderPertumbuhan = object => {
        let html = ''
        if(object.length > 0){
            object.forEach(item => {
                html += `
                    <tr>
                        <td> ${item.no_cek_pertumbuhan} </td>
                        <td> ${item.umur_cek_pertumbuhan} </td>
                        <td> ${item.tb} </td>
                        <td> ${item.bb} </td>
                        <td> ${item.hasil} </td>
                        <td> ${item.catatan_pertumbuhan} </td>
                    </tr>
                `
            })
        }

        $(domString.html.showPertumbuhan).html(html)
    }


    return {
        getDOM: () => domString,
        retrieveDetail: data => {
            renderDetail(data.detail_anak);
            renderKunjungan(data.kunjungan);
            renderImunisasi(data.imunisasi);
            renderPertumbuhan(data.pertumbuhan);
        }
    }


})()




var detailKMSCOntroller = (function(URL, UI) {
    const ui = UI.getDOM()
    const url = URL.getURL()


    const eventListener = function(){
        $(ui.btn.clickme).on('click', () => {
            alert('clicked')
        })
    }

    
    const load_detail = () => getResource(url.fetch_detail, undefined, data => UI.retrieveDetail(data) );

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

        })
    }



    return {
        init: () => {
            eventListener()
            load_detail()
        }
    }

})(urlDetailKms, detailKMSInterface)


$(document).ready(function() {
    detailKMSCOntroller.init()  
})