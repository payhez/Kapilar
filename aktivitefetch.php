<?php
    include('admin/config.php');
    if(isset($_POST["limit"], $_POST["start"]))
    {   
        $query = "SELECT * FROM aktivite ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
        $sonuc=mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($sonuc)){
            $id = $row['id'];
            $baslik = $row['name'];
            $aciklama = $row['context'];
            $path = $row['main_photo'];
            echo '<div class="s-12 m-12 l-4 margin-m-bottom">
                    <img class="margin-bottom" src="'.$path.'" alt="">
                    <h2 class="text-thin">'.$baslik.'</h2>
                    <a class="text-more-info text-primary-hover" href="activity.php?id='.$id.'">Read..</a>                
                    </div>';
        }
    }
?>