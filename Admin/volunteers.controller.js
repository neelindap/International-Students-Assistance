var app = angular.module("volunteerApp",["xeditable"]);

 app.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; // bootstrap3 theme.
	});

 app.controller("volTableData",function($scope,$http,$timeout){
	$http.get("volunteerList.php").then(function(res){
		$scope.vRecord = res.data;
	});

  $scope.saveVolunteer = function(volData,volId) {
    $http.post('volunteerSave.php?name='+volData.name+'&email='+encodeURIComponent(volData.email)+'&phone='
    	+encodeURIComponent(volData.phone)+'&id='+volId).error(function(err) {
      if(err.field && err.msg) {
        $scope.editableForm.$setError(err.field, err.msg);
      } else { 
        $scope.editableForm.$setError('name', 'Unknown error!');
      }
    });
  };	

  // remove Volunteer
  $scope.removeVolunteer = function(volId,index) {
  	if(confirm("Are you sure you want to delete this entry?")){
	  	$http.post('volunteerRemove.php?id='+volId).success(function(){
	    	$scope.vRecord.splice(index, 1);
	    });  
  	}
  };

  // add Volunteer
  $scope.addVolunteer = function() {
    $scope.inserted = {
      id: $scope.vRecord.length+1,
      name: '',
      email: null,
      phone: null 
    };
    $scope.vRecord.push($scope.inserted);
  };

});