<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li>&#187;</li>
      <li><a href="<?php echo base_url(); ?>home/category/<?php echo $cat->cat_id; ?>"><?php echo $cat->title; ?></a></li>
      
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <h1><?php echo $cat->title; ?></h1>
      <p><?php echo $cat->description; ?></p>

      <div class="content">
        <?php if($total_rows == 0): ?>
          <?php echo "There is no news in this category"; ?>
        <?php else: ?>
            <ul style="list-style-type: none;">
            <?php foreach($catnews as $row): ?>
              <li>
              <div class="item">
              <img width="600px" height="200px" src="<?php echo base_url().'assets/uploads/'.$row->image; ?>">
              <p>
                <strong><?php echo mb_substr($row->title,0,150); ?></strong>
                <p><?php echo mb_substr($row->content,0,300); ?></p>

              </p>
              <p class="readmore"><a href="<?php echo base_url(); ?>home/news/<?php echo $row->news_id;?>">Continue Reading » </a></p>
              </div>
              </li>
              <hr />
            <?php endforeach; ?>  
            </ul>
        <?php endif; ?>
        <hr />
        <style type="text/css">
        .navigation  a{
          
          padding: 10px;
        }
        </style>
        <div class="navigation" style="padding: 10px; color:red;">
        <?php echo $this->pagination->create_links(); ?>
        </div>
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
