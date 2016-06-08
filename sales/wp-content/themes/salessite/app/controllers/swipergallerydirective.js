
myApp.directive('swipergallerydirective', ['SwiperService', function (SwiperService) {
    return {
        link: function ($scope, elm) {
            elm.addClass('swiperBrowseGallery');
            var imageIndex = parseInt(window.sessionStorage.getItem("imageIndex", null));
            var swiper = SwiperService.GetBrowseGallerySlides('.swiperBrowseGallery', imageIndex);
        }
    }
}]);