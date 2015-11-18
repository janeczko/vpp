function balloonsAnimate(horizontalTime, verticalTime) {
    var onLeft = false;
    var onTop = false;
    var item = $('#logo-block .balloons');

    var pos = {
        left: '55px',
        right: (window.innerWidth - 230) + 'px',
        top: '20px',
        bottom: ($('#logo-block').height() - 220) + 'px'
    };

    item.css('left', pos.right);
    item.css('top', pos.bottom);

    setInterval(function() {
        if (onLeft) {
            item.css('left', pos.right);
            onLeft = false;
        }
        else {
            item.css('left', pos.left);
            onLeft = true;
        }
    }, horizontalTime * 1000);

    setInterval(function() {
        if (onTop) {
            item.css('top', pos.bottom);
            onTop = false;
        }
        else {
            item.css('top', pos.top);
            onTop = true;
        }
    }, (verticalTime == undefined ? horizontalTime : verticalTime) * 1000);
}

$(function() {

    balloonsAnimate(animationTimeHorizontal, animationTimeVertical);

});