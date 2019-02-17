 <!DOCTYPE html>
  <html>
    <head>
      <script src="<?php echo (WEBROOT . 'Vendors/jquery-3.3.1.min.js') ?>"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="<?php echo (WEBROOT . 'Webroot/Css/materialize.min.css') ?>"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="<?php echo (WEBROOT . 'Webroot/Css/style.css') ?>" media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

    
    <nav>
    <div class="nav-wrapper red lighten-1">
      <a href="#" class="brand-logo center">Berlin Sens</a>
      <ul id="nav-mobile" class="right">
        <li><a href="http://localhost/PHP_Rush_MVC/Articles/displayAll/">Home</a></li>
        <li><a href="http://localhost/PHP_Rush_MVC/Users/logout">Logout</a></li>
      </ul>
    </div>
  </nav>

    <div class="container">
		<?php echo $content_for_layout ?>
	</div>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="<?php echo (WEBROOT . 'Webroot/js/materialize.min.js') ?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $('select').formSelect();
      });
    </script>
    </body>
</html>