<style type="text/css">
  .page_content{
    padding: 15px;
    background-color: white;
    margin-top: 15px;
  }
  .page_des_big_image{
    width: 100%;
    height: 300px;
  }
  .bdy_des{
    margin-top: 25px;
  }
  .breadcump{
    background-image: url("<?php echo base_url("resources/images/breadcump_image.jpg")?>");
    height: 103px;
  }
  .breadcump-wrapper{
    /*  background-color: #000000 !important;*/
    opacity: 0.7;
    width: 100%;
    height:100%;
  }
  .wrapper{
    padding:30px !important;
    color: #FFFFFF;
    font-weight: bold;
  }
  .breadcump_row a{
    color: white;
  }

</style>
<?php
$lang_ses = $this->session->userdata("site_lang");
?>
<div class="col-sm-12 breadcump img-responsive">
  <div class="row">
    <div class="breadcump-wrapper">
      <div class="wrapper">
        <div style="font-size:25px;" class="breadcump_row"><?php echo $this->lang->line("allometric_equation"); ?>
        </div>
        <div class="breadcump_row"><a href="<?php echo base_url() ?>"><?php echo $this->lang->line("home"); ?></a> ><?php echo $this->lang->line("allometric_equation"); ?>

        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12 page_content">
  <a href="<?php echo site_url('data/allometricEquationView'); ?>" class="btn btn-info" style="background-color:#396C15;border-color:#396C15;" role="button"><< Back</a>
  <div class="col-md-12">
    <h2 style="font-family:Tahoma, Verdana, Segoe, sans-serif;">Allometric Equation</h2>
    
  </div>

  <div class="col-sm-12 bdy_des">
   <div style="float:right;"> 
    <form action='export/' id="export-form" method="POST">
      <input type='hidden' name='csrfmiddlewaretoken' value='EUSnAj1qQRRf6anXMDF1cWRSTLAwax2J' />
      <input type="hidden" name="query" id="export-query" />
      <input type="hidden" name="extension" id="export-extension" />
      <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
          <span class="glyphicon glyphicon-download"></span> Export Results <span class="caret"></span>
        </button>
        <?php 
        foreach($allometricEquationDetails as $row)
        {
         ?>
         <ul class="dropdown-menu" role="menu">


           <!--  <li><a href="#" id="export-txt">Download TXT (Tab Delimited UTF-16)</a></li> -->
           <li><a href="<?php echo site_url('Portal/allometricEquationDetailsPdf/'.$row->ID_AE); ?>" target="_blank" id="export-json">Download PDF</a></li>
           <!-- <li><a href="#" id="export-xml">Download XML</a></li> -->
         </ul>
         <?php 
       }?>
     </div>
   </form>
 </div>

 <h3 style="font-family:Tahoma, Verdana, Segoe, sans-serif;">Allometric</h3>
 
 <div class="row">     
  <div class="col-md-12">
   <br>
   <table class="table">

    <tr><th style="width:210px">Equation: </th><td> <b><code style="color:#c7254e;font-size: 14px;">
      <?php echo $row->Equation_VarNames;?>
    </code></b></td></tr>
    <tr><th> Sample size: </th><td><?php echo $row->Sample_size;?></td></tr>
    <tr><th> R<sup>2</sup>: </th><td><?php echo $row->R2;?></td></tr>
    <tr><th style="width:210px"> Population: </th><td><?php echo $row->Population;?></td></tr>
  </table>
  

</div>
</div>

<div class="row">    
    <div class="col-md-12">
        <br>
        <h3 class="section-header">Components</h3>
        <table class="table">
            <tbody><tr>
             
                <td>
                
                </td>
            </tr>
        </tbody></table> 
        <img src="<?php echo base_url('resources/images/component.png')?>" class="img-responsive" width="300">
        <br><br>
    </div>
</div>



  <div class="row">     
    <div class="col-md-12">
      <br>
      <h3>Input/Output</h3>
      <table class="table">
        <tr><th style="width:340px"> X: </th><td><?php echo $row->X;?> </td></tr>
        <tr><th> Unit X: </th><td> <?php echo $row->Unit_X;?></td></tr>
        <tr><th> Z: </th><td> <?php echo $row->Z;?> </td></tr>
        <tr><th> Unit Z: </th><td><?php echo $row->Unit_Z;?> </td></tr>
        <tr><th> W: </th><td><?php echo $row->W;?></td></tr>
        <tr><th> Unit_W: </th><td><?php echo $row->Unit_W;?></td></tr>
        <tr><th> U: </th><td> <?php echo $row->U;?></td></tr>
        <tr><th> Unit_U: </th><td><?php echo $row->Unit_U;?></td></tr>
        <tr><th> V: </th><td><?php echo $row->V;?></td></tr>
        <tr><th> Unit V: </th><td><?php echo $row->Unit_V;?></td></tr>
        <tr><th> Min X: </th><td> <?php echo $row->Min_X;?></td></tr>
        <tr><th> Max X: </th><td><?php echo $row->Max_X;?></td></tr>
        <tr><th> Min Z: </th><td><?php echo $row->Min_Z;?></td></tr>
        <tr><th> Max Z: </th><td> <?php echo $row->Max_Z;?>   </td></tr>
        <tr><th> Output: </th><td><?php echo $row->Output;?> </td></tr>
        <tr><th> Output TR: </th><td><?php echo $row->Output_TR;?> </td></tr>
        <tr><th> Average age: </th><td> <?php echo $row->Av_age;?></td></tr>
        <!--   <tr><th> Veg component: </th><td> <?php echo $row->Veg_Component;?> </td></tr> -->
      </table>
    </div>
  </div>


  <div class="row">     
    <div class="col-md-12">
      <br>
      <h3 class="section-header">Idendification</h3>       
      <table class="table">
        <tr><th> Tree type: </th><td><?php echo $row->Tree_type;?> </td></tr>
        <tr><th> Vegetation type: </th><td> <?php echo $row->Vegetation_type;?> </td></tr>
      </table>
    </div>
  </div>

  <div class="row">     
    <div class="col-md-12">
      <br>
      <h3 class="section-header">
        Taxonomy
        
        <span style="color:#999;font-size:11px;font-weight:normal;">
          &nbsp;&nbsp;&nbsp;&nbsp;
          
        </span>
        
      </h3>


<div class="table-responsive"> 
      <table class="table">
      <thead>
        
       <tr class="bg-success">
           <th>Family:</th>
          <th>Genus:</th>
          <th>Species:</th>
          <th>Subspecies:</th>
          <!-- <th>Author:</th> -->
          <th>Local Names:</th>
      </tr>
    </thead>
    <tbody>

     <?php
     $i = 1;
     foreach ($allometricEquationDetails_tax as $row) {
       ?>
       <tr>
        <td ><?php echo $row->family;?></td>
        <td ><?php echo $row->genus;?></td>
        <td><?php echo $row->species;?></td>
        <td>NA</td>
        <td ><?php if($row->localname!='') { ?>
                                   
              <?php echo $row->localname;?>
                                   
                <?php } else { ?>
                <p>NA</p>
                                        
          <?php  } ?></td>

      </tr>
      <?php
      $i++;
    }
    ?>
  </tbody>

</table>
</div>
      
      
 
   
   
 </div>
</div>

<div class="row">     
  <div class="col-md-12">    
    <br>
    <h3 class="section-header">
      Locations

      
      <span style="color:#999;font-size:11px;font-weight:normal;">
        &nbsp;&nbsp;&nbsp;&nbsp;
      </span>
      

    </h3>
  <div class="table-responsive"> 
    <table class="table">
                <tbody><tr>
                     <?php 
                     foreach($location as $row)
                     {
                     ?>
                    <td style="width:40%">
                        <table>
                            <tbody><tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> Location Name: </th><td class="pdf-record-td"> <?php echo $row->location_name;?> </td></tr>
                            <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th">Division: </th><td class="pdf-record-td"> <?php echo $row->Division;?> </td></tr>
                            <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> District: </th><td class="pdf-record-td"> <?php echo $row->District;?> </td></tr>
                            <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> Upazila: </th><td class="pdf-record-td"> <?php echo $row->THANAME;?> </td></tr>
                             <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> Union: </th><td class="pdf-record-td"> <?php echo $row->UNINAME;?> </td></tr>
                             <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> Latitude: </th><td class="pdf-record-td"> <?php echo $row->LatDD;?> </td></tr>
                            <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> Longitude: </th><td class="pdf-record-td"> <?php echo $row->LongDD;?> </td></tr>
                        </tbody></table>
                    </td>
                    <td style="width:60%">
                        <table>
                            <tbody><tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th">FAO Biome: </th><td class="pdf-record-td"> <?php echo $row->FAOBiomes;?> </td></tr>
                            <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> BFI Zone: </th><td class="pdf-record-td"> <?php echo $row->Zones;?> </td></tr>
                            <tr><th style="padding:2px 10px 2px 2px" class="pdf-record-th"> Bangladesh Agroecological Zone: </th><td class="pdf-record-td"> <?php echo $row->AEZ_NAME;?> </td></tr>
                        

                        </tbody></table>
                    </td>
                </tr>
              <?php 
          }?>
            </tbody></table>
          </div>

<br>

<div id="point_map_canvas"></div>


</div>
</div>
<?php 
foreach($allometricEquationDetails as $row)
{
 ?>

 <div class="row">     
  <div class="col-md-12">
    <br>
    <h3 class="section-header">Reference</h3>

    <table class="table">
      <tr><th> Reference: </th><td> 
       <?php echo $row->Reference;?>
     </td></tr>
     <tr><th> Author: </th><td>
       <?php echo $row->Author;?>
     </td></tr>
     <tr><th> Year: </th><td> 

       <?php echo $row->Year;?>

     </td></tr>
   </table>

 </div>
</div>


<div class="row">     
  <div class="col-md-12">
    <br>
    <h3 class="section-header">Contributor</h3>

    <table class="table">
      <tr><th style="width:210px">Contributor:</th><td> <?php echo $row->Contributor_name;?></td></tr>
    </table>


  </div>
</div>

<div class="row">     
  <div class="col-md-12">
    <br>
    <h3 class="section-header">Dataset</h3>


    <table class="table">
      <tr><th style="width:210px">Dataset:</th><td>Allometric Equation </td></tr>
    </table>
    <?php 
  }?>

</div>
</div>



</div>







</div>


</div>