<?php include('includes/header.php') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js" type="text/javascript"></script>


	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->

		<!-- begin:: Root -->
		<div class="kt-grid kt-grid--hor kt-grid--root">

			<!-- begin:: Page -->
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

				<!-- begin:: Aside -->
				<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
				<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

					<!-- begin::Aside Brand -->
                     <?php include('includes/sidebar_logo.php') ?>

					<!-- end:: Aside Brand -->

					<!-- begin:: Aside Menu -->
				 <?php include('includes/sidebar.php') ?>


					<!-- end:: Aside Menu -->

					<!-- begin:: Aside Footer -->
					<div class="kt-aside__footer kt-grid__item" id="kt_aside_footer">
						
					</div>

					<!-- end:: Aside Footer-->
				</div>

				<!-- end:: Aside -->

				<!-- begin:: Wrapper -->
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

						<!-- begin:: Header Menu -->
						<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
						<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
							<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
							
							</div>
						</div>

						<!-- end:: Header Menu -->

						<!-- begin:: Header Topbar -->
						<div class="kt-header__topbar">

						

					

				


							<!--begin: User Bar -->
						 
                            <?php include('includes/navbar.php') ?>
							<!--end: User Bar -->


						</div>

						<!-- end:: Header Topbar -->
					</div>

					<!-- end:: Header -->
					<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

						<!-- begin:: Subheader -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							
						</div>

						<!-- end:: Subheader -->

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
						
							<div class="kt-portlet kt-portlet--mobile">
								<div class="kt-portlet__head">
									<div class="kt-portlet__head-label">
										<h3 class="kt-portlet__head-title">
											All Tickets
										</h3>
									</div>
								</div>
								<div class="kt-portlet__body">



									<!--begin: Search Form -->

									<div class="kt-section__content kt-section__content--border">
										
										<button  id="advanced_search" class="btn btn-primary">Advanced search <i class="fas fa-search"></i></button><br><br>
									</div>
									 
									
                 
                                    <div  style="display:none" id="myDIV">
                                    	<div class="form-group form-group-last">
									<form class="kt-form kt-form--fit kt-margin-b-20">
										<div class="row kt-margin-b-40">



											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Ticket ID:</label>
												<input type="text" class="form-control kt-input"  data-col-index="0" placeholder="Enter Ticket ID">
											</div>


										 
											
											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Creation Date:</label>
												<div class="input-daterange input-group" id="kt_datepicker">
													<input type="text" class="form-control kt-input" name="start" placeholder="From" data-col-index="1" />
													<div class="input-group-append">
														<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
													</div>
													<input type="text" class="form-control kt-input" name="end" placeholder="To" data-col-index="1" />
												</div>
											</div>
										

											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Status:</label>
												<select class="form-control kt-input" data-col-index="4">
													<option value="">Select</option>
												</select>
											</div>


											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Domain:</label>
												<select class="form-control kt-input" data-col-index="3">
													<option value="">Select</option>
												</select>
											</div>
										
										</div>
										<div class="row kt-margin-b-20">

											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Severity:</label>
												<select class="form-control kt-input" data-col-index="5">
													<option value="">Select</option>
												</select>
											</div>
										<!-- 	<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Ticket Details:</label>
												<input placeholder="Type Here.." type="text" class="form-control kt-input"  data-col-index="14">
											</div>







											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Requester:</label>
												<select class="form-control kt-input" data-col-index="6">
													<option value="">Select</option>
												</select>
											</div>

											<div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
												<label>Customer Impact:</label>
												<select class="form-control kt-input" data-col-index="10">
													<option value="">Select</option>
												</select>
											</div> -->


										</div>
										
										<div class="kt-separator kt-separator--md kt-separator--dashed"></div>
										<div class="row">
											<div class="col-lg-12">
												<button class="btn btn-brand kt-btn kt-btn--icon" id="kt_search">
													<span>
														<i class="la la-search"></i>
														<span>Submit</span>
													</span>
												</button>
												&nbsp;&nbsp;
												<button class="btn btn-secondary kt-btn kt-btn--icon" id="kt_reset">
													<span>
														<i class="la la-close"></i>
														<span>Reset</span>
													</span>
												</button>
											</div>
										</div>
									</form></div>
									</div>

									<!--begin: Datatable -->
									<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
									<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
										<thead>
											<tr>
												<th>Ticket ID</th>
												<th>created On</th>
												<th>Owner</th>
												<th>Domain</th>
												<th>Status</th>
												<th>Severity</th>
												<th>Service Impact</th>
												<th>SLA (Days)</th>
												<th>Last Updated On</th>
												<th>Resolved On</th>
												<th>Screen</th>
												<th>Scenario</th>
												<th>Description</th>												 


											</tr>
										</thead>

									</table>

									<!--end: Datatable -->
								</div>
							</div>
						</div>

						<!-- end:: Content -->
					</div>

	

<script>
$(document).ready(function(){
  $("#advanced_search").click(function(){
    $("#myDIV").fadeToggle();
    //$("#div2").fadeToggle("slow");
    //$("#div3").fadeToggle(3000);
  });
});
</script>



		<!--begin::Page Scripts(used by this page) -->
<?php include('includes/footer.php') ?>


<script>
	
"use strict";
var KTDatatablesSearchOptionsAdvancedSearch = function() {

	$.fn.dataTable.Api.register('column().title()', function() {
		return $(this.header()).text().trim();
	});



$.fn.dataTable.render.ellipsis = function () {
    return function ( data, type, row ) {
        return type === 'display' && data.length > 10 ?
            data.substr( 0, 10 ) +'…' :
            data;
    }
};


	var initTable1 = function() {
		// begin first table
		var table = $('#kt_table_1').DataTable({

responsive: true,




			   "order": [[ 0, "desc" ]],
			//autoFill: true,
			 //keys: true,
			  //colReorder: true,
			// stateSave: true,

			//responsive: true,
			// Pagination settings
	             dom: 'lBfrtip<"actions">',
    buttons: [

            {
            	titleAttr: 'Data Refresh',
            text: '<i class="fas fa-sync-alt"></i>',
            action: function ( e, dt, node, config ) {
                dt.ajax.reload();

            }

        },

        {
        	text: '<i class="far fa-copy"></i>', 
            extend: 'copy',
            titleAttr: 'copy',
            exportOptions: {
                columns: ':visible'
            }
        },
        
        {
            extend: 'excelHtml5',
            text: '<i class="far fa-file-excel"></i>', 
            filename:'NCE Trouble Tickets',
            sheetName: 'Export',
            titleAttr: 'Excel Export',
        },

                {
     titleAttr: 'New Ticket Request',
    className: 'buttons-alert',
    id: 'ExportButton',
    text: '<i class="fas fa-plus"></i>',
    action: function (e, dt, node, config)
    {
        //This will send the page to the location specified
        window.location.href = 'add_ticket.php';
    }
        },
        
        {
            extend: 'print',
            titleAttr: 'Print',
            text: '<i class="fas fa-print"></i>',
            exportOptions: {
                columns: ':visible'
            }
        },
       

    ],
			lengthMenu: [5, 10, 25, 50],

			pageLength: 10,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			searchDelay: 500,
			processing: true,
			language: { processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading..n.</span> ',
		                search: "Search:"  },
			serverSide: true,
			ajax: {
				url: 'datatable_api/server.php',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
'ticket_id',
'created_on2',
'owner',
'domain',
'status',
'severity',
'service_impact',
'SLA',
'last_updated_on' ,
'resolution_date',
'screen',
'Scenario' ,
'description',
      ],
				},
			},
			columns: [

{data: 'ticket_id',render:function (ticket_id) {
	return '<a href=edit_ticket.php?ticket_id='+ticket_id+'>'+ticket_id+'</a>'
}},

{data: 'created_on2'},
{data: 'owner'},
{data: 'domain'},
// {data: 'status'},

{   data: 'status',
    render:function (status) {  
      if(status=='Resolved'){return '<span class="badge badge-pill badge-success">'+status+'</span>'}
      	                                      //
           else{return status }
  
}},
 

 

{   data: 'severity',
    render:function (severity) {
      if(severity=='Critical'){return '<span class="badge badge-pill badge-danger">'+severity+'</span>'}
      else if(severity=='Minor') {return '<span class="badge badge-pill badge-info">'+severity+'</span>'

      }	                                      //
           else{return '<span class="badge badge-pill badge-warning">'+severity+'</span>'}
  
}},
{data: 'service_impact'},
{data: 'SLA'},
{data: 'last_updated_on'},
// {data: 'resolution_date'},

{   data: 'resolution_date',
    render:function (resolution_date) {
      if(resolution_date!=null){return resolution_date}
      	                                      //
           else{return '-'}
  
}},


{   data: 'screen',
    render:function (screen) {
      return screen.substring(0, 7);}
  
},
{   data: 'Scenario',
    render:function (Scenario) {
      return Scenario.substring(0, 7);}
  
},
{   data: 'description',
    render:function (description) {
      return description.substring(0, 7);}
  
},
//{data: 'ticket_subject', render: $.fn.dataTable.render.ellipsis()  },
//{data: 'circuit_id'},
//{data: 'customer_impact'},
//{data: 'ticket_last_update'},
//{data: 'ticket_first_responce'},
//{data: 'SLA_Hour'},
//{data: 'ticket_due_date'},
//{data: 'ticket_id',render:function (ticket_id) {
	//return '<a href=edit_ticket.php?ticket_id='+ticket_id+'><i class="fas fa-edit"></i></a>'
//}},
],




		
			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;

					switch (column.title()) {


						case 'Status':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="4"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;



						case 'Domain':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="3"]').append('<option value="' + d + '">' + d + '</option>');

							});
							break;



						case 'Severity':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="5"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;
					
						// case 'ticket_requester':
						// 	column.data().unique().sort().each(function(d, j) {
						// 		$('.kt-input[data-col-index="6"]').append('<option value="' + d + '">' + d + '</option>');
						// 	});
						// 	break;
	

						// case 'customer_impact':
						// 	column.data().unique().sort().each(function(d, j) {
						// 		$('.kt-input[data-col-index="10"]').append('<option value="' + d + '">' + d + '</option>');
						// 	});
						// 	break;




					}
				});
			},
			
		});




	var filter = function() {
			var val = $.fn.dataTable.util.escapeRegex($(this).val());
			table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
		};

		var asdasd = function(value, index) {
			var val = $.fn.dataTable.util.escapeRegex(value);
			table.column(index).search(val ? val : '', false, true);
		};

		$('#kt_search').on('click', function(e) {
			e.preventDefault();
			var params = {};
			$('.kt-input').each(function() {
				var i = $(this).data('col-index');
				if (params[i]) {
					params[i] += '|' + $(this).val();
				}
				else {
					params[i] = $(this).val();
				}
			});
			$.each(params, function(i, val) {
				// apply search params to datatable
				table.column(i).search(val ? val : '', false, false);
			});
			table.table().draw();
		});

		$('#kt_reset').on('click', function(e) {
			e.preventDefault();
			$('.kt-input').each(function() {
				$(this).val('');
				table.column($(this).data('col-index')).search('', false, false);
				 table.search('').draw(); //required after
			});
			table.table().draw();
		});




		$('#kt_datepicker').datepicker(
		{
			    format: "yyyy-mm-dd",
                todayBtn: "linked",
		} 
		);




     
	

	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesSearchOptionsAdvancedSearch.init();
});
	
</script>