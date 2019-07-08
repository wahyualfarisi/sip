console.log('antrian is running');

const URLAntrian = (function() {
    const url = {

    }

    return  {
        getUrl: () => url
    }
})()


const AntrianInterface = (function() {
    const domString = {
        html: {
            clock: '#displayClock'
        }
    }



    const renderClock = (h, m, s) => {
        var html = `<h1 style="font-weight: bold; font-size: 40px; " > ${h} : ${m} : ${s}  </h1>`
        $(domString.html.clock).html(html)
    }


    return {
        displayClock: (hours, minute, second) => renderClock(hours, minute, second)
    }
})()


const AntrianController = (function(UI, URL) {


    const eventListener = function(){
        startTime()


    }

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


    return {
        init: () => {
            eventListener()
            console.log('initalize antrian')
        }
    }
})(AntrianInterface, URLAntrian)


$(document).ready(function() {
    AntrianController.init()
})