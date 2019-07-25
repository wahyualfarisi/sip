
const URLDashboard = (function() {
    const uri = {
        fetch_total: BASE_URL+'master/Dashboard/fetch_total',
        fetch_kunjungan: BASE_URL+'master/Dashboard/kunjungan_hari_ini',
        fetch_total_perkunjungan: BASE_URL+'master/Dashboard/kunjungan_per_tgl_kegiatan'
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
            showListKunjungan: '#show__list__kunjungan',
            lineChart: '#basiclinechart'
        }
    }

    const renderTotal = (total) => {
        $(domString.html.totalKunjungan).html(total.kunjungan)
        $(domString.html.totalWarga).html(total.warga)
        $(domString.html.totalKMS).html(total.kms)
        $(domString.html.totalJadwal).html(total.jadwal)
    }

    const renderKunjungan = data => {
        let html = ''
        if(data.length > 0){
            data.forEach(item => {
                html += `
                    <tr>
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.no_antri} </td>
                        <td> ${item.no_kms} </td>
                        <td> ${item.no_bpjs} </td>
                        <td> ${item.nama_anak} </td>
                    </tr>
                
                `;
            })
        }else{
            html += `
                    <h4> Tidak Ada Kunjungan </h4>
            `;
        }
        $(domString.html.showListKunjungan).html(html)
    }

    const renderLineChart = data => {
        var storeLabel = [];

        if(data.length > 0 ){

            data.forEach(item => {
                storeLabel.push(item.tanggal_kegiatan)
            })
            console.log(storeLabel)

            
        }

        
    }

    return {
        getDOM: () => domString,
        getTotal: (data) => renderTotal(data),
        retrieveKunjungan: data => renderKunjungan(data),
        retrieveTotalKunjungan: data => renderLineChart(data)
    }
})()


const DashboardController = (function(URL, UI) {
    const DOM = UI.getDOM()
    const url = URL.getURL()

    const eventListener = function(){

    }

    const load_total = () => getResource(url.fetch_total, undefined, data => UI.getTotal(data) );


    const load_kunjungan_hari_ini = () => getResource(url.fetch_kunjungan, undefined, data => UI.retrieveKunjungan(data) )

    const load_total_perkunjungan = () => getResource(url.fetch_total_perkunjungan, undefined , data => UI.retrieveTotalKunjungan(data) );

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
            load_kunjungan_hari_ini()
            
            console.log('initalize app ss')

        }
    }
})(URLDashboard, DashboardInterface)

$(document).ready(function() {
    DashboardController.init();
})