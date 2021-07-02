let sliderElement = document.querySelector('.element__slider');
if (sliderElement) {
    let options = {
        wrapAround: true,
        prevNextButtons: false,
        imagesLoaded: true,
        fullscreen: true
    };
    var flkty = new Flickity(sliderElement, options);
}

// This allows flickity fullscreen to pinchzoom
// https://github.com/metafizzy/flickity-fullscreen/issues/20
Flickity.prototype._touchActionValue = "pan-y pinch-zoom";