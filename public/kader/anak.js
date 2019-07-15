const urlAnak = (() => {
    const urlString = {

    }

    return {
        getURL: () => urlString
    }
})()


const anakInterface = (() => {
    const domString = {

    }


    return {
        getDOM: () => domString
    }
})()


const anakController = (function(URL, UI) {
    const url = URL.getURL()
    const ui  = UI.getDOM()
    const eventListener = function(){

    }

    return {
        init: () => {
            eventListener()
            console.log('initlize app')
        }
    }

})(urlAnak, anakInterface)

$(document).ready(function() {
    anakController.init()
})