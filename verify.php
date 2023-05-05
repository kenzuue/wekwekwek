<?php

    session_start();
    include('create-account.php');

    

    
    if (isset($_POST["signup"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $verify_token = md5(rand());
    
        $check_email_query = "SELECT email from customer WHERE email='$email' LIMIT1 ";
        $check_email_query = mysqli_query($con, $check_email_query);
    
        if(mysqli_num_rows($check_email_query_run) > 0 )
        {
            
            
            $_SESSION['status'] = "Email ID Already exists";
            header("Location: create-account.php");
            


        }
        else
        {
            //Insert User / Registered User Data
            $query = "INSERT INTO customer (cemail, cname, ctel, cpassword, verify_token) VALUES ('$name', '$email', '$phone', '$password', '$verify_token')";
            $query_run = mysqli_query($con, $query);

            if($query_run)
            {

                $_SESSION['status'] = "Registration Successfull. Please Verify your Email";
                header("Location: create-account.php");
            }
            else
            {
                $_SESSION['status'] = "Registration Failed";
                header("Location: create-account.php");
            }
        }
    
 }


?>