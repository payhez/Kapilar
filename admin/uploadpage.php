<?php
// Initialize the session
    include_once 'classes.php';
    session_start();
    include_once 'config.php';
    $user = $_SESSION['user'];
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: index.php");
        exit;
    }
?>

<?php
    if(isset($_POST['submit'])){
        $type = $_POST['choice'];

        $name = $_POST['name'];
        $mainphoto = $_FILES['mainPhoto'];
        $description = $_POST['description'];
        $photos = $_FILES['photos'];
        $language = $_POST['language'];
        $sql ="";

        switch ($type) {
            case 'aktivite':
              $sql=$user->addActivity($name,$description,$mainphoto,$photos,$language,$user);
              break;
            case 'haber':
              $sql=$user->addNews($name,$description,$mainphoto,$language,$user);
              break;
            case 'slider':
              $sql=$user->addSlider($name,$mainphoto,$language);
              break;
            default:
              echo 'Seçeneklerden birini seç';
          }
        if($sql!=""){
            mysqli_query($conn,$sql);
        }else{
            echo "Failed to load to Database";
        }
        /*if($type == 'aktivite' || $type == 'haber'){
            $path = '../img/'.$_POST['ad'].'/';
            $path3 = 'img/'.$_POST['ad'].'/';
            $dbpath = 'img/'.$_POST['ad'].'/'.$_FILES['anaFoto']['name'];
            mkdir($path);
            $textpath = $path3.$_POST['ad'].".txt";
            $textfile = fopen($path.$_POST['ad'].".txt","w") or die("Unable to open file");
            fwrite($textfile, $_POST['aciklama']);
            $img=resize_image($_FILES['anaFoto']['tmp_name']);
            imagejpeg($img,$path.$_FILES['anaFoto']['name']);
            if($type == 'aktivite'){
                $path2 = $path."photos/";
                $dbpath2 = $path3."photos/"; 
                mkdir($path2);
                $sql= "insert into ".$type." (name, context, main_photo, path) values ('".$_POST['ad']."','".$textpath."','".$dbpath."','".$dbpath2."');";
                foreach ($_FILES['foto']['tmp_name'] as $key => $image) {
                    $imageName = $_FILES['foto']['name'][$key];
                    $imageTmpName = $_FILES['foto']['tmp_name'][$key];
                    $image=resize_image($imageTmpName);
                    imagejpeg($image,$path2.$imageName);
                }
            }else if($type == 'haber'){
                $sql= "insert into ".$type." (name, context, main_photo) values ('".$_POST['ad']."','".$textpath."','".$dbpath."');";
            }
        }else if($type == 'slider'){
            $sliderpath = "img/slider/".$_FILES['anaFoto']['name'];
            $img=resize_image($_FILES['anaFoto']['tmp_name']);
            imagejpeg($img,"../".$sliderpath);
            $sql= "insert into ".$type." (baslik, main_photo) values ('".$_POST['ad']."','".$sliderpath."');";
        }*/
        
    }
    /*function resize_image($file) {
        // Set a  fixed height and width 
        $width = 900; 
        $height = 600; 
  
        list($width_orig, $height_orig) = getimagesize($file); 
        echo $width_orig.'<br>'.$height_orig;
  
        $image_p = imagecreatetruecolor($width, $height); 
        $image = imagecreatefromjpeg($file); 
        imagecopyresized($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
        return $image_p;
    }*/
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Yükleme</title>
<script type="text/javascript" src="scripts/widgEditor.js"></script>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<style type="text/css" media="all">
	@import "css/widgEditor.css";
</style>
</head>
<body id="main_body" >
	<div id="form_container">
		<h1><a>Yükleme</a></h1>
		<form id="form_115110" class="appnitro" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<div class="form_description">
			<h2>Yükleme</h2>
			<p>Aktivite/Haber Yükleme</p>
		</div>						
			<ul>
		        <li id="li_1" >
		            <label class="description">Aktivite/Haber Adı </label>
                    <div>
                        <input name="name" class="element text medium" type="text" maxlength="255" value=""/> 
                    </div> 
                </li>		
                <li id="li_2" style="width: auto;">
                    <label class="description">Açıklama </label>
                    <div>
                        <textarea name="description" class="widgEditor nothing"></textarea> 
                    </div> 
                </li>		
                <li id="li_3" >
                    <label class="description" >Ana Fotoğraf Yükle </label>
                    <div>
                        <input name="mainPhoto" class="element file" type="file"/> 
                    </div>  
                </li>		
                        <li id="li_4" >
                        <label class="description" >Diğer bütün fotoğraflar(Sadece Aktiviteler için) </label>
                        <div>
                            <input name="photos[]" class="element file" type="file" multiple/> 
                        </div>  
                        </li>		
                        <li id="li_5" >
                        <label class="description">Yükleme Tipi </label>
                        <span>
                            <input name="choice" class="element radio" type="radio"  value="haber" />
                            <label class="choice">Haber</label>
                            <input  name="choice" class="element radio" type="radio" value="aktivite" />
                            <label class="choice">Aktivite</label>
                            <input  name="choice" class="element radio" type="radio" value="slider" />
                            <label class="choice">Slide</label>
                        </span> 
                        </li>
                        <li id="li_5" >
                        <label class="description">Yükleme Tipi </label>
                        <span>
                            <input name="language" class="element radio" type="radio"  value="en" />
                            <label class="choice">English</label>
                            <input  name="language" class="element radio" type="radio" value="tr" />
                            <label class="choice">Turkce</label>
                            <input  name="language" class="element radio" type="radio" value="ar" />
                            <label class="choice">Arabic</label>
                        </span> 
                        </li>
                            <li class="buttons">
                            <input type="hidden" name="form_id" value="115110" />
                            <input class="button_text" type="submit" name="submit" value="Submit" />
                            <a href="logout.php" class="btn btn-danger">Çıkış</a>
                        </li>
			</ul>
		</form>
	</div>
	</body>
</html>