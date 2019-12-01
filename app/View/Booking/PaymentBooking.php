<div id="page-wrapper" data-ng-controller="BookingController" data-ng-init="init()">
	<div class="main-page">
		<div class="forms">
			<div class="form-grids row widget-shadow"
				data-example-id="basic-forms">
				<div class="form-title row">
				<div class="col-md-3"><h4>Booking Form :</h4></div>
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
								<input type="date" class="form-control1" 
								data-ng-model="form1.start_date" min="{{form1.start_date_v | date: 'yyyy-MM-dd'}}"
								placeholder="Enter Mobile No" ng-change="dateValidation()" ng-disabled="true">
								</div>
						</div>
						<div class="col-md-3">
								<label>End Date</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="date" class="form-control1" data-ng-change="getRoom()"
								data-ng-model="form1.end_date" min="{{form1.end_date_v | date: 'yyyy-MM-dd'}}" ng-disabled="true">
								</div>
						</div>
						
						<div class="col-md-3">
								<label>Choose Room</label> 
								<select class="form-control1" data-ng-model="form1.roomId" ng-disabled="true">
									<option value="{{rm.room_id}}{{','+getamountDetails(rm,weekendFlg,0)}}" data-ng-repeat="rm in getroomDetails" 
									 data-ng-attr-title="{{rm.description}}">{{getamountDetails(rm,weekendFlg,1)}}
									</option>
                                </select>
								<!--div class="input-group" ng-if="!bookingflg" ng-bind="form1.roomId">															
								</div-->
								
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
					<form> 
					<div class="form-group"> 
						<div class="col-md-3">
								<label>Name</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="text" class="form-control1" ng-disabled="true"
								data-ng-model="form1.name"
								placeholder="Enter Name">
								</div>
						</div>
						
						<div class="col-md-3">
								<label>Select Gender</label> 
								<select class="form-control1" data-ng-model="form1.gender" ng-disabled="true">
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
								<input type="number" class="form-control1"  ng-disabled="true"
								placeholder="Enter Age." data-ng-model="form1.age">
								</div>
							</div>
							
							<div class="col-md-3">
								<label>Email</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input
									type="email" class="form-control1" ng-disabled="true"
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
								<input type="text" class="form-control1" ng-disabled="true"
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
								<input data-ng-model="form.image" type="file" class="form-control input-sm" accept="image/*"
	  								onchange="angular.element(this).scope().uploadedFile(this)">
								
								 <br/>
	  							<img ng-src="{{image_source}}" style="width:100px;">
								</div>
						</div>
					 </div>
					 <div class="row">
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group">							
								<!--button type="submit" class="btn btn-default" data-ng-click="submit_booking()" ng-if="!bookingflg">Booking</button-->
								<button type="submit" class="btn btn-default" ng-if="true" disabled="disabled">Booking</button>
						</div>
					 </div>
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group">							
								<!--button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">Add Payment</button-->
								<button type="submit" class="btn btn-default" data-toggle="modal" 
							data-target="#addPayment">Add Payment</button> 
						</div>
					 </div>
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">Add Guest</button> 
								<button type="submit" class="btn btn-default" ng-if="bookingflg">Add Guest</button> 
						</div>
					 </div>
					 
					 <div class="col-md-3">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">Upload Documents</button>
								<button type="submit" class="btn btn-default" ng-if="bookingflg">Upload Documents</button> 
						</div>
					 </div>
					 
					 <div class="col-md-2">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">CheckIn</button> 
								<button type="submit" class="btn btn-default" data-ng-click="submit()" ng-if="bookingflg">CheckIn</button> 
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
										<span data-ng-show="addEditflag">Add</span>
										<span data-ng-hide="addEditflag">Edit</span>
										Room</h4>
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
										<option data-ng-repeat="acn in getAccountDetails" value="{{acn.ledger_id}}">
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
										<button type="button" class="btn btn-primary" data-ng-click="savePayment(bookingId)">Add</button>
									</div>
								</div>
							</div>
			</div>
</div>

<!-- model end here -->
	
</div>


