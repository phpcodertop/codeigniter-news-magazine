<!-- ####################################################################################################### -->
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
    <div class="content">
      <h1>Search results :  <?php echo $searchnum; ?> Result </h1>


      <div class="content">
        <ul style="list-style-type: none;">
        <?php 
          if($searchnum == 0){
            echo "<strong>There is no results .</strong>";
          }
        ?>
            <?php foreach($search as $row): ?>
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
      <div class="holder"><a href="#"><img src="<?php echo base_url(); ?>assets/images/demo/300x250.gif" alt="" /></a></div>
      <!--#ads-->
      
      
    <br class="clear" />
  </div>
</div>




 <br class="clear" />
<!-- ####################################################################################################### -->
