<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body{
        margin:0px;
        padding:0px;
        display:grid;
        width:100%;
        height:100vh;
        box-sizing:border-box;
      
      }
      .slider{
        width: 1475px;
        height:650px;
        background:url(1.jpg);
        background-size:100% 100%;
        animation:slide 16s infinite;
        animation-delay: 3s;
      }
     @keyframes slide{
      25%{
        background-image:url(2a.jpg);
      }
      50%{
        background-image:url(3.jpg);
      
      }
      75%{
        background-image:url(3a.jpg);
      }
      100%{
        background-image:url(1.jpg);
      }
    }
     </style>
     </head>
     <body>
     <?php 
      include "navbar.php";
    ?>
      <div class="slider">
       </div>
    </body>
    </html>