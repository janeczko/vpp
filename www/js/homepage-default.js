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

function galleryAnimate(time) {
    setInterval(function() {
        $('#gallery-block .gallery .uk-slidenav-next').trigger('click');
    }, time * 1000);
}

$(function() {

    var imageViewsGallery = $('.image-views-gallery');
    var selectedView = 1;
    var maxView = parseInt(imageViewsGallery.attr('data-view-maxcount'));

    function changeImageView(left) {
        var originalView = selectedView;

        if (left) {
           if (selectedView > 1) {
               selectedView--;
           }
        }
        else {
            if (selectedView < maxView) {
                selectedView++;
            }
        }

        imageViewsGallery.find('.view-' + originalView).addClass('display-none');
        imageViewsGallery.find('.view-' + selectedView).removeClass('display-none');
    }

    imageViewsGallery.find('.image-changer .left').click(function() {
        changeImageView(true);
    });

    imageViewsGallery.find('.image-changer .right').click(function() {
        changeImageView(false);
    });

    if (window.innerWidth >= 768) {
        //balloonsAnimate(animationTimeHorizontal, animationTimeVertical);
    }

    if (window.location.hash) {
        changeMenuActive();
    }

    galleryAnimate(animationTimeGallery);

});