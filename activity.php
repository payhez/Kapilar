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
<div class="slideshow-container">
  <?php
    $path = $row['path'];
    $files = glob(''.$path.'/*.{jpg}', GLOB_BRACE);
    foreach($files as $file) {
        echo '<div class="mySlides fade">
        <img src="'.$file.'" style="object-fit: cover; height: 100%; width:100%">
      </div>';
    }
  ?>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
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