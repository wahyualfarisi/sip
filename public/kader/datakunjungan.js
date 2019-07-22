const KunjunganURL = (function() {
    const url = {
        fetch_kunjungan: `${BASE_URL}master/kader/Kunjungan/daftar_kunjungan`
    }

    return {
        getURL: () => url
    }
})()

const DatKunjunganInterface = (function() {
    const domString = {
        field: {
            selectKegiatan: '#select__kegiatan'
        },
        btn: {
            searchKunjungan: '#btn__search_kunjungan'
        },
        html: {
            showDaftarKunjungan: '#show__daftar__kunjungan',
            showNoKunjungan: '.no-kunjungan',
            jumlahKunjungan: '#jumlah__kunjungan',
            showKegiatan: '.showkegiatan'
        }
    }

    const renderDaftarKunjungan = data => {
        console.log(data);
        let html = '';
        if(data.length > 0){
            $(domString.html.showNoKunjungan).css('display','none')
            data.forEach(item => {
                html += `
                    <tr>
                        <td> ${item.no_kunjungan} </td>
                        <td> ${item.no_antri} </td>
                        <td> ${item.tanggal_kunjungan} </td>
                        <td> ${item.no_kms} </td>
                        <td class="bg-warning"> ${item.status} </td>
                        <td> ${item.no_bpjs} </td>
                        <td> ${item.nama_lengkap} </td>
                        <td> ${item.jk} </td>
                        <td> ${item.no_kk} </td>
                        <td> ${item.nama_ibu} </td>
                    </tr>

                `;
            })
        }else{
            html += `Tidak ada data kunjungan`;
        }
        $(domString.html.showDaftarKunjungan).html(html)
    }

    const renderJumlahKunjungan = jumlah => {
        $(domString.html.jumlahKunjungan).html(jumlah)
    }

    const renderKegiatan = data => {
        let html = ''
        if(data.length === 1){
            html += `
                <table class="table table-striped">
                    <tr>
                        <th> No. Kegiatan </th>
                        <td> ${data[0].no_kegiatan} </td>
                    </tr>
                    <tr>
                        <th> Nama Kegiatan </th>
                        <td> ${data[0].nama_kegiatan} </td>
                    </tr>
                    <tr>
                        <th> Tanggal Kegiatan </th>
                        <td> ${data[0].tanggal_kegiatan} </td>
                    </tr>
                    <tr>
                        <th> Lokasi </th>
                        <td> ${data[0].lokasi} </td>
                    </tr>
                </table>
            `;
        }

        $(domString.html.showKegiatan).html(html)
    }

    return {
        getDOM: () => domString,
        retrieveDaftarKunjungan: data => {
            renderDaftarKunjungan(data.data_kunjungan)
            renderJumlahKunjungan(data.jumlah_kunjungan)
            renderKegiatan(data.jadwal_kegiatan)
        }
    }
})()


const DatKunjunganController = (function(URL, UI) {
    const url = URL.getURL()
    const dom = UI.getDOM()

    const eventListener = function(){

        $(dom.btn.searchKunjungan).on('click', function() {
            var value = $(dom.field.selectKegiatan).val()
            if(value !== ""){
                getResource(`${url.fetch_kunjungan}/${value}`, undefined, data => UI.retrieveDaftarKunjungan(data) );
            }else{
                return false;
            }
        })

    }


    

    return {
        init: function(){
            eventListener()
            console.log('initalize app ')

        }
    }
})(KunjunganURL, DatKunjunganInterface)

$(document).ready(function() {
    DatKunjunganController.init()
})