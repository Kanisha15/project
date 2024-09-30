<?php session_start();
include_once('config.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Drop Down</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root{
            --bg-main:#18122B;
            --bg-primary:#ECF2FF;
        }

        html{
            font-size: 62.5%;
            font-family: "Lexend Deca Light";
        }

        body{
            background-color:var(--bg-primary)
        }

        a,li{
            margin: 0;
            font-size: 1.8rem;
            color: var(--bg-primary);
        }

        header{
            background-color: var(--bg-main);
            height: 10rem;
            color: var(--bg-primary);
            display: grid;
            place-items: center;
        }

        .container{
            width: 80%;
            height: 10rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            /*background-color: red;*/
        }


        .container a{
            list-style: none;
            display: flex;
            gap: 3rem;
            height: 10rem;
        }

        .container a{
            height: 10rem;
            line-height: 10rem;
            position: relative;
            cursor: pointer;
            /*background-color: yellow;*/
        }

        .container ul li a:hover, .container ul li:hover{
            color: red;
        }

        .container .drop-down{
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--bg-main);
            height: auto;
            min-width: 20rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem 0;
            gap: 2rem;
            top: 15rem;
            transition: all .3s linear;

            visibility: hidden;
            opacity: 0;
        }

        .container a:hover > .drop-down{
            visibility: visible;
            opacity: 1;
            top: 10rem;
        }

        .container .drop-down a{
            height: 3rem;
            line-height: 3rem;
            width: 100%;
            text-align: center;
            transition: all .3s linear;
            /*border: 1px solid red;*/
        }

        .container .drop-down a:hover{
            background-color: var(--bg-primary);
        }


        /*hero sectoin style */
        h2 {
            font-size: clamp(2.8rem, 2rem + 3vw, 4.8rem);
            font-weight: 900;
            line-height: 1;
            letter-spacing: 0.5px;
            margin-bottom: 1rem;
            color: var(--bg-primary);
        }

        h4 {
            font-size: clamp(1.25rem, 1rem + 3vw, 2.5rem);
            font-weight: 400;
            line-height: 1.6;
            color: var(--bg-primary);
        }

        button {
            margin: 6rem;
            padding: 1rem 2rem;
            background: var(--btn-bg);
            color: var(--bg-primary);
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.6;
            border: 1px solid var(--bg-primary);
            border-radius: 0.5rem;
            transition: background-color 300ms;
        }

        button:focus,
        button:hover {
            background: var(--bg-primary);
            cursor: pointer;
        }

        .hero {
            display: grid;
            height: 90rem;
            background-image: url(3a.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .hero > * {
            grid-area: 1 / -1;
        }

        .hero__content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }


    </style>
</head>
<body>
<header>
    <div class="container">
        <div>
            <h2>ADMIN PANEL</h2>
        </div>
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard1.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        
             
                        <a class="nav-link" href="manage-users.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Manage Users
                        </a>

                            <a class="nav-link" href="bwdates-report-ds.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-calendar"></i></div>
                            B/w Dates Report
                        </a>

                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Signout
                        </a>
                    
                    </div>
                </div>
            
            </nav>
        </div>
                <li> <a href="admin.php" target="_blank" >Logout </a> </li>
    </div>
    </div>  
        </nav>
    </div>
</header>

<!--hero section -->
<section class="hero">
    <div class="hero__content">
       
    </div>
</section>

</body>
</html>