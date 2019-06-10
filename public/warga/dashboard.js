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
        <p>Kelengkapan data: 50%; </p>
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
                <p>Kelengkapan data: 100%; </p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: ${kelengkapan.progress = 100}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                <i style="color: ${kelengkapan.color = 'green'}">${kelengkapan.text = 'Data Lengkap'}</i>
                <div style="margin-top: 20px;"  >
                    <div class="card" style="width: 33rem; background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);"">
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
                            <div class="card" style="width: 28rem; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); ">
                                <div class="card-body">
                                    <h5 class="card-title">${item.nama_depan} ${item.nama_belakang} </h5>
                                    <a href="#" class="btn btn-default">Jejak Rekam Medis</a>
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




});