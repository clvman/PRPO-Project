<?php include('includes/header.php') ;?>    
<style>
  table.dataTable tbody th, table.dataTable tbody td {
      padding: 6px 10px; /* e.g. change 8x to 4px here */
  }
  table#dataTable tbody tr:hover {
    background-color: #ffa;
  }
  table#dataTable tbody tr:hover > .sorting_1 {
    background-color: #ffa;
  }
  table#dataTable thead:hover {
    background-color: #ffa;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- begin::Body -->
  <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__logo">
        <a href="index.html">
          <img alt="Logo" src="assets/media/logos/logo-1.png" />
        </a>
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
                <ul class="kt-menu__nav ">
                </ul>
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
            <div class="kt-portlet kt-portlet--mobile">
              <div class="kt-portlet__head">
                  <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                      All Suppliers
                    </h3>
                  </div>
              </div>
            <!-- begin:: Subheader -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Supplier Name</th>
                      <!--  <th>Role</th> -->
                      <th>Country</th>
					            <th>Telephone Number</th>
                      <th>Fax</th>
                      <th>Address</th>
                      <th>Email</th>  
					            <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>    <!-- end:: Subheader -->
            <!-- begin:: Content -->
            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            </div>

            <!-- end:: Content -->
          </div>
        </div>
 
        <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Delete Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Do You confirm deleting this  Supplier?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-brand" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-outline-brand">Confirm</a>
                
              </div>
            </div>
          </div>
        </div> 
<script>
  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<script>
 $(document).ready(function() {
    // Setup - add a text input to each footer cell
      $('#dataTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
              'url':'all_suppliers_datatable.php'
          },
          'columns': [
            { data: 'supplier_name' },
            { data: 'country' },
            { data: 'telephone_number' },
            { data: 'fax' },
            { data: 'address' },
            { data: 'email' },
            { data: 'edit' },
            { data: 'delete' }
          ],
          orderCellsTop: true,
          fixedHeader: true,
          buttons: [
           {
              extend: 'excelHtml5',
              text: '<i class="fas fa-file-export"></i>', 
              filename:'All Suppliers',
              sheetName: 'Export',
              titleAttr: 'Excel Export',
            }, 
            {
              titleAttr: 'Add Supplier',
              className: 'buttons-alert',
              id: 'ExportButton',
              text: '<i class="fas fa-plus"></i>',
              action: function (e, dt, node, config)
              {
                  //This will send the page to the location specified
                  window.location.href = 'add_supplier.php';
              }
            },
         ],
         dom: 'lfBrtip<"actions">',
      });

      $("tbody").on('click', '.trigger_btn', function() {
          var index = $(this).attr("data-index");
          $(".modal-footer a").attr('href', 'users_role.php?delete_suppliers=' + index);
          $('#myModal').modal('show');
      })    
} );
</script>
<script>
  var myButton = document.getElementsByName('dynamic');
  var myInput = document.getElementsByName('viewPass');
  myButton.forEach(function(element, index){
    element.onclick = function(){
       'use strict';

        if (myInput[index].type == 'password') {
            myInput[index].setAttribute('type', 'text');
            element.firstChild.textContent = 'Hide';
            element.firstChild.className = "";

        } else {
             myInput[index].setAttribute('type', 'password');
             element.firstChild.textContent = '';
              element.firstChild.className = "fa fa-eye-slash";
        }
    }
  })
</script>
<?php include('includes/footer.php') ?>