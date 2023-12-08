<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>loginpage</title>
    <link rel="stylesheet" href="login.css">
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    /* box-sizing: border-box; */
    font-family: sans-serif;
}
body {
    display: grid;
    justify-content: center;
    align-items: center;
    min-width: 100vh;
    top: 0;
    bottom: 0;
    left: 0;
    top: 100px;
    background: linear-gradient(90deg, rgb(128, 108, 108),  rgb(199, 199, 158));
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
.contenu {
    padding-top: 20px;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; 
    font-size: xxx-large;
    margin-bottom: 10px;
    padding-left: 130px; 
}
.text {
    margin-left: 150px;
}
.txt {
    margin-left: 20px;
}
.kifkif {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 350px;
    margin-left: 155px;
}
.create-popup {
    margin: 20px;
    margin-left: 145px;
    /* width: 100px; */
    height: 40px;
    padding: 0px 120px;
    background: transparent;
    border: 1px solid white;
    border-radius: 50px;
    cursor: pointer;
    font-size: 15px;
    color: white;
    transition: background-color 1s, color 1s;
}
.create-popup:hover {
    background-color: rgb(255, 255, 255);
    color: #161616;
    opacity: 0.7;
}
</style>
<body>
    <header>
  
        <div class="logo">Planify it</div>
    <nav class="navigateur">
          <a href="<?php echo e(route('services')); ?>">Services</a>
          <a href="<?php echo e(route('contact')); ?>" >Contact</a>
    </nav>
    <form action="<?php echo e(route('login')); ?>">
        <button class="login-popup">Login</button>
    </form>
    </header>

    <p class="text1" style="margin-top: 200px; font-size:large;">
    Minimisez votre productivité, restez organisé et faites-en plus avec notre to-do list !
    </p>


    <div>
        <div class="contenu">
            <p class="text">Votre</p>
            <p class="txt">Creative todo list</p> 
        </div>
        <div class="kifkif">
            <p>Rejoignez-nous dès aujourd’hui.</p>
            <p>C'est gratuit!</p>
        </div>
        <form action="<?php echo e(route('sign')); ?>"> 
            <button class="create-popup">Creez votre compte.</button>
           </form>
     </div>
</body>
</html><?php /**PATH C:\Users\HP\.vscode\vuelaravelvite - Copie (4) - Copie\resources\views/welcome.blade.php ENDPATH**/ ?>