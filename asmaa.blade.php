<!DOCTYPE html>
<html>
    <head>
        <title>page de connection</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css"/>
        
    </head>

<body>
    
<section class="bod">
        <h4 class="text1">Créer votre compte</h4>
        <p class="text2">Welcome to our to-do list website 'Planify it'! We're delighted to have you.</p>
    </section>
<div id="main">
    <form  method="post" action="{{route('asmaa.store')}}">
        @csrf
        @method('post')
        <label for="name" ><strong> Nom: </strong></label> <br>
        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required><br><br>

        <label for="email"> <strong>E-mail: </strong></label> <br>
        <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required><br><br>

        <label for="password"><strong> Mot de pass : </strong></label><br>
        <input type="password" name="password" id="password"placeholder="Entrez votre mot de pass" required> <br><br>
        <div>
            <input type="submit" class ="deco" id="submit" value="Inscription" >
        </div>
      </form>
</div> 
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
.text1 {
   font-size: xx-large;
   font-weight: bold;
   margin-bottom: 10px;
}
.text2 {
   text-align: center;
   font-weight: bold;
   
}
#main{
   box-shadow: 0px 1px 15px 13px #dbddd5;
   border-radius: 40px;
   align-items: center;
justify-content: center;
display:flex;
margin: 25px;
background-image: radial-gradient(ellipse at center, rgb(223, 223, 179) 0%,rgb(129, 110, 110)100%); ;
width:600px;
height: 300px;
margin-left: 380px;

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
    }
    #name{
       width: 300px;
       height: 35px;
       border-radius: 10px;
    }
    #password{
       width: 300px;
       height: 35px;
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
   margin-right: -200px;
   margin-top: 15px;
}
    </style>

</body>
</html>