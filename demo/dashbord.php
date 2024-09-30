<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Your Gym Management System</title>
</head>
<style>

  body {
       margin: 0;
        padding: 0;
         background-image: url(back.jpg);
         background-size: cover;
         background-repeat: no-repeat;
         background-attachment: fixed;
            }

.container {
    display:flex;
}

.sidebar {
    width: 200px;
    background-color: #333;
    color: #fff;
    height: 100vh;
    padding-top: 20px;
}

.logo {
    text-align: center;
    padding-bottom: 20px;
}

.nav-list {
    list-style: none;
    padding: 0;
}

.nav-list li {
    padding: 10px;
}

.nav-list a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    display: block;
}

.nav-list a:hover {
    background-color: #555;
}

.content {
    flex: 1;
    padding: 20px;
}
    </style>
<body>
    <div class="container">
        <nav class="sidebar">

            <div class="logo">
            <img src="logo1.jpeg" width="120" height="120">
                <!-- Your logo or gym name goes here -->
           
            </div>
            <ul class="nav-list">
                <li>USER DASHBOARD</li>
                <br>
                <li><a href="account.php">MY PROFILE</a></li>
                <br>
                <li><a href="plan1.php">SELECT PLAN</a></li>
                <br>
                <li><a href="donation.php">PAYMENT PROCESS</a></li>
                <br>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>

        <div class="content">
            <!-- Your PHP content goes here -->
        </div>
    </div>
</body>
</html>