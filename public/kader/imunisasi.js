const UrlImunisasi = (function() {
    const urlString = {
        listKunjungan: BASE_URL+'master/kader/TumbuhAnak/ListKunjunganOnCheckout'
    }

    return {
        getURL: () => urlString
    }
})()


const imunisasiInterface = (function() {
    const domString = {
        modal: {
            listKunjungan: '#modalListKunjungan'
        },
        html: {
            showKunjungan: '#show__list__kunjungan'
        },
        btn: {
            showList: '#btn__show__list',
            pilihAnak: '.btn__pilih__anak'
        },
        field: {
            searchKunjungan: '#search__kunjungan',
            no_kunjungan: '#no_kunjungan',
            nama: '#nama_anak',
            jk: '#jk',
            umur: '#umur',
            no_bpjs: '#no_bpjs',
            no_kk: '#no_kk'
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

    return {
        getDOM: () => domString,
        getListKunjungan: (data) => renderOnModal(data)
    }
})()


const imunisasiController = (function(URL, UI) {
    const url = URL.getURL()
    const dom  = UI.getDOM();

    const eventListener = function(){
        $(dom.btn.showList).on('click', () => ModalAction(dom.modal.listKunjungan, 'show') )
    }

    const listKunjungan = () => getResource(url.listKunjungan, undefined, data => UI.getListKunjungan(data) );


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

    return {
        init: () => {
            console.log('initialize imunisasi')
            listKunjungan()
            eventListener()
        }
    }
})(UrlImunisasi, imunisasiInterface)

$(document).ready(function() {
    imunisasiController.init()
})