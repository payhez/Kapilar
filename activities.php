<?php
    include('includes/header.php');
?>
<section class="section background-white">
  <div class="line">
    <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50"><?php echo $lang['ouract']?></h2>
    <div id="load_data" class="margin">
    </div>
    <div id="load_data_message">
    </div>
  </div>    
</section>
<script>

  $(document).ready(function(){
    
    var limit = 3; //The number of records to display per request
    var start = 0; //The starting pointer of the data
    var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
    function load_country_data(limit, start)
    {
      $.ajax({
      url:"aktivitefetch.php",
      method:"POST",
      data:{limit:limit, start:start},
      cache:false,
      success:function(data)
      {
        $('#load_data').append(data);
        if(data == ''){
          action = 'active';
        }
        else{
          $('#load_data_message').html("<div class='loader'></div>");
          action = 'inactive';
        }
      }
      });
    }

  if(action == 'inactive')
  {
    action = 'active';
    load_country_data(limit, start);
  }
  $(window).scroll(function(){
    if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
    {
    action = 'active';
    start = start + limit;
    setTimeout(function(){
      load_country_data(limit, start);
    }, 500);
    }else{
      setTimeout(function(){
        $('#load_data_message').hide();
      }, 3000);
    }
  });
  
  });
</script>
<?php
    include('includes/footer.php');
?>