<?php

    /*********************************************************************************
	* PROJECT: ZETA 1.0.0
	* AUTHOR: NOMAN
	* FILE FOR: DELIVERY ROLE USER INTERFACE AND TABLES OF ALL STATUSES
	* 
	* VARIABLES
	* @PARAM	{STRING}	HOST								//DB HOST
	* @PARAM	{STRING}	USERNAME							//HOST USERNAME
	* @PARAM	{STRING}	PASSWORD							//HOST PASSWORD
	* @PARAM	{STRING}	DBNAME								//DATABASE NAME
	*
	/********************************************************************************/
    
    //INCLUDE DIRECTORIES
    include "../base/db.php";
    include '../base/deliveryNoteDownload.php';

    //KEEP TRACK ON SESSION VARIABLES
    if(!session_id()) session_start();
	if(!isset($_SESSION['_deliveryLogin'])){
		date_default_timezone_set('Asia/Dubai'); 
		app_log("'".date('d-m-Y H:i:s')."' : Session is not set, Login Attempt DELIVERY User");
		header('Location:../index.php');
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
                                    <h4 class="content-title mb-0 my-auto">Order</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">/ Approve Order</span>
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
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs main-nav-line nav-justified">
                                                        <li class="nav-item"><a href="#outfordelivery" class="nav-link active" data-toggle="tab">Out for Delivery</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="outfordelivery">
                                                    <div class="table-responsive">
                                                        <table id="deliverytable" class="testclass table key-buttons text-md-nowrap">
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
                                                                    <th class="border-bottom-0">Consult</th>
                                                                    <th class="border-bottom-0">Image</th>
                                                                    <th class="border-bottom-0">Comment</th>
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
                    <!--IMAGE MODAL-->
                    <div class="modal effect-scale show" id="imagemodalone">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div id="content-data"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "../footer/footer.php"; ?>
        </div>
        <!-- End Page -->
        <!-- Back-to-top -->
        <a href="#top" id="back-to-top"><i class="ti-angle-double-up"></i></a>
        <!-- JQuery min js -->
        <script src="../assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap Bundle js -->
        <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
        <!-- eva-icons js -->
        <script src="../assets/js/eva-icons.min.js"></script>
        <!-- Horizontalmenu js-->
        <script src="../assets/plugins/horizontal-menu/horizontal-menu-2/horizontal-menu.js"></script>
        <!-- Sticky js -->
        <script src="../assets/js/sticky.js"></script>
        <!-- Internal Select2 js-->
        <script src="../assets/plugins/select2/js/select2.min.js"></script>
        <!--Internal Sumoselect js-->
        <script src="../assets/plugins/sumoselect/jquery.sumoselect.js"></script>
        <script src="../assets/plugins/rating/jquery.rating-stars.js"></script>
        <script src="../assets/plugins/rating/jquery.barrating.js"></script>
        <!-- Sweet-alert js  -->
		<script src="../assets/plugins/sweet-alert/sweetalert.min.js"></script>
		<script src="../assets/js/sweet-alert.js"></script>
        <!-- custom js -->
        <script src="../assets/js/custom.js"></script>
        <!-- Internal Modal js-->
        <script src="../assets/js/modal.js"></script>

        <script type="text/javascript">
            // NO MAN LINES
            // function getQueryParams(qs) {
            //     qs = qs.split('+').join(' ');
            //     var params =    {},
            //     tokens,
            //     re = /[?&]?([^=]+)=([^&]*)/g;
                                                
            //     while (tokens = re.exec(qs)) {
            //             params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
            //     }
            //     return params;
            // }           
            // window.onload = function (e) {
            //     var query = getQueryParams(document.location.search);
            // };

            $(document).ready(function() {

				//DATATABLE IMPLEMENTATION

				//INITIATING TABLE OUT FOR DELIVERY
				//IDISPLAYLENGTH - TABLE WILL DISPLAY 100 RECORDS, HAS BEEN PAGINATED
				//SENT TO FILE	- FETCH.PHP WITH STATUS: OUT FOR DELIVERY TO FETCH ALL NEW ORDER RECORDS
				//SENT TO FILE	- FETCH.PHP WITH NEXT STATUS: DELIVERED TO CHANGE THE STATUSES WITH BUTTONS ON ACTION COLUMN
				//DRAWCALLBACK	- TABLE ROWS WILL BE CATEGORIZED WITH DELIVERY DATES
				//ROWCALLBACK	- TABLE ROWS WILL BE HIGHLIGHTED IF THE ORDER RECORD IS EDITED/FROM SHARAG DG/NOON
                
                //NO MAN LINES
                // var query = getQueryParams( document.location.search );
                // if ( query ) {
                //     if ( query.search ) {
                //         var table = $('#deliverytable').val( query.search ).DataTable( {
                //             "processing":   true,
                //             "serverSide":   true,
                //             "paging"    :   true,
                //             "retrieve"  :   true,
                //             "iDisplayLength" : 100,
                //             "ajax": {
                //                 url  :"../order/fetch.php",
                //                 type : "POST",
                //                 data : {
                //                     status : 'Out for Delivery',
                //                     nextStatus : 'Delivered'
                //                 }
                //             },
                //             "rowCallback": function( row, data, index ) {
                //                 if ( data[7] == "Sharaf DG" )
                //                 {
                //                     $('td', row).css('background-color', '#b5b5de');
                //                 }
                //                 else if ( data[7] != "Sharaf DG" )
                //                 {
                //                     $('td', row).css('background-color', 'white');
                //                 }
                //             },
                //             "drawCallback": function ( settings ) {
                //                 var api = this.api();
                //                 var rows = api.rows( {page:'current'} ).nodes();
                //                 var last=null; 
                //                 api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                //                     if ( last !== group ) {
                //                         $(rows).eq( i ).before(
                //                             '<tr class="group"><td class="delback"colspan="13">'+'<strong> Delivery On : '+group+'</strong></td></tr>'
                //                         );
                //                         last = group;
                //                     }
                //                 } );
                //             },
                //         } );
                //         table.search(query.search).draw();
                //     }
                // }

                var table = $('#deliverytable').DataTable( {
					"processing": 	true,
					"serverSide": 	true,
					"paging"	:	true,
					"searching"	:	true,
					"sDom": 'Brtip',
					"buttons": [
						
					],
					"iDisplayLength"	:	100,
					"ajax": {
						url  :"../order/fetch.php",
						type : "POST",
						data : {
							status : 'Out for Delivery'
						}
					},
                    "rowCallback": function( row, data, index ) {
                        if ( data[7] == "Sharaf DG" )
                        {
                            $('td', row).css('background-color', '#b5b5de');
                        }
                        else if ( data[7] != "Sharaf DG" )
                        {
                            $('td', row).css('background-color', 'white');
                        }
                    },
                    "drawCallback": function ( settings ) {
                        var api = this.api();
                        var rows = api.rows( {page:'current'} ).nodes();
                        var last=null; 
                        api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                            if ( last !== group ) {
                                $(rows).eq( i ).before(
                                    '<tr class="group"><td class="delback"colspan="13">'+'<strong> Delivery On : '+group+'</strong></td></tr>'
                                );
                                last = group;
                            }
                        } );
                    },
                    "autoWidth": false,
					"aoColumnDefs": [{ "bSortable": false, "bSearchable": false, "aTargets": [2,4,5,6,7,8,9,10,11,12 ] } ],
					"aoColumns": [{ "sWidth": "5%" }, { "sWidth": "5%" },{ "sWidth": "2%" }, { "sWidth": "3%" },{ "sWidth": "2%" },{ "sWidth": "20%" },{ "sWidth": "12%" },{ "sWidth": "3%" },{ "sWidth": "15%" },{ "sWidth": "5%" },{ "sWidth": "3%" },{ "sWidth": "15%" },{ "sWidth": "3%" }]
                } );
                
                $(document).on('click','#statusChangeNext',function(event){
                    event.preventDefault();
                    var statusid = $(this).attr('data-id');
                    var prodStat;
                    $.ajax({
                        url     : '../order/statusChange.php',
                        method  : 'POST',
                        dataType: 'json',
                        data    : {statusid : statusid},
                        success : function(response)
                        {
                            if(response.index == 1){
                                swal({
                                    title: 'Status Changed',
                                    text: 'Order Status is Changed Succesfully',
                                    type: 'success',
                                    confirmButtonColor: '#57a94f',
                                    allowOutsideClick: true
                                });
                                    $('#deliverytable').DataTable().ajax.reload();
                            }
                            else{
                                console.log('AUL AUL AUL');
                            }
                        }
                    });
				});
            });
        </script>
    </body>
</html>