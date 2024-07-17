<?php

ob_start();

session_start();

$websiteTitle = "Report History";

include("inc/header.inc.php");

include("config/config.php");


if ($_SESSION['userid'] == '') {

	header("Location: login.php");

	exit;

}

$page = 'reportHistory';

include('inc/left_menu.php');

$cond="";

if($_SESSION['userid']!='1')
{
$sql = mysqli_query($con, "select * from tbl_county_information where user_id='".$_SESSION['userid']."'  order by id desc");
}
else
{
  $sql = mysqli_query($con, "select * from tbl_county_information order by id desc");
}

?>
<style>
    .modal-content {
 
  width: 160% !important;
  
}

.odd
{
    background:#f2dede !important;
}

.even
{
    background:#dff0d8 !important;
}

.table {
  color: black !important;
}

.modal-body {
  color: black !important;
}
</style>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Governancy Information History</h6>
                        </div>
                        <div class="card-body">

                       

                        

                        <form method="post" action="report_pdf.php">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th style="display:none;">Sr. No.</th>  
                                              
                                            <th>Zip Code</th>
                                            
                                            <th>County Name</th>
                                            <th>City</th>
                                            <th>Mayor</th>
                                            <th>Population</th>
                                            <th>Male Population</th>
                                            <th>Female Population</th>
                                            <th>Democratic Voters</th>
                                            <th>Republic Voters</th>
                                            <th>Indpenendent Voters</th>
                                            <th>Average Age</th>
                                            
                                            <th>Total Scholls</th>
                                            <th>School Rating</th>
                                            <th>City Manager</th>
                                            <th>City Clerk</th>
                                            <th>Finance Director</th>
                                            <th>Public Work Director</th>
                                            
                                            <th>Police Chief</th>
                                            <th>Fire Chief</th>
                                            
                                            <th>Parks and Recreation Director</th>
                                            <th>Planning and Zonning Director</th>
                                            <th>Economic Development Director</th>
                                            <th>Human Resource Director</th>
                                            <th>Information Technology Director</th>
                                            <th>Utilities Director</th>

                                            <th>Housing and Community Development Director</th>
                                            <th>Envirnmental Services Director</th>
                                            <th>City Attorney</th>

                                            <th>All Forthcoming elections</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th style="display:none;">Sr. No.</th>  
                                              
                                              <th>Zip Code</th>
                                              
                                              <th>County Name</th>
                                              <th>City</th>
                                              <th>Mayor</th>
                                              <th>Population</th>
                                              <th>Male Population</th>
                                              <th>Female Population</th>
                                              <th>Democratic Voters</th>
                                              <th>Republic Voters</th>
                                              <th>Indpenendent Voters</th>
                                              <th>Average Age</th>
                                              
                                              <th>Total Scholls</th>
                                              <th>School Rating</th>
                                              <th>City Manager</th>
                                              <th>City Clerk</th>
                                              <th>Finance Director</th>
                                              <th>Public Work Director</th>
                                              
                                              <th>Police Chief</th>
                                              <th>Fire Chief</th>
                                              
                                              <th>Parks and Recreation Director</th>
                                              <th>Planning and Zonning Director</th>
                                              <th>Economic Development Director</th>
                                              <th>Human Resource Director</th>
                                              <th>Information Technology Director</th>
                                              <th>Utilities Director</th>
  
                                              <th>Housing and Community Development Director</th>
                                              <th>Envirnmental Services Director</th>
                                              <th>City Attorney</th>
  
                                              <th>All Forthcoming elections</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                            $i=1;
                              while ($r = mysqli_fetch_assoc($sql)) 
                              {
                              ?>
                                <tr class="success">
                               
                                <td style="display:none;"><?php echo $i; ?></td>
                                  
                                
                                  <td><?php echo $r['zip']; ?></td>
                                  
                                  
                                  <td><?php echo $r['county']; ?></td>            
                                   <td><?php echo $r['city']; ?></td>             
                                               
                                   <td><?php echo $r['mayor']; ?></td>          
                                   <td><?php echo $r['total_population']; ?></td>     
                                   <td><?php echo $r['male_population']; ?></td>   
                                   <td><?php echo $r['female_population']; ?></td>    
                                   <td><?php echo $r['democratic_voters']; ?></td>           
                                   <td><?php echo $r['rupblic_voters']; ?></td>             
                                   <td><?php echo $r['independent_voters']; ?></td>              
                                   <td><?php echo $r['avg_age']; ?></td>   
                                   <td><?php echo $r['total_school']; ?></td>          
                                   <td><?php echo $r['school_rating']; ?></td>    
                                   <td><?php echo $r['city_manager']; ?></td>       
                                   <td><?php echo $r['city_clerk']; ?></td>

                                   <td><?php echo $r['finance_director']; ?></td>
                                   <td><?php echo $r['public_work_director']; ?></td>
                                   <td><?php echo $r['police_chief']; ?></td>
                                   <td><?php echo $r['fire_chief']; ?></td>
                                   <td><?php echo $r['park_recretion_director']; ?></td>
                                   <td><?php echo $r['planning_director']; ?></td>
                                   <td><?php echo $r['economic_director']; ?></td>
                                   <td><?php echo $r['human_resource_director']; ?></td>
                                   <td><?php echo $r['it_director']; ?></td>
                                   <td><?php echo $r['utility_director']; ?></td>
                                   <td><?php echo $r['housing_director']; ?></td>

                                   <td><?php echo $r['environment_director']; ?></td>
                                   <td><?php echo $r['city_attorney']; ?></td>
                                 


                                   <td><?php echo nl2br($r['upcoming_elections']); ?></td>  

                                 
                                  
                                </tr>

                              <?php
                              $i++;
                              }

                              ?>
                                    </tbody>
                                </table>
                             
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Information for Zip Code - <b><span id="zip_info"></span></b></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="county_info">
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

            <?php  include('inc/footer.inc.php'); ?> 
            <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        function setCountyInfo(id,zip)
        {
            var data=$("#info_p_"+id).html();
            $("#county_info").html(data);
            $("#zip_info").html(zip);
        }
    </script>