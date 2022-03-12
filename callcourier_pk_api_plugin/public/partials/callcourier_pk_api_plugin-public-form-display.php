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


    if (isset($_GET['tnum']))
{
    $tnum = $_GET['tnum'];
}else{

    $tnum = '';
}


$callcourier_pk_tracking_details_url= get_option('callcourier_pk_tracking_details_url','/callcourier-pk-shipment-details');


 
?>


<form method='get' action='<?php echo $callcourier_pk_tracking_details_url;?>'>
<div style='display:flex; flex-direction:column; width:100%;'>

 <h4 for='tnum' style="font-weight:bold;">Tracking Number:</h4>
 <div style='display:flex; width:100%;'>
<input name='tnum' type='text'  placeholder='Tracking Number'  style='display:flex; width:100%;'
value='<?php echo $tnum;?>'/>
<input  type='submit' value='Track'/>

</div></div>
</form>


<?php 


add_shortcode('callcourier_pk_track_form','callcourier_pk_track_form_func');


