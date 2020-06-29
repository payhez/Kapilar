<?php
    include('admin/config.php');
    include('langconfig.php');
    $sesslang=$_SESSION['lang'];
    if(isset($_POST["limit"], $_POST["start"]))
    {   
        $query = "SELECT * FROM aktivite ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
        $sonuc=mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($sonuc)){
            $id = $row['id'];
            $baslik = $row['name'];
            $aciklama = $row['context'];
            $path = $row['main_photo'];
            $date = $row['date'];
            $lang= $row['language'];
            if($lang == $sesslang){
            echo '<div class="s-12 m-12 l-4 margin-m-bottom">
                    <a href="activity.php?id='.$id.'"><img class="margin-bottom" src="'.$path.'" style="object-fit: cover; width: 500px; height: 250px;" alt="">
                    <h4 style="text-align:center;"><b>'.$baslik.'</b></h4></a>
                    <p class="text-thin" style="text-align:right;">'.$date.'</p>           
                    </div>';
            }
        }
    }
?>