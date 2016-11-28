	var app = angular.module("volAssignedApp",[])

	app.controller("tableData",function($http,$scope,$timeout){

	$http.get("volunteerAssigned.php").then(function(response){
		$scope.record = response.data;
	});
	
	$timeout(function(){
        $('#recordsTable').DataTable();
    }, 100, false); 


	});