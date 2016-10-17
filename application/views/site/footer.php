<div class="wrapper">
  <div id="adblock">
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
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="footer">

    <div class="footbox">
      <h2>Latest News</h2>
      <ul>      
      <?php 
        $latestnews = $this->adminModel->getnewsbylimit(6);
        foreach($latestnews as $row):
      ?>
        <li><a href="<?php echo base_url().'home/news/'.$row->news_id; ?>"><?php echo mb_substr($row->title, 0,70); ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>

    <div class="footbox">
      <h2>pages</h2>
       <ul>      
      <?php 
        $pages = $this->adminModel->getpages();
        foreach($pages as $page):
      ?>
        <li><a href="<?php echo base_url().'home/page/'.$page->id; ?>"><?php echo $page->pagetitle; ?></a></li>
      <?php endforeach; ?>
      </ul>
    </div>

    <div class="footbox">
      <h2>Categories</h2>
      <ul>
            <?php $cats = $this->adminModel->getcat(); ?>
            <?php foreach($cats as $cat): ?>
            <li><a href="<?php echo base_url().'home/category/'.$cat->cat_id; ?>"><?php echo $cat->title; ?></a></li>
          <?php endforeach; ?>
          </ul>
    </div>


    <br class="clear" />
  </div>
</div>



<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col8">
  <div id="copyright">
    <?php 
    $settings = $this->adminModel->getsettings();
    ?>
    <p class="fl_left">Copyright &copy; - All Rights Reserved - <a href="<?php echo base_url(); ?>"><?php echo $settings->sitename; ?></a> - Developped By <a target="_blank" href="https://www.facebook.com/yousseifweroquia" title="ahmed maher halima">Semicolon</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>