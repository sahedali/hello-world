<div id="page-wrapper" data-ng-controller="ResturentTableBookingController" data-ng-init="init()">
	<div class="main-page">
		<div class="forms">
			<div class="form-grids row widget-shadow"
				data-example-id="basic-forms">
				<div class="form-title">
					<h5>Table <a title="Cleck to Add Table Category" class="btn fa fa-plus pull-right" data-toggle="modal" 
		data-target="#resturentTable" data-ng-click="addTable()"> </a> </h5>
				</div>
				<div class="table-responsive bs-example widget-shadow">
				 <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" style="font-size: 13px">
					<thead>
                      <tr><th class="th-sm">Sl No</th>
                          <th class="th-sm">Table No</th>
						  <th class="th-sm">No Of Chair</th>
                       </tr>
                       </thead>
                       <tbody data-ng-repeat="table in tableDetails">
                       <tr  data-toggle="modal" 
							data-target="#resturentTable" 
							data-ng-click="editTableDetails(table)" style="cursor: pointer">
                        <td>{{$index+1}}</td>
						<td title="Click To Edit">{{table.name}}</td>
						<td title="Click To Edit">{{table.no_of_chair}}</td>
                        </tr>
                       </tbody>
                          
				</table> 
				</div>
				<div data-pagination="" data-num-pages="numOfPages()" 
      data-current-page="curPage" data-max-size="maxSize"  
      data-boundary-links="true" ng-if="tableDetails.length>9"></div>
				
				
			</div>
		</div>
	</div>
<div class="col-md-4 modal-grids">
			<div class="modal fade" id="resturentTable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;top:100px;">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" id="closed" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span></button>
										<h4 class="modal-title" id="exampleModalLabel"> 
										<span data-ng-show="addEditflag">Add</span>
										<span data-ng-hide="addEditflag">Edit</span>
										Resturent Table</h4>
									</div>
									<div class="modal-body">
										<div class="form-group row">
											<div class="col-md-5">
												<label>Table Number</label> <input
													type="text" class="form-control" 
													placeholder="Table Number" data-ng-model="addEditObject.name">
											</div>
											<div class="col-md-7">
												<label>No Of Chair</label> 
												<input type="text" class="form-control" rows="5" 
												data-ng-model="addEditObject.no_of_chair">
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<!--button type="button" class="btn btn-danger pull-left" data-ng-click="deleteTable()" data-ng-hide="addEditflag">Delete</button-->
										<button type="button" class="btn btn-primary" data-ng-click="updateTable()" data-ng-hide="addEditflag">Update</button>
										<button type="button" class="btn btn-primary" data-ng-click="saveTable()"  data-ng-show="addEditflag">Add</button>
									</div>
								</div>
							</div>
			</div>
</div>
	<!-- model end here  -->


</div>

