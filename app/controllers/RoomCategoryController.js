/*app.controller('RoomCategoryController', function($scope,$http,$rootScope){
	$scope.init = function(){
		
	$scope.curPage = 1,
	$scope.itemsPerPage = 10,
	$scope.maxSize = 5;
	$http.get($rootScope.baseUrl+'Room/getCategoryDetails')
	  .then(function(response) {
	    $scope.CategoryDetails = response.data;
	    $scope.numOfPages = function () {
		    return Math.ceil($scope.CategoryDetails.length / $scope.itemsPerPage);
		  };
		    $scope.$watch('curPage + numPerPage', function() {
		    var begin = (($scope.curPage - 1) * $scope.itemsPerPage),
		    end = begin + $scope.itemsPerPage;
		    $scope.CategoryDetailss = $scope.CategoryDetails.slice(begin, end);
		  });
	  });
	}
	$scope.roomCategory ={};
	$scope.addEditflag=false;
	
	$scope.editRoomCat = function(rm){
		$scope.roomCategory = rm;
		$scope.addEditflag=false;
	} 

	$scope.addRoomCat = function(){
		$scope.roomCategory ={};
		$scope.addEditflag=true;
	}
	$scope.saveRoomCat =function(){

	if($scope.RoomcatValidation($scope.roomCategory)){
		return false;
	}
		
	$http.post($rootScope.baseUrl+'Room/saveRoomCat',$scope.roomCategory)
	  .then(function(response) {
	    if(response.data==1){
	    	document.getElementById('closed').click();
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
	
	$scope.RoomcatValidation = function (roomCategory){
		if(roomCategory==undefined || roomCategory.name == undefined || 
	roomCategory.description == undefined || roomCategory.week_days_price == undefined || roomCategory.weekend_price== undefined 
	|| roomCategory.room_id == undefined || roomCategory.name == "" || 
	roomCategory.description == "" || roomCategory.week_days_price == "" || roomCategory.weekend_price== "" || roomCategory.room_id == ""
	){
	    	swal({
	              title: 'Required Error!',
	              text: 'Please provied all field.',
	              icon: 'error'
	            }).then(function() {
	            });
				return true;
	}
	}
	
	$scope.updateRoomCat =function(){
		
	if($scope.RoomcatValidation($scope.roomCategory)){
		return false;
	}
		
	$http.post($rootScope.baseUrl+'Room/updateRoomCat',$scope.roomCategory)
	  .then(function(response) {
	    if(response.data==1){
	    	document.getElementById('closed').click();
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

	$scope.deleteRoomCat =function(){
		
		swal({
	          title: "Are you sure you want to delete this?",
	          text: "You will not be able to recover!",
	          icon: "warning",
	          buttons: [
	            'No, cancel it!',
	            'Yes, I am sure!'
	          ],
	          dangerMode: true,
	        }).then(function(isConfirm) {
	          if (isConfirm) {
	        	  $http.post($rootScope.baseUrl+'Room/deleteRoomCat',$scope.roomCategory)
	        	  .then(function(response) {
	        	    if(response.data==1){
	        	    	document.getElementById('closed').click();
	        	    	swal({
	      	              title: 'Delete!',
	      	              text: 'Delete Succesfully.',
	      	              icon: 'success'
	      	            }).then(function() {
		        			$scope.init();
	      	            });
	        		}
	        	  });
	          } else {
	            swal("Cancelled", "Not Delete)", "error");
	          }
	        });
	}
});
*/

define(['app'], function (app) {
	alert("HI ");

    var injectParams = [];

    var RoomCategoryController = function () {

    };

    AboutController.$inject = injectParams;

    app.register.controller('RoomCategoryController', RoomCategoryController);

});