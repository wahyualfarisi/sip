
const URLDashboard = (function() {
    const uri = {
        fetch_total: BASE_URL+'master/Dashboard/fetch_total',
        fetch_pertumbuhan: BASE_URL+'master/kader/TumbuhAnak/fetch_list',
        fetch_imunisasi: BASE_URL+'master/kader/Cekimunisasi/getimunisasi'
    }


    return {
        getURL: () => uri
    }
})()


const DashboardInterface = (function() {
    const domString = {
        html: {
            totalKunjungan: '#total__kunjungan',
            totalWarga: '#total__warga',
            totalKMS: '#total__kms',
            totalJadwal: '#total__jadwal__kegiatan',
            totalImunisasi: '#total__imunisasi',
            totalPertumbuhan: '#total__pertumbuhan',
            showListPertumbuhan: '#show__list__pertumbuhan',  
            showListImunisasi: '#show__list__imunisasi'
        },
        field: {
            searchPertumbuhan: '#search__pertumbuhan',
            searchImunisasi: '#search__imunisasi'
        }
    }

    const renderTotal = (total) => {
        $(domString.html.totalKunjungan).html(total.kunjungan)
        $(domString.html.totalWarga).html(total.warga)
        $(domString.html.totalKMS).html(total.kms)
        $(domString.html.totalJadwal).html(total.jadwal)
        $(domString.html.totalImunisasi).html(total.imunisasi)
        $(domString.html.totalPertumbuhan).html(total.pertumbuhan)
    }

    renderPertumbuhan = data => {
        let html = '', no = 1
        if(data.length > 0){
            console.log(data);
            data.forEach(item => {
                html += `
                    <tr>
                        <td> ${no++} </td>
                        <td> ${item.no_cek_pertumbuhan} </td>
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.umur} </td>
                        <td> ${item.tb} </td>
                        <td> ${item.bb} </td>
                        <td> ${item.hasil} </td>
                        <td> ${item.catatan} </td>
                    </tr>
                `;
            })
        }
        $(domString.html.showListPertumbuhan).html(html)
    }

    const renderImunisasi = data => {
        let html = '', no = 1
        if(data.length > 0){
            console.log(data)
            data.forEach(item => {
                html += `
                    <tr> 
                        <td> ${no++} </td>
                        <td> ${item.no_cek_imunisasi} </td>
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.umur} </td>
                        <td> ${item.nama_imunisasi} </td>
                        <td> ${item.tgl_cek_imunisasi} </td>
                        <td> ${item.catatan} </td>
                    </tr>

                `;
            })
        }
        $(domString.html.showListImunisasi).html(html)
    }

    return {
        getDOM: () => domString,
        getTotal: (data) => renderTotal(data),
        retrieveDataPertumbuhan: data => renderPertumbuhan(data),
        retrieveDataImunisasi: data => renderImunisasi(data)
    }
})()


const DashboardController = (function(URL, UI) {
    const DOM = UI.getDOM()
    const url = URL.getURL()

    const eventListener = function(){

        $(DOM.field.searchPertumbuhan).on('keyup', function() {
            var value = $(this).val();
            if($.trim(value) !== ""){
                getResource(url.fetch_pertumbuhan, value, data => UI.retrieveDataPertumbuhan(data) )
            }else{
                load_tumbuh_anak()
            }
        })

        $(DOM.field.searchImunisasi).on('keyup', function() {
            var value = $(this).val()
            if($.trim(value) !== ""){
                getResource(url.fetch_imunisasi, value , data => UI.retrieveDataImunisasi(data) )
            }else{
                load_imunisasi()
            }
        })


    }

    const load_total = () => getResource(url.fetch_total, undefined, data => UI.getTotal(data) );

    const load_tumbuh_anak = () => getResource(url.fetch_pertumbuhan, undefined, data => UI.retrieveDataPertumbuhan(data) );

    const load_imunisasi = () => getResource(url.fetch_imunisasi, undefined, data => UI.retrieveDataImunisasi(data) );



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

    return {
        init: function(){
            eventListener() 
            load_total()
            load_tumbuh_anak()
            load_imunisasi()
            console.log('initalize app ss')

        }
    }
})(URLDashboard, DashboardInterface)

$(document).ready(function() {
    DashboardController.init();
})