<?php
    include('includes/header.php');
    include('admin/config.php');
?>
<div class="w3-content w3-display-container">
  <?php
    $query = "SELECT * FROM slider;";
    $sonuc=mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($sonuc)){
        $baslik = $row['baslik'];
        $path = $row['main_photo'];
        echo '<div class="w3-display-container mySlides">
                <img src="'.$path.'" style="width:100%">
                  <div class="w3-display-bottomright w3-large w3-container w3-padding-16 w3-black">
                  '.$baslik.'
                  </div>
              </div>';
    }
  ?>

<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>

<section class="section background-white"> 
  <div  class="line">
  <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">News</h2>
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