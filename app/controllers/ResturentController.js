app.controller('ResturentController', function(dataFactory,$scope,$http,$rootScope,$routeParams){

		$scope.init = function(){
		$scope.curPage = 1,
		$scope.itemsPerPage = 10,
		$scope.maxSize = 5;
		$http.get($rootScope.baseUrl+'Resturent/getResturentTableDetails')
		  .then(function(response) {
	    $scope.tableDetails = response.data;
	    $scope.numOfPages = function () {
		    return Math.ceil($scope.tableDetails.length / $scope.itemsPerPage);
		  };
		    $scope.$watch('curPage + numPerPage', function() {
		    var begin = (($scope.curPage - 1) * $scope.itemsPerPage),
		    end = begin + $scope.itemsPerPage;
		    $scope.tableDetails = $scope.tableDetails.slice(begin, end);
		  });
	 	 
		  });

		  $scope.editTableDetails = function (){

		  }
		  $scope.addEditObject ={};
		  $scope.addEditflag=false;
		  $scope.addTable = function(){
		  	$scope.addEditObject ={};
			$scope.addEditflag=true;
		  }

		  $scope.saveTable = function(){
		  	/*if($scope.RoomValidation($scope.addEditObject)){
				return false;
			}*/
		$http.post($rootScope.baseUrl+'Resturent/saveTable',$scope.addEditObject)
	  			.then(function(response) {
	    if(response.data=="true"){
	    	document.getElementById('resturentTable').click();
	    	swal({
	              title: 'Save!',
	              text: 'Saved Succesfully.',
	              icon: 'success'
	            }).then(function() {
	    			$scope.init();
	            });
				}
	  		});
		  }

		  $scope.editTableDetails = function(obj){
		  	$scope.addEditObject = obj;
		  	$scope.addEditflag=false;
		  }

		  $scope.updateTable = function(){
		/*if($scope.RoomValidation($scope.editObject)){
			return false;
		}*/
	$http.post($rootScope.baseUrl+'Resturent/updateTable',$scope.addEditObject)
	  .then(function(response) {
	    if(response.data=="true"){
			document.getElementById('resturentTable').click();
			swal({
	              title: 'Update!',
	              text: 'Update Succesfully.',
	              icon: 'success'
	            }).then(function() {
	    			$scope.init();
	            });
		}
	  });
}


		/*$http.get($rootScope.baseUrl+'Room/getCategoryDetails')
	  		.then(function(response) {
	   			 $scope.CategoryDetails = response.data;
	  		});*/
	}

});

//ResturentTableBookingController 
app.controller('ResturentTableBookingController',function(dataFactory,$scope,$http,$rootScope,$routeParams){

		$scope.init = function(){
			
		}

});