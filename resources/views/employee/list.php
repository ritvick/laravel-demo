<?php
/*include('resources/views/includes/header.blade.php');

?>

<a href='<?=URL::to('/employee/addedit');?>'>Add Employee</a>
<table border='1'>
	<thead>
		<tr>
			<th>Sr</th>
			<th>Name</th>
			<th>DOB</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Country</th>
			<th>Pincode</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if(!empty($employee)){
			$count = 1;
			foreach($employee as $singleEmp){				
				?>
				<tr>
					<td><?=$count++?></td>
					<td><?=$singleEmp->emp_name?></td>
					<td><?=$singleEmp->emp_dob?></td>
					<td><?=$singleEmp->emp_address?></td>
					<td><?=$singleEmp->emp_city?></td>
					<td><?=$singleEmp->emp_state?></td>
					<td><?=$singleEmp->emp_country?></td>
					<td><?=$singleEmp->emp_pincode?></td>
					<td>
						<a href='<?=URL::to('/employee/addedit/'.$singleEmp->employee_id);?>'>Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href='<?=URL::to('/employee/delete/'.$singleEmp->employee_id);?>'>Delete</a>
					</td>
				</tr>
				<?php
			}
		}
		?>		
	</tbody>
</table>

<?php
include('resources/views/includes/footer.blade.php');
*/ ?>



<?php 
$title="Employee List";
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
						<div class="row">
						<div class="col-lg-12">
							<!--Invoice table-->
							<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
							<div class="panel">
								<div class="panel-heading">
									<a class="btn btn-primary btn-labeled btnAdd pull-right" href='<?=URL::to('/employee/addedit');?>' style="padding-top: 5px;margin-top: 7px;"><i class="fa fa-plus "></i>	Add</a>
								</div>
								<br>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-striped table-bordered staticDatatableEmp  no-footer dtr-inlinetable-bordered table-hover" callfunction = "<?=URL::to("/");?>employee/ajax_material_list">
											<thead>
												<tr>
													<th>Sr</th>
													<th>Name</th>
													<th>Email</th>
													<th>DOB</th>
													<th>Address</th>
													<th>City</th>
													<th>State</th>
													<th>Country</th>
													<th>Pincode</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="emp_list">
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div><!-- /.box -->
			 </div>
		</div>   <!-- /.row -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script>
	function delete_emp(id){
		var r = confirm("Are you sure to delete this record?");
		if (r == true) {
			$.ajax({
				url:"<?=URL::to("/");?>/employee/delete/"+id, 
				type: 'get',
				dataType:'json',
				cache: false,
				clearForm: false,
				success: function (response) {               
					if(response.status=="success")
					{
						alert(response.msg);
						fetch_employee();
					}else{
						alert(response.msg);
						return false;
					}
				}
			});
		}
	}
	
	function fetch_employee(){
		$.ajax({
			url:"<?=URL::to("/");?>/employee/get_all_employee/", 
			type: 'get',
			dataType:'json',
			cache: false,
			clearForm: false,
			success: function (response) {               
				if(response.status=="success")
				{
					var count = 1;
					var html ='';
					if(response.data.length > 0){
						$.each( response.data, function( key, value ) {
							//console.log(value);
							html +='<tr>'+
									'<td>'+(count++)+'</td>'+
									'<td>'+value.emp_name+'</td>'+
									'<td>'+value.emp_email+'</td>'+
									'<td>'+value.emp_dob+'</td>'+
									'<td>'+value.emp_address+'</td>'+
									'<td>'+value.emp_city+'</td>'+
									'<td>'+value.emp_state+'</td>'+
									'<td>'+value.emp_country+'</td>'+
									'<td>'+value.emp_pincode+'</td>'+
									'<td>'+
										'<a href="<?=URL::to("/employee/addedit");?>/'+value.employee_id+'">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;'+
										'<a href="javascript:void(0)" onclick="delete_emp('+value.employee_id+')">Delete</a>'+
									'</td>'+
								'</tr>';
						});
					}
					$("#emp_list").html(html);
					$(".staticDatatableEmp").DataTable();
				}else{
					alert(response.msg);
					return false;
				}
			}
		});
	}
	
	$(document).ready(function() {
		fetch_employee();
	});
</script>
<?php include('resources/views/includes/footer.blade.php');?>