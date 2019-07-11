
const URLDashboard = (function() {
    const uri = {
        fetch_total: BASE_URL+'master/Dashboard/fetch_total',
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
            totalJadwal: '#total__jadwal__kegiatan'
        }
    }

    const renderTotal = (total) => {
        $(domString.html.totalKunjungan).html(total.kunjungan)
        $(domString.html.totalWarga).html(total.warga)
        $(domString.html.totalKMS).html(total.kms)
        $(domString.html.totalJadwal).html(total.jadwal)
    }

    return {
        getDOM: () => domString,
        getTotal: (data) => renderTotal(data)
    }
})()


const DashboardController = (function(URL, UI) {
    const DOM = UI.getDOM()
    const url = URL.getURL()

    const eventListener = function(){

    }

    const load_total = () => getResource(url.fetch_total, undefined, data => UI.getTotal(data) );

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
            console.log('initalize app ss')

        }
    }
})(URLDashboard, DashboardInterface)

$(document).ready(function() {
    DashboardController.init();
})