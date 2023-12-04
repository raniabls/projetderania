<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>calendrier</title>
</head>
<style>
    html {
  background-image: radial-gradient(ellipse at center, rgb(226, 226, 184) 0%,rgb(151, 129, 129)100%);
     width: 100%;
     height:100%;
     display: flex;
     flex-direction: column;
     align-items:center;
     justify-content: center;
     margin: 0;
     font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    
    }

  body{
    text-align: center;
  }

  p{ 
    text-align: center;
    font-size: 20px;
  }
  h1{ 
    text-align: center;
    font-size: 40px;
  }
  header{
    z-index: 1;
  }
  .sidebar{
  position: fixed;
  left: 0;
   top:0;
    bottom:0;
    width: 15%;
    height: 100%;
    background-color:white;
  }
  .sidebar p {
    padding: 10px 57px;
    flex: 100px;
    font-size:large;
    font-weight: 700;
    letter-spacing: 2px;
    color: rgb(0, 0, 0);
  }
  .sidebars {
    margin-top: 60px;
    cursor: pointer;
    height: 74px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* ICONS OU LES PHRASES RAHOM 9DAM B3DAHOM */
    flex-direction: column;
  }
  .sidebars a {
    text-decoration: none;
    color: black;
  }
  .plan{
    font-size: 30px;
    letter-spacing: 1px;
  }
  
  .calendrier{
    color:#000000;
    text-decoration: none;
    
  }
  .sidebars{
    margin-top: 70px;
    display: flex;
    height: 74px;
    justify-content: center;
    align-items: center;
  }
  .sidebars:hover{
    background-image: radial-gradient(ellipse at center, rgb(226, 226, 184) 0%,rgb(151, 129, 129)100%);
  }
  .sidebars img {
    height: 25px;
    margin-bottom: 4px;
  }
.container{ 
width: 100%;
align-items: center;
justify-content: center;
}
form{ 
  border-radius: 40px;
  padding: 20px;
  margin-top: 45px;
  width: 110%;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 15px 5px #dbddd5;
}
.container label {
  font-size: large;
}
.container input {
  padding: 10px 100px ;
  margin-left: 50px;
  font-size: 15px;
}
.container select {
  padding: 10px 100px ;
  margin-inline-start: 20px;
  margin-left: 60px;
 
}
.itemswrap{ 
  display: block;
  margin :25px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px 5px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 100px;
}

input {
  border: none;
  padding: 5px;
  border-radius: 5px;
}
select{
  border: none;
  padding: 5px;
  border-radius: 5px;
}

button {
  padding: 8px;
  background-color: rgb((206, 157, 176), 180, 198);
  color: #000000;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  font-weight: bold;
}

button:hover {
  background-color: #f3d6e1;
  color: rgb(255, 255, 255);
}

#tasklist {
  margin: 20px;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
}

.task {
  background-color: #f3f0f3;
  border-radius: 20px;
  padding: 10px;
  margin: 20px;
}
.task 

.task span {
  font-weight: bold;
  display: block; /* aligner verticalement le texte */
}

.task .Supprimer {
  color: #e2b4c6;
  cursor: pointer;
  float: right;
}

.task .edit {
  color: #e2b4c6;
  cursor: pointer;
  float: right;
  margin-right: 10px; /*  une marge à droite pour l'espacement */
}
.task-content {
  display: block;    /*yavait flex*/
  flex-direction: column;
}
.task-content p {
  display: block;
  font-size: 15px;
  font-weight: bold;
  margin-left: 5px;
  margin: 5px 0; /* Ajoutez une marge pour l'espacement entre les paragraphes */
}

.checkbox-container {
  display: block;     /*yavait flex*/
  align-items: center;
  margin-bottom: 5px; /* Ajoutez une marge en bas pour l'espacement entre les checkboxes */
}

.checkbox-container label {
  margin-left: 5px;
}

.checkbox-container input {
  margin-right: 5px;
}
</style>
<body>
  <nav class="sidebar">
    <p>Planify it</p>
    <div class="sidebars">
      <img src="home2.jpg">
      <div>Home</div>
    </div>
    <div class="sidebars">
      <img src="calendar.jpg">
      <a href="todo.html"> Calendrier</a>
    </div>
    <div class="sidebars">
      <img src="stat3.jpg" >
      <a href="todo.html"> Statistiques</a>
    </div>
  </nav>
<main>
    <form action="{{route('todo.store')}}" method="post">
        @csrf
        @method('post')
<div class="container">
    <form action="" id="taskform">
     <h1> Tâches notes</h1>
     <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
     <div class="itemswrap">
      <label for="taskdate">Titres </label>
      <input class="title" id="tasktitle" placeholder="Enter le titre de votre tache " name="Titres"/>
    </div>

     <div class="itemswrap">
       <label for="taskdate">Date </label>
       <input type="date" id="taskdate" name="Date" />
     </div>
   
     <div class="itemswrap">
       <label for="tasktime"> Temps</label>
       <input type="time" id="tasktime" name="Temps"/>
       </div>
       
     <div class="itemswrap">
       <label for="taskcategorie"> Categorie</label>
       <select name="Categorie" id="taskcategorie"> 
         <option value="Etude"> Etude</option>
         <option value="Travail"> Travail</option>
         <option value="Sport"> Sport</option>
         <option value="Loisir"> Loisir</option>
     
       </select>
       </div>
   
     <div class="itemswrap" id="app">
     <label for="taskdetails"> Détails</label>
     <textarea name="Détails" id="taskdetails" placeholder="Ecrivez les details de votre tache" > </textarea>
      <HelloWorld> </HelloWorld>
     </div>
   
     <button type="submit"> Ajouter tache</button>
    </form>  
    
    <div id="tasklist"> </div>
</div>
    </form>
</main>
</body> 
</html>

