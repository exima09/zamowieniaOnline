<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>load demo</title>
  <style>
  body {
    font-size: 12px;
    font-family: Arial;
  }
  .bar{
            background: #e4e4e4;
            border-radius: 10px;
            height: 24px;
            width:200px;
            display: inline-block;
            vertical-align: middle;
        }
        .fill{
            background: #ff0000;
            height: 24px;
            width:0%;
            border-radius: 10px;
        }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
    <div class="bar"><div class="fill"></div></div>
<b>Projects:</b>
<ol id="new-projects"></ol>
 
<script>
$( ".fill" ).animate({
            width: "100%"
        }, 10000);
setInterval(function(){ 
    $(".fill").fadeOut("slow").css("width","0%");
    $(".fill").fadeIn("slow").css("width","0%");
    $( ".fill" ).animate({
            width: "100%"
        }, 7900);
$("#new-projects").fadeIn("slow").css("display", "inline-block");
$( "#new-projects" ).load( "klienci.php table tr" );
}, 10000);
</script>
 
</body>
</html>