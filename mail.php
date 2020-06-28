<?php
    $ad = $_POST['name'];
    $email = $_POST['email'];
    $baslik = $_POST['subject'];
    $post_mesaj = $_POST['message'];
    $icerik = "Gönderenin Adı: " . $ad . "<br/>E-Posta: ". $email . "<br/>Konu:".$baslik."Mesaj:" . $post_mesaj;

    $header = "From: $email\r\n".
    "Content-Type: text/html; Charset=iso-8859-9\r\n";

    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
          
      $mesajdecode = iconv("UTF-8", "ISO-8859-9", $post_mesaj);
      $headerdecode = iconv("UTF-8", "ISO-8859-9", $header);
      $icerikdecode = iconv("UTF-8", "ISO-8859-9", $icerik);
      mail('payhez@gmail.com', $baslik, $icerik, $header);
      echo "Mesajınız Başarıyla Ulaşmıştır.";
    }else{
      echo "paaa";
    }
?>