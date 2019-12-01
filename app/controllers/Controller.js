

app.controller('RoomController', function(dataFactory,$scope,$http,$rootScope,$routeParams){
	
	
	$scope.init = function(){
	$http.get($rootScope.baseUrl+'Room/getRoomDetails')
		  .then(function(response) {
		    $scope.roomDetails = response.data;
		  });
	$http.get($rootScope.baseUrl+'Room/getCategoryDetails')
	  .then(function(response) {
	    $scope.CategoryDetails = response.data;
	  });
	}
	$scope.editObject ={};
	$scope.addEditflag=false;
	$scope.addRoom = function(){
		$scope.editObject ={};
		$scope.addEditflag=true;
	}
	$scope.RoomValidation = function (roomObject){
		
	if(roomObject==undefined || roomObject.room_number == undefined || 
	   roomObject.categoryId == undefined  || roomObject.room_number == "" || roomObject.categoryId == "" ){
	    	swal({
	              title: 'Required Error!',
	              text: 'Please provied all field.',
	              icon: 'error'
	            }).then(function() {
	            });
				return true;
	}
	}
	
	
	$scope.saveRoom =function(){
		if($scope.RoomValidation($scope.editObject)){
			return false;
		}
	$http.post($rootScope.baseUrl+'Room/saveRoom',$scope.editObject)
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
	
	$scope.updateRoom =function(){
		if($scope.RoomValidation($scope.editObject)){
			return false;
		}
	$http.post($rootScope.baseUrl+'Room/updateRoom',$scope.editObject)
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

	$scope.deleteRoom =function(){
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
      	  $http.post($rootScope.baseUrl+'Room/deleteRoom',$scope.editObject)
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
	
	$scope.editRoom = function(rm){
		$scope.editObject = rm;
		$scope.addEditflag=false;
	}   
});


app.controller('RoomCategoryController', function($scope,$http,$rootScope){
	$scope.init = function(){
		
		$scope.curPage = 1,
		  $scope.itemsPerPage = 10,
		  $scope.maxSize = 5;
		//this.items = $scope.CategoryDetails;
		//$scope.CategoryDetails =[];
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
		    
	   // $scope.CategoryDetailss = $scope.CategoryDetails;
	  });
	
	  
	    
	  // 
	  
	  
	  
	
	
	
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
	
	/*$scope.checkProperties =function (obj) {
	var count =0;
    for (var key in obj) {
        if (obj[key] !== null && obj[key] != ""){
			count++;
		}
    }
	if(Object.keys(obj).length == count){
		return true;
	}else{
	return false;
	}
	}*/
	
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



app.controller('RoomPriceController', function($scope,$http,$rootScope){
	$scope.init = function(){
	$http.get($rootScope.baseUrl+'Room/getCategoryDetails')
	  .then(function(response) {
	    $scope.CategoryDetails = response.data;
	  });
	
	$http.get($rootScope.baseUrl+'Room/getPriceDetails')
	  .then(function(response) {
	    $scope.getPriceDetails = response.data;
	  });
	
	}
	
	$scope.formatDate = function(date){
        return new Date(date);
  };
	
	
	$scope.roomCategory ={};
	$scope.addEditflag=false;
	
	$scope.addRoomPrice =function(){
		$scope.roomPrice={};
		$scope.addEditflag=true;
	}
	
	$scope.editRoomPrice = function(rm){
		$scope.roomPrice = rm;
		$scope.roomPrice.start_date=$scope.formatDate(rm.start_date);
		$scope.roomPrice.end_date=$scope.formatDate(rm.end_date);
		$scope.addEditflag=false;
	} 

	$scope.addRoomCat = function(){
		$scope.roomCategory ={};
		$scope.addEditflag=true;
	}
	
	$scope.RoomPriceValidation = function(roomObject){
	if(roomObject==undefined || roomObject.categoryId == undefined || 
	roomObject.amount == undefined || roomObject.start_date == undefined || roomObject.end_date== undefined 
	|| roomObject.categoryId == "" || 
	roomObject.amount == "" || roomObject.start_date == "" || roomObject.end_date== ""
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
	
	$scope.saveRoomPrice =function(){
		if($scope.RoomPriceValidation($scope.roomPrice)){
			return false;
		}
	$http.post($rootScope.baseUrl+'Room/saveRoomPrice',$scope.roomPrice)
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
	
	$scope.updateRoomPrice =function(){
		if($scope.RoomPriceValidation($scope.roomPrice)){
			return false;
		}
	$http.post($rootScope.baseUrl+'Room/updateRoomPrice',$scope.roomPrice)
	  .then(function(response) {
	    if(response.data==1){
	    	document.getElementById('closed').click();
	    	//$rootScope.swal('Update!',"Update Succesfully.",'success');//titel,msg,icone
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

	$scope.deleteRoomPrice =function(){
		
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
	        	  $http.post($rootScope.baseUrl+'Room/deleteRoomPrice',$scope.roomPrice)
	        	  .then(function(response) {
	        	    if(response.data==1){
	        	    	document.getElementById('closed').click();
	        	    	$rootScope.swal('Delete!',"Delete Succesfully.",'success');//titel,msg,icone
	           		}
	        	  });
	          } else {
	        $rootScope.swal('Cancelled',"Not Delete)",'error');//titel,msg,icone
           }
	        });
 }
	
  
});


app.controller('BookingController', function($rootScope,$scope,$http,$filter,$routeParams,Upload, $timeout){ //
    //booking edit 
	$scope.form = [];
	$scope.form1 ={};
    $scope.files = [];
	$scope.srch ={};
    $scope.form1.start_date_v = new Date();
    $scope.form1.end_date_v = new Date();
	
	if($routeParams.flg==undefined || $routeParams.flg==""){
		$rootScope.bookingDetailsObj ={};
		$rootScope.roomEditFlg=false;
	}else{
		$scope.form1.start_date ='';
		$scope.form1.end_date ='';
		$scope.form1 = $rootScope.bookingDetailsObj;
		$scope.form1.start_date =new Date($scope.form1.start_date); //$filter("date")(Date.now($scope.form1.start_date), 'yyyy-MM-dd');
		$scope.form1.end_date =new Date($scope.form1.end_date);
		$scope.bookingId = $scope.form1.id;
		//$scope.addPayment($scope.bookingId);
		//$scope.form1.start_date = new Date($scope.form1.start_date);
	}
	$scope.formatDate = function(date){
        return new Date(date);
	};
	$scope.getBookingDetails = function(){
		
	}
	
	$scope.gust_doc_init = function(bookingId){
			
		$scope.data = {
			"bookingId":bookingId
		};
		$http.post($rootScope.baseUrl+'Booking/getCustomerDetails',$scope.data)
		  .then(function(response) {
			  $scope.docForGust = response.data;
			   //$scope.regreshImg();
		  }); 
	}
	
	$scope.gust_init = function(bookingId){
		$scope.viewFlg = false;
		$scope.gustDetails =[];
		$scope.gustDetails1 =[];
		$scope.data = {
			"bookingId":bookingId
		};
		var obj ={
			"gust_name":"",
			"gust_age":"",
			"gust_gnder":"",
			"gust_id":"-1",
		};
		$scope.gustDetails1.push(obj);
		$http.post($rootScope.baseUrl+'Booking/getGustDetails',$scope.data)
		  .then(function(response) {
			  
			  for(var i=0;i<response.data.length;i++){
				  obj ={
					  "gust_name":response.data[i].name,
					  "gust_age":response.data[i].age,
					  "gust_gnder":response.data[i].gender,
					  "gust_id":response.data[i].id,
				  };
				  $scope.viewFlg = true;
				  $scope.gustDetails.push(obj);
			  }
		  }); 
		
		
	}
	
	$scope.addRowForGust = function(){
				var obj ={
			"gust_name":"",
			"gust_age":"",
			"gust_gnder":"",
			"gust_id":"",
		};
     $scope.gustDetails1.push(obj);
	}
	
	$scope.removeRowForGust = function(){
		$scope.gustDetails1.splice($scope.gustDetails1.length-1,1);
	}
	
	$scope.saveGust = function(bookingId){
		//$scope.gustDetails.bookingId = bookingId;
		$scope.data = {
			"data":$scope.gustDetails1,
			"bookingId":bookingId
		};
		$http.post($rootScope.baseUrl+'Booking/saveGustDetails',$scope.data)
	        	  .then(function(response) {
	        	    document.getElementById('closedforGust').click();
	        	    $rootScope.swal('Success','Aginest booking Id is :'+bookingId+', Gust Added Succesfully.','success');//titel,msg,icone
	        	  });
		
		//alert(JSON.stringify($scope.gustDetails));
	}
	
	$scope.addPayment = function(bookingId){
		
		$scope.ss={};
		$http.get($rootScope.baseUrl+'Booking/getAccountLedgerDetails')
		  .then(function(response) {
		    $scope.getAccountDetails = response.data;
		  }); 
		  
		  $scope.data ={"bookingId":bookingId};
		  $http.post($rootScope.baseUrl+'Booking/exsistPaymentDetails',$scope.data)
	        	  .then(function(response) {
					  if(response.data>0){
						  $scope.exsistFlag = true;
					  }else{
						  $scope.exsistFlag = false;
					  }
	        	    
	        	  });
		  $http.post($rootScope.baseUrl+'Booking/getPaymentDetails',$scope.data)
	        	  .then(function(response) {
	        	    $scope.paymentDetails_all = response.data;
	        	  });
		 
		 $http.post($rootScope.baseUrl+'Booking/getBookingPaymentDetails',$scope.data)
	        	  .then(function(response) {
	        	    $scope.paymentDetails = response.data;
					$scope.ss.payment_amount = $scope.paymentDetails[0].total_amount;
	        	  });
		  
		  
	}
	
 // save payment 

 $scope.savePayment = function(bookingId){
	 if(!$scope.exsistFlag){
		 $scope.data = {
		 "ledger_id":$scope.ss.ledger_id ,
		 "payment":$scope.ss.payment_amount,
		 "bookingId":bookingId
	 };
	 }else{
		 $scope.data = {
		 "ledger_id":$scope.ss.ledger_ids ,
		 "payment":$scope.ss.payment_amounts,
		 "bookingId":bookingId
	 }; 
	
	 }
	 $http.post($rootScope.baseUrl+'Booking/savePaymentDetails',$scope.data)
	        	  .then(function(response) {
	        	    if(response.data>0){
	        	    	document.getElementById('closed').click();
	        	    	$rootScope.swal('Success','Aginest booking Id is :'+bookingId+', Payment Succesfully Done! Payment Id is-'+response.data,'success');//titel,msg,icone
	        		}
	        	  });
 }
	
	
	// booking edit end here 
	$scope.init = function(){
		$http.get($rootScope.baseUrl+'Booking/getMasterId')
		  .then(function(response) {
		    $scope.getIdMaster = response.data;
		  }); 

		  $scope.bookingflg = false;
	}

	
	$scope.dateValidation = function(){
		var start_date = $scope.form1.start_date;
		$scope.form1.end_date_v = $scope.form1.end_date_v.setDate(start_date.getDate() + 1); 
	}
    $scope.getRoom = function (){
    	$scope.weekendFlg = false;
		var sdt = $scope.form1.start_date;
		var edt = $scope.form1.end_date;
		var start_date = $filter('date')(sdt, "yyyy-MM-dd");
		var end_date = $filter('date')(edt, "yyyy-MM-dd");
    	$scope.data = {
    			'start_date':start_date,
    			'end_date':end_date
    	};
    	$http.post($rootScope.baseUrl+'Booking/getRoomFoorBooking',$scope.data)
  	  .then(function(response) {
		    $scope.getroomDetails = response.data;
			if(new Date($scope.form1.start_date).getDay()==6 || new Date($scope.form1.start_date).getDay() == 0){ // saturday sunday 
			$scope.weekendFlg = true;
			}
  	  });
    	
		
	}

	$scope.currentDate = function(date){
		var d = new Date(date),
		month = '' + (d.getMonth()+1),
		day =''+d.getDate(),
		year = d.getFullYear();
		if(month.length <2){
			month = '0'+month;
		}
		if(day.length <2){
			day = '0'+day;
		}
		return [year,month,day].join('-');
	}


	$scope.searchformobile = function (){
		if($scope.form1.m_no.length>9){
			$scope.data = {
			"mobileNo":$scope.form1.m_no
		};
		$http.post($rootScope.baseUrl+'Booking/searchCustomer',$scope.data)
  	  .then(function(response) {
		  var cusDetails =response.data;
		  if(cusDetails!=undefined){
			  try{
			  $scope.form1.id = cusDetails[0].id;
			  $scope.form1.name = cusDetails[0].name;
			  $scope.form1.age = Number(cusDetails[0].age);
			  $scope.form1.gender = cusDetails[0].gender;
			  $scope.form1.email = cusDetails[0].email_id;
			  }catch(e){
			  $scope.form1.id = "";
			  $scope.form1.name = "";
			  $scope.form1.age = "";
			  $scope.form1.gender = "";
			  $scope.form1.email = "";
			 }
		  }
  	  });
		}else{
			//alert("Not success");
		}
	}
	$scope.search=function (){
		$scope.data = {
			"mobileNo":$scope.srch.searchId
		};
		$http.post($rootScope.baseUrl+'Booking/searchCustomer',$scope.data)
  	  .then(function(response) {
		  var cusDetails =response.data;
		  if(cusDetails!=undefined){
			  try{
		      $scope.form1.id = cusDetails[0].id;
			  $scope.form1.name = cusDetails[0].name;
			  $scope.form1.age = Number(cusDetails[0].age);
			  $scope.form1.gender = cusDetails[0].gender;
			  $scope.form1.email = cusDetails[0].email_id;
			  $scope.form1.m_no = cusDetails[0].ph_number;
			  $scope.form1.idType = cusDetails[0].id_type;
			  $scope.form1.idValue = cusDetails[0].id_value;
			  $scope.image_source = $rootScope.baseUrl+'bower_components/CustomarImage/'+cusDetails[0].id+'.jpg';
			  }catch(e){
			  $scope.form1.id = "";
			  $scope.form1.name = "";
			  $scope.form1.age = "";
			  $scope.form1.gender = "";
			  $scope.form1.email = "";
			  $scope.form1.m_no = "";
			  $scope.form1.idType = "";
			  $scope.form1.idValue = "";
			  $scope.image_source=$rootScope.baseUrl+'bower_components/CustomarImage/0.jpg';
			  }
		  }
  	  });
	}
	$scope.getamountDetails = function (rm,flg,getPriceflg){
		if(rm.flg==1){ // date wise price 
			if(getPriceflg==0){
				return rm.amount+','+rm.room_number+','+rm.category;
			}else{
				return rm.room_number+'( '+ rm.category + '/'+ rm.amount +' )';
			}
			
		}else{ // defult prices 
			if(flg==true){ // weekend 
				if(getPriceflg==0){
				//return rm.weekend_price;
				return rm.weekend_price+','+rm.room_number+','+rm.category;
			}else{
				return rm.room_number+'( '+ rm.category + '/'+ rm.weekend_price +' )';
			}
			}else{ // weeksdays
			if(getPriceflg==0){
				//return rm.week_days_price;
				return rm.week_days_price+','+rm.room_number+','+rm.category;
			}else{
				return rm.room_number+'( '+ rm.category + '/'+ rm.week_days_price +' )';
			}
			}
		}
		
	}
	$scope.bookingValidation = function(Obj){
		if(Obj==undefined || Obj.roomId == undefined || Obj.name == undefined 
			|| Obj.gender== undefined  || Obj.age == undefined || Obj.email == undefined || 
			Obj.m_no == undefined ||  
			Obj.roomId == "" || Obj.name == "" || Obj.gender == "" || Obj.age== "" || 
			Obj.email == "" || Obj.m_no== ""){
			$rootScope.swal('Required Error!','Please provied all field.','error');//titel,msg,icone
			return true;
	}
	}

	$scope.submit_booking  = function(){
		$scope.form1.start_date = document.getElementById('get_start_date').value;
		$scope.form1.end_date = document.getElementById('get_end_date').value;
		if($scope.bookingValidation($scope.form1)){
			return false ;
		}
		if($scope.form1.id ==undefined || $scope.form1.id ==""){
			$scope.form1.id = 0;
		}

		$http.post($rootScope.baseUrl+'Booking/saveBooking',$scope.form1)
	    .then(function(responces) {
		   if(responces.data.customer_id>0){
		   	$scope.bookingflg = true;
			$scope.bookingId = responces.data.booking_id;
			 $scope.addPayment($scope.bookingId);
			 $rootScope.swal('Success','Customer Id is :'+responces.data.customer_id+', Booking Succesfully Done! Booking Id is-'+responces.data.booking_id,'success');//titel,msg,icone
		   }
	   
	  });
	  return false;
	}
    $scope.saveDocuments = function (bookingId,file){

			var fd = new FormData();
	
  			fd.append("gust_details",JSON.stringify($scope.docForGust));
    			for(var i=0;i<$scope.docForGust.length;i++){

    				if($scope.docForGust[i].idType1== undefined || $scope.docForGust[i].idType1== '' ||  $scope.docForGust[i].idValue== undefined || $scope.docForGust[i].idValue== ''){
    					alert("please fill up all data");
    					return false;
    				}

    				if($scope.docForGust[i].picFile== undefined || $scope.docForGust[i].picFile==''){
    					alert("please fill up the all images first");
    					return false;

    				}
    					fd.append('file[]', $scope.docForGust[i].picFile);
    				}
    				$http({
                        url: $rootScope.baseUrl+'Booking/uploaddocuments',//or your add enquiry services
                        method: "POST",
						 headers: { 'Content-Type': undefined },
						 data :fd		 
                    }).then(function(data, status, headers, config) {
                       $scope.status=data.data.status;
						 if($scope.status==1)
						 {
						 	document.getElementById('adddoc').click();
						   $rootScope.swal('Success',data.data.message,'success');//titel,msg,icone
						   $scope.formdata="";

						   //$scope.myform.$setPristine();//for flush all the validation errors/messages previously
						 }
						 else
						 {
						 	$rootScope.swal('Error',data.data.message,'error');//titel,msg,icone
						 }
                         
                    });

	}
	
	$scope.regreshImg = function(){
		for(var i=1;i<=$scope.docForGust.length;i++){
		document.getElementById('img_'+i).src = $rootScope.baseUrl+'bower_components/CustomarImage/'+$scope.docForGust[i-1].image_id+'.jpg?cb='+new Date().getTime();
		}		
	}

	//check out function start here

	$scope.checkout = function(bookingId){

		$scope.data ={"bookingId":bookingId};
		 /* $http.post($rootScope.baseUrl+'Booking/exsistPaymentDetails',$scope.data)
	        	  .then(function(response) {
					  if(response.data>0){
						  $scope.exsistFlag = true;
					  }else{
						  $scope.exsistFlag = false;
					  }
	        	    
	        	  });*/
		  $http.post($rootScope.baseUrl+'Booking/getPaymentDetails',$scope.data)
	        	  .then(function(response) {
	        	    $scope.paymentDetails_all = response.data;
	        	    $scope.total_amount_dr=0;
	        	    for(var i=0;i<$scope.paymentDetails_all.length;i++){
	        	    		$scope.total_amount_dr+=Number($scope.paymentDetails_all[i].total_amount);
	        	    }
	        	  });

	      $http.post($rootScope.baseUrl+'Booking/getBookingPaymentDetails',$scope.data)
	        	  .then(function(response) {
	        	    $scope.paymentDetails = response.data;
	        	    $scope.total_amount_cr=0;
	        	    for(var i=0;i<$scope.paymentDetails.length;i++){
	        	    		$scope.total_amount_cr+=Number($scope.paymentDetails[i].total_amount);
	        	    }
					//$scope.ss.payment_amount = $scope.paymentDetails[0].total_amount;
	        	  });
	} 

	$scope.paymentandCheckout =function(bookingId,flg){

		if(Number($scope.total_amount_cr-$scope.total_amount_dr)==$scope.total_amount){
			var data = {
			"total_amount": $scope.total_amount,
			"payment_mode" : $scope.payment_mode,
			"tran_id" : $scope.tran_id,
			"feedback":$scope.feedback,
			"flg" : flg,
			"booking_id": bookingId
		};


		$http.post($rootScope.baseUrl+'Booking/paymentandCheckout',data)
	        	  .then(function(response) {
	        	   if(response.data!='false'){
	        	   	alert("checkout Succesfully Done");
	        	   }else{
	        	   	alert("checkout date is diffrent please update your date");
	        	   }
	        	  });


		//alert(JSON.stringify(data));
	}else{
		if(Number($scope.total_amount_cr-$scope.total_amount_dr)==0){
			alert("Your payment alredy completed");
		}else{
			alert("Please provied the amount of ="+Number($scope.total_amount_cr-$scope.total_amount_dr));
		}
	}
   }

// check out function end here 

	
	$scope.submit = function(bookingId) {
		
		$scope.data = {
			"bookingId":bookingId
		};
		$http.post($rootScope.baseUrl+'Booking/requestForCheckIN',$scope.data)
	        	  .then(function(response) {
					  document.getElementById('closedforGust').click();
					  var flg ="";
					  if(response.data==-1){
					  	swal({
				              title: 'Error!',
				              text: 'Booking not excepted.',
				              icon: 'warning'
				            }).then(function() {
							});
							return false;
					  }
					  if(response.data==1){
						  flg = "Check In";
					  }else{
						  flg ="Advance Booking";
					  }
					  
	        	  swal({
	              title: 'Success!',
	              text: flg+' Succesfully Done.',
	              icon: 'success'
	            }).then(function() {
					
				});
	        	  });

      };


	
});



app.controller('RoomCustomerBookingController', function(dataFactory,$scope,$http,$rootScope,$routeParams){
	$scope.formatDate = function(date){
        return new Date(date);
  };
   
	$scope.init = function(){
		$scope.bookingStatus = 1;
	  var bkDetails = {"flg":1};
	 $http.post($rootScope.baseUrl+'Booking/getBookingDetails',bkDetails)
	  .then(function(response) {
		  $scope.roomBookingDetails = response.data;
	  });
	}

	$scope.getBookingDetailss =function(ss){
		$rootScope.bookingDetailsObj = ss;
		$rootScope.roomEditFlg=true;
		window.location.href = $rootScope.baseUrl+'Common/home#!/ComplitedBooking/1';
	}
	
	$scope.uodateBooking = {};
	// edit booking 
	$scope.editRoomBooking = function(Obj){
		$scope.uodateBooking.start_date=$scope.formatDate(Obj.start_date);
		$scope.uodateBooking.end_date=$scope.formatDate(Obj.end_date);
		$scope.start_date_advance = new Date();
		$scope.uodateBooking.roomId = Obj.room_number+'('+Obj.price+')';
		$scope.uodateBooking.id = Obj.id;
	}
	$scope.updateRoomBooking = function(bookingStatus){
		if(document.getElementById('end_date_').value !="" || document.getElementById('end_date_').value !=undefined){
			$scope.uodateBooking.end_date = document.getElementById('end_date_').value;
		}else{
			alert("Please fill up end date");
			return false;
		}
		if(document.getElementById('start_date_').value>document.getElementById('end_date_').value){
			alert("End date should be gater the of start date");
			return false;
		}
		$http.post($rootScope.baseUrl+'Booking/getBookingDetailsUpdate',$scope.uodateBooking)
	  .then(function(response) {
		  document.getElementById('closed').click();
		   if(response.data=="true"){
			   swal({
	              title: 'Success!',
	              text: 'Booking update succfully.',
	              icon: 'success'
	            }).then(function() {
					var bkDetails = {"flg":bookingStatus};
					 $http.post($rootScope.baseUrl+'Booking/getBookingDetails',bkDetails)
					  .then(function(response) {
						  $scope.roomBookingDetails = response.data;
					  });
					//$scope.bookingStatus=bookingStatus;
	            });
		  }else{
			  swal({
	              title: 'Error!',
	              text: 'End date should be gater the of start date.',
	              icon: 'error'
	            }).then(function() {
	            });
		  }
	  });
	}
	
	//
	
	$scope.getBookingDetails = function(){
	$scope.roomBookingDetails = [];	
	var bkDetails = {"flg":$scope.bookingStatus};
	 $http.post($rootScope.baseUrl+'Booking/getBookingDetails',bkDetails)
	  .then(function(response) {
		  $scope.roomBookingDetails = response.data;
	  });
		
	/*	if($scope.bookingStatus=="active"){
			$http.get($rootScope.baseUrl+'Booking/getBookingDetails')
		  .then(function(response) {
		    $scope.roomBookingDetails = response.data;
		  });
		}else{
			$http.get($rootScope.baseUrl+'Booking/getBookingDetailsHistory')
		  .then(function(response) {
		    $scope.roomBookingDetails = response.data;
		  });
		}	*/
	}
	$scope.editObject ={};
	$scope.addEditflag=false;
	$scope.addRoom = function(){
		$scope.editObject ={};
		$scope.addEditflag=true;
	}
});

