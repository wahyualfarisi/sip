console.log('antrian is running');

const URLAntrian = (function() {
    const url = {
        fetch_antrian: BASE_URL+`master/kader/Kunjungan/fetch_antrian/${ID}`,
        fetch_total_antrian: BASE_URL+`master/kader/Kunjungan/get_total_status/antri/${ID}`,
        fetch_total_terlewat: BASE_URL+`master/kader/Kunjungan/get_total_status/terlewat/${ID}`,
        fetch_total_selesai : BASE_URL+`master/kader/Kunjungan/get_total_status/selesai/${ID}`,
        fetch_total_proses: BASE_URL+`master/kader/Kunjungan/get_total_status/proses/${ID}`,
        fetch_total_kunjungan: BASE_URL+`master/kader/Kunjungan/get_total_kunjungan/${ID}`,
        fetch_monitor_antrian: BASE_URL+`master/kader/Kunjungan/fetch_monitor_antri/${ID}`,
        fetch_no_antri_current: BASE_URL+`master/kader/Kunjungan/fetch_no_urut_current/${ID}`,
        fetch_chart: BASE_URL+`master/kader/Kunjungan/chart_antrian/${ID}`,
        nextAntrian: BASE_URL+`master/kader/Kunjungan/action_next_antrian`,
        skipAntrian: BASE_URL+`master/kader/Kunjungan/action_skip_antrian`
    }

    return  {
        getUrl: () => url
    }
})()


const AntrianInterface = (function() {
    const domString = {
        html: {
            clock: '#displayClock',
            daftar_antrian: '#show__daftar__kunjungan',
            totalSelesai: '#total__antrian__selesai',
            totalTerlewat: '#total__antrian__terlewat',
            totalKunjungan: '#total_kunjungan',
            totalAntrian: '#dalam_antrian',
            totalProses: '#total__antrian__proses',
            piechart: '#piechart'
        },
        form: {
            formNext: '#form-next-antri',
            formSkip: '#form-skip-antri'
        },
        btn: {
            antrian: '.btn__antrian'
        },
        modal: {
            modalNext: '#modalNextAntrian',
            modalSkip: '#modalSkipAntrian'
        }
    }



    const renderClock = (h, m, s) => {
        var html = `<h1 style="font-weight: bold; font-size: 40px; " > ${h} : ${m} : ${s}  </h1>`
        $(domString.html.clock).html(html)
    }

    const renderListAntrian = object => {
       let html = '', color = '';
       if(object.length > 0){
           object.forEach(item => {
               if(item.status === 'antri'){
                    color = `<button class="btn btn-success"> ${item.status} </button>`;
               }else if(item.status === 'terlewat'){
                   color  = `<button class="btn btn-default"> ${item.status} </button>`;
               }else if(item.status === 'proses'){
                   color = `<button class="btn btn-danger"> ${item.status} </button>`;
               }else if(item.status === 'selesai'){
                   color = `<button class="btn btn-info"> ${item.status} </button>`;
               }
               html += `
                    <tr>
                        <td>${item.no_kunjungan} </td>
                        <td>${item.no_antri} </td>
                        <td>${item.no_kms}</td>
                        <td>${item.no_bpjs}</td>
                        <td>${item.nama_lengkap} </td>
                        <td>${item.bb_lahir}</td>
                        <td>${item.pb_lahir}</td>
                        <td>${item.jk}</td>
                        <td>${color} </td>
                    </tr>
               `;
           })
       }
       $(domString.html.daftar_antrian).html(html)
    }

    const renderMonitor = (data) => {
        if(data.length === 1){
            data.forEach(item => {
                $('#status_antrian').html(item.status)
                $('#no_antri_monitor').html(item.no_antri)
                $('#no_kunjungan_monitor').html(item.no_kunjungan)
                $('.no_kunjungan').val(item.no_kunjungan)
                $('#no_kk_monitor').html(item.no_kk)
                $('#no_bpjs_monitor').html(item.no_bpjs)
                $('#no_kms_monitor').html(item.no_kms)
                $('#nama_anak_monitor').html(item.nama_lengkap)
                $('#jk_monitor').html(item.jk)
            })
        }else{
            $('#status_antrian').html('----')
            $('#no_antri_monitor').html('----')
            $('#no_kunjungan_monitor').html('----')
            $('.no_kunjungan').val('')
            $('#no_kk_monitor').html('----')
            $('#no_bpjs_monitor').html('----')
            $('#no_kms_monitor').html('----')
            $('#nama_anak_monitor').html('----')
            $('#jk_monitor').html('----')
        }
    }

    const renderChart = (data) => {
        var ctx = document.getElementById("piechart");
        if(data.length > 0){
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [ "Dalam Antrian", "Dalam Proses", "Antrian Terlewat", "Selesai"],
                    datasets: [{
                        label: 'pie Chart',
                        backgroundColor: [
                            'rgb(124,252,0)',
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            '#03a9f4',
                        ],
                        data: [data[0].totalantri, data[0].totalproses, data[0].totalterlewat, data[0].totalselesai]
                    }]
                },
                options: {
                    responsive: true
                }
              });
        }
        
        console.log(data)
    }

    const renderNotif = (data) => {
        var parse = JSON.parse(data);
        if(parse.code !== 200) return mynotifications('info','top right', parse.msg)
        mynotifications('success','top right', parse.msg)
    }

    return {
        getDOM: () => domString,
        Notif: (data) => renderNotif(data),
        displayClock: (hours, minute, second) => renderClock(hours, minute, second),
        getListAntrian: (object) => renderListAntrian(object),
        getTotalAntrian: (data) => $(domString.html.totalAntrian).html(data),
        getTotalSelesai: (data) => $(domString.html.totalSelesai).html(data),
        getTotalTerlewat: (data) => $(domString.html.totalTerlewat).html(data),
        getTotalProses: (data) => $(domString.html.totalProses).html(data),
        getTotalKunjungan: (data) => $(domString.html.totalKunjungan).html(data),
        getMonitorAntri: (data) => renderMonitor(data),
        getCurrentNoAntri: (data) => data.length > 0 ? $('#no_antri_current').html(data[0].no_antri) : $('#no_antri_current').html('-'),
        getChart: (data) => renderChart(data)
    }
})()


const AntrianController = (function(UI, URL) {
    const URI = URL.getUrl();
    const DOM = UI.getDOM();

    const eventListener = () => {
        startTime()
        
        $(DOM.btn.antrian).on('click', function() {
            var type = $(this).data('type');
            if(type === 'next'){
                ModalAction(DOM.modal.modalNext, 'show')
            }else if(type === 'skip'){
                ModalAction(DOM.modal.modalSkip, 'show')
            }
        })

        $(DOM.form.formNext).on('submit', function(e) {
            e.preventDefault()
            var no_kunjungan = $('.no_kunjungan').val();
            if(no_kunjungan === '') {
                mynotifications('info','top right', 'Tidak Ada Data Antrian')
                ModalAction(DOM.modal.modalNext, 'hide')
            }else{
                postResource(URI.nextAntrian, this, data => {
                    UI.Notif(data)
                    ModalAction(DOM.modal.modalNext, 'hide')
                    load_antrian()
                    load_total_antrian()
                    load_total_selesai()
                    load_total_terlewat()
                    load_total_proses()
                    load_total_kunjungan()
                    load_monitor_antri()
                    load_no_antri_current()
                    load_chart_antri()
                });
            }
           
        })


        $(DOM.form.formSkip).on('submit', function(e) {
            e.preventDefault();
            var no_kunjungan = $('.no_kunjungan').val();
            console.log(no_kunjungan)
            if(no_kunjungan === '') {
                mynotifications('info','top right', 'Tidak Ada Data Antrian')
                ModalAction(DOM.modal.modalSkip, 'hide')
            }else{
                postResource(URI.skipAntrian, this, data => {
                    UI.Notif(data)
                    ModalAction(DOM.modal.modalSkip, 'hide')
                    load_antrian()
                    load_total_antrian()
                    load_total_selesai()
                    load_total_terlewat()
                    load_total_proses()
                    load_total_kunjungan()
                    load_monitor_antri()
                    load_no_antri_current()
                    load_chart_antri()
                });
            }

            
        })

    }

  
    /**
     * 
     * load all 
     */    
    const load_total_antrian = () => getResource(URI.fetch_total_antrian, undefined, data => UI.getTotalAntrian(data) );
    const load_total_selesai = () => getResource(URI.fetch_total_selesai, undefined, data => UI.getTotalSelesai(data) )
    const load_total_terlewat = () => getResource(URI.fetch_total_terlewat, undefined, data => UI.getTotalTerlewat(data) )
    const load_total_proses = () => getResource(URI.fetch_total_proses, undefined, data => UI.getTotalProses(data) );

    const load_total_kunjungan = () => getResource(URI.fetch_total_kunjungan, undefined, data => UI.getTotalKunjungan(data) );

    const load_monitor_antri = () => getResource(URI.fetch_monitor_antrian, undefined, data => UI.getMonitorAntri(data) );
    const load_no_antri_current = () => getResource(URI.fetch_no_antri_current, undefined, data => UI.getCurrentNoAntri(data) );

    /**
     * Chart  
     */
     const load_chart_antri = () => getResource(URI.fetch_chart, undefined , data => UI.getChart(data) );
    

    /**
     * 
     * load all list data kunjungan
     */
    const load_antrian = () => getResource(URI.fetch_antrian, undefined, data => UI.getListAntrian(data) );

    const startTime  = () => {
        let today = new Date();
        let h = today.getHours()
        let m = today.getMinutes()
        let s = today.getSeconds()
        m = checkTime(m)
        s = checkTime(s)
        UI.displayClock(h, m , s)
        setTimeout(startTime, 500);
    }

    const checkTime = (i) => {
        if(i < 10 ){
            i = "0" + i
        }
        return i;
    }

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

    const ModalAction = (modalName, method) => {
        $(modalName).modal(method)
    }

    return {
        init: () => {
            eventListener()
            load_antrian()
            load_total_antrian()
            load_total_selesai()
            load_total_terlewat()
            load_total_proses()
            load_total_kunjungan()
            load_monitor_antri()
            load_no_antri_current()
            load_chart_antri()
            console.log('initalize antrian')

          
            
        }
    }
})(AntrianInterface, URLAntrian)


$(document).ready(function() {
    AntrianController.init()
})