<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="script.js" defer></script> -->
   </head>
   <body>
      <div class="container">
      <div class="text">
         Crée ton compte !
      </div>
      <form action="signup-check.php" method="post">

      <?php if(isset($_GET['error'])){ ?>
         <p class="error"><?php echo $_GET['error'];?></p>
      <?php } ?>

      <?php if(isset($_GET['success'])){ ?>
         <p class="success"><?php echo $_GET['success'];?></p>
      <?php } ?>

         <div class="form-row">
            <div class="input-data">
               <?php if(isset($_GET['name'])){ ?>
                  <input type="text" name="name" value="<?php echo $_GET['name'];?>">
               <?php }else{ ?>
                  <input type="text" name="name" id="name">
               <?php } ?>
            
               <div class="underline"></div>
               <label for="">Pseudo</label>
            </div>


            <div class="input-data">
               <?php if(isset($_GET['email'])){ ?>
                  <input type="email" name="email" id="email" value="<?php echo $_GET['email'];?>"><br>
               <?php }else{ ?>
                  <input type="email" name="email" id="email" require>
               <?php } ?>

               <div class="underline"></div>
               <label for="">Email</label>
            </div>
         </div>


         <div class="form-row">
            <div class="input-data">
            <input type="password" name="password" id="password" require>
               <div class="underline"></div>
               <!-- <div id="alert" class="invalide">Votre mot de passe a 8 caractère et contient au moins une majuscule, une minuscule, un chiffre et un caractère spécial.</div> -->
               <label for="">Mot de Passe</label>
            </div>
            <div class="input-data">
            <input type="password" name="conf_password" id="conf_password" require>
               <div class="underline"></div>
               <label for="">Confirmation du mot de Passe</label>
            </div>
         </div>

            <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="Sign up">
               </div>
            </div>
            <a href="index.php" class="ca">Se connecter</a>
      </form>
      </div>
   </body>
</html>