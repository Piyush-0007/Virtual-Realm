    <?php
        $conn = new mysqli("localhost", "root", "", "tvr");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select sum(price) amount, month(date) as months from sales where providerReferenceID is not null GROUP by months order by months asc;";
        $result = $conn->query($sql);
        $rows = array(); // Initialize an array to store all rows
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[$row['months']] = $row['amount']/100; // Add each row to the array
            }
        } else {
            $rows = 0;
        }
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
        echo json_encode($rows);
        $conn->close(); // Close the database connection
    ?>