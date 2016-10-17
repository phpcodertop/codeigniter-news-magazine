
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="featured_slide">
        <ul id="featurednews"> <!--#slider content-->
        <?php foreach($newsforslider as $row): ?>
          <li><img width="600" height="280" src="<?php echo base_url(); ?>assets/uploads/<?php echo $row->image; ?>" alt="" />
            <div class="panel-overlay">
              <h2><?php echo mb_substr($row->title, 0,120); ?></h2>
              <p><?php echo mb_substr(strip_tags($row->content), 0,85); ?><br />
                <a href="<?php echo base_url().'home/news/'.$row->news_id; ?>">Continue Reading &raquo;</a></p>
            </div>
        <?php endforeach; ?>    
        </ul><!--#slider content-->
      </div>
    </div>


    <div class="column">
      <ul class="latestnews">
         <?php foreach($newsforsliderside as $row): ?>
            <li><img width="100" height="100" src="<?php echo base_url(); ?>assets/uploads/<?php echo $row->image; ?>" alt="" />
              <p><strong><a href="<?php echo base_url().'home/news/'.$row->news_id; ?>"><?php echo mb_substr($row->title, 0,120); ?></a> <br /></strong> <?php echo mb_substr(strip_tags($row->content), 0,150); ?></p>
            </li>
        <?php endforeach; ?>  
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">

  <div id="adblock"> <!--####ads here-->
    <div class="fl_left"><a href="#">
<?php 
          $code = $this->adminModel->getadds(1)->code;
          if($code == ""){
            echo '<img src="'.base_url().'assets/images/demo/468x60.gif" alt="" />';
          }else{
            echo $code;
          }
        ?>
    </a></div>
    <div class="fl_right"><a href="#">
      <?php 
          $code = $this->adminModel->getadds(1)->code;
          if($code == ""){
            echo '<img src="'.base_url().'assets/images/demo/468x60.gif" alt="" />';
          }else{
            echo $code;
          }
        ?>
    </a></div>
    <br class="clear" />
  </div> <!--####ads here-->

  <div id="hpage_cats">
  <?php foreach($catsc as $row): ?>
    <div class="fl_left">
      <h2><a href="<?php echo base_url().'home/category/'.$row->cat_id; ?>"><?php echo $row->title;  ?> &raquo;</a></h2>
      <!--start show cat news -->
      <?php $catcnews = $this->adminModel->getcatnewsbylimit($row->cat_id,2);  ?>
      
      <?php foreach($catcnews as $row): ?>
          <div>
          <img width="150px" height="150px" src="<?php echo base_url(); ?>assets/uploads/<?php echo $row->image; ?>" alt="" />
          <p><strong><a href="<?php echo base_url().'home/news/'.$row->news_id; ?>"><?php echo mb_substr($row->title, 0,100); ?></a></strong></p>
          <p><?php echo mb_substr(strip_tags($row->content), 0,300); ?></p>
          <p class="readmore"><a href="<?php echo base_url().'home/news/'.$row->news_id; ?>">Continue Reading &raquo;</a></p>
          <br />
          <br />
          </div>
         <br />
      <?php endforeach; ?>     
      <!--end show cat news -->
    </div>
  <?php endforeach; ?>  

    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <div id="hpage_latest">
        <h2>Most Read News</h2>
        <ul>
        <?php foreach($mostread as $row): ?>
          <li><img width="190px" height="130px" src="<?php echo base_url(); ?>assets/uploads/<?php echo $row->image; ?>" alt="" />
            <a href="<?php echo base_url().'home/news/'.$row->news_id; ?>"><strong><?php echo mb_substr(strip_tags($row->title), 0,90); ?></strong></a>
            <p><?php echo mb_substr(strip_tags($row->content), 0,90); ?></p>
            <p class="readmore"><a href="<?php echo base_url().'home/news/'.$row->news_id; ?>">Continue Reading &raquo;</a></p>
          </li>
        <?php endforeach; ?>  
        </ul>
        <br class="clear" />
      </div>
    </div>

    <div class="column">
      <div class="holder"><a href="#">
        <?php 
          $code = $this->adminModel->getadds(2)->code;
          if($code == ""){
            echo '<img src="'.base_url().'assets/images/demo/300x250.gif" alt="" />';
          }else{
            echo $code;
          }
        ?>
      </a></div>
      
      <div class="tweets" >
<!--here tweets -->          
<?php 
$details = $this->adminModel->getdetails();
echo $details->twitterbox;
?>
<!--here tweets -->
      </div>

    </div>

    <br class="clear" />
  </div>
</div>
