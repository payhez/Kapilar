<?php
    include('includes/header.php');
?>
<?php
    include('admin/config.php');
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql = "SELECT * FROM haber WHERE id=".$id.";";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    }else{
        header('index.php');
    }
?>
<article>
        <div class="section background-white"> 
          <div class="line">
          <img src="<?php echo $row['main_photo'] ?>" style="object-fit: cover; width: 900px; height: 450px; margin-left:auto; margin-right:auto;" />
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
            <!--<h1 class="margin-bottom-30"><b><?php echo $row['name'] ?></b></h1>
            <b><p>
            <img src="<?php echo $row['main_photo'] ?>"/>
            <?php 
                  //$myfile = fopen($row['context'] , "r") or die("Unable to open file!");
                  //echo fread($myfile,filesize($row['context'] ));
                  //fclose($myfile);
                ?>
            </p>
            <br>
            <br/>-->
          </div>
        </div>
      </article>
    </main>
<?php
    include('includes/footer.php');
?>