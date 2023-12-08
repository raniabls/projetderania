<!DOCTYPE html>
<html>
    <head>
        <title>page de connection</title>
        <meta charset="utf-8">
    </head>
    <style>
        *{
   margin: 0;
   padding: 0;
   /* box-sizing: border-box; */
   font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
body {
   display: grid;
   align-items: center;
   text-align: center;
   min-width: 100vh;
   top: 0;
   bottom: 0;
   left: 0;
   top: 100px;
   background-image: radial-gradient(ellipse at center, rgb(199, 199, 158) 0%,rgb(128, 108, 108)100%);

}
html{
   width: 100%;
   height: 100%;
}

 .msg{ 
    position: absolute;;
    right: 230px;

 }
 .sign-popup {
    position: absolute;
    right: 55px;
    width: 155px;
    height: 25px;
    background: transparent;
    border: 1px solid rgb(61, 59, 59);
    border-radius: 15px;
    cursor: pointer;
    font-size: 15px;
    color: #161616;
    text-decoration: none;
    
 }
 .sign-popup:hover {
    background-color: #f3d6e1;
    color: #161616;
    opacity: 0.7;
 }
 .sidebar {
    position: fixed;
    left: 0;
    bottom: 0;
    top: 0;
    width: 200px;
    z-index: 200;
    background-color:white;
 }
 #main{
   box-shadow: 0px 1px 15px 13px #dbddd5;
   border-radius: 40px;
   align-items: center;
   justify-content: center;
   display:flex;
   margin: 30px;
   background-image: radial-gradient(ellipse at center, rgb(212, 212, 167) 0%,rgb(128, 108, 108)100%);
   width:600px;
  height: 300px;
  margin-left: 330px;

}
.text1 {
   font-size: xx-large;
   font-weight: bold;
   margin-bottom: 20px;
   margin-top: 50px;
}
.text2 {
   text-align: center;
   font-weight: bold;
   margin-bottom: 20px;
}

.deco{ 
    width: 90%;
    height:35px;
    border-radius: 40px; 
    font-size: 15px;
    cursor: pointer;
    border: none; 
    }
.deco:hover {
      background-color: rgb(126, 114, 114);
        color: rgb(255, 255, 255);
     }
#email{
        width: 300px;
        height: 32px;
        border-radius: 10px;
     }
#password{
        width: 300px;
        height: 32px;
        border-radius: 10px;
     }
     .navbar-brand{
      margin: 25px;
      padding-left: 150px;
      font-size: x-large;
      font-weight: 700;
    letter-spacing: 2px;
      
  }
  .nav-link{
      font-size: large; 
      margin: 14px;
    
  }
  .login-popup {
   margin: 20px;
   width: 10%;
   height:31px;
   background: transparent;
   border: 1px solid black;
   border-radius: 5px;
   cursor: pointer;
   font-size: 15px;
   color: black;
   text-decoration: none;
}
.login-popup:hover {
   background-color:rgb(126, 114, 114);
   color: #161616;
   opacity: 0.7;
}
 .compte{
      margin-right: -180px;
      margin-top: 15px;
}
    </style>

<body>
<section class="bod">
        <h4 class="text1">Connectez-vous à votre compte</h4>
        <p class="text2">Bienvenue sur notre site de liste de choses à faire 'Planify it' ! Nous sommes ravis de vous accueillir.</p>
    </section>
    <div id="main">  
     <form method="post" action="<?php echo e(route('profil.store')); ?>"> 
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
         <label for="email"> <strong>E-mail: </strong></label> <br> <br>
         <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required><br> <br>
         <label><strong> Mot de pass : </strong></label> <br> <br>
         <input type="password" id="password" name="password" placeholder="Entrez votre mot de pass" required> <br><br>
       
        <div>
            <input type="submit" class ="deco" value="Connexion" >
        </div>
      </form>
</div> 
</body>
</html><?php /**PATH C:\Users\HP\.vscode\vuelaravelvite - Copie (4)\resources\views/profiles/login.blade.php ENDPATH**/ ?>