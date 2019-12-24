var app =  angular.module('hotelApp',['ngRoute','ui.bootstrap','ngFileUpload']); 

app.config(['$routeProvider',function($routeProvider,$locationProvider){
	$routeProvider
	.when('/',{
		templateUrl :'../app/View/Home.html'
	})
	.when('/RoomCategory',{
		//controller: '../app/Controller/RoomCategory',
		templateUrl :'../app/View/Room/RoomCategory.php'
	})
	.when('/RoomMaster',{
		//controller: 'RoomCategory',
		templateUrl :'../app/View/Room/RoomView.php'
	})
	.when('/RoomPrice',{
		templateUrl :'../app/View/Room/RoomPrice.php'
	})
	.when('/RoomBooking',{
		templateUrl :'../app/View/Booking/RoomBooking.php'
	})
	.when('/AddRoom/',{
		templateUrl :'../app/View/Booking/AddBooking.php'
	})
	.when('/ComplitedBooking/:flg',{
		templateUrl :'../app/View/Booking/AddBooking.php'
	})
	.when('/editBookind/:bk',{
		templateUrl :'../app/View/Booking/EditBookind.php'
	}).when('/ResturentMasterTable',{
		templateUrl : '../app/view/Resturent/table.php'
	}).when('/ResturentTableBooking',{
		templateUrl : '../app/view/Resturent/tableBooking.php'
	})
	/*.when('/ComplitedBooking',{
		templateUrl :'../app/View/Booking/PaymentBooking.php'
	})*/
}])
app.run(function($rootScope) {
    $rootScope.baseUrl = "http://localhost/Hotel/";
    $rootScope.swal= function(title,text,icon){
	swal({
	              title: title,//'Required Error!',
	              text: text,//'Please provied all field.',
	              icon: icon//'error'
	            }).then(function() {
	            });
}

 $rootScope.paging= function(data){
	
}


});
