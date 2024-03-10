
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $con = new mysqli('localhost', 'root', '', 'credentials');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }


        if (!isset($_POST['isAdmin'])) {

            $sql = "SELECT * FROM details WHERE (username = ? OR email = ?) AND password = ?";
            $stmt = $con->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("sss", $user, $user, $pass);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $result = $result->fetch_array();
                    if ($result['active_status'] == 0) {
                        header("Location: login.php?error=verification-awaiting");
                        exit();
                    } else {
                        $token = md5(rand());
                        $id = $result['userID'];
                        $_SESSION['status'] = true;
                        $_SESSION['id'] = $result['userID'];
                        $_SESSION['token'] = $token;
                        $_SESSION['name'] = $user;
                        print_r($_POST);

                        $error = $con->query("INSERT INTO logs(id, token) VALUES ('$id','$token')");
                        if ($error == false) {
                            die('unable to insert log');
                            exit(0);
                        } else {
                            header("Location: ../index.php");
                        }
                    }
                } else {
                    // Redirect back to the login page with an error parameter
                    header("Location: login.php?error=invalid");
                    exit();
                }
            }

            $stmt->close();
        } else {
            echo "all ok";
            $result = $con->query("SELECT * FROM admin WHERE (username = '$user' OR email = '$user') AND password = '$pass'");
            echo "all ok";
            // print_r($result);
            if ($result->num_rows == 1) {
                $result = $result->fetch_array();

                $token = md5(rand());
                $id = $result['id'];
                $_SESSION['adminStatus'] = true;
                $_SESSION['adminId'] = $result['id'];
                $_SESSION['adminToken'] = $token;
                $_SESSION['adminName'] = $user;

                $error = $con->query("INSERT INTO logs(id, IsAdmin, token) VALUES ('$id',1,'$token')");
                if ($error == false) {
                    die('unable to insert log');
                    exit(0);
                } else {
                    header("Location: ../Admin/Content/index.php");
                }
            } else {
                // Redirect back to the login page with an error parameter
                header("Location: login.php?error=invalid");
                exit();
            }
        }

        $con->close();
    }
    else {
    echo "Error in the prepared statement";
    // header("location: ../index.php");
    }
    ?>
