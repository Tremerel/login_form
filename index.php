<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Connectez-vous</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="container">
      <div class="text">
         Connectez-vous
      </div>
      <form action="login.php" method="post">
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
         <div class="form-row">
            <div class="input-data">
               <input type="email" name="email" id="email">
               <div class="underline"></div>
               <label for="email">Email </label>
            </div>
            <div class="input-data">
            <input type="password" name="password" id="password">
               <div class="underline"></div>
               <label for="password">Mot de Passe </label>
            </div>
         </div>
        
         <div class="form-row submit-btn">
               <div class="input-data">
                  <div class="inner"></div>
                  <input type="submit" value="submit">
               </div>
            </div>

                  <a href="signup.php" class="ca">Créé un compte</a>
               </div>
            </div>
      </form>
      </div>
   </body>