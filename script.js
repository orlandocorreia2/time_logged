(function ($) {
    //Salva apenas quando estiver fechando o navegador
     $(window).bind('beforeunload', function() {
        saveTimeLogged();
     });

     function saveTimeLogged() {
         $.ajax({
             url:'add-time-logged.php',
             dataType:'get',
             data:{time_logged:localStorage.time_logged}
         });
     }

//-----------------------------------------------------------------------------------------------
    var timer;

    function startCounting(){
        // timerStart = Date.now();
        timer = setInterval(function(){
            var logged = $('#logged'),
                min = (parseInt(localStorage.time_logged) > 0) ? ' minutos' : ' minuto';
            localStorage.time_logged++;
            logged.html(localStorage.time_logged + min);
        },1000);
    }
    startCounting();

    /* ---------- Stop the timer when the window/tab is inactive ---------- */

    var stopCountingWhenWindowIsInactive = true;

    if( stopCountingWhenWindowIsInactive ){

        if( typeof document.hidden !== "undefined" ){
            var hidden = "hidden",
                visibilityChange = "visibilitychange",
                visibilityState = "visibilityState";
        }else if ( typeof document.msHidden !== "undefined" ){
            var hidden = "msHidden",
                visibilityChange = "msvisibilitychange",
                visibilityState = "msVisibilityState";
        }
        var documentIsHidden = document[hidden];

        document.addEventListener(visibilityChange, function() {
            if(documentIsHidden != document[hidden]) {
                if( document[hidden] ){
                    // Window is inactive
                    clearInterval(timer);
                }else{
                    // Window is active
                    startCounting();
                }
                documentIsHidden = document[hidden];
            }
        });
    }
})(jQuery);