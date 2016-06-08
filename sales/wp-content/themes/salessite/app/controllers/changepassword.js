myApp.controller('ChangePassword',
    ['$scope','$window','BaseService',
function ($scope, $window, BaseService) {
    // type for password
    $scope.inputTypeConfirmPswd = 'password';
    // default hide password
 $scope.eyeClassNameConfirmPswd = 'fa-eye';
    // type for password
 $scope.inputTypeNewPswd = 'password';
    // default hide password
 $scope.eyeClassNameNewPswd = 'fa-eye';
 //change password 
$scope.Passwordreset=false;
$scope.Passwordfailure=false;
$scope.ExpiredState=false;
$scope.LinkExpired=false;
$scope.url = window.location.href;
var n = $scope.url.indexOf('=');
var token=$scope.url.substring(n+1);
var data = {};
var resetPasswordNewUser = window.sessionStorage.getItem("NewUserReset", null);
BaseService.baseServiceCall('GET', 'Login/GetForgetPassword?id=' + token + '&resetPassword=' + (resetPasswordNewUser !== null ? resetPasswordNewUser : 'N'), data, function (dataResponse)
            {
				$scope.UserDetails=dataResponse;
			
				if($scope.UserDetails.State==='Expired'){
				$scope.LinkExpired=true;
				$scope.ExpiredState=true;
				}
            });
			$scope.CheckErrorNewPassword=function(){
				if ($scope.errorClassNewPswd === 'ae-error-fields')
					{
						$scope.errorClassNewPswd = '';
					}
			}
			$scope.CheckErrorConfirmPassword=function(){
				if ($scope.errorClassConfirmPswd === 'ae-error-fields')
					{
						$scope.errorClassConfirmPswd = '';
					}
			}
			
			$scope.hideShowNewPassword=function(){
				 if ($scope.inputTypeNewPswd === 'password') {
            $scope.inputTypeNewPswd = 'text';
            $scope.eyeClassNameNewPswd = 'fa-eye-slash';
        }
        else {
            $scope.inputTypeNewPswd = 'password';
            $scope.eyeClassNameNewPswd = 'fa-eye';
        }
			}
			$scope.hideShowConfirmPassword=function(){
				 if ($scope.inputTypeConfirmPswd === 'password') {
            $scope.inputTypeConfirmPswd = 'text';
            $scope.eyeClassNameConfirmPswd = 'fa-eye-slash';
        }
        else {
            $scope.inputTypeConfirmPswd = 'password';
            $scope.eyeClassNameConfirmPswd = 'fa-eye';
        }
			}
	$scope.changePassword=function(){
			
			if(($scope.newpassword===undefined && $scope.confirmpassword===undefined) ||($scope.newpassword==="" && $scope.confirmpassword==="") ){
				$scope.errorClassNewPswd = 'ae-error-fields';
				$scope.errorClassConfirmPswd = 'ae-error-fields';
				return;
			}
			if($scope.newpassword===undefined || $scope.newpassword===""){
				$scope.errorClassNewPswd = 'ae-error-fields';
				return;
			}
			if($scope.confirmpassword===undefined || $scope.confirmpassword===""){
				$scope.errorClassConfirmPswd = 'ae-error-fields';
				return;
			}
			if($scope.newpassword===$scope.confirmpassword){
				$scope.errorClassNewPswd = '';
			}else{
			$scope.errorClassNewPswd = 'ae-error-fields';
			$scope.errorClassConfirmPswd ='ae-error-fields';
			return;}
			var data = {
			    "pwdKey": token,
			    "userId": $scope.UserDetails.UserId,
			    "newPassword": $scope.newpassword,
			    "resetPassword": (resetPasswordNewUser !== null ? resetPasswordNewUser : "N")
			}
			
			BaseService.baseServiceCall('POST','Login/ResetForgetPassword',data,function(dataResponse)
            {
			    if (dataResponse) {
			        window.sessionStorage.setItem("NewUserReset", null);
					$scope.Passwordreset=true;
					$scope.Passwordfailure = false;
					window.location.href=url + "/login/";
				}else{
					$scope.Passwordreset=false;
					$scope.Passwordfailure=true;
				};
				if(dataResponse.Message==="An error has occurred."){
					$scope.Passwordreset=false;
					$scope.Passwordfailure=true;
				}
            });
	}		
}]);