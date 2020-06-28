<?php
abstract class Content{
    public $title;
    public $description;
    public $mainpic;
    public $language;

    function addFile(){
        $path = '../img/'.$this->title.'/';
        mkdir($path);
        $textfile = fopen($path.$this->title.".txt","w") or die("Unable to open file");
        fwrite($textfile, $this->description); // We took description as html file and write
        $this->description = $path.$this->title.".txt";
        $this->mainpic = $path.$this->mainpic['name'];
        $img=resize_image($this->mainpic['tmp_name']);
        imagejpeg($img,$path);
    }
    abstract function addQuery();
}
?>