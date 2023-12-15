<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    html {
        background: linear-gradient(90deg, rgb(128, 108, 108),  rgb(199, 199, 158));
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
     tr,th , td{
        border : 2px solid ;
        border-collapse: collapse;
        font-size: 25px;
        padding: 8px;
        text-align: center;
        align-items: center;
        justify-content: center;
        margin-left: 450px;
     }  
     tr:hover {
    background-color: rgb(199, 199, 158);
    transition: background-color 0.3s ease;
}
    table  {
       margin-top: 65px;
        border-collapse: collapse;
        width: 100%;
        height: 80px;
    }
    input[type="color"] {
        padding: 0%;
        border: none;
        width: 150px;
        
    }
    h3{
        text-align: center;
        font-size: 20px;
        margin-top: 110px;
    }
    h2{
        text-align: center;
        font-size: 19px;
        margin-top: 20px;
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
</style>
<body>
    <header>
        <div class="logo">Planify it</div>
    <nav class="navigateur">
    </nav>
</header>
    <h3> 
        Une bonne gestion du temps passe avant tout par une bonne gestion des priorités. 
        La multiplication des tâches et des méthodes de communication rend de plus en plus complexe la priorisation. 
        Pourtant, gérer ses priorités est essentiel pour bien organiser sa journée de travail et faire face aux imprévus.
    </h3>
    <h2>
    Veuillez utiliser ces
    couleurs pour mieux prioriser et distinguer vos tâches, sinon vous pouvez les modifier à votre guise. 
    </h2>
<table> 
    <tr s> 
        <th> Categorie </th>
        <th>   Couleur </th>
    </tr>
    <tr> 
        <td> Rendez-vous </td>
        <td> <input type ="color" id="colcolor1" name="colcolor" value="#ff0000"> </td>
    </tr>
    <tr> 
        <td> Etude</td>
        <td>  <input type ="color" id="colcolor2" name="colcolor" value="#FFFF00"> </td>
    </tr>
    <tr> 
        <td> Sport </td>
        <td>  <input type ="color" id="colcolor3" name="colcolor" value="#0000FF"> </td>
    </tr>
    <tr> 
        <td> Travail </td>
        <td>   <input type ="color" id="colcolor4" name="colcolor" value="##FFFF00">   </td>
    </tr>
    <tr> 
        <td> Loisir </td>
        <td>  <input type ="color" id="colcolor5" name="colcolor" value="#FF00FF">   </td>
    </tr>
</table>
<script>
    //Appelle la la fonction loadcolor lorsque la page est entièrement chargée.
     window.onload = function () {   //permet de charger les couleurs
            loadColor("colcolor1");
            loadColor("colcolor2");
            loadColor("colcolor3");
            loadColor("colcolor4");
            loadColor("colcolor5");
        };
    
    //elle charge les couleurs depuis le stockage local pour les afficher apres un refresh
    function loadColor(colorId) {  // colorid est lidentifiant unique du champ
        var storedColor = localStorage.getItem(colorId); //récupère la valeur associée à la clé colorId dans le stockage local 
        if (storedColor) { // vérifie si la coulleur est enregistre dans le stokage local donc on lattribut au champ de couleur
            document.getElementById(colorId).value = storedColor;
        }
    }

    //elle écoute l'événement input sur le champ de couleur avec l'ID "colcolor" 
    //et exécute la fonction updatecolor lorsque cet événement se produit.
    document.getElementById("colcolor1").addEventListener("input", function () {
        updateColor("colcolor1"); // une fois que input sexecute la fonction sera appelle 
    });

     document.getElementById("colcolor2").addEventListener("input", function () {
         updateColor("colcolor2");
    });

    document.getElementById("colcolor3").addEventListener("input", function () {
         updateColor("colcolor3");
    });

    document.getElementById("colcolor4").addEventListener("input", function () {
        updateColor("colcolor4");
     });

    document.getElementById("colcolor5").addEventListener("input", function () {
         updateColor("colcolor5");
    });

    // Elle prend ;a nouvelle couleur et la stocke dans le stockage local associé à un identifiant unique
    function updateColor(colorId) {
    var colorValue = document.getElementById(colorId).value; //récupère la valeur quon vient de saisir du champ de couleur à partir de son identifiant
    localStorage.setItem(colorId, colorValue);  // etla stocke dans le stockage local à partir de son identifiant
}
</script>
</body>
</html>