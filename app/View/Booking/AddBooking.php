<div id="page-wrapper" data-ng-controller="BookingController" data-ng-init="init()">
	<div class="main-page">
		<div class="forms">
			<h2 class="title1">Room Booking</h2>
			<div class="form-grids row widget-shadow"
				data-example-id="basic-forms">
				<div class="form-title row">
				<div class="col-md-3"><h4 ng-if="!roomEditFlg">Booking Form </h4> <h4 ng-if="roomEditFlg">Booking Update Form{{bookingId}} </h4> </div>
				<div class="col-md-3"></div>
				<div class="col-md-3"></div>
				<div class="col-md-3"><a class="pull-right" href="#!/RoomBooking">Back</a></div>
				</div>
				
				<div class="form-body">
				
					 <div class="row">
						
						<div class="col-md-3">
								<label>Start Date</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="date" class="form-control1" id="get_start_date"
								data-ng-model="form1.start_date" min="{{form1.start_date_v | date: 'yyyy-MM-dd'}}"
								placeholder="Enter Mobile No" ng-change="dateValidation()" ng-disabled="bookingflg" ng-if="!roomEditFlg">
								
								<input type="date" class="form-control1" 
								data-ng-model="form1.start_date" placeholder="Enter Mobile No" ng-disabled="roomEditFlg" ng-if="roomEditFlg">
								</div>
						</div>
						<div class="col-md-3">
								<label>End Date</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="date" class="form-control1" data-ng-change="getRoom()" id="get_end_date"
								data-ng-model="form1.end_date" min="{{form1.end_date_v | date: 'yyyy-MM-dd'}}" ng-disabled="bookingflg" ng-if="!roomEditFlg">
								
								<input type="date" class="form-control1"
								data-ng-model="form1.end_date" ng-disabled="roomEditFlg" ng-if="roomEditFlg">
								
								</div>
						</div>
						
						<div class="col-md-3" data-ng-if="getroomDetails.length>0 || roomEditFlg">
								<label>Choose Room</label> 
								<select class="form-control1" data-ng-model="form1.roomId" ng-disabled="bookingflg" ng-if="!roomEditFlg">
									<option value="{{rm.room_id}}{{','+getamountDetails(rm,weekendFlg,0)}}" data-ng-repeat="rm in getroomDetails" 
									 data-ng-attr-title="{{rm.description}}">{{getamountDetails(rm,weekendFlg,1)}}
									</option>
                                </select>
								<br>
								<select class="form-control1" ng-disabled="roomEditFlg" ng-if="roomEditFlg">
									<option >{{form1.room_number+'('+ form1.description + '/' + form1.price+')'}}
									</option>
                                </select>
							
						</div>
						
						<div class="col-md-3" data-ng-if="getroomDetails.length>0">
									<label>Search</label> 
											<div class="input-group" title="Please search for exsisting customer i.e mobile number ">
												<input type="text" data-ng-model="srch.searchId" class="form-control1"
												placeholder="Please provide mobile number " ng-disabled="bookingflg">
												<div class="input-group-addon"><span class="glyphicon glyphicon-search" data-ng-click="search()"></span></div>
											</div>
										</div>
					</div>  
					<form data-ng-if="getroomDetails.length>0 || roomEditFlg"> 
					<div class="form-group"> 
						<div class="col-md-3">
								<label>Name</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="text" class="form-control1" ng-disabled="bookingflg"
								data-ng-model="form1.name"
								placeholder="Enter Name">
								</div>
						</div>
						
						<div class="col-md-3">
								<label>Select Gender</label> 
								<select class="form-control1" data-ng-model="form1.gender" ng-disabled="bookingflg">
                                    <option value="Male">Male</option>
                                    <option value="FeMale">FeMale</option>
                                </select>
						</div>
							<div class="col-md-3">
								<label>Age</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="number" class="form-control1"  ng-disabled="bookingflg"
								placeholder="Enter Age." data-ng-model="form1.age" ng-if="!roomEditFlg">
								<input type="text" class="form-control1"  ng-disabled="roomEditFlg"
								placeholder="Enter Age." data-ng-model="form1.age" ng-if="roomEditFlg">
								</div>
							</div>
							
							<div class="col-md-3">
								<label>Email</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input
									type="email" class="form-control1" ng-disabled="bookingflg"
									placeholder="Enter Email Id." data-ng-model="form1.email">
								</div>
							</div>
							
						</div>
						
						<div class="row">
						<br>
						<div class="col-md-3">
								<label>Mobile No</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="text" class="form-control1" ng-disabled="bookingflg"
								data-ng-model="form1.m_no" ng-change="searchformobileOld()" ng-Trim="false"
								placeholder="Enter Mobile No">
								</div>
						</div>
					 
					 <div class="col-md-3" ng-if="bookingwithcheckin">
								<label>Id Type</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<select class="form-control1" data-ng-model="form1.idType">
									<option value="{{id.id}}" data-ng-repeat="id in getIdMaster">{{id.name}}</option>
                                </select>
								</div>
						</div>
					 <div class="col-md-3" ng-if="bookingwithcheckin">
								<label>Id Value</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="text" class="form-control1" 
								data-ng-model="form1.idValue"
								placeholder="Enter Id Value">
								</div>
						</div>
						
						<div class="col-md-3" ng-if="bookingwithcheckin">
								<label>Upload Id</label> 
								<div class="input-group">							
								<!-- <span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span> -->
								<input data-ng-model="form.imagesss" type="file" class="form-control input-sm" accept="image/*"
	  								onchange="angular.element(this).scope().uploadedFile(this)">
								
								 <br/>
	  							<img ng-src="{{image_source}}" style="width:100px;">
								</div>
						</div>
					 </div>
					 <div class="row">
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group" ng-if="!roomEditFlg">							
								<button type="submit" class="btn btn-default" data-ng-click="submit_booking()" ng-if="!bookingflg">Booking</button>
								<button type="submit" class="btn btn-default" ng-if="bookingflg" disabled="disabled">Booking</button>
						</div>
						<div class="input-group" ng-if="roomEditFlg">							
								<button type="submit" class="btn btn-default" ng-disabled="roomEditFlg">Booking</button>
						</div>
					 </div>
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group" ng-if="!roomEditFlg">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">Add Payment</button>
								<button type="submit" class="btn btn-default" ng-if="bookingflg" data-toggle="modal" 
							data-target="#addPayment">Add Payment</button> 
						</div>
						<div class="input-group" ng-if="roomEditFlg">							
								<button type="submit" class="btn btn-default" data-toggle="modal" 
							data-target="#addPayment" data-ng-click="addPayment(bookingId)">Add Payment</button> 
						</div>
					 </div>
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group" ng-if="!roomEditFlg">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">Add Guest</button> 
								<button type="submit" class="btn btn-default" ng-if="bookingflg" data-toggle="modal" 
							data-target="#addGust" data-ng-click="gust_init(bookingId)">Add Guest</button> 
						</div>
						<div class="input-group" ng-if="roomEditFlg">							
								<button type="submit" class="btn btn-default" data-toggle="modal" 
							data-target="#addGust" data-ng-click="gust_init(bookingId)">Add Guest</button> 
						</div>
					 </div>
					 
					 <div class="col-md-3">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group" ng-if="!roomEditFlg">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">Upload Documents</button>
								<button type="submit" class="btn btn-default" ng-if="bookingflg" ng-click="gust_doc_init(bookingId)"
								data-toggle="modal" data-target="#adddoc">Upload Documents</button> 
						</div>
						<div class="input-group" ng-if="roomEditFlg">							
								<button type="submit" class="btn btn-default" ng-click="gust_doc_init(bookingId)"
								data-toggle="modal" data-target="#adddoc">Upload Documents</button> 
						</div>
					 </div>
					 
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group" ng-if="!roomEditFlg">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">CheckIn</button> 
								<button type="submit" class="btn btn-default" data-ng-click="submit(bookingId)" ng-if="bookingflg">CheckIn</button> 
						</div>
						<div class="input-group" ng-if="roomEditFlg">							
								<button type="submit" class="btn btn-default" data-ng-click="submit(bookingId)">CheckIn</button> 
						</div>
					 </div>
					 </div>

					  </form> 
				</div>	
			</div>
		</div>
	</div>
	
	<!-- add payment start here  -->
	
	<div class="col-md-4 modal-grids">
			<div class="modal fade  bd-example-modal-lg" id="addPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;top:100px;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" id="closed" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Add</span>
										payment</h4>
									</div>
									<div class="modal-body">
					<form>
					
					<div class="table-responsive bs-example widget-shadow">
					
						<div class="form-group row">
							<div class="col-md-6">
								<label>Booking ID:</label> 
								{{paymentDetails[0].booking_number}}
							</div>
							<div class="col-md-6">
								<label>NoDays(Price) :</label> 
								{{paymentDetails[0].number_of_days +'('+paymentDetails[0].price+')'}}
							</div>
							
						</div>
						
						<div class="form-group row">
							<div class="col-md-6">
								<label>Start Date : </label> 
								{{formatDate(paymentDetails[0].start_date) | date:'dd MMM yyyy'}}
							</div>
							<div class="col-md-6">
								<label>End Date : </label> 
								{{formatDate(paymentDetails[0].end_date) | date:'dd MMM yyyy' }}
							</div>
							
						</div>
						
						
						 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
							  <tr>
								  <th class="th-sm">Select Account</th>
								  <th class="th-sm">Price</th>
							  </tr>
							 </thead>
							 <tbody>
							   <tr>
								<td>
									<select class="form-control" data-ng-model="ledger_id">
										<option data-ng-repeat="acn in getAccountDetails" value="{{acn.ledger_id}}" ng-selected="ledger_id">
										 {{acn.name}}
										 </option>
									</select>
								</td>					
								<td><input class="form-control" id="pay_amounts" 
								data-ng-model="payment_amount"></td>
								</tr>
							  </tbody>
								  
						</table> 
				</div>
										
					</form>
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-ng-click="savePayment(bookingId)">Save</button>
									</div>
								</div>
							</div>
			</div>
</div>

<!-- model end here -->

<!-- add gust start here  -->
	
	<div class="col-md-4 modal-grids">
			<div class="modal fade  bd-example-modal-lg" id="addGust" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;top:100px;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" id="closedforGust" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Add</span>
										Guest</h4>
									</div>
									<div class="modal-body">
					<form>
					
					<div class="table-responsive bs-example widget-shadow">
					<div class="form-group row">
							<div class="col" style="cursor: pointer;">
								<a class="fa fa-plus pull-right" ng-click="addRowForGust()" ng-if="!viewFlg"> </a>&nbsp;&nbsp;
								<a class="fa fa-minus pull-right" ng-click="removeRowForGust()" ng-if="!viewFlg"> </a>
								<a class="fa fa-plus pull-right" ng-if="viewFlg"> </a>&nbsp;&nbsp;
								<a class="fa fa-minus pull-right" ng-if="viewFlg"> </a>
							</div>
						</div>
					<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
							  <tr>
								  <th class="th-sm">Name</th>
								  <th class="th-sm">Age</th>
								  <th class="th-sm">Gender</th>
							  </tr>
							 </thead>
							 <tbody>
							   <tr ng-repeat="gst in gustDetails">
								<td>
									<input class="form-control" id="gustName" 
									data-ng-model="gst.gust_name" name="" required ng-disabled="viewFlg">
								</td>					
								<td><input class="form-control" id="gustAge"  type="text"
									data-ng-model="gst.gust_age" value="{{gst.gust_age}}" name="" ng-maxlength="3" required ng-disabled="viewFlg"></td>
									<td><select class="form-control1" data-ng-model="gst.gust_gnder" name="" ng-disabled="viewFlg">
                                    <option value="Male">Male</option>
                                    <option value="FeMale">FeMale</option>
                                </select>
								<input class="form-control" id="bookingId"  type="hidden"
									data-ng-model="gst.bookingId" value="{{bookingId}}">
									<input class="form-control" id="gust_id"  type="hidden"
									data-ng-model="gst.gust_id">
								</td>
								</tr>
							  </tbody>
								  
						</table> 
				</div>
										
					</form>
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-ng-click="saveGust(bookingId)" ng-disabled="viewFlg">Add Gust</button>
									</div>
								</div>
							</div>
			</div>
</div>

<!-- model end here -->


<!-- add document start here  -->
	
	<div class="col-md-4 modal-grids">
			<div class="modal fade  bd-example-modal-lg" id="adddoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;top:100px;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" id="closedfordoc" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Add</span>
										Documents</h4>
									</div>
									<div class="modal-body">
					<form>
					
					<div class="table-responsive bs-example widget-shadow">
					
					<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
							  <tr>
								  <th class="th-sm">Name</th>
								  <th class="th-sm">Id Type</th>
								  <th class="th-sm">Id Value</th>
								  <th class="th-sm">Documents</th>
							  </tr>
							 </thead>
							 <tbody>
							   <tr ng-repeat="form in docForGust">
								<td ng-bind="form.name">
								</td>	
								<td><select class="form-control1" data-ng-model="form.idType1" id="idType_n">
									<option value="{{id.id}}" data-ng-repeat="id in getIdMaster">{{id.name}}</option>
                                </select>
								</td>
								<td><input type="text" class="form-control1" 
								data-ng-model="form.idValue" id="idValue"
								placeholder="Enter Id Value">
								<input type="hidden" ng-model="form.customer_id" id="customer_id">
								<input type="hidden" ng-model="form.flgofhead" id="flgofhead">						 
								</td>								
								<td>
								<input data-ng-model="form.image" type="file" class="form-control input-sm" accept="image/*"
	  								onchange="angular.element(this).scope().uploadedFile(this)">
									<img ng-src="{{image_source}}" style="width:100px;">
								<!--input data-ng-model="document" id="docId{{$index+1}}" type="file" class="form-control input-sm" 
	  								onchange="angular.element(this).scope().uploadedFile(this)"-->
								</td>
								
								</tr>
							  </tbody>
								  
						</table> 
				</div>
										
					</form>
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-ng-click="saveDocuments(bookingId)" ng-disabled="viewFlg">Add Documents</button>
									</div>
								</div>
							</div>
			</div>
</div>

<!-- model end here -->
	
</div>


