<!DOCTYPE html>
<html>
	<head>
		<title>AJAX CRUD OPERATION</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	</head>
	<body>
		<div class="container">
			<h1 class="text-primari text-center">AJAX CRUD OPERATION</h1>
			<!-- Button trigger modal -->
			<div class="d-flex justify-content-end">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			  		INSERT DATA
				</button>
			</div>

			<h2 class="text-danger">All Records</h2>
			<div id="records_contant"></div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">AJAX CRUD OPERATION</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
				  	<div class="form-group">
        				<label> Firstname:</label>
        				<input type="text" name="" id="firstname" class="form-control" placeholder="First Name">
        			</div>
					<div class="form-group">
        				<label> lastname:</label>
        				<input type="text" name="" id="lastname" class="form-control" placeholder="First LastName">
        			</div>
					<div class="form-group">
        				<label> Email:</label>
        				<input type="text" name="" id="email" class="form-control" placeholder="Enter Email">
        			</div>
					<div class="form-group">
        				<label> Moblie:</label>
        				<input type="text" name="" id="mobile" class="form-control" placeholder="Enter Mobile Num.">
        			</div>
			      </div>

				  <!--modal footer-->
			      <div class="modal-footer">
				  	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addRecord()">Save changes</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        
			      </div>
			    </div>
			  </div>
			</div>
			<!-- //////insert modal end -->

			<!-- ///////update model -->
			<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">AJAX CRUD OPERATION</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
				  	<div class="form-group">
        				<label> Firstname:</label>
        				<input type="text" name="" id="update_firstname" class="form-control" placeholder="First Name">
        			</div>
					<div class="form-group">
        				<label> lastname:</label>
        				<input type="text" name="" id="update_lastname" class="form-control" placeholder="LastName">
        			</div>
					<div class="form-group">
        				<label> Email:</label>
        				<input type="text" name="" id="update_email" class="form-control" placeholder="Enter Email">
        			</div>
					<div class="form-group">
        				<label> Moblie:</label>
        				<input type="text" name="" id="update_mobile" class="form-control" placeholder="Enter Mobile Num.">
        			</div>
			      </div>

				  <!--modal footer-->
			      <div class="modal-footer">
				  	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="UpdateUserDetails()">Update</button>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <input type="hidden" name="" id="hidden_user_id">
			      </div>
			    </div>
			  </div>
			</div>

			<!-- update modal end -->

		</div>



		<script type="text/javascript">
			//show data script;
			$(document).ready(function(){
				readRecords();
			});
			function readRecords(){
				var readrecords = "readrecords";
				$.ajax({
					url:'class.backend.php',
					type:'post',
					data:{readrecords:readrecords},
					success:function(data,status){
						$('#records_contant').html(data);
					},
				});
			}



			//add data script
			function addRecord(){
				var firstname = $('#firstname').val();
				var lastname = $('#lastname').val();
				var email = $('#email').val();
				var mobile = $('#mobile').val();

				$.ajax({
					url:"class.backend.php",
					type:'post',
					data: { firstname :firstname,
						lastname : lastname,
						email : email,
						mobile : mobile
					},

					success:function(data,status){
						readRecords();
						//alert(status);
					}

				});
  			}


	  		//delete data script
			function DeleteUser(deleteid){
				var conf = confirm("Are You Sure?");
				if(conf == true){
					$.ajax({
						url:"class.backend.php",
						type:"post",
						data:{deleteid:deleteid},
						success:function(data,status){
							readRecords();
						}
					});
				}
			}


			//update show

			function getuser(id){
				$("#hidden_user_id").val(id);
				$.post("class.backend.php",{
					id:id
				},function(data,status){
					var user = JSON.parse(data);
					$("#update_firstname").val(user.firstname);
					$("#update_lastname").val(user.lastname);
					$("#update_email").val(user.email);
					$("#update_mobile").val(user.mobile);
				}

				);
				$('#update_modal').modal("show");
			}

			//update insert

			function UpdateUserDetails(){
				var update_firstname = $("#update_firstname").val();
				var update_lastname = $("#update_lastname").val();
				var update_email = $("#update_email").val();
				var update_mobile = $("#update_mobile").val();

				var hidden_user = $("#hidden_user_id").val();

				$.post("class.backend.php",{
					hidden_user : hidden_user,
					update_firstname : update_firstname,
					update_lastname : update_lastname,
					update_email : update_email,
					update_mobile : update_mobile
				},function(data,status){
					$('#update_modal').modal("hide");
					readRecords();
					//alert(status);//for success message; 
				}
				);
			}


		</script>
	</body>
</html>