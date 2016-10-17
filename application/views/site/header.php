<!DOCTYPE html >
<!--
Template Name: News Magazine
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<?php $settings = $this->adminModel->getsettings(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $settings->sitename; ?></title>
<meta name="description" content="<?php echo $settings->description; ?>">
<meta name="keywords" content="<?php echo $settings->keywords; ?>">
<meta name="copyright" content="<?php echo $settings->copyright; ?>">
<meta name="web_author" content="<?php echo $settings->author; ?>"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/layout/scripts/jquery.min.js"></script>
<!-- Homepage Specific -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/layout/scripts/galleryviewthemes/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/layout/scripts/galleryviewthemes/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/layout/scripts/galleryviewthemes/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/layout/scripts/galleryviewthemes/jquery.galleryview.setup.js"></script>
<!-- / Homepage Specific -->
<!--//share buttons-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "5f9f1d70-a62c-4ce7-acd2-50cf8bf65f79", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script> 
<!---->

</head>
<body id="top">
<div class="wrapper col0">
  <div id="topline">
    <?php 
      $details = $this->adminModel->getdetails();
      $settings = $this->adminModel->getsettings();
    ?>
    <p><a target="_blank" href="mailto:<?php echo $settings->sitemail; ?>"><img width="32px" height="32px" src="<?php echo base_url(); ?>assets/images/mail-icon.png" alt=""></a></p>
    <p><a target="_blank" href="<?php echo $details->fb; ?>"><img width="32px" height="32px" src="<?php echo base_url(); ?>assets/images/facebook-icon.png" alt=""></a></p>
    <p><a target="_blank" href="<?php echo $details->tw; ?>"><img width="30px" height="30px" src="<?php echo base_url(); ?>assets/images/social-twitter-button-blue-icon.png" alt=""></a></p>
    <p><a target="_blank" href="<?php echo $details->ins; ?>"><img width="30px" height="30px" src="<?php echo base_url(); ?>assets/images/Active-Instagram-4-icon.png" alt=""></a></p>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="<?php echo base_url(); ?>"><strong>M</strong>ega <strong>N</strong>ews</a></h1>
      <p>Inspiring You </p>
    </div>
    <div class="fl_right" width="640px" height="60px"><a href="#">
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
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="#">Categories</a>
          <ul>
            <?php $cats = $this->adminModel->getcat(); ?>
            <?php foreach($cats as $cat): ?>
            <li><a href="<?php echo base_url().'home/category/'.$cat->cat_id; ?>"><?php echo $cat->title; ?></a></li>
          <?php endforeach; ?>
          </ul>
        </li>
        <?php $pages = $this->adminModel->getpages(); ?>
        <?php foreach($pages as $page): ?>
        <li><a href="<?php echo base_url().'home/page/'.$page->id; ?>"><?php echo $page->pagetitle; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>
    <div id="search">
      <form action="<?php echo base_url(); ?>home/search/" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" name="search" value="Search Our Website&hellip;"  onfocus="this.value=(this.value=='Search Our Website&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<br class="clear" />
<div class="latestnews">
<style>
  .top{
    color: #fff;
    background: #000;
    height: 40px;
    border:2px solid #ccc;
  }
  .top span{
    background-color: red;
    color: #fff;
    display: block;
    width: 80px;
    font-size: 20px;
    float: left;
    text-align: center;
    
    z-index: -1000;
  }
  .top marquee{
    float: right;
    padding: 10px;
    height: 55px;
    z-index: 1000;
  }
  .top marquee a{
    z-index: 1000;
    padding: 10px;
    font-weight: bold;
  }
</style>
<?php 
  $newsdata = $this->adminModel->getnewsbylimit(10);
?>
  <div class="top">
    <span>Latest News</span> 
    <marquee width="890px" behavior="scroll" scrolldelay="50" >
    <?php foreach($newsdata as $row): ?>
     <?php  echo '<a href="'.base_url()."home/news/".$row->news_id.'">'.$row->title.'</a>'; ?>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php endforeach; ?>
  </marquee>
    <div class="clear"></div>
  </div>
  
</div>

<br class="clear" />