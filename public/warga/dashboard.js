console.log('dashboard is running')
console.log(PARSE_STORAGE);


var kelengkapan = {
    progress: 50,
    text: 'Data belum lengkap, silahkan lengkapi kelengkapan data, sebelum melanjutkan',
    color: 'red'
}


function show_kelengkapan()
{
    var html = '';
    html += `
        <p style="color: #fff">Kelengkapan data: 50%; </p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: ${kelengkapan.progress}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        <i style="color: ${kelengkapan.color}">${kelengkapan.text}</i>
    `;
    $('.kelengkapan_data').html(html);
}

function kelengkapan_completed()
{
    $.ajax({
        url: `${BASE_URL}master/warga/Anak/fetch`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            var html = '';
            html += `
                <p class="site-title">Kelengkapan data: 100% </p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: ${kelengkapan.progress = 100}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                <i style="color: ${kelengkapan.color = 'green'}">${kelengkapan.text = 'Data Lengkap'}</i>
                <div style="margin-top: 20px;"  >
                    <div class="card" style="width: 33rem; background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%); padding: 20px;"">
                        <div class="card-body">
                            <h5 class="card-title">${data.length} Anak</h5>
                        </div>
                    </div>
                </div>
            `;
            $('.kelengkapan_data').html(html);
        }
    })
}

function load_anak()
{
    $.ajax({
        url: `${BASE_URL}master/warga/Anak/fetch`,
        method: 'get',
        dataType: 'json',
        success: function(data){
            var html = '';
            if(data.length > 0){
                data.forEach(function(item) {
                    html += `
                        <div class="col-md-6" style="margin-top: 20px;" >
                            <div class="card" style="width: 28rem; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); padding: 20px; ">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama_depan} ${item.nama_belakang}  (${item.jenis_kelamin}) </h5>
                                    <p> ${item.no_bpjs} </p>
                                    <a href="#/detailanak/${item.no_bpjs}" class="btn btn-info">Detail Anak</a>
                                    <button class="btn btn-info btn__edit__anak" 
                                        data-no_bpjs="${item.no_bpjs}"
                                        data-nama_depan="${item.nama_depan}"
                                        data-nama_belakang="${item.nama_belakang}"
                                        data-jk="${item.jenis_kelamin}"
                                        data-tgl_lahir="${item.tgl_lahir}"
                                    > Edit Anak </button>
                                </div>
                            </div>
                        </div>
                    `;
                });

            }
            $('#show-anak').html(html);

        }
    })
}

$(document).ready(function(){
    load_anak();


    if(PARSE_STORAGE){
        show_kelengkapan();
    }else{
        kelengkapan_completed();
        $('.btn-lengkapi-data').css('display','none')
    }
    
    


    if(PARSE_STORAGE){
        $('.placeholderanak').css('display','block');
    }

    $('#btn-tambah-anak').on('click', function(){
        if(PARSE_STORAGE) return $.notify('Silahkan lengkapi data terlebih dahulu ', 'info');
        location.hash = '#/addanak';
    });

    $('#show-anak').on('click', '.btn__edit__anak', function() {
        const no_bpjs = $(this).data('no_bpjs')
        const nama_depan = $(this).data('nama_depan')
        const nama_belakang = $(this).data('nama_belakang')
        const jk = $(this).data('jk')
        const tgl_lahir = $(this).data('tgl_lahir')
        $('#no_bpjs').val(no_bpjs)
        $('#nama_depan').val(nama_depan)
        $('#nama_belakang').val(nama_belakang)
        $('#jenis_kelamin').val(jk)
        $('#tgl_lahir').val(tgl_lahir)
        $('#ModalEditAnak').modal('show')
    })

    $('#form-edit-anak').validate({
        rules:{
            no_bpjs: {
                required: true
            },
            nama_depan:{
                required: true 
            },
            jenis_kelamin: {
                required: true 
            },
            tgl_lahir: {
                required: true 
            }
        },
        messages: {
            no_bpjs: {
                required: 'No BPJS Tidak Boleh Kosong'
            },
            nama_depan: {
                required: 'Nama Depan Tidak Boleh Kosong'
            },
            jenis_kelamin: {
                required: 'Jenis Kelamin Harus Di pilih'
            },
            tgl_lahir: {
                required: 'Tanggal Lahir Tidak Boleh Kosong'
            }
        },
        errorPlacement: function(error, element){
            error.css('color','red')
            error.insertAfter(element)
        },
        submitHandler: function(form){
            $.ajax({
                url: BASE_URL+'master/kader/Anak/update',
                method: 'post',
                data: new FormData(form),
                processData: false,
                contentType: false,
                async: false,
                cache: false,
                success: function(data){
                    var parse = JSON.parse(data)
                    if(parse.code === 200){
                        $.notify(parse.msg, 'success')
                        $('#ModalEditAnak').modal('hide')
                        load_anak()
                    }else{
                        $.notify(arse.msg, 'info')
                    }
                }
            })
        }
    })


    




});