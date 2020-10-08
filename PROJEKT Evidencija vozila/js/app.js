var oApp = angular.module("Myapp", []);


oApp.controller("brZaduzivanja", function($scope,$http){
      //tijelo kontrolera
	$scope.oData=[];
	$http({
		method: "GET",
		url: "display.php"
	}).then(function(response){
		$scope.oData = response.data;
		console.log(1);
	}, function(response){
		console.log("Pogreska");
	});
});

oApp.controller("Prosjekzaduzivanja", function($scope,$http){
	//tijelo kontrolera
	$scope.oData1=[];
	$http({
		method: "GET",
		url: "display1.php"
	}).then(function(response){
		$scope.oData1 = response.data;
		console.log(1);
	}, function(response){
		console.log("Pogreska");
	});
});



