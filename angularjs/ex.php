<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>
<body ng-app="exm" >

<div  ng-controller="exm_cont">
	
	<form name="frm" method="POST" novalidate=""  ng-submit="insertData()" >
			<input type="text" name="username" required="" ng-model="postDetails.username" >
			<span class="text-danger" ng-show="errorFirstname">{{errorFirstname}}</span>

			<input type="file" name="userphoto" ng-model="postDetails.userphoto" >
			<span class="text-danger" ng-show="errorPhoto">{{errorPhoto}}</span>
			<input type="submit" name="btnsubmit" >
	</form>

 	 
</div>

<script>
var application = angular.module("exm", []);
application.controller("exm_cont", function($scope, $http){
 $scope.postDetails = {};
  $scope.insertData = function(){
  $http({
   method:"POST",
   url:"insertdata.php",
   data:$scope.postDetails,
  }).success(function(data){
  	alert(data);
   if(data.error)
   {
    $scope.errorFirstname = data.error.post_title;
    $scope.errorPhoto = data.error.userphotoerror;
    $scope.successInsert = null;
   }
   else
   {

    $scope.postDetails = null;
    $scope.errorPhoto = null; $scope.errorFirstname = null;
    
    $scope.successInsert = data.message;
   }
  });
 }

 

});
</script>

</body>
</html>