<?php 
error_reporting(E_ALL ^ E_NOTICE);  

include ('includes/auth.php');


 ?>

<!DOCTYPE html>

<!--
Theme: Keen - The Ultimate Bootstrap Admin Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: You must have a valid license purchased only from https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/ in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
 		<meta charset="utf-8" />
		<title>Procurement System</title>
		<meta name="description" content="Advanced search datatables examples">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<!--begin::Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

		<!--end::Fonts -->
		<!--begin::Page Custom Styles(used by this page ADD USER) -->
		<link href="assets/css/pages/wizards/wizard-v3.css" rel="stylesheet" type="text/css" />
		<!--begin::Page Vendors Styles(used by this page) -->

		<!--end::Page Vendors Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<link href="assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<!-- 		<link href="assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" /> -->
		<link href="assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Vendor Plugins -->
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--begin:: Vendor Plugins for custom pages -->
		<link href="assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet" type="text/css" />

		<!--end:: Vendor Plugins for custom pages -->

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/brand/navy.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/skins/aside/navy.css" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
	</head>

	<!-- end::Head -->
	<body>

				<div class="form-group row form-group-marginless kt-margin-t-20">
					<label class="col-lg-1 col-form-label">Supplier:</label>
					<div class="col-lg-5">
						<select class="form-control kt_selectpicker" name="supplier" data-size="7" data-live-search="true">
							<option value="">Nothing Selected</option>
							<?php
								$con1=mysqli_connect('localhost','root','123456','prpo');
								$sql1 = "SELECT *  FROM supplier"; 
								$result1 = $con1->query($sql1);
								while($row1 = $result1->fetch_assoc()){
									echo "<option value='".$row1['supplier_name']."'>".$row1['supplier_name']."</option>";
								}
							?>
						</select>	
					</div>														 
					<label class="col-lg-1 col-form-label">TASC Site Code:</label>
					<div class="col-lg-5">

					<select class="form-control kt_selectpicker" data-size="7" data-live-search="true" multiple id="site" name="site">
						<?php
							$sql1 = "SELECT *  FROM sites"; 
							$result1 = $con1->query($sql1);
							while($row1 = $result1->fetch_assoc()){
							// echo "<option value='".$row1['tasc_site_code']."'>"."<b>TASC Site Code</b>: ".$row1['tasc_site_code']."&nbsp;&nbsp;&nbsp;<b>Site Name</b>:".$row1['site_name']."</option>";
							echo "<option value='".$row1['tasc_site_code']."'>"."".$row1['tasc_site_code']."</option>";
							}
						?>
					</select>
					<input type="hidden" name="tasc_site" id="tasc_site" />
					</div>												 
					<input type="hidden" name="location" id="location" />
					<div style="clear:both"></div>
				</div>

				<div class="form-group row form-group-marginless kt-margin-t-20">
					<label class="col-lg-1 col-form-label">Items:</label>
					<div class="col-lg-11">
							<select class="form-control kt_selectpicker" data-size="7" data-live-search="true" multiple id="items" name="items">
								<?php
									$con1=mysqli_connect('localhost','root','123456','prpo');
									$sql1 = "SELECT *  FROM items"; 
									$result1 = $con1->query($sql1);
									while($row1 = $result1->fetch_assoc()){
										echo "<option value='".$row1['material_code']."'>".$row1['material_code']."</option>";
									}
								?>
							</select>
					</div>
				</div>	



<br />
<br />
<br />
<br />
<br />
<br />




<select class="selectpicker" data-size="7" data-live-search="true" id="test">
  <option valu="">nothing</option>
  <option value="Mustard">Mustard</option>
  <option value="Ketchup">Ketchup</option>
  <option value="Barbecue">Barbecue</option>
</select>




<br />
<br />
<br />
<br />
<br />
<br /><br />




					<!-- begin:: Footer -->
					<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__copyright">
								2022&nbsp;&copy;&nbspTASC TOWERS -Jordan IT Team
							</div>
						 
					</div>

					<!-- end:: Footer -->
				</div>

				<!-- end:: Wrapper -->
			</div>

			<!-- end:: Page -->
		</div>
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="la la-arrow-up"></i>
		</div>

		<!-- end:: Scrolltop -->

		<!-- begin:: Demo Toolbar -->
	
		<!-- end:: Demo Toolbar -->

		<!-- begin::Demo Panel -->
		 
		<!-- end::Demo Panel -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"metal": "#c4c5d6",
						"light": "#ffffff",
						"accent": "#00c5dc",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995",
						"focus": "#9816f4"
					},
					"base": {
						"label": [
							"#c5cbe3",
							"#a1a8c3",
							"#3d4465",
							"#3e4466"
						],
						"shape": [
							"#f0f3ff",
							"#d9dffa",
							"#afb4d4",
							"#646c9a"
						]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->

		<!--begin:: Vendor Plugins -->
		<script src="assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
		<script src="assets/plugins/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
		<script src="assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
		<script src="assets/plugins/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
		<script src="assets/plugins/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
		<script src="assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
		<script src="assets/plugins/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
		<script src="assets/plugins/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
		<script src="assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
		<script src="assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
		<script src="assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
		<script src="assets/plugins/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
		<script src="assets/plugins/general/owl.carousel/dist/owl.carousel.js" type="text/javascript"></script>
		<script src="assets/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
		<script src="assets/plugins/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js/global/integration/plugins/dropzone.init.js" type="text/javascript"></script>
		<script src="assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/@yaireo/tagify/dist/tagify.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
		<script src="assets/plugins/general/summernote/dist/summernote.js" type="text/javascript"></script>
		<script src="assets/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
		<script src="assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js" type="text/javascript"></script>
		<script src="assets/plugins/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
		<script src="assets/plugins/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js" type="text/javascript"></script>
		<script src="assets/plugins/general/toastr/build/toastr.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/dual-listbox/dist/dual-listbox.js" type="text/javascript"></script>
		<script src="assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
		<script src="assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
		<script src="assets/plugins/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
		<script src="assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
		<script src="assets/plugins/general/counterup/jquery.counterup.js" type="text/javascript"></script>
		<script src="assets/plugins/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
		<script src="assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js" type="text/javascript"></script>
		<script src="assets/plugins/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
		<script src="assets/plugins/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
		<script src="assets/plugins/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
		<script src="assets/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

		<!--end:: Vendor Plugins -->
		<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>

		<!--begin:: Vendor Plugins for custom pages -->
		<script src="assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/@fullcalendar/daygrid/main.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/@fullcalendar/google-calendar/main.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/@fullcalendar/interaction/main.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/@fullcalendar/timegrid/main.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/js/global/integration/plugins/datatables.init.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/pdfmake/build/pdfmake.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-buttons/js/buttons.print.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
		<script src="assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>

		<!--end:: Vendor Plugins for custom pages -->

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<!-- <script src="assets/js/pages/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script> -->
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) 
		<script src="./advanced-search.js" type="text/javascript"></script>-->



		<!--begin::Page Scripts(used by this page ADD USER) -->
		<script src="assets/js/pages/custom/users/add.js" type="text/javascript"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/i18n/defaults-*.min.js"></script>
		<!--end::Page Scripts -->



	<script type="text/javascript">
		$(document).ready(function(){
			console.log('fdafdsa');
			$(".selectpicker").selectpicker();
 $('.selectpicker').selectpicker({
  noneResultsText: 'I found no results <a href="" onclick=(new_client_select()) > Add New Client</a>'
});
		})
	
	</script>
	</body>

	<!-- end::Body -->
</html>