<?php
    include('includes/header.php');
?>
    <div class="section background-white"> 
        <div class="line">
        <div class="margin">
            
            <!-- Company Information -->
            <div class="s-12 m-12 l-6">
                <h2 class="text-uppercase text-strong margin-bottom-30"><?php echo $lang['information'] ?></h2>
                <div class="float-left">
                  <i class="icon-placepin background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0"><?php echo $lang['address'] ?></h4>
                  <p>Etiler Mh. 1270. Sk.<br>
                    No:8 Kapilar<br>
                    Basmane, Izmir
                  </p>               
                </div>
                <div class="float-left">
                  <i class="icon-paperplane_ico background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80 margin-bottom">
                  <h4 class="text-strong margin-bottom-0">E-mail</h4>
                  <p>info@kapilar.com<br>
                     <br>
                  </p>              
                </div>
                <div class="float-left">
                  <i class="icon-smartphone background-primary icon-circle-small text-size-20"></i>
                </div>
                <div class="margin-left-80">
                  <h4 class="text-strong margin-bottom-0"><?php echo $lang['phone'] ?></h4>
                  <p>0800 4521 800 50<br>
                     0450 5896 625 16<br>
                     0798 6546 465 15
                  </p>             
                </div>
              </div>
            
            <!-- Contact Form -->
            <div class="s-12 m-12 l-6">
            <h2 class="text-uppercase text-strong margin-bottom-30"><?php echo $lang['contactus'] ?></h2>
            <form class="customform" method="POST" action="mail.php">
                <div class="line">
                <div class="margin">
                    <div class="s-12 m-12 l-6">
                    <input name="email" class="required email border-radius" placeholder="Your e-mail" title="Your e-mail" type="text" />
                    </div>
                    <div class="s-12 m-12 l-6">
                    <input name="name" class="name border-radius" placeholder="Your name" title="Your name" type="text" />
                    </div>
                </div>
                </div>
                <div class="s-12"> 
                <input name="subject" class="subject border-radius" placeholder="Subject" title="Subject" type="text" />
                </div>
                <div class="s-12">
                <textarea name="message" class="required message border-radius" placeholder="Your message" rows="3"></textarea>
                </div>
                <div class="s-12 m-12 l-4"><button class="submit-form button background-primary border-radius text-white" type="submit">Send</button></div> 
            </form>
            </div>  
        </div>  
        </div> 
    </div> 
    </article>
    <div class="background-primary padding text-center">
    <a href="https://www.facebook.com/izmirkapilar/"><i class="icon-facebook_circle icon2x text-white"></i></a> 
    <a href="https://www.instagram.com/kapilarcollective/"><i class="icon-instagram_circle icon2x text-white"></i></a>                                                                        
    </div>
    <!-- MAP -->
    <div class="s-12 grayscale center">  	  
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3125.83369664749!2d27.144702314592063!3d38.422207979646736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd8f3a053005f%3A0x4eabb01b9c83660f!2sKap%C4%B1lar%20Dayani%C5%9Fma%20Evi!5e0!3m2!1str!2str!4v1592422938129!5m2!1str!2str" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false" tabindex="0"></iframe>
    </div>
</main>
<?php
    include('includes/footer.php');
?>