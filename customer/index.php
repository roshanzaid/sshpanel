<?php

	/*********************************************************************************
	* PROJECT: ZETA 1.0.0
	* AUTHOR: ROSHAN ZAID AKA DAUNTE
	* FILE FOR: ORDER SEARCH WITH CUSTOMER PHONE AND INVOICE
	* 
	* VARIABLES
	* @PARAM	{STRING}	CONN								//DB CONNECT VARIABLE
	* @PARAM	{STRING}	MESSAGE								//LOG MESSAGE
	* @PARAM	{STRING}	LOGFILE								//LOG FILE PATH
	*
	* FUNCTIONS
	* APP_LOG()													//LOG WRITING
	/********************************************************************************/
	
	//INCLUDE DIRECTORIES
	include "../base/db.php";
	include '../base/deliveryNoteDownload.php';

	//KEEP TRACK ON SESSION VARIABLES
    if(!session_id()) session_start();
	if( (!isset($_SESSION['_superAdminLogin'])) && (!isset($_SESSION['_adminLogin'])) && (!isset($_SESSION['_salesLogin'])) && (!isset($_SESSION['_factoryLogin'])) && (!isset($_SESSION['_staffLogin'])) && (!isset($_SESSION['_deliveryLogin']))){ 
		header("Location:../index.php");
	}

	/**
	 * MASTER METHOD FOR LOG TRACKING
	 * @PARAM {STRING}	MESSAGE
	 */
	function app_log($message){
        $logPath  = "../log/log_";
		date_default_timezone_set('Asia/Dubai');
		$logfile = $logPath.date('d-M-Y').'.log';
		file_put_contents($logfile, $message . "\n", FILE_APPEND);
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include "../header/header_css.php"; ?>
	</head>
	<body class="main-body">
		<div class="page">
			<?php include "../header/header.php";?>
			<div class="main-content horizontal-content">
				<div class="container">
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Track Order</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ with Invoice or Customer Detail</span>
							</div>
						</div>
					</div>
					<div class="row row-sm">
						<div class="col-xl-12">
							<div class="card mg-b-20">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-0">View All Order</h4>
									</div>
									<p class="tx-12 tx-gray-500 mb-2">Orders from All Status</p>
								</div>
								<div class="card-body">
									<div class="panel panel-primary tabs-style-2">
										<div class=" tab-menu-heading">
											<div class="tabs-menu" id="tabId">
												<ul class="nav panel-tabs main-nav-line nav-justified" id="myTab">
													<li class="nav-item"><a href="#allproduct" class="nav-link" data-toggle="tab">All Orders / Filter with Customer Details</a></li>
												</ul>
											</div>
										</div>
										<div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
											<div class="tab-content">
												<!--ALL PRODUCTS TABLE-->
												<div class="tab-pane" id="allproduct">
													<div class="table-responsive">
														<table id="exampleeight" class="testclass table key-buttons text-md-nowrap">
															<thead>
																<tr>
																	<th class="border-bottom-0">IID</th>
																	<th class="border-bottom-0">DEL/Date</th>
																	<th class="border-bottom-0">D/G</th>
																	<th class="border-bottom-0">City</th>
																	<th class="border-bottom-0">D/L</th>
																	<th class="border-bottom-0">Item</th>
																	<th class="border-bottom-0">Color</th>
																	<th class="border-bottom-0">QTY</th>
																	<th class="border-bottom-0">Note</th>
																	<th class="border-bottom-0">Image</th>
																	<th class="border-bottom-0">Comment</th>
																	<th class="border-bottom-0">Status</th>
																	<th class="border-bottom-0">Consult</th>
																	<th class="border-bottom-0">Action</th>
																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- MODALS OPEN -->
				<!--IMAGE MODAL-->
				<div class="modal effect-scale show" id="imagemodalone">
					<div class="modal-dialog-new-order modal-dialog-centered" role="document">
						<div id="content-data"></div>
					</div>
				</div>
			</div>
			<?php include "../footer/footer.php"; ?>
		</div>
		<!-- END PAGE -->

		<!-- BACK TO TOP -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
		<!-- JQuery min js -->
		<script src="../assets/plugins/jquery/jquery.min.js"></script>
		<!--Internal  Datepicker js -->
		<script src="../assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>
		<!--Internal  jquery-simple-datetimepicker js -->
		<script src="../assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
		<!-- Ionicons js -->
		<script src="../assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
		<!-- Bootstrap Bundle js -->
		<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!--Internal  Parsley.min js -->
		<script src="../assets/plugins/parsleyjs/parsley.min.js"></script>
		<!-- Internal Data tables -->
		<script src="../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
		<script src="../assets/plugins/datatable/js/dataTables.dataTables.min.js"></script>
		<script src="../assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
		<script src="../assets/plugins/datatable/js/responsive.dataTables.min.js"></script>
		<script src="../assets/plugins/datatable/js/jquery.dataTables.js"></script>
		<script src="../assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
		<script src="../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
		<script src="../assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
		<script src="../assets/plugins/datatable/js/jszip.min.js"></script>
		<script src="../assets/plugins/datatable/js/pdfmake.min.js"></script>
		<script src="../assets/plugins/datatable/js/vfs_fonts.js"></script>
		<script src="../assets/plugins/datatable/js/buttons.html5.min.js"></script>
		<script src="../assets/plugins/datatable/js/buttons.print.min.js"></script>
		<script src="../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
		<script src="../assets/plugins/datatable/js/dataTables.responsive.min.js"></script>
		<script src="../assets/plugins/datatable/js/responsive.bootstrap4.min.js"></script>
		<!--Internal  Datatable js -->
		<script src="../assets/js/table-data.js"></script>
		<!-- Horizontalmenu js-->
		<script src="../assets/plugins/horizontal-menu/horizontal-menu-2/horizontal-menu.js"></script>
		<!-- Sticky js -->
		<script src="../assets/js/sticky.js"></script>
		<!-- Internal Select2 js-->
		<script src="../assets/plugins/select2/js/select2.min.js"></script>
		<!-- eva-icons js -->
		<script src="../assets/js/eva-icons.min.js"></script>
       	<!-- Internal Sumoselect js -->
	   	<script src="../assets/plugins/sumoselect/jquery.sumoselect.js"></script>
		<!-- Internal form-elements js -->
		<script src="../assets/js/form-elements.js"></script>
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>
		<!-- custom js -->
		<script src="../assets/js/custom.js"></script>
		<!-- Internal Modal js-->
		<script src="../assets/js/modal.js"></script>
		<!-- Internal Form-validation js -->
		<script src="../assets/js/form-validation.js"></script>
		<!-- Sweet-alert js  -->
		<script src="../assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="../assets/js/sweet-alert.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {

				//DATATABLE IMPLEMENTATION

				//INITIATING TABLE ALL PRODUCTS
				//IDISPLAYLENGTH - TABLE WILL DISPLAY 100 RECORDS, HAS BEEN PAGINATED
				//SENT TO FILE	- EMPTY STATUS - ALL RECORDS WILL BE FETCHED
				//DRAWCALLBACK	- TABLE ROWS WILL BE CATEGORIZED WITH DELIVERY DATES
				//ROWCALLBACK	- TABLE ROWS WILL BE HIGHLIGHTED IF THE ORDER RECORD IS EDITED/FROM SHARAG DG/NOON
				var tableeight = $('#exampleeight').DataTable( {
					"processing": 	true,
					"serverSide": 	true,
					"paging"	:	true,
					"searching"	:	true,
					"sDom": 'Brtip',
					"buttons": [
						
					],
					"iDisplayLength"	:	100,
					"ajax": {
						url  :"../customer/fetch.php",
						type : "POST",
						data : {
							status : '',
							nextStatus : ''
						}
					},
					"rowCallback": function( row, data, index ) {
						if ( data[12] == "Sharaf DG" ){
							$('td', row).css('background-color', '#fcf9c7');
						}
						else if ( data[12] == "NooN" ){
							$('td', row).css('background-color', '#fcf9c7');
						}
						if(data[14] != null){
							$('td', row).css('background-color', '#cbcbf5');
						}
					},
					"drawCallback": function ( settings ) {
						var api = this.api();
						var rows = api.rows( {page:'current'} ).nodes();
						var last=null; 
						api.column(1, {page:'current'} ).data().each( function ( group, i ) {
							if ( last !== group ) {
								$(rows).eq( i ).before(
									'<tr class="group"><td class="delback"colspan="14">'+'<strong> Delivery On : '+group+'</strong></td></tr>'
								);
								last = group;
							}
						} );
					},
					"autoWidth": false,
					"aoColumnDefs": [{ "bSortable": false, "bSearchable": false, "aTargets": [2,4,5,6,7,8,9,10,11,12,13 ] } ],
					"aoColumns": [
						{ "sWidth": "3%" }, 
						{ "sWidth": "5%" },
						{ "sWidth": "2%" }, 
						{ "sWidth": "3%" },
						{ "sWidth": "2%" },
						{ "sWidth": "20%" },
						{ "sWidth": "12%" },
						{ "sWidth": "2%" },
						{ "sWidth": "20%" },
						{ "sWidth": "3%" },
						{ "sWidth": "20%" },
						{ "sWidth": "4%" },
						{ "sWidth": "2%" },
						{ "sWidth": "2%" }
					]
				} );

				//@ORDERSEARCHTEXT IS THE TEXT FIELD WHERE THE INVOICES WILL BE SEARCHED
				//TABLES WILL BE REDRAWN AS PER THE INSERT VALUE
				$('#orderSearchText').keyup(function(){
					tableeight.search($(this).val()).column(0).draw() ;
				});

				//IMAGE FETCH			-	ONCLICKEVENT
				//A MODAL OPEN FOR THUMBNAIL IMAGE CLICK
				//IMAGE WILL BE IDENTIFIED WITH THE ORDER ROW ID AND BE PASSED TO ORDERIMAGE.PHP TO VIEW FULL VIEW IMAGE IN MODAL
				//DATA WILL BE PASSED AND RETREIVED AS HTML
				$(document).on('click','#tableImage',function(event){
					event.preventDefault();
					var per_id=$(this).data('id');
					$('#content-data').html('');
					$.ajax({
						url:'../order/modal/orderImage.php',
						type:'POST',
						data:'id='+per_id,
						dataType:'html'
					}).done(function(data){
						$('#content-data').html('');
						$('#content-data').html(data);
					}).fail(function(){
						$('#content-data').html('<p>Error</p>');
					});
				});


				//TOGGLE TAB WILL GET THE TOGGLE ELEMENT AND WILL SAVE THE LAST ACTIVE TOGGLE TABLE BEFORE REFRESH ON LOCAL STORAGE
				//AND SET THE SAVED TOGGLE AS ACTIVE TAB
				$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                	localStorage.setItem('activeTab', $(e.target).attr('href'));
				});
				var activeTab = localStorage.getItem('activeTab');
				if(activeTab){
					$('#myTab a[href="' + activeTab + '"]').tab('show');
				}
			} );
		</script>
	</body>
</html>