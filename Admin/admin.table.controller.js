var app = angular.module("volAssignApp",[]);

    app.controller("tableData",function($scope,$http,$timeout){
	$http.get("travelRecords.php").then(function(response){
		$scope.record = response.data;
	});

	$http.get("volunteerList.php").then(function(res){
		$scope.vRecord = res.data;
	});

	$timeout(function(){
        $('#recordsTable').DataTable();
    }, 100, false); 

	$scope.assignVolunteer = function(){

	var isChecked = $('input[name="personBox"]:checked').length;
	if (isChecked > 0) {
	  $('#volunteenModal').modal('show');
	}
	else{
	  	alert('Please select atleast one person');
	  	return false;
	}

	$scope.personArray = [];
	$scope.personIds = [];
	$scope.time = "";
	$scope.minDate = "";
		angular.forEach($scope.record, function(person){
			  if (person.selected) {				  	
			  	$scope.personArray.push({"id" : person.id, "name" : person.name, "travelDate": person.travelDate});
			  	$scope.personIds.push(person.id);
			  	if(person.travelDate > $scope.time)
			  		$scope.time = person.travelDate;
			  	if((Date.parse(person.travelDate.substring(0,10)) < $scope.minDate) || ($scope.minDate == ""))
			  		$scope.minDate = Date.parse(person.travelDate.substring(0,10));
			  }			  		  	
		});
		if($scope.minDate != Date.parse($scope.time.substring(0,10)))
	 		alert('Warning, you are selecting travelers across different dates');
	}	

	$scope.assigned = function(){
		var vol = document.getElementById('volunteer').value;
		if(vol == 0){
			alert('Please assign a volunteer');
			return false;
		}
		$http.get("updateTraveler.php?volunteerId="+vol+"&travelerIds="+$scope.personIds).success(function(){
	    	alert( "Volunteer assigned succesfully");
	    	location.reload();
		});
	}

});