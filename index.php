<?php
    include('includes/header.php');
    include('admin/config.php');
?>
<div class="slideshow-container">
  <?php
    $query = "SELECT * FROM slider;";
    $sonuc=mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($sonuc)){
        $baslik = $row['baslik'];
        $path = $row['main_photo'];
        echo 
        '<div class="mySlides fade">
          <img src="'.$path.'" style="object-fit: cover; height: 100%; width:100%">
          <div class="text">'.$baslik.'</div>
        </div>';
    }
  ?>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<section class="section background-white"> 
  <div  class="line">
  <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50"><?php echo $lang['news'] ?></h2>
    <div id="load_data" class="margin">
    </div>
    <div id="load_data_message">
    </div>
  </div>
</section>
</main>
<script>

  $(document).ready(function(){
    
    var limit = 3; //The number of records to display per request
    var start = 0; //The starting pointer of the data
    var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
    function load_country_data(limit, start)
    {
      $.ajax({
      url:"haberfetch.php",
      method:"POST",
      data:{limit:limit, start:start},
      cache:false,
      success:function(data)
      {
        $('#load_data').append(data);
        if(data == ''){
          action = 'active';
        }
        else{
          action = 'inactive';
        }
      }
      });
    }

  if(action == 'inactive')
  {
    action = 'active';
    load_country_data(limit, start);
  }
  $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
      load_country_data(limit, start);
    }, 1000);
    }
  });
  
  });
</script>
<?php
    include('includes/footer.php');
?>