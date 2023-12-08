
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

header {
    position: fixed; 
    top: 0;
    right: 0;
    left: 0;
    height: 60px;
    padding: 20px 100px;
    display: flex;
    align-items: center;
    flex-direction: row;
    z-index: 99;
    background-color: rgb(0, 0, 0);
}
.logo {
    width: 100px;
    flex: 100px;
    font-size:large;
    letter-spacing: 4px;
    color: white;
}
.navigateur {
    flex: 1;
    display: grid;
    grid-template-columns: 100px 100px 100px; 
}
.navigateur a {
    text-decoration: none;
    color: white;
}
.login-popup {
    margin: 20px;
    width: 100px;
    height: 40px;
    background: transparent;
    border: 1px solid white;
    border-radius: 5px;
    cursor: pointer;
    font-size: 15px;
    color: white;
    transition: background-color 1s, color 1s;
}
.login-popup:hover {
    background-color: rgb(255, 255, 255);
    color: #161616;
    opacity: 0.7;
}
.bod {
   margin-top:80px;
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
#main{
   box-shadow: 0px 1px 15px 13px #dbddd5;
   border-radius: 40px;
   align-items: center;
justify-content: center;
display:flex;
margin: 20px;
background-image: radial-gradient(ellipse at center, rgb(223, 223, 179) 0%,rgb(129, 110, 110)100%); ;
width:600px;
height: 320px;
margin-left: 330px;

}
.deco{ 
   width: 60%;
   height:35px;
   border-radius: 10px; 
   font-size: 15px;
   cursor: pointer;
   background-color: rgb((206, 157, 176), 180, 198);
   border: none; 
   }
.deco:hover {
       background-color: rgb(126, 114, 114);
       color: rgb(255, 255, 255);
    }
    #email{
       width: 300px;
       height: 35px;
       border-radius: 10px;
       margin-top: 5px;
    }
    #name{
       width: 300px;
       height: 35px;
       border-radius: 10px;
       margin-top: 5px;
    }
    #password{
       width: 300px;
       height: 35px;
       border-radius: 10px;
       margin-top: 5px;
    }
    </style>

<body>
<header>
  
  <div class="logo">Planify it</div>
<nav class="navigateur">
  <a href="<?php echo e(route('services')); ?>">Services</a>
  <a href="<?php echo e(route('contact')); ?>">Contact</a>
</nav>
<form action="<?php echo e(route('login')); ?>">
  <button class="login-popup">Login</button>
</form>
</header>

    <section class="bod">
        <h4 class="text1">Créer votre compte</h4>
        <p class="text2">Bienvenue sur notre site de liste de choses à faire 'Planify it' ! Nous sommes ravis de vous accueillir.</p>
    </section>
<div id="main">
    <form  method="post" action="<?php echo e(route('profil.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>
        <label for="name" ><strong> Nom: </strong></label> <br>
        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required><br><br>

        <label for="email"> <strong>E-mail: </strong></label> <br>
        <input type="text" id="email" name="email" placeholder="Entrez votre e-mail" required><br><br>

        <label for="password"><strong> Mot de pass : </strong></label><br>
        <input type="password" name="password" id="password"placeholder="Entrez votre mot de pass" required> <br><br>
        <div>
            <input type="submit" class ="deco" id="submit" value="Inscription" >
        </div>
      </form>
</div>
</body>
</html><?php /**PATH C:\Users\HP\.vscode\vuelaravelvite - Copie (4) - Copie\resources\views/profiles/sign.blade.php ENDPATH**/ ?>