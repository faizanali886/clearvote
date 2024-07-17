<?php
ob_start();
session_start();
include("config/config.php");
include("inc/header.inc.php");

if($_SESSION['userid']=='')
{
  header("Location: index.php");
}
	
include('inc/left_menu.php');


if(isset($_POST['acceptterms']))
         {
            mysqli_query($con,
            "update tbl_user set terms_accepted='1'  where id='".$_SESSION['userid']."'");
            header("Location: dashboard.php");

         }

         $terms= mysqli_fetch_assoc(mysqli_query($con,
         "select terms_accepted from tbl_user where id='".$_SESSION['userid']."'"));
?>
<style>
  #result {
  max-height: 800px;
  height:300px;
  width: 850px;
  overflow: auto;
  border: 1px solid #FFCB05;
  padding: 1px;
  margin-top: 3px;
  font-family: 'Times New Roman', serif;
  font-size: 18px;
  background-color: white;
}

@media only screen and (max-width: 600px) {
  #result {
    width: 100%;
    font-size: 15px;
  }
}


.error_msg
{
  font-size:15px;
  font-weight:bold;
  color:red;
}


#loadingModal .modal-content {
  
  top:50px;
}

label
{
  font-weight:bold !important;
  font-size: 18px !important;
}

.search-container {
  position: relative;
  width: 300px; /* Adjust as needed */
}

.search-icon {
  position: absolute;
  top: 50%;
  left: 10px; /* Adjust as needed */
  transform: translateY(-50%);
  color: #aaa; /* Adjust as needed */
}

.search-input {
  width: 100%;
  padding: 10px 10px 10px 30px; /* Adjust left padding to make space for the icon */
  border: 1px solid #ccc; /* Adjust as needed */
  border-radius: 4px; /* Adjust as needed */
}

.div_border
{
  border: 1px solid;
border-radius: 5px;
margin-right:30px;
padding-left:10px;
margin-top:10px;
background:#D3D2E8 !important;
padding-top:20px;
}

.div_border .row
{
  margin-top:15px;
  
  
}

.result-row
{
  color: black !important;
}

.quote {
  width: 90% !important; /* Adjust width as needed */
  height: auto; /* Adjust height as needed */
  background-color: #f0f0f0; /* Adjust background color as needed */
  border: 1px solid #ccc; /* Adjust border as needed */
  border-radius: 10px; /* Optional: for rounded corners */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adjust shadow properties */
  margin: 20px; /* Optional: for spacing */
  padding:10px;

  
}

.quote-p {
  position: relative; /* Ensure the paragraph is positioned relative to the pseudo-element */
  padding-top:10px;
}

.quote-p::before {
  content: ''; /* No content, just the border */
  position: absolute; /* Position relative to the paragraph */
  top: 0; /* Align to the top of the paragraph */
  left: 25%; /* Start the border 25% from the left to center it */
  width: 50%; /* Border width is 50% of the paragraph's width */
  border-top: 1px solid black; /* Set the border properties */
}

  </style>


        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title form-heading"> Search Your County </h3>
              
            </div>
            <div class="row">
              
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    
                  <p class="error_msg"></p>
                    <form class="form-sample" method="post">
                      <input type="hidden" name="id" value="<?=$_GET['id']?>">
                      
                      <?php
                    if($terms['terms_accepted']=='0')
                    {
                        ?>
                        <div class="row">
                            <p class="error_msg">Please accept terms and Conditions to proceed..</p><br>
                            
                        </div>
                        <div class="row">
                            
                            <button type="button" class="btn btn-primary mb-4 my-report" data-toggle="modal" data-target="#policyModal">Click here to Accept Terms</button>
                        </div>
                        <?php
                    }
                   else
                    {
                    ?>

                        <div class="row search-row">
                      
                         

                          <div class="col-md-12">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Enter County Zip Code</label>
                              

                                <div class="col-sm-2">
                                  <div class="search-container">
                                    <i class="fas fa-search search-icon"></i>
                                    <input type="text" class="search-input" name="county_zip" id="county_zip" placeholder="Search..." maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                  </div>
                                </div>


                              </div>
                          </div>

                          

                          
                          <div class="col-md-12">
                          <button type="button" class="btn btn-primary mb-4 my-report" value="Generate Keywords" id="generate_keyword" name="submit" >Search</button>
                          <br>
                                       
                          
                            </div>


                        </div>

                        <h4 class="result-row" style="display:none;"><b>County Name, <span id="county"></span></b></h4><br>

                        <div class="row result-row" style="display:none;">

                          
                            <div class="col-md-6 ">
                                
                                <div class="div_border">
                                <h4><b>Political Demographics</b></h4><br>
                                  <div class="row">
                                     <div class="col-md-6"><b>Male Voters</b></div> <div class="col-md-6" id="male_population"></div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6"><b>Female Voters</b></div> <div class="col-md-6" id="female_population"></div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6"><b>Democratic Voters</b></div> <div class="col-md-6" id="democratic_voters"></div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6"><b>Republican Voters</b></div> <div class="col-md-6" id="rupblic_voters"></div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6"><b>Independent Voters</b></div> <div class="col-md-6" id="independent_voters"></div>
                                  </div>

                                  <div class="row">
                                     <div class="col-md-6"><b>Avg Voter Age</b></div> <div class="col-md-6" id="avg_age"></div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6"><b>Number of Schools</b></div> <div class="col-md-6" id="total_school"></div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-6"><b>Rating of Schools</b></div> <div class="col-md-6" id="school_rating"></div>
                                  </div><br><br>
                                </div>

                                <div class="div_border">
                                  <h4><b>Upcoming Elections</b></h4>
                                  <p id="upcoming_elections"></p><br>
                                </div>  

                                
                            </div>
                            <div class="col-md-5 div_border">
                                <h4><b>Population</b></h4>
                                <p><span id="total_population"></span> as of <?=date("Y-m-d")?></p><br>

                                <h4><b>County Department and Roles</b></h4>
                                <div class="row">
                                     <div class="col-md-6"><b>City Manager</b></div> <div class="col-md-6" id="city_manager"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>City Clerk</b></div> <div class="col-md-6" id="city_clerk"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Finance Director</b></div> <div class="col-md-6" id="finance_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Public Works Director</b></div> <div class="col-md-6" id="public_work_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Police Chief</b></div> <div class="col-md-6" id="police_chief"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Fire Chief</b></div> <div class="col-md-6" id="fire_chief"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Parks and Recreation Director</b></div> <div class="col-md-6" id="park_recretion_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Planning and Zonning Director</b></div> <div class="col-md-6" id="planning_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Economic Development Director</b></div> <div class="col-md-6" id="economic_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Human Resource Director</b></div> <div class="col-md-6" id="human_resource_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Information Technology Director</b></div> <div class="col-md-6" id="it_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Utilities Director</b></div> <div class="col-md-6" id="utility_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Housing and Community Development Director</b></div> <div class="col-md-6" id="housing_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>Envirnmental Services Director</b></div> <div class="col-md-6" id="environment_director"></div>
                                </div>
                                <div class="row">
                                     <div class="col-md-6"><b>City Attorney</b></div> <div class="col-md-6" id="city_attorney"></div>
                                </div>
                                
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                
                          
                      </div>
                      

                    </form>
                  </div>
                </div>
              </div>
              
            </div>
        </div>
      </div>

          
      
<?php
$data=mysqli_fetch_assoc(mysqli_query($con,"select * from tbl_quotes order by rand() limit 1"));

?>

<div id="loadingModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body text-center">
                <img src="img/logo.png" width="250"> 
                <img src="img/processing.gif">
                <div class="quote">
                    <p><b><?=$data['quotes']?></b></p>    
                    <p class="quote-p"><?=$data['author']?></p>
                </div>
      </div>
      <div class="modal-footer" style="display:none;">
                    <button class="btn btn-secondary cls" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<button data-toggle="modal" data-target="#loadingModal" id="loading_btn"></button>


<div id="policyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <h2>Terms of Use</h2><br>
        
        <p><input type="checkbox" id="check1">&nbsp; This application should not be used for official voting information, as the data may be unreliable and not reflect recent changes.</p>

        <p><input type="checkbox" id="check2">&nbsp; The information in this app may not be accurate or updated, so it should not be relied upon for official voting purposes.</p>

        <p><input type="checkbox" id="check3">&nbsp; Users should consult official sources for voting information, as this application's content may be outdated and unreliable.</p>

                      
       <form method="post" onsubmit="return validateAck();">
        <div class="text-center">
        <button type="submit" class="btn btn-primary mb-2" value="Replace All" name="acceptterms">I accept all Terms and Conditions</button>
                </div>    
    </form>  
    </div>
      
    </div>

  </div>
</div>

<button type="button" class="btn btn-primary mb-4 my-report" data-toggle="modal" data-target="#policyModal" id="termsbtn" style="display:none;">Terms</button>

<?php  include('inc/footer.inc.php'); ?>   


<script>
  function validateAck()
  {
      if(!$("#check1").prop("checked"))
      {
        alert("Please acknowledge all Terms");
        return false;
      }
      if(!$("#check2").prop("checked"))
      {
        alert("Please acknowledge all Terms");
        return false;
      }
      if(!$("#check3").prop("checked"))
      {
        alert("Please acknowledge all Terms");
        return false;
      }
  }

    $(document).ready(function(){

            <?php
            if($terms['terms_accepted']=='0')
            {
            ?>
            $(document).ready(function(){
                $("#termsbtn").click();
            });
            <?php
            }
            ?>


        $("#generate_keyword").click(function(){

           
            var county_zip=$("#county_zip").val();
            
            if(county_zip.length<5)
            {
              $("#county_zip").focus();
              $(".error_msg").html("Zip code should be 5 digits");
              return false;
            }

             if(county_zip=='')
            {
              $("#county_zip").focus();
              $(".error_msg").html("Please enter County Zip");
              return false;
            }
            else
            {
              $(".error_msg").html("");
              $("#loading_btn").click();
            }
           


           $.post("ajax/get_keywords.php",
            {
              county_zip:county_zip,
              user_id:'<?=$_SESSION['userid']?>'
             
            },function(response)
            {
                var data=JSON.parse(response);

                if(data.result=='no_credit')
                {
                    alert("You don't have any clicks remaining.. Please purchase package to get more clicks..");
                }
                else
                {
                  $(".search-row").hide();
                  $(".result-row").show();

                  $("#county").html(data.county);
                  $("#city").html(data.population);
                  $("#mayor").html(data.area);
                  $("#total_population").html(data.total_population);
                  $("#male_population").html(data.male_population);
                  $("#female_population").html(data.female_population);
                  $("#democratic_voters").html(data.democratic_voters);
                  $("#rupblic_voters").html(data.rupblic_voters);
                  $("#independent_voters").html(data.independent_voters);
                  $("#avg_age").html(data.avg_age);
                  $("#total_school").html(data.total_school);
                  $("#school_rating").html(data.school_rating);
                 
                  $("#city_manager").html(data.city_manager);
                  $("#city_clerk").html(data.city_clerk);
                  $("#finance_director").html(data.finance_director);
                  $("#public_work_director").html(data.public_work_director);
                  $("#police_chief").html(data.police_chief);
                  $("#fire_chief").html(data.fire_chief);
                  $("#park_recretion_director").html(data.park_recretion_director);
                  $("#planning_director").html(data.planning_director);
                  $("#economic_director").html(data.economic_director);
                  $("#human_resource_director").html(data.human_resource_director);
                  $("#it_director").html(data.it_director);
                  $("#utility_director").html(data.utility_director);

                  $("#housing_director").html(data.housing_director);
                  $("#environment_director").html(data.environment_director);
                  $("#city_attorney").html(data.city_attorney);
                  $("#upcoming_elections").html(data.upcoming_elections);
                 

                 // var data=data.result.split(",");

                 // $("#copyButton").removeAttr("disabled");
                 

                  $("#loadingModal .cls").click();
                }
            });

           
        });

        $('#copyButton').click(function() {
                var text = $('#result').val();
                navigator.clipboard.writeText(text).then(function() {
                    alert('Text copied to clipboard');
                }, function(err) {
                    alert('Failed to copy text: ', err);
                });
            });
    });
</script>