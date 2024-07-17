<?php
ob_start();
session_start();
$websiteTitle="My Account";
include("inc/header.inc.php");
 
	$page='myAccount';
	include('config/config.php'); 
	include('inc/left_menu.php'); 
	
	
	  
	$user_data=mysqli_fetch_assoc(mysqli_query($con,"select name,email,plain_pass,phone from tbl_user where id='".$_SESSION['userid']."'"));
	 
		
	function encrypt($encrypt)
	{ 
		$encrypted=sha1(md5(base64_encode($encrypt)));
	
		return $encrypted;
	}	
	
	//if update button is set
	if(isset($_POST['submit']) && $_POST['submit']=='Update')
	{		
					$id=$_POST['id'];
					
					mysqli_query($con,"update tbl_user
												set
												name='".$_REQUEST['name']."',
												password='".encrypt($_REQUEST['password'])."',
												plain_pass='".$_REQUEST['password']."',
												phone='".$_REQUEST['phone']."'
												where id='".$_SESSION['userid']."'");
												
			
					header("Location:my_account.php?msg=2");
					exit;
	}
		
		?>
      <style>
	  .multiselect-container
	  {
		  width:200px !important;
	  }
	  </style>
           <div class="content-body">
        <!-- page content -->
        	     <div class="container-fluid">
				   <div class="row page-titles mx-0">
				
				   
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                       <li class="breadcrumb-item">My Account</li>
                       <li class="breadcrumb-item active"><a href="#">Account Settings</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
			
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
						<?php
						if($_GET['msg']=='2')
						{
						?>
						<div class="alert alert-success">
						  <strong>Success!</strong> Account Settings Updated Successfully.
						</div>
						<?php
						}
						?>
                             
				 <h4 class="card-title"> My Account</h4>
				 <hr />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" 
					enctype="multipart/form-data" method="post" onSubmit="return validate();">
					
					
                      <div class="row">
                      
					  <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="Brand Name ">Name 
						<span class="required">*</span>
                        </label>
                      
                          <input type="text" id="name" name="name" placeholder="Enter Name" 
								value="<?php echo $user_data['name'];?>"  class="form-control" required="required">
                      
                      </div>
					  
					  
					  <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="Brand Name ">Phone 
						<span class="required">*</span>
                        </label>
                      
                          <input type="text" id="phone" name="phone" placeholder="Enter Phone" 
								value="<?php echo $user_data['phone'];?>"  class="form-control" required="required">
                      
                      </div>
					  
					   <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="Brand Name ">Email 
						<span class="required">*</span>
                        </label>
                      
                          <input type="email" id="email" name="email" placeholder="Enter email" 
								value="<?php echo $user_data['email'];?>"  class="form-control" required="required" readonly="readonly">
                      
                      </div>
					  
					   <div class="form-group  col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label" for="Brand Name ">Password 
						<span class="required">*</span>
                        </label>
                      
                          <input type="password" id="password" name="password" placeholder="Enter password" 
								value="<?php echo $user_data['plain_pass'];?>"  class="form-control" required="required">
                      
                      </div>
					  
					 
					 
                      <div class="ln_solid"></div>
					  
                       <div class="form-group  col-md-12 col-sm-12 col-xs-12 text-center">
                          <button class="btn btn-primary" type="button" onClick="window.location='dashboard.php'">Cancel</button>
						  <button type="submit" name="submit" value="Update" class="btn btn-success">Update</button>
                      </div>
</div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
         
        </div>
        <!-- /page content -->
						
         </div>
       
     

        <!-- footer content -->
   	    <?php  include('inc/footer.inc.php'); ?>   
	   
      </div>

    
	
  </body>

<!----->
<?php 



?>
<link href="multiselect/bootstrap-multiselect.css" rel="stylesheet" />
<script src='multiselect/bootstrap-multiselect.js'></script>
<script>
	//Setting focus on first field of form
	$(document).ready(function()
	{
		$("#name").focus();
		
		$('#department').multiselect({

			includeSelectAllOption: false

		});
	});
	/****************************************************
	Function name :- validate
	Developer :- Shankar Kanase
	Parameters :- 	
	Purpose :- To validate form values
	Returns :- 
	*****************************************************/
	function validate()
	{
		if($("#name").val()=='')
		{
			alert("Please enter User Name");
			$("#name").focus();
			return false;	
		}
		
	}


</script>
<!--//scrolling js-->
</body>
</html>
