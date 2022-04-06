<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
</head>
<body ng-app='myapp'>

 <div ng-controller="userCtrl">
	
	<input type="text" name="username" ng-model="username"  id="username" >


  <input type='file' name='file' id='file' ng-file='uploadfiles'><br/>
  <input type='button' value='Upload' id='upload' ng-click='upload()' >
  
  <p>{{ response.name }}</p>
 </div>
</body>

<script>
	var upload = angular.module('myapp', []);
 upload.directive('ngFile', ['$parse', function ($parse) {
 return {
  restrict: 'A',
  link: function(scope, element, attrs) {
   element.bind('change', function(){
    
    $parse(attrs.ngFile).assign(scope,element[0].files)
    scope.$apply();
   });
  }
 };
 }]);

upload.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
 
 $scope.upload = function(value){
  var fd=new FormData();

  angular.forEach($scope.uploadfiles,function(file, username){
  fd.append('file',file);
  fd.append('username', username);
 });

 $http({
  method: 'post',
  url: 'upload.php',
  data: fd,
  headers: {'Content-Type': undefined},
 }).then(function successCallback(response) { 
   // Store response data
  $scope.response = response.data;
 });
}
 
}]);

</script>

</html>