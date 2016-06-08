myApp.controller('GalleryModalInstanceCtrl',
    ['$scope', '$uibModalInstance', 'ImageURL', 'gallary', 'indexImage',
    function ($scope, $uibModalInstance, ImageURL, gallary, indexImage) {

    $scope.ImageURL = ImageURL;
    $scope.gallary = gallary;
    $scope.indexImage = indexImage;
    window.sessionStorage.setItem("imageIndex", indexImage);
    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
}]);