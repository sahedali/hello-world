<div id="page-wrapper" data-ng-controller="BookingController" data-ng-init="init()">
	<div class="main-page">
		<div class="forms">
			
			<div class="form-grids row widget-shadow"
				data-example-id="basic-forms">
				<div class="form-title row">
				<div class="col-md-3"><h4 ng-if="!roomEditFlg">Booking Form </h4> <h4 ng-if="roomEditFlg">Booking Update Form</h4> </div>
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
						
						<!--div class="col-md-3" data-ng-if="getroomDetails.length>0">
									<label>Search</label> 
											<div class="input-group" title="Please search for exsisting customer i.e mobile number ">
												<input type="text" data-ng-model="srch.searchId" class="form-control1"
												placeholder="Please provide mobile number " ng-disabled="bookingflg">
												<div class="input-group-addon"><span class="glyphicon glyphicon-search" data-ng-click="searchformobile()"></span></div>
											</div>
										</div-->
						<div class="col-md-3" data-ng-if="getroomDetails.length>0 || roomEditFlg">
								<label>Mobile No</label> 
								<div class="input-group">							
								<span class="input-group-addon">
													<i class="fa fa-envelope-o"></i>
								</span>
								<input type="text" class="form-control1" ng-disabled="roomEditFlg"
								data-ng-model="form1.m_no" ng-change="searchformobile()" ng-Trim="false"
								placeholder="Enter Mobile No">
								
								
								
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
								<input type="text" class="form-control1" ng-disabled="roomEditFlg"
								data-ng-model="form1.name"
								placeholder="Enter Name">
								</div>
						</div>
						
						<div class="col-md-3">
								<label>Select Gender</label> 
								<select class="form-control1" data-ng-model="form1.gender" ng-disabled="roomEditFlg">
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
									type="email" class="form-control1" ng-disabled="roomEditFlg"
									placeholder="Enter Email Id." data-ng-model="form1.email">
								</div>
							</div>
							
						</div>
						
						<div class="row">
						
											 
					
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
					 
					 <div class="col-md-2" ng-if="form1.check_in!=1">  
					 	<label>&nbsp;</label> 
					 	<div class="input-group" ng-if="!roomEditFlg">							
								<button type="submit" class="btn btn-default" disabled="disabled" ng-if="!bookingflg">CheckIn</button> 
								<button type="submit" class="btn btn-default" data-ng-click="submit(bookingId)" ng-if="bookingflg">CheckIn</button> 
						</div>
						<div class="input-group" ng-if="roomEditFlg">							
								<button type="submit" class="btn btn-default" data-ng-click="submit(bookingId)">CheckIn</button> 
						</div>
					 </div>

					 <div class="col-md-2" ng-if="form1.check_in==1">  
					 	<label>&nbsp;</label> 
					 	
						<div class="input-group">							
							<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#checkout" data-ng-click="checkout(bookingId)">CheckOut</button> 
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
									<div class="form-group row">
										<div class="col-md-4">
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Add</span>
										payment</h4>
										</div>
										<div class="col-md-6" style="cursor: pointer;" >
											<!--a class="fa fa-plus pull-right" ng-click="addRowForPayment()"> </a>&nbsp;&nbsp;
											<a class="fa fa-minus pull-right" ng-click="removeRowForPayment()"> </a-->
											
										</div>
										<div class="col-md-2">
										<button type="button" class="close" id="closed" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										
										</div>
									</div>
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
							   <tr data-ng-repeat="pay in paymentDetails_all">
								<td>
								{{pay.name}}
								</td>					
								<td>{{pay.total_amount}}</td>
								</tr>
							  </tbody>
							  
							  <tbody>
							   <tr data-ng-if="!exsistFlag">
								<td>
									<select class="form-control" data-ng-model="ss.ledger_id">
										<option data-ng-repeat="acn in getAccountDetails" value="{{acn.ledger_id}}">
										 {{acn.name}}
										 </option>
									</select>
								</td>					
								<td><input class="form-control"  
								data-ng-model="ss.payment_amount"></td>
								</tr>
								<tr data-ng-if="exsistFlag">
								<td>
									<select class="form-control" data-ng-model="ss.ledger_ids">
										<option data-ng-repeat="acn in getAccountDetails" value="{{acn.ledger_id}}">
										 {{acn.name}}
										 </option>
									</select>
								</td>					
								<td><input class="form-control"  
								data-ng-model="ss.payment_amounts"></td>
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
									<div class="form-group row">
										<div class="col-md-4">
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Add</span>
										Guest</h4>
										</div>
										<div class="col-md-6" style="cursor: pointer;" >
											<a class="fa fa-plus pull-right" ng-click="addRowForGust()"> </a>&nbsp;&nbsp;
											<a class="fa fa-minus pull-right" ng-click="removeRowForGust()"> </a>
											
										</div>
										<div class="col-md-2">
										<button type="button" class="close" id="closedforGust" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										
										</div>
									</div>
									</div>
									<div class="modal-body">
					<form>
					
					<div class="table-responsive bs-example widget-shadow">
					
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
							  
							  <tbody>
							   <tr ng-repeat="gst in gustDetails1" ng-if="gst.gust_id!=-1" >
								<td>
									<input class="form-control" id="gustName" 
									data-ng-model="gst.gust_name" name="" required>
								</td>					
								<td><input class="form-control" id="gustAge"  type="text"
									data-ng-model="gst.gust_age" value="{{gst.gust_age}}" name="" ng-maxlength="3" require></td>
									<td><select class="form-control1" data-ng-model="gst.gust_gnder" name="">
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
										<button type="button" class="btn btn-primary" data-ng-click="saveGust(bookingId)">Add Gust</button>
									</div>
								</div>
							</div>
			</div>
</div>

<!-- model end here -->


<!-- add document start here  -->
	
	<div class="col-md-4 modal-grids">
			<div class="modal fade  bd-example-modal-lg" id="adddoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;top:100px;">
							<div class="modal-dialog" role="document" style="width: 800px;
  margin: auto;">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" id="closedfordoc" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Add</span>
										Documents</h4>
									</div>
									<div class="modal-body">
					<form name="myForm">
					
					<div class="table-responsive bs-example widget-shadow">
					 <fieldset>
					<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
							  <tr>
								  <th class="th-sm">Name</th>
								  <th class="th-sm">Id Type</th>
								  <th class="th-sm">Id Value</th>
								  <th class="th-sm">Documents</th>
								  <th class="th-sm">view<a ng-click="regreshImg()"> Refresh</a></th>
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
								<input type="hidden" ng-model="form.flgofhead" id="flgofhead">					</td>								
								<td>
								 <input type="file" ngf-select ng-model="form.picFile" name="file" accept="image/*" ngf-max-size="2MB" required> <i ng-show="myForm.file.$error.required">*required</i>
                                <img ngf-thumbnail="form.picFile" class="thumb" style="width:100px;">
                                </td>
                                <td> <a  href="{{baseUrl + 'bower_components/CustomarImage/'+ form.image_id+'.jpg'+'?cb=' + $index}}" target="_blank" >
                                	<img ng-src="{{baseUrl + 'bower_components/CustomarImage/'+ form.image_id+'.jpg' +'?cb=' + $index}}" id="img_{{$index+1}}" style="width:100px;">
                                </a>
                                </td>
								 
								</tr>
							  </tbody>
								  
						</table> <div class="modal-footer">
										<button type="button" class="btn btn-primary" data-ng-click="saveDocuments(bookingId,picFile)">Save</button>
									</div> 
						 </fieldset>
				</div>
										
					</form>
									</div>
									
									
								</div>
							</div>
			</div>
</div>

<!-- model end here -->




<div class="col-md-4 modal-grids">
			<div class="modal fade  bd-example-modal-lg" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;top:100px;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" id="closedfordoc" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span>Payment</span>
										Details</h4>
									</div>
									<div class="modal-body">
					<form name="myForm">
					
					<div class="table-responsive bs-example widget-shadow">
					 <fieldset>
					<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
							<thead>
							  <tr>
								  <th class="th-sm">Amount For</th>
								  <th class="th-sm">Price</th>
								  <th class="th-sm">CR/DR</th>
							  </tr>
							 </thead>
							 <tbody>
							   <tr data-ng-repeat="pay in paymentDetails">
								<td>
								{{pay.ledger_name}}
								</td>					
								<td>{{pay.total_amount}}</td>
								<td>CR</td>
								</tr>
							  </tbody>
							 <tbody>
							   <tr data-ng-repeat="pay in paymentDetails_all">
								<td>
								{{pay.name}}
								</td>					
								<td>{{pay.total_amount}}</td>
								<td>DR</td>
								</tr>
							  </tbody>

							  <tbody>
							   <tr>
								<td>
								Total
								</td>					
								<td>{{(total_amount_cr - total_amount_dr) | number }}</td>
								<td>Payable Amount</td>
								</tr>
							  </tbody>
							   
						</table> 

							<div class="modal-footer">

								<div class="row">
									<div class="col-md-4">
										<input type="text" name="payable_amount" class="form-control" ng-model="total_amount">
									</div>

									<div class="col-md-4">
										<select class="form-control pull-center" ng-model="payment_mode">
		                                      <option value="Cash">Cash</option>
											 <option value="Net Banking">Net Banking</option>
											 <option value="Others UPI">Others UPI</option>
	                        			</select>
									</div>
									<div class="col-md-4">
										<input type="text" placeholder="Enter transaction ID" name="tran_id" ng-model="tran_id" class="form-control">
									</div>
									
								</div>

								<div class="row">
									
										<div class="col-md-4">
										<textarea ng-model="feedback" placeholder="Enter your valuable feedback"></textarea>
										</div>
									
									<div class="col-md-4">
										
									</div>
									<div class="col-md-4">
										<button type="button" class="btn btn-primary" ng-if="(total_amount_cr - total_amount_dr)>0" data-ng-click="paymentandCheckout(bookingId,0)">Pay & Checkout</button>
										<button type="button" class="btn btn-primary" ng-if="(total_amount_cr - total_amount_dr)<=0" data-ng-click="paymentandCheckout(bookingId,1)">Checkout</button>
									</div>
								</div>
							</div> 
							
						 </fieldset>
				</div>
										
					</form>
									</div>
									
									
								</div>
							</div>
			</div>
</div>

	
</div>


