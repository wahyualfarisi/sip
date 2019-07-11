
    const postDATA = (url, form, callback) => {
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
    
    const ModalAction = (modalName, method) => $(modalName).modal(method)

