<?php
    abstract class Content{
        public $title;
        public $description;
        public $mainpic;
        public $language;

        abstract function addQuery();

        function addFile(){
            $path = '../img/'.$this->title.'/';
            $path2 = 'img/'.$this->title.'/';
            mkdir($path);
            $textfile = fopen($path.$this->title.".txt","w") or die("Unable to open file");
            fwrite($textfile, $this->description);
            $this->description = $path2.$this->title.".txt";
            move_uploaded_file($this->mainpic['tmp_name'],$path.$this->mainpic['name']);
            $this->mainpic = $path2.$this->mainpic['name'];
        }
    }

    class News extends Content{
        public $date;
        public $username;

        function __construct($title,$description,$mainpic,$language,$user)
        {
            $this->title = $title;
            $this->description = $description;
            $this->mainpic = $mainpic;
            $this->language = $language;
            $this->username = $user->username;
        }

        function addQuery(){
            $this->addFile();
            $sql= "insert into haber (name, context, main_photo,language,date,username) values ('".$this->title."','".$this->description."','".$this->mainpic."','".$this->language."','".date("d/m/Y")."','".$this->username."');";
            return $sql;
        }
    }

    class Activities extends Content{

        function addQuery(){
        }
    }

    class Activity extends Content{
        public $picspath;
        public $date;
        public $username;

        function __construct($title,$description,$mainpic,$photos,$language,$user)
        {
            $this->title = $title;
            $this->description = $description;
            $this->mainpic = $mainpic;
            $this->picspath = $photos;
            $this->language = $language;
            $this->username = $user->username;
        }

        function addMulFile(){
            $this->addFile();

            $path = '../img/'.$this->title.'/';
            $path2 = 'img/'.$this->title.'/';
            $picspath = $path."photos/";
            $dbpath = $path2."photos/"; 
            mkdir($picspath);
            foreach ($this->picspath['tmp_name'] as $key => $image) {
                $imageName = $this->picspath['name'][$key];
                $imageTmpName = $this->picspath['tmp_name'][$key];
                move_uploaded_file($imageTmpName,$picspath.$imageName);
            }
            $this->picspath = $dbpath;
        }

        function addQuery()
        {
            $this->addMulFile();
            $sql= "insert into aktivite (name, context, main_photo,path,language,date,username) values ('".$this->title."','".$this->description."','".$this->mainpic."','".$this->picspath."','".$this->language."','".date("d/m/Y")."','".$this->username."');";
            echo $sql;
            return $sql;
        }
    }

    class SliderPic{
        public $title;
        public $mainPic;
        public $language;

        function __construct($title,$mainpic,$language)
        {
            $this->title = $title;
            $this->mainpic = $mainpic;
            $this->language = $language;
        }

        function addFile()
        {
            $sliderpath = "img/slider/".$this->mainpic['name'];
            move_uploaded_file($this->mainpic['tmp_name'],"../".$sliderpath);
            $sql= "insert into slider (baslik, main_photo) values ('".$this->title."','".$sliderpath."');";
            return $sql;
        }
    }

    class User{
        public $username;
        public $password;

        function __construct($username, $password)
        {
            $this->username = $username;
            $this->password = $password;
        }

        function addUser(){

        }

        function addNews($title,$description,$mainphoto,$language,$user){
            $news = new News($title,$description,$mainphoto,$language,$user);
            return $news->addQuery();
        }

        function addActivity($title,$description,$mainphoto,$photos,$language,$user){
            $activity = new Activity($title,$description,$mainphoto,$photos,$language,$user);
            return $activity->addQuery();
        }

        function addSlider($title,$mainphoto,$language){
            $slide = new SliderPic($title,$mainphoto,$language);
            return $slide->addFile();
        }
    }
?>