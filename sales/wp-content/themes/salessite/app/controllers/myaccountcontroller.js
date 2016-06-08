myApp.controller('MyAccountController',
    ['$scope', '$location', 'MyDetailsService',
function ($scope, $location, MyDetailsService) {
    // default hide password
    $scope.eyeClassNameConfirmPswd = 'fa-eye';
    // type for password
    $scope.inputTypeConfirmPswd = 'password';
    // type for password
    $scope.inputTypeNewPswd = 'password';
    // default hide password
    $scope.eyeClassNameNewPswd = 'fa-eye';
    // type for password
    $scope.inputTypeCurrentPswd = 'password';
    // default hide password
    $scope.eyeClassNameCurrentPswd = 'fa-eye';
 
    $scope.ChangePwdSuccess = false;
    $scope.ChangePwdFailed = false;
    $scope.Details = '';
    var inputForGetDetails =
    {
        "userId": usrid
    }
    $scope.CheckErrorCurrentPassword = function () {
        if ($scope.currentpassword === 'ae-error-fields') {
            $scope.currentpassword = '';
        }
    }
    $scope.CheckErrorNewPassword = function () {
        if ($scope.newpassword === 'ae-error-fields') {
            $scope.newpassword = '';
        }
    }
    $scope.CheckErrorConfirmPassword = function () {
        if ($scope.confirmpassword === 'ae-error-fields') {
            $scope.confirmpassword = '';
        }
    }
    // Hide & show password function
    $scope.hideShowConfirmPassword = function () {
        if ($scope.inputTypeConfirmPswd === 'password') {
            $scope.inputTypeConfirmPswd = 'text';
            $scope.eyeClassNameConfirmPswd = 'fa-eye-slash';
        }
        else {
            $scope.inputTypeConfirmPswd = 'password';
            $scope.eyeClassNameConfirmPswd = 'fa-eye';
        }

    };
    $scope.hideShowNewPassword = function () {
        if ($scope.inputTypeNewPswd === 'password') {
            $scope.inputTypeNewPswd = 'text';
            $scope.eyeClassNameNewPswd = 'fa-eye-slash';
        }
        else {
            $scope.inputTypeNewPswd = 'password';
            $scope.eyeClassNameNewPswd = 'fa-eye';
        }
    }
    $scope.hideShowCurrentPassword = function () {
        if ($scope.inputTypeCurrentPswd === 'password') {
            $scope.inputTypeCurrentPswd = 'text';
            $scope.eyeClassNameCurrentPswd = 'fa-eye-slash';
        }
        else {
            $scope.inputTypeCurrentPswd = 'password';
            $scope.eyeClassNameCurrentPswd = 'fa-eye';
        }
    }
    function init() {
        MyDetailsService.getMyAccountDetails(inputForGetDetails, function (dataResponse) {

            $scope.AccountDetailsJson = dataResponse;

        });
    }
    $scope.UpdatePasword = function (user) {
        
        if (user === undefined && $scope.ConfirmPassword === undefined) {
            $scope.currentpassword = 'ae-error-fields';
            $scope.newpassword = 'ae-error-fields';
            $scope.confirmpassword = 'ae-error-fields';
            return;
        }
		if ((user.CurrentPassword === user.NewPassword) && (user.CurrentPassword!=="" && user.NewPassword!=="")) {
            $scope.newpassword = 'ae-error-fields';
            $scope.currentpassword = 'ae-error-fields';
         
            $scope.ChangePwdSuccess = false;
            $scope.ChangePwdFailed = true;
            $scope.invalidUserMessage = "New password should not be same as current password."
            return;
        }
        
        if (user.CurrentPassword === "" && user.NewPassword === "" && $scope.ConfirmPassword === "") {
            $scope.currentpassword = 'ae-error-fields';
            $scope.newpassword = 'ae-error-fields';
            $scope.confirmpassword = 'ae-error-fields';
            return;
        }

        if ($scope.user.CurrentPassword === "" || $scope.user.CurrentPassword === undefined) {
            $scope.currentpassword = 'ae-error-fields';
        }
        if ($scope.user.NewPassword === "" || $scope.user.NewPassword === undefined) {
            $scope.newpassword = 'ae-error-fields';
        }
        if ($scope.ConfirmPassword === "" || $scope.ConfirmPassword === undefined) {
            $scope.confirmpassword = 'ae-error-fields';
        }
	if (($scope.user.NewPassword === "" && $scope.ConfirmPassword === "") || ($scope.user.NewPassword === undefined && $scope.ConfirmPassword === undefined)) {
			$scope.ChangePwdSuccess = false;
            $scope.ChangePwdFailed = false;
            $scope.newpassword = 'ae-error-fields';
            $scope.confirmpassword = 'ae-error-fields';
            return;
        }
        if ($scope.user.NewPassword === $scope.ConfirmPassword) {
            $scope.newpassword = '';
            $scope.confirmpassword = '';
        } else {
            $scope.ChangePwdSuccess = false;
            $scope.ChangePwdFailed = false;
            $scope.newpassword = 'ae-error-fields';
            $scope.confirmpassword = 'ae-error-fields';
            return;
        }
        user.UserId = usrid;
        var data = {
            "CurrentPassword": $scope.user.CurrentPassword,
            "NewPassword": $scope.user.NewPassword,
            "UserId": usrid
        }
        MyDetailsService.UpdatePassowrd(data, function (dataResponse) {
       
            $scope.ChangePwdSuccess = false;
            $scope.ChangePwdFailed = false;
            if (dataResponse) {
                $scope.user = '';
                $scope.ConfirmPassword = '';
                $scope.ChangePwdSuccess = true;
                $scope.ChangePwdFailed = false;
                $scope.successUserMessage = "Password Updated";
            } else {
                $scope.currentpassword = 'ae-error-fields';
                $scope.ChangePwdSuccess = false;
                $scope.ChangePwdFailed = true;
                $scope.invalidUserMessage = "Password Update Failed. Please Try Again";
            }
            if (dataResponse === "") {
                $scope.ChangePwdSuccess = false;
                $scope.ChangePwdFailed = true;
                $scope.invalidUserMessage = "Password Update Failed. Please Try Again";
            }
        });
    }
   
    init();
}]);
