<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li>&#187;</li>
      <li><a href="<?php echo base_url(); ?>home/page/<?php echo $pagecontent->id; ?>"><?php echo $pagecontent->pagetitle; ?></a></li>
      
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <h1><?php echo $pagecontent->pagetitle; ?></h1>


      <div class="content">
        <?php echo $pagecontent->pagecontent; ?>
      </div>

 
    </div>
    <div class="column">
      <div class="subnav">
        <h2>Most Read News</h2>
        <ul>
        <?php foreach($mostreadnews as $row): ?>
          <li><a href="<?php echo base_url(); ?>home/news/<?php echo $row->news_id; ?>"><?php echo $row->title;  ?></a></li>
        <?php endforeach; ?>  
        </ul>
      </div>
      <!--#ads-->
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
      <!--#ads-->
      <div class="tweets" >
<!--here tweets -->          
<?php 
$details = $this->adminModel->getdetails();
echo $details->twitterbox;
?>
<!--here tweets -->
      </div>
      
    <br class="clear" />
  </div>
</div>




 <br class="clear" />
<!-- ####################################################################################################### -->
