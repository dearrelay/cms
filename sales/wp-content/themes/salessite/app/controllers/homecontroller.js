myApp.controller('HomeController',
    ['$rootScope','$scope', '$location','$window','AuthenticationServices','$uibModal','BaseService','DraftWatchlistService','SwiperService',
function ($rootScope,$scope, $location,$window,AuthenticationServices,$uibModal,BaseService,DraftWatchlistService,SwiperService) {
$scope.showPopup=false;
$scope.EmailSent=false;
$scope.EmailFailure=false;
$scope.EmailWrong = false;
$scope.isEmailSent=false;
$('#draftListId').hide();


$scope.getDraftWatchlists1 = function(){    
    var dat = {
        "userID" : usrid
    };
    BaseService.baseServiceCall('POST','WatchList/GetDraftWatchListItems',dat,function(Response){
        $scope.DraftWatchlistItems=[];
        if(Response && Response.SeriesDetail) {
            $scope.DraftWatchlistItems=Response.SeriesDetail;
            $scope.DraftWatchlistId=Response.WatchListID;

            setTimeout(function() {
                DraftWatchlistService.UpdateWatchListItems(Response.SeriesDetail);
            }, 500);
        } else {
            window.sessionStorage.setItem("seasonIdsArray","");
            $('#draftListId').hide();
        }
	});
}
  $scope.userDetails = {};
    $scope.errorMessage = {};
    $scope.modalDisplay = false;
    $scope.loginSuccess = false;
    $scope.loginSubmit = false;
    $scope.displaySigninPopup = true;
	$scope.modelData ={};
	$scope.showPopup = false;
    // type for password
	$scope.inputType = 'password';
    // default hide password
    $scope.eyeClassName = 'fa-eye';
    $scope.errorClassEmail = '';
    //no error class initially
    $scope.errorClassPassword = '';
    $scope.invalidUserMessage = '';
    $scope.IsInValid = false;
    $scope.IsInValidLoginPage = false;
    if (window.sessionStorage.getItem("sessionExpired")) {
        sessionStorage.clear();
        $scope.invalidUserMessage = 'Your session has expired. Please login again.';
        $scope.IsInValidLoginPage = true;
        $('#errorMessage').show();
    }
	$('#overlayLoader').hide();
	$('#overlayLoader-signinmodal').hide();
	$('#overlayLoader-signincatalog').hide();
       $scope.validateForm = function (modelData,type) {
	   
	   if(type==='signin'){
			$('#overlayLoader').show();
			$('#overlayLoader-signinmodal').hide();
			$('#overlayLoader-signincatalog').hide();
	   }else if(type==='signincatalog'){
			$('#overlayLoader').hide();
			$('#overlayLoader-signinmodal').hide();
			$('#overlayLoader-signincatalog').show();
	   }else if(type==='signinmodal'){
			$('#overlayLoader').hide();
			$('#overlayLoader-signinmodal').show();
			$('#overlayLoader-signincatalog').hide();
	   }
		
        $scope.loginSubmit = true;
        if (modelData.userName && modelData.password && true) {
            $scope.errorClassEmail = '';
            $scope.errorClassPassword = '';

            var dataModel = {
                'UserName': modelData.userName,
                'Password': modelData.password
            };
            BaseService.baseServiceCall('POST', 'login/LogOn', dataModel, function (dataResponse) {
                if (dataResponse.IsUserValid) {
                    if (dataResponse.ResetPassword === 'N') {
                        var dataToWP = {
                            'dataModel': dataResponse,
                            'Password': modelData.password
                        }
                        AuthenticationServices.Login(dataToWP, function (response) {
                          
                            if (response.isvaliduser === 1) {
                                $scope.loginSuccess = true;
                                $scope.error = '';
                                $scope.user = response.UserName;
                                $window.location = url + '/';
                                $('#scriptedLink').addClass('active');
                                $scope.getDraftWatchlists1();

                            } else {
                              
                                $('#errorMessage').show();
                                $scope.IsInValid = true;
                                $scope.IsInValidLoginPage = true;
                                $scope.dataLoading = false;
                                $scope.invalidUserMessage = 'An error occurred. Please try again.'
                                $scope.errorClassEmail = 'ae-error-fields';
                                $scope.errorClassPassword = 'ae-error-fields';
                                $('#overlayLoader').hide();
                                $('#overlayLoader-signinmodal').hide();
                                $('#overlayLoader-signincatalog').hide();
                            }

                        }), function (error) {
                           
                            $scope.errorClassEmail = 'ae-error-fields';
                            $scope.errorClassPassword = 'ae-error-fields';
                            $scope.IsValid = false;
                        }
                    } else if (dataResponse.ResetPassword === 'Y') {
                        var token = dataResponse.TokenDetail.AuthToken;
                        window.sessionStorage.setItem("NewUserReset", "Y");
                        //redirect to change password page for 1st time login user
                        $window.location = url + '/change-password/?id=' + token;
                    }
                } else {
                   
                    $('#errorMessage').show();
                    $scope.IsInValid = true;
                    $scope.IsInValidLoginPage = true;
                    $scope.dataLoading = false;
                    $scope.invalidUserMessage = 'The email or password you entered is incorrect.'
                    $scope.errorClassEmail = 'ae-error-fields';
                    $scope.errorClassPassword = 'ae-error-fields';
                    $('#overlayLoader').hide();
                    $('#overlayLoader-signinmodal').hide();
                    $('#overlayLoader-signincatalog').hide();
                }
            });
			
			
        } else {
			$('#overlayLoader').hide();
			$('#overlayLoader-signinmodal').hide();
			$('#overlayLoader-signincatalog').hide();
            if (!modelData.userName) {
                $scope.errorClassEmail = 'ae-error-fields';
            }
            if (!modelData.password) {
                $scope.errorClassPassword = 'ae-error-fields';
            }
			
        };

        function validateEmail(email) {
            var emailReg = /^([\w-\.']+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test(email);
        }
    }
   $scope.showPopupForSignin=function(){
   $scope.showPopup=!$scope.showPopup;
   $('#test').show();
   }
    $scope.signout = function () {
		  AuthenticationServices.Logout(function (response) {
		      if (response === true) {
		          sessionStorage.clear();
				$window.location= url + '/';
			}
		  });
    }

    // Hide & show password function
    $scope.hideShowPassword = function () {
        if ($scope.inputType === 'password') {
            $scope.inputType = 'text';
            $scope.eyeClassName = 'fa-eye-slash';
        }
        else {
            $scope.inputType = 'password';
            $scope.eyeClassName = 'fa-eye';
        }

    };

    $scope.CheckErrorClassEmail = function () {
        $scope.invalidUserMessage = '';
        if ($scope.errorClassEmail === 'ae-error-fields')
        {
            $scope.errorClassEmail = '';
        }
    }

    $scope.CheckErrorClassPassword = function () {
        $scope.invalidUserMessage = '';
        if ($scope.errorClassPassword === 'ae-error-fields') {
            $scope.errorClassPassword = '';
        }
    }

	$scope.ShowDraftWatchlists=function(){
		    var modalInstance = $uibModal.open({
		        templateUrl: 'WatchListModalContentForDraft.html',
		        controller: 'ModalInstanceCtrlForWatchlist',
		        scope:$scope
		    });

		   modalInstance.rendered.then(function (selectedItem) {
		        $scope.selected = selectedItem;
            
		    }, function () {
		        
		    });
	}
		
	$scope.AddToWatchlist = function(pplid,itemType){
        $scope.AddButton=pplid;
        var plusId = '.' +pplid+ 'plus';
        var minusId = '.' + pplid + 'minus';
        if (itemType.toLowerCase() === "episodes")
        {
            itemType = "piece";
        } else if (itemType.toLowerCase() === "seasons")
        {
            itemType = "season";
        }
        if(window.sessionStorage.getItem("seasonIdsArray") !== null && window.sessionStorage.getItem("seasonIdsArray") !== "") {
            var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
            if(tempseasonIdsArray.indexOf(pplid.toString()) > -1) {
                var dat = {
                    "UserID":usrid,
                    "ItemID":pplid,
                    "ItemType":itemType.toLowerCase(),
                    "WatchListID":$scope.DraftWatchlistId
                };
                BaseService.baseServiceCall('POST','WatchList/DeleteItemsFromWatchList',dat,function(dataResponse)
                {
                    $scope.DraftWatchlistItems=[];
                    if(dataResponse && dataResponse.SeriesDetail) {
                        $scope.DraftWatchlistItems=dataResponse.SeriesDetail;
                        $scope.DraftWatchlistId=dataResponse.WatchListID;
                        $(plusId).show();
                        $(minusId).hide();

                        setTimeout(function () {
                            if (itemType === 'piece') {
                                $("span[id$='episode']").each(function () {
                                    if ($(this).attr('id') === pplid + 'episode') {
                                        $(this).addClass('addlist-btn').removeClass('removelist-btn');
                                        $(this).text("Add Episode to watchlists");
                                    }
                                })
                                $('#' + pplid + 'banner').addClass('addlist-btn').removeClass('removelist-btn');
                                $('#' + pplid + 'banner').text("Add to watchlists");
                            }
                            DraftWatchlistService.UpdateWatchListItems(dataResponse.SeriesDetail);
                        }, 500);
                    } else {
                        window.sessionStorage.setItem("seasonIdsArray","");
                        $('#draftListId').hide();
                    }
                });
            } else {
                addtoWatchList(usrid,pplid,itemType);
            }
        } else {
            addtoWatchList(usrid,pplid,itemType);
        }
    }
    var addtoWatchList = function(usrid,pplid,itemType){
        var plusId = '.' +pplid+ 'plus';
        var minusId = '.' + pplid + 'minus';
        var dat = {
            "UserID":usrid,
            "ItemID":pplid,
            "ItemType":itemType.toLowerCase(),
            "WatchListID":0
        };
        BaseService.baseServiceCall('POST','WatchList/AddItemToWatchList',dat,function(dataResponse) {
            if(dataResponse!=0){
                $scope.DraftWatchlistItems=[];
                $scope.DraftWatchlistItems=dataResponse.SeriesDetail;
                $scope.DraftWatchlistId=dataResponse.WatchListID;
                $(plusId).hide();
                $(minusId).show();
                
                if (itemType==='piece') {
                    var styleofItem = $(minusId).css('display');
                    if (styleofItem !== 'inline') {
                        $("span[id$='episode']").addClass('removelist-btn').removeClass('addlist-btn');
                        $("span[id$='episode']").text("Remove Episode from watchlists");
                    }
                }
                $scope.hideAddButton = true;
                $(".addlist-circle").addClass("circle-animation");
                $('#selectionId').show();
                $('#readytoAddId').hide();
                setTimeout(function() {
                    $(".addlist-circle").removeClass("circle-animation");
                }, 1400);
                setTimeout(function () {
                    $('#selectionId').hide();
                    $('#readytoAddId').show();
                }, 4000);
                if(window.sessionStorage.getItem("seasonIdsArray") !== "" && window.sessionStorage.getItem("seasonIdsArray") !== null) {     
                    var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                    if(tempseasonIdsArray.indexOf(pplid.toString()) === -1) {
                        window.sessionStorage.setItem("seasonIdsArray", window.sessionStorage.getItem("seasonIdsArray")+','+pplid);
                    }
                }
                else {
                    window.sessionStorage.setItem("seasonIdsArray",pplid.toString());
                }

                if(itemType.toLowerCase()==='season'){
                    if(window.sessionStorage.getItem("episodesArray") !== null && window.sessionStorage.getItem("episodesArray") !== "") {
						var episodesArray = window.sessionStorage.getItem("episodesArray").split(",");
						for(var i=0;i<episodesArray.length;i++) {
                            var tempseasonIdsArray = window.sessionStorage.getItem("seasonIdsArray").split(",");
                            if(tempseasonIdsArray.indexOf(episodesArray[i].toString()) === -1) {
                                window.sessionStorage.setItem("seasonIdsArray", window.sessionStorage.getItem("seasonIdsArray")+','+episodesArray[i]);
                            }
						}
					}	
                }
                $('#draftListId').show();
            }
        });
    }
	if($('.swiperDetailHomeStats').length>0)	
	{
	var swiper5 =  SwiperService.GetStatisticsSwiperSlides('.swiperDetailHomeStats', '-stat');
				}
	$scope.forgotPassword= function(){
	window.location.href=url + "/forgotpassword/";
	}
	$scope.SendEmail=function(){
					$scope.EmailSent=false;
					$scope.EmailFailure=false;
                    $scope.EmailWrong = false;
					$scope.isEmailSent=true;
	 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var res= emailReg.test($scope.emailAddress);
			if(res===false || $scope.emailAddress==="")
			{
			$scope.errorClassEmail = 'ae-error-fields';
			}
			else{
			if($scope.emailAddress.indexOf("@aetvn.com")===-1 && $scope.emailAddress.indexOf("@aenetworks.com")===-1)
			{
                $scope.EmailFailure=false;
                $scope.EmailWrong = false;
				var dat = {
                "BaseUrl":url,
                "UserEmail":$scope.emailAddress  
                };
            BaseService.baseServiceCall('POST','Login/ForgetPassword',dat,function(dataResponse)
            {
                if (dataResponse === null) {
                    $scope.EmailSent = false;
                    $scope.EmailInvalid = false;
                    $scope.EmailFailure = true;
                    $scope.EmailWrong = false;
                    $scope.isEmailSent = false;
                } else {
                    if (dataResponse) {
                        $scope.EmailSent = true;
                        $scope.isEmailSent = true;
                        $scope.EmailInvalid = false;
                    } else {
                        $scope.EmailSent = false;
                        $scope.EmailInvalid = true;
                        $scope.EmailFailure = false;
                        $scope.EmailWrong = false;
                        $scope.isEmailSent = false;
                    }

                    if (dataResponse.Message === "An error has occurred.") {
                        $scope.EmailSent = false;
                        $scope.EmailFailure = true;
                        $scope.EmailInvalid = false;
                        $scope.EmailWrong = false;
                        $scope.isEmailSent = false;
                    }
                }
				
            });
			}
			else
			{
			$scope.errorClassEmail = 'ae-error-fields';
            $scope.EmailWrong = true;
			}
			}
	
	}

	$scope.$watch("emailAddress", function(newValue, oldValue) {
		if($scope.isEmailSent){
			if(newValue!=oldValue){
				$scope.isEmailSent=false;
			}
		}
	})
}]);
