$('#perPage').change(function () {
    $(this).closest('form').submit();
});

$(document).ready(function(){
    
    $('.notifications-list').easyTicker({
        direction: 'up',
        easing: 'swing',
        speed: 'slow',
        interval: 4000,
        height: '80px',
        visible: 3,
        mousePause: true,
        controls: {
            up: '',
            down: '',
            toggle: '',
            playText: 'Play',
            stopText: 'Stop'
        },
        callbacks: {
            before: false,
            after: false
        }
    });

});