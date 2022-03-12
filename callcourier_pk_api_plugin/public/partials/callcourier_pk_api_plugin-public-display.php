<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://huzaifairfan.com/
 * @since      1.0.0
 *
 * @package    callcourier_pk_api_plugin
 * @subpackage callcourier_pk_api_plugin/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->


<?php

// function callcourier_pk_track_submit_func(){




if (isset($_GET['tnum'])) {
  $tnum = $_GET['tnum'];
} else {

  $tnum = '';
}





if ($tnum == '') {

?>


  <h3 align='center'>
    Please Enter a Valid Tracking Number
  </h3>





<?php
} else {

?>

  <!-- 
<h4 class='tracking-results-title'>
Tracking Result
</h4> -->

  <?php



  $callcourier_pk_tracking_api_url = get_option('callcourier_pk_tracking_api_url', 'https://cod.callcourier.com.pk/api/CallCourier/GetTackingHistory');

  $callcourier_pk_tracking_api_url .=  '?cn=';
  $callcourier_pk_tracking_api_url .= $tnum;


  // $callcourier_pk_tracking_api_url=str_replace(" ","%20",$callcourier_pk_tracking_api_url);

  // var_dump($callcourier_pk_tracking_api_url);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $callcourier_pk_tracking_api_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);

  $res = json_decode($output, true);

  // var_dump($output);


  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

  if ($httpCode == 422) {
  ?>
    <br />

    <h2 align='center'>
      Invalid Tracking Number
    </h2>


  <?php
    return;
  }

  if ($httpCode == 404) {

  ?>
    <br />
    <h2 align='center'>
      Tracking Details Not Found
    </h2>

  <?php

    return;
  }

  curl_close($ch);

  // $res = json_decode(file_get_contents($callcourier_pk_tracking_api_url), true);
//   print_r($res);

  if (gettype($res) == 'string') {
  ?>

    <h2 align='center'>
      Please Enter a Valid Tracking Number
    </h2>

  <?php
  } else {


$res=array_reverse($res);


  ?>


    <div class='jumbotron' style='display:flex; flex-direction:column;'>




        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

        <div class='delivery-status' style="margin-top:0;">
          <h4 style="font-weight:bold">
            Delivery Status for: <?php echo $tnum; ?>
          </h4>

          <div class="row container mx-auto">
            <div class="col-3">
            
            <button class="btn btn-primary">Orgin : <?php echo $res[0]['OriginCity']; ?></button>
            <button class="btn btn-primary">Destination : <?php echo  $res[0]['ConsigneeCity']; ?></button></div>
            
            
            
              <div class="col-3">
                  <button class="btn btn-primary">Shipper : <?php echo $res[0]['ShipperName']; ?></button> 
                  <button class="btn btn-primary">Contact : <?php echo $res[0]['ContactNo']; ?> </button>
                  
                </div>
                
                              <div class="col-3">
                  <button class="btn btn-primary">Weight : <?php echo $res[0]['Weight']; ?> KG </button> 
                  <button class="btn btn-primary">COD Amount : <?php echo $res[0]['codAmount'];
                  ?> pkrs </button>
                  
                </div>
                

              <div class="col-3">
                  
                  <button class="btn btn-primary">Date/Time : <?php 
                  $datetime=explode("T", $res[0]['TransactionDate']);
                  
                  
                  echo  $datetime[0];
                  echo ' ';
                  echo $datetime[1];
                  ?> </button>
                  <button class="btn btn-primary">Status : <?php echo  $res[0]['ProcessDescForPortal']; ?> </button></div>



          
                
                             <div class="col-3">
                                 
                                 
                                            <button class="btn btn-primary">Consignee : <?php 
                  
                  echo ($res[0]['ConsigneeName']);
           
                  ?></button>        
                           
                                 
                <?php
                    if ($res[0]['ReceiverName']){
                ?>      
                  <button class="btn btn-primary">Recieved By : <?php 
                  
                  echo strtoupper($res[0]['ReceiverName']);
                  echo ' (';
                  echo $res[0]['Relation'];
                  echo ')'
                  
                  ?></button> 
                  
                               
                     <?php
  }
                ?>
             
                </div>
   
                
                
                

            </div>

        </div>







            <script>
              const progress = document.getElementById("progress");
              const circles = document.querySelectorAll(".circle");


              let currentActive = 4;

              update();




              function update() {
                circles.forEach((circle, idx) => {
                  if (idx < currentActive) {
                    circle.classList.add("active");
                  } else {
                    circle.classList.remove("active");
                  }
                });
                const actives = document.querySelectorAll(".active");

                progress.style.width =
                  ((actives.length - 1) / (circles.length - 1)) * 100 + "%";


              }
            </script>



            <div class='track-history' style='overflow-x:auto;'>
              <h4 style="font-weight:bold">
                Track History:
              </h4>


              <div class="card card-stepProgress-Div  " style="margin:0%;padding:2% 0%;">
                <div class="container stepProgress-Div" style="">


                  <ul class="StepProgress ">
                    <?php foreach ($res as $item) {
                        
                        
                    ?>

                      <li class="StepProgress-item is-done">

                        <span class="transaction-type">
                          <strong><?php echo strtolower($item['ProcessDescForPortal']); ?></strong></span>

          
               <span class="status-type"><?php
               
               
                   echo strtolower($item['HomeBranch']);
                   
                   
                   if ($item['HomeBranch'] != $item['DestBranch']){
                       
                       if ($item['DestBranch']){
                           echo ' --> ';
                           
                           echo strtolower($item['DestBranch']);
                           
                       }
                   
                   }
    
               
               ?> 
               </span>
                        <br>
          
          
                        
                        <span class="date-type">
                          <i class="fas fa-clock fa-black-color" aria-hidden="true"></i> <?php
                          
                  $datetime=explode("T", $item['TransactionDate']);
                  
                          
                          echo strtolower($datetime[0]);
                          echo ' ';
                        echo strtolower($datetime[1]); 
                        
                        ?>
                        </span>
                      </li>

                    <?php } ?>

                  </ul>

                </div>
              </div>


          

          
            </div>


            <!-- <h2 align='center'>
Nothing Found!!
</h2> -->







          </div>


    <?php


        
      }
    }