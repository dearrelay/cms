myApp.controller('PressModalInstanceCtrl',
     ['$scope', '$uibModalInstance', 'pressRelease', 'allPressList', 'indexRelease',
    function ($scope, $uibModalInstance, pressRelease, allPressList, indexRelease) {

    $scope.pressRelease = pressRelease;
    $scope.allPressList = allPressList;
    
    window.sessionStorage.setItem("indexRelease", indexRelease);

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };
}]);