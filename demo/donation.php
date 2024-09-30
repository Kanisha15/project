<?php
include_once "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $date = date('Y-m-d H:i:s');
    $status = "success";
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

            $stmt = $dbc->prepare("INSERT INTO donation (amount, status, transcation_date) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("dsss", $amount, $status, $date);

            if ($stmt->execute() === TRUE) {
                echo "<script> alert('Donation successful!')</script>";
                echo "<script> window.location.href = 'donation.php'</script>";
                exit(); // Terminate script after redirect
            } else {
                echo "Error: " . $stmt->error;
            }

        } else {
        // User not found, show error message
        echo "<script> alert('User not found. Please try again.')</script>";
        echo "<script> window.location.href = 'donation.php'</script>";

        exit();
       }
       // Close the statement and connection
        $stmt->close();
       $dbc->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.wrapper {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

.logo {
    text-align: center;
    margin-bottom: 20px;
}

.logo img {
    width: 100px;
    height: auto;
}

.wrapper h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
    color: #333;
}

.input-box {
    position: relative;
    margin-bottom: 20px;
}

.input-box input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
}

.input-box i {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    color: #888;
}

.book-btn {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    color: #fff;
    
    background-color: #007bff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.book-btn:hover {
    background-color: #0056b3;
}

.register-pg {
    margin-top: 20px;
    text-align: center;
}

.register-pg label {
    color: #666;
}

.register-pg a {
    color: #007bff;
    text-decoration: none;
}

.register-pg a:hover {
    text-decoration: underline;
}
    </style>
<body>
    <div class="wrapper">
        <form id="paymentForm" method="post" onsubmit="return validateForm()">
            <div class="logo">
                <img src="logo1.jpeg">
            </div>
            <h1>PAYMENT</h1>

            <div class="input-box">
                <input type="number" class="name" placeholder="Enter amount" name="amount" id="amount" required>
                <i class='bx bx-wallet'></i>            
            </div>
            <small><span id="dateError"></span></small>
            <div class="input-box">
                <input type="number" class="phone" placeholder="Phone No." id="phone_no" name="phone_no" oninput="validatePhoneNumber()" required>
                <i class='bx bx-phone'></i>
                <small> <span id="Message phn-no"></span></small>
            </div>
            <button type="submit" class="book-btn" id="rzp-button" name="submit">Pay Now</button>
            <div class="register-pg">
                <label>Back to</label> <a href="dashbord.php">home</a>
            </div>
        </form>
    </div>
    <script>
        function validateForm() {
            var amount = document.getElementById("amount").value;
            // Perform client-side validation, ensuring amount is valid
            if (isNaN(amount) || amount <= 0) {
                alert("Please enter a valid amount.");
                return false;
            }
            // If all validations pass, return true to submit the form
            return true;
        }
    </script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>

document.getElementById('rzp-button').onclick = function(e) {

    const amount = document.getElementById("amount").value;
    const phone = document.getElementById("phone_no").value;


    // Create a new Razorpay instance
    var rzp = new Razorpay({
        key: 'rzp_test_IqL41z58B9nXgk', // Replace this with your Razorpay API Key
        amount: amount*100, // Amount in paise (i.e., 50000 paise = INR 500)
        currency: 'INR',
        name: 'gym website payment',
        description: 'You are payment directly to gym using razorpay',
        image: 'img/logo1.jpg', // Your company logo URL
        handler: function(response) {
            // Handle the successful payment response
            saveData(amount);
            alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);

        },
        prefill: {
            name: 'Customer Name',
            email: 'customer@example.com',
            contact: 'phone'
        },
        theme: {
            color: '#F37254' // Customize the theme color if needed
        },
        payment_method: {
            netbanking: true,
            card: true,
            upi: true,
            wallet: true
        }
    });

    // Open the Razorpay checkout form
    rzp.open();
    e.preventDefault();

    function saveData(amount) {
        // Prepare data to send
        const data = new URLSearchParams();
    data.append('amount', amount);

        fetch('donations.php', {
            method: 'POST',
            body: data
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Response from PHP file
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }
}


</script>

</body>

</html>
<!-- rEVg2tW6BO0hA6Cj7SpQKgLT -->