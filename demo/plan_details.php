<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Plan</title>
</head>
<body>
    <h2>Select a Plan</h2>
    <form action="plan_deatils.php" method="post">
        <label for="plan">Select Plan:</label>
        <select name="plan" id="plan">
            <option value="Plan A">Plan A</option>
            <option value="Plan B">Plan B</option>
            <!-- Add more options as needed -->
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<?php
// Establish database connection (replace these values with your actual database credentials)
$dbHost = 'localhost';
$dbName = 'mydb';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost,$dbUsername, $dbPassword, $dbName);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected plan
    $selected_plan = $_POST['plan'];

    // Prepare and execute query to fetch plan details
    $stmt = $dbc->prepare("SELECT pldescription, plvalidity, plamount FROM plan WHERE plname = :plname");
    $stmt->bindParam(':plname', $selected_plan);
    $stmt->execute();
    $plan_details = $stmt->fetch(PDO::FETCH_ASSOC);

    // Display plan details
    if ($plan_details) {
        echo "<h2>Plan Details</h2>";
        echo "<p><strong>Description:</strong> " . $plan_details['pldescription'] . "</p>"; 
        echo "<p><strong>Validity:</strong> " . $plan_details['plvalidity'] . "</p>"; 
        echo "<p><strong>Amount:</strong> " . $plan_details['plamount'] . "</p>"; 
    } 
        else { 
            echo "Plan details not found."; 
        }
             } 
             ?>
