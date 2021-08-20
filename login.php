<?php

session_start();
include "process.php";

if (isset($_POST['email']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $mdp = '$2y$10$S3OB.HGBOgVuKpR3lZmyB.8gQOaYfLAm4Xqu6bFb6WT1KuTvS/qpO';

        if(empty($email)){
            header("Location: index.php?error=Email is required");
            exit();
        }else if(empty($password)){
            header("Location: index.php?error=Password is required");
            exit();
        }else{
            // $password = $_POST['password'];
            // $encryptedPassword = hash('sha512', $password);
            // $verifPassword = password_verify($verify,$encryptedPassword);

            //verification du mot de passe

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result); 
                $encryptedPassword = $row['password']; //mot de passe de la base de données (encrypté)
                $verify = hash('sha512', $password); //encription du mot de passe envoyé (fromulaire)
                $verifPassword = password_verify($verify,$encryptedPassword); 

                if($verifPassword){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: home.php");
                    exit();
                }else{
                    header("Location: index.php?error=Incorrect Email or password");
                    exit();
                }
            }else{
                header("Location: index.php?error=Incorrect Email or password");
                exit();
            }
        }

}else{
    header("Location: index.php");
    exit();
}