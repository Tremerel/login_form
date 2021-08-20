<?php

session_start();
include "process.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['conf_password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $conf_password = validate($_POST['conf_password']);
    $name = validate($_POST['name']);

    $user_data =  'name=' . $name . '& email=' . $email;

            function check_mdp_format($mdp) {
            $majuscule = preg_match('@[A-Z]@', $mdp);
            $minuscule = preg_match('@[a-z]@', $mdp);
            $chiffre = preg_match('@[0-9]@', $mdp);
            $specialCaractere = preg_match("#[^a-zA-Z0-9]#", $mdp);

            if(!$specialCaractere || !$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 8){
                return false;
            } else {
                return true;
            }
        }

        if (check_mdp_format($_POST['password']) != true){
            header("Location: signup.php?error=Le mot de passe doit contenir une majuscule, une minuscule ,un chiffre et un caratère spécial.&$user_data");
            exit();	
        } else {
            header("Location: signup.php?success=Le mot de passe est correcte.&$user_data");
        }

        if(empty($name)){
            header("Location: signup.php?error=Nom requit.&$user_data");
            exit();
        }else if(empty($email)){
            header("Location: signup.php?error=Email requit.&$user_data");
            exit();
        }else if(empty($password)){
            header("Location: signup.php?error=Mot de passe requit.&$user_data");
            exit();
        }else if(empty($conf_password)){
            header("Location: signup.php?error=Confirmation mot de passe requit.&$user_data");
            exit();
        }else if($password !== $conf_password){
            header("Location: signup.php?error=Confirmation  du mot de passe différente.&$user_data");
            exit();
        }
        
        
        else{
            $password = hash('sha512', $_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                header("Location: signup.php?error=Cet email est déjà utilisé&$user_data");
                exit();
            }else{
                $sql2 = "INSERT INTO users(email, password, name) VALUES('$email', '$password', '$name')";
                $result2 = mysqli_query($conn, $sql2);
                if($result2){
                    header("Location: signup.php?success=Votre compte à bien étais créé&$user_data");
                    exit();
                }else{
                    header("Location: signup.php?error=Une erreur innatendue viens d'arriver&$user_data");
                    exit();
                }
            }
        }
}else{
    header("Location: signup.php");
    exit();
}