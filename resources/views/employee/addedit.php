<?php 
$title="Employee Add";
if(!empty($employee->employee_id)){
	$title="Employee Edit";
}
include('resources/views/includes/header.blade.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?php echo $title; ?>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			 <div class="col-md-12">
				<!-- Horizontal Form -->
				<div class="box box-primary">
				<!-- form start -->
					<form class="form-horizontal" method="post" id="form-validate" >
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<input type = "hidden" name = "employee_id" value="<?=@$employee->employee_id?>">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Employee Name</label>
								<div class="col-sm-6">
									<input type="text" id="emp_name" name="emp_name" class="form-control" placeholder="Employee Name" value="<?=@$employee->emp_name?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Employee Email</label>
								<div class="col-sm-6">
									<input type="text" id="emp_email" name="emp_email" class="form-control" placeholder="Employee Email" value="<?=@$employee->emp_email?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Date of Birth</label>
								<div class="col-sm-6">
									<input type="text" id="emp_dob" name="emp_dob" class="form-control adddatepicker" placeholder="Select your date" value="<?=@$employee->emp_dob?>" />
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> Address</label>
								<div class="col-sm-6">
									<input id="autocomplete" name="emp_address" class="form-control" placeholder="Address" value="<?=@$employee->emp_address?>" onblur="fillInAddress()"/>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> City</label>
								<div class="col-sm-6">
									<input type="text" id="locality" name="emp_city" class="form-control" placeholder="City" value="<?=@$employee->emp_city?>" readonly />
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> State</label>
								<div class="col-sm-6">
									<input type="text" id="administrative_area_level_1" name="emp_state" class="form-control" placeholder="State" value="<?=@$employee->emp_state?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label"> Country</label>
								<div class="col-sm-6">
									<input type="text" id="country" name="emp_country" class="form-control" placeholder="Country" value="<?=@$employee->emp_country?>" readonly />
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">Pincode</label>
								<div class="col-sm-6">
									<input type="text" id="postal_code" name="emp_pincode" maxlength="5" class="form-control" placeholder="Pincode" value="<?=@$employee->emp_pincode?>" />
								</div>
							</div>
						
						</div><!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-info col-sm-offset-4">Save</button>
							<a class="btn btn-danger" href="<?=URL::to("/");?>/employee">Back</a>
						</div><!-- /.box-footer -->
					</form>
				</div><!-- /.box -->
			 </div>
		</div>   <!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
	$(document).ready(function() {
		var vRules = {
			emp_name:{required:true},
			emp_dob:{required:true},
			emp_address:{required:true},
			emp_city:{required:true},
			emp_state:{required:true},
			emp_pincode:{required:true},
			emp_email:{required:true,email:true}
		};
		var vMessages = {
			emp_name:{required:"Please enter employee name"},
			emp_dob:{required:"Please select date of birth"},
			emp_address:{required:"Please enter address"},
			emp_city:{required:"Please enter city"},
			emp_state:{required:"Please enter state"},
			emp_country:{required:"Please enter country"},
			emp_pincode:{required:"Please enter pincode"},
			emp_email:{required:"Please enter your email"}
		};

		$("#form-validate").validate({
			rules: vRules,
			messages: vMessages,
			submitHandler: function(form) {	
				$(form).ajaxSubmit({
					url:"<?=URL::to("/");?>/employee/addedit", 
					type: 'post',
					dataType:'json',
					cache: false,
					clearForm: false,
					success: function (response) {               
						if(response.status=="success")
						{
							alert(response.msg);
							window.location.href="<?=URL::to("/");?>/employee";
						}else{
							alert(response.msg);
							return false;
						}
					}
				});
			}
		});
   
	});
	
</script>
<script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        /* street_number: 'short_name',
        route: 'long_name', */
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'long_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
		//console.log(place.address_components);
		if(typeof place.address_components != 'undefined')
        for (var i = 0; i < place.address_components.length; i++) {

          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6D-wD6CXVyXH7z1z4Til5zQu-l1NCt6E&libraries=places&callback=initAutocomplete" async defer></script>
<?php include('resources/views/includes/footer.blade.php');?>