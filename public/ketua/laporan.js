(function() {
    "use strict"

    const laporanURL = (function() {
        const urlString = {
            getLaporan: `${BASE_URL}master/Laporan/create_laporan`
        }
        return {
            getURL: () => urlString
        }
    })()


    const LaporanInterface = (function() {
        const domString = {
            field: {
                dariTgl: '#dari_tgl',
                sampTgl: '#sampai_tgl',
                Jenis: '#jenis_laporan'
            },
            form: {
                search_laporan: '#form-search-laporan'
            },
            html: {
                wrapperReport: '#wrapper-report',
                showListImunisasi: '#show__list__imunisasi',
                showListPertumbuhan: '#show__list__pertumbuhan',
                tableImunisasi: '#table-imunisasi',
                tablePertumbuhan: '#table-pertumbuhan',
                showBtnPrint: '#show__btn__print'
            },
            btn: {
                print: '#btn__print__area'
            }
        }

        const renderLaporan = (data, jenis ) => {
            let html = '';
            console.log(jenis)
            if(jenis === 'imunisasi'){
                
                if(data.length > 0){
                    $(domString.html.showBtnPrint).css('display','block')
                    $(domString.html.wrapperReport).css('display','block')
                    $(domString.html.tableImunisasi).css('display','block')
                    $(domString.html.tablePertumbuhan).css('display','none')


                    data.forEach(item => {
                        html += `
                            <tr>
                                <td> ${item.no_cek_imunisasi} </td>
                                <td> ${item.no_kunjungan} </td>
                                <td> ${item.no_kms} </td>
                                <td> ${item.nama_anak} </td>
                                <td> ${item.jk} </td>
                                <td> ${item.umur_current_imunisasi} </td>
                                <td> ${item.no_kk} </td>
                                <td> ${item.nama_ibu} </td>
                                <td> ${item.nama_kegiatan} </td>
                                <td> ${item.nama_imunisasi} </td>
                                <td> ${item.tgl_cek_imunisasi} </td>
                                <td> ${item.status} </td>
                                <td> ${item.catatan} </td>
                            </tr>

                        `;
                    })
                    $(domString.html.showListImunisasi).html(html)


                }else{
                    $(domString.html.wrapperReport).css('display','none')    
                }
            }else{
                if(data.length > 0){
                    $(domString.html.showBtnPrint).css('display','block')
                    $(domString.html.wrapperReport).css('display','block')
                    $(domString.html.tableImunisasi).css('display','none')
                    $(domString.html.tablePertumbuhan).css('display','block')

                    data.forEach(item => {
                        console.log(item)
                        html += `
                            <tr>
                                <td> ${item.no_cek_pertumbuhan} </td>
                                <td> ${item.no_kunjungan} </td>
                                <td> ${item.no_kms} </td>
                                <td> ${item.nama_lengkap} </td>
                                <td> ${item.jk} </td>
                                <td> ${item.umur_current_pertumbuhan} </td>
                                <td> ${item.tb} </td>
                                <td> ${item.bb} </td>
                                <td> ${item.hasil} </td>
                                <td> ${item.catatan} </td>
                                <td> ${item.tgl_cek_pertumbuhan} </td>
                                <td> ${item.status} </td>
                            </tr>
                        
                        `;
                    })
                    $(domString.html.showListPertumbuhan).html(html)
                }
            }
            

            if(data.length > 0){
                console.log(data)
                $(domString.html.wrapperReport).css('display','block')
            }else{
                $(domString.html.wrapperReport).css('display','none')
            }
        }

        return {
            getDOM: () => domString,
            retrieveLaporan: (data, jenis ) => renderLaporan(data, jenis)
        }
    })()


    const LaporanController = (function(URL, UI) {


        const dom = UI.getDOM()
        const url = URL.getURL()
        
        const eventListener = function(){
            $(dom.html.wrapperReport).css('display','none')
            $(dom.html.showBtnPrint).css('display','none')

            $(dom.form.search_laporan).on('submit', function(e) {
                e.preventDefault()
        
                if( $(dom.field.dariTgl).val() !== "" && $(dom.field.sampTgl).val() !== "" && $(dom.field.Jenis).val() !== "" ){
                    postDATA(url.getLaporan, this, data => UI.retrieveLaporan(JSON.parse(data), $(dom.field.Jenis).val() ) );
                }else{
                    return false;
                }
            })

            $(dom.btn.print).on('click', function() {
                var mode = 'iframe';
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                }
                $(dom.html.wrapperReport).printArea(options)
            })

        }


        return {
            init: () => {
                console.log('init ')
                eventListener()
            }
        }
    })(laporanURL, LaporanInterface)

    LaporanController.init()


})()