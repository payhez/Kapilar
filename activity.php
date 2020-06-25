<?php
    include('includes/header.php');
?>
<?php
    include('admin/config.php');
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql = "SELECT * FROM aktivite WHERE id=".$id.";";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    }else{
        header('activities.php');
    }
?>
<div class="w3-content w3-display-container">
  <?php
    $path = $row['path'];
    $files = glob(''.$path.'/*.{jpg}', GLOB_BRACE);
    foreach($files as $file) {
        echo '<div class="w3-display-container mySlides">
            <img src="'.$file.'" style="width:100%">
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
<article>
        <div class="section background-white"> 
          <div class="line">
            <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50"><?php echo $row['name'] ?></h2>
            <br>
            <p>
                <?php 
                  $myfile = fopen($row['context'] , "r") or die("Unable to open file!");
                  echo fread($myfile,filesize($row['context'] ));
                  fclose($myfile);
                ?>
            </p>
            <br>
            <br/>
          </div>
        </div>
      </article>
    </main>
<?php
    include('includes/footer.php');
?>