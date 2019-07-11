const DatKunjungan = (function() {
    const url = {

    }

    return {
        getURL: () => url
    }
})()

const DatKunjunganInterface = (function() {
    const domString = {

    }

    return {
        getDOM: () => domString
    }
})()


const DatKunjunganController = (function() {


    const eventListener = function(){


    }

    return {
        init: function(){
            eventListener()
            console.log('initalize app ')

        }
    }
})()

$(document).ready(function() {
    DatKunjunganController.init()
})