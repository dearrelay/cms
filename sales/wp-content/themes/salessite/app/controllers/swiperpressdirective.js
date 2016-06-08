myApp.directive('swiperpressdirective', ['SwiperService', function (SwiperService) {
    return {
        link: function ($scope, elm) {

            elm.addClass('pressSwiper');
           var indexRelease = parseInt(window.sessionStorage.getItem("indexRelease", null));
           var swiper = SwiperService.GetPressSwiperSlides('.pressSwiper', '-press', indexRelease);
	   
        }
    }
}]);