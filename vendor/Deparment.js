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
		var table = $('#kt_table_Deparment').DataTable({






			   "order": [[ 0, "desc" ]],
			autoFill: true,
			 keys: true,
			  //colReorder: true,
			 stateSave: true,

			responsive: true,
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
				url: 'datatable_api/department_api.php',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						      'department_name','department_email','department_head',
						      'department_head_email',
      ],
				},
			},
			columns: [
{data: 'department_name'},
{data: 'department_email'},
{data: 'department_head'},
{data: 'department_head_email'},


],




		
		 
			
		});


 
 

	 



	 



     
	

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