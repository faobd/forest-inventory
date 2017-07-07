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
   background-color: #000000 !important;
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


     <script type="text/javascript">
    
             $(document).on('keypress', '#title', function () {
      
            var pattern = /[0-9]+/g;
            var id = $(this).attr('id').match(pattern);
            $(this).autocomplete({
                source: "<?php echo site_url('Portal/get_title'); ?>",
                select: function (event, ui) {
                    $("#title" + id).val(ui.item.id);
                }
            });
        });


               $(document).on('keypress', '#author', function () {
      
            var pattern = /[0-9]+/g;
            var id = $(this).attr('id').match(pattern);
            $(this).autocomplete({
                source: "<?php echo site_url('Portal/get_author'); ?>",
                select: function (event, ui) {
                    $("#author" + id).val(ui.item.id);
                }
            });
        });


            $(document).on('keypress', '#keyword', function () {
      
            var pattern = /[0-9]+/g;
            var id = $(this).attr('id').match(pattern);
            $(this).autocomplete({
                source: "<?php echo site_url('Portal/get_keyword'); ?>",
                select: function (event, ui) {
                    $("#keyword" + id).val(ui.item.id);
                }
            });
        });






</script>
<?php
   $lang_ses = $this->session->userdata("site_lang");
   ?>
<div class="col-sm-12 breadcump img-responsive">
   <div class="row">
      <div class="breadcump-wrapper">
         <div class="wrapper">
            <div style="font-size:25px;" class="breadcump_row"><?php echo $this->lang->line("library"); ?>
            </div>
            <div class="breadcump_row"><a href="<?php echo base_url() ?>"><?php echo $this->lang->line("home"); ?></a> ><?php echo $this->lang->line("library"); ?>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<div class="col-md-12 page_content">
    <h3>Documents Search</h3>
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Keyword</a></li>
    
    </ul>
    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
         <p> Search Documents by Title, Author, and Keyword.
          Example searches
          <br>
          Example searches: <a href="#"> Title: Chittagong university campus</a>,
          <a href="#">Author: Barua, S. and S. Haque </a>,
          <a href="#"> Keyword: Barua </a>,
        </p>
        <form action="<?php echo site_url('portal/search_document');?>" method = "post">
          <div class="col-md-6">
            <div class="form-group">
              <label>Title <span style="color:red;">*</span></label>
              <input type="text" class="form-control input-sm" name ="Title" id ="title" class ="title" maxlength="200" placeholder="Title" />
            </div>
            <div class="form-group">
              <label>Author  <span style="color:red;">*</span></label>
              <input type="text" class="form-control input-sm" name ="Author" id ="author" class ="author" maxlength="64" placeholder="Author" />
            </div>
            <div class="form-group">
              <label>Keyword  <span style="color:red;">*</span></label>
              <input type="text" class="form-control input-sm" name ="Keywords" id ="keyword" class ="keyword" maxlength="64" placeholder="Keywords" />
              <br>
              <input id="searchButton" style="float:right" class="btn btn-success" type="submit" value="Search">
            </div>
        </form>
      </div>
   
  
 
    </div>
  </div>
   </div>
   <div class="col-sm-12 bdy_des">
      <div class="">
         <h4>Library</h4>
         <?php
            $pdf_values=".pdf";
            foreach($reference as $row)
            	
            {
              ?>
         <h4><?php echo $row->Title;?></h4>
         <p><a href="<?php echo base_url('resources/pdf/'.$row->PDF_label.$pdf_values);?>"><img src="<?php echo base_url('resources/images/pdf.gif')?>" alt="logo"/>Download <?php echo $row->Title;?></a>
         <br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->Author;?>
         </p>
         <?php
            }?>
         <h4>Scientific articles</h4>
         <p>Here you can find links to articles providing information about GlobAllomeTree and associated tools.</p>
         <p><a href=""> <?php
            $i=1;
            foreach ($reference as  $row){
            if($i==1){
            echo "$row->Author";
            }else{
            echo ",$row->Author";
            }
            $i++;
            }
                
            ?>
            </a>
            iForest (early view) - doi: 10.3832/ifor0901-006
         <p>
      </div>
   </div>
</div>
