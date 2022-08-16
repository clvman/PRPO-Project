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






			   "order": [[ 0, "desc" ]],
			autoFill: true,
			 keys: true,
			  //colReorder: true,
			 stateSave: true,

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
            filename:'WholeSales Trouble Tickets',
            sheetName: 'WholeSale Export',
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
        {
            extend: 'colvis',
           
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
						      'ticket_id','created_on','customer_name',
						      'ticket_status','ticket_details',
						      'ticket_severity',
						      'ticket_requester',
						      'assigned_to',
						      'ticket_subject',
						      'circuit_id',
						      'customer_impact',
						      'ticket_last_update',
						      'ticket_first_responce',
						      'SLA_Hour',
						      'ticket_due_date',
						        'ticket_id',
      ],
				},
			},
			columns: [
{data: 'ticket_id'},
{data: 'created_on'},
{data: 'customer_name'},
{data: 'ticket_status'},
{data: 'ticket_details',  render: $.fn.dataTable.render.ellipsis()  },

{   data: 'ticket_severity',
    render:function (ticket_severity) {
      if(ticket_severity=='Critical'){return '<span class="badge badge-danger">'+ticket_severity+'</span>'}
      	                                      //
           else{return '<span class="badge badge-warning">'+ticket_severity+'</span>'}
  
}},

{data: 'ticket_requester'},
{data: 'assigned_to'},
{data: 'ticket_subject', render: $.fn.dataTable.render.ellipsis()  },
{data: 'circuit_id'},
{data: 'customer_impact'},
{data: 'ticket_last_update'},
{data: 'ticket_first_responce'},
{data: 'SLA_Hour'},
{data: 'ticket_due_date'},
{data: 'ticket_id',render:function (ticket_id) {
	return '<a href=view_ticket?ticket_id='+ticket_id+'><i class="fas fa-edit"></i></a>'
}},
],




		
			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;

					switch (column.title()) {


						case 'customer_name':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="2"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;



						case 'assigned_to':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="7"]').append('<option value="' + d + '">' + d + '</option>');

							});
							break;



						case 'ticket_severity':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="5"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;
					
						case 'ticket_requester':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="6"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;
	

						case 'customer_impact':
							column.data().unique().sort().each(function(d, j) {
								$('.kt-input[data-col-index="10"]').append('<option value="' + d + '">' + d + '</option>');
							});
							break;




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