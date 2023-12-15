<template>
  <div id="app">
    <nav class="sidebar">
      <p>Planify it</p>
      <div class="sidebars">
        <a href="welcome.blade.php"> Home</a>
      </div>
      <div class="sidebars">
        <a href="Calendar.blade.php"> Calendrier</a>
      </div>
      <div class="sidebars">
        <a href="services.blade.php"> Services</a>
      </div>
    </nav>

    <div class="container">
      <form @submit.prevent="addTask" id="taskform">
        <h1> Tâches notes</h1>
        <div class="itemswrap">
          <label for="tasktitle">Titre: </label> 
          <input type="text" id="tasktitle" v-model="taskForm.titre" placeholder="Entrez le titre de votre tâche" required/>
        </div>

        <div class="itemswrap">
          <label for="taskdate">Date: </label>
          <input type="date" id="taskdate" v-model="taskForm.date" required />
        </div>
      
        <div class="itemswrap">
          <label for="tasktime">Temps:</label>
          <input type="time" id="tasktime" v-model="taskForm.time" required>
        </div>
        
        <div class="itemswrap">
          <label for="taskcategorie">Catégorie:</label>
          <select name="Categorie" id="taskcategorie" v-model="taskForm.category" required> 
            <option value="Rendez-vous">Rendez-vous</option>
            <option value="Etude">Etude</option>
            <option value="Travail">Travail</option>
            <option value="Sport">Sport</option>
            <option value="Loisir">Loisir</option>
          </select>
        </div>

        <div class="itemswrap">
          <label for="taskpriority">Etat de la tâche:</label>
          <select name="Priority" id="taskpriority" v-model="taskForm.priority" required> 
            <option value="Pas commencer">Pas commencer</option>
            <option value="En cours">En cours</option>
            <option value="Terminée">Terminée</option>
          </select>
         
        </div>
        
        <div class="itemswrap">
          <label for="taskcolor">Couleur:</label>
          <input type="color" id="taskcolor" name="taskcolor" v-model="taskForm.color" required > 
        </div>
        
        <div class="itemswrap" id="app">
          <label for="taskdetails">Détails:</label>
          <textarea id="taskdetails" v-model="taskForm.details" placeholder="Ecrivez les détails de votre tâche" required> </textarea>
        </div>
        
        <button type="submit">Ajouter tache</button>
      </form>
      
      <div id="tasklist">
        <!--index est une variable qui représente la position de l'élément actuel dans la liste lors de l'itération avec v-for-->
        <!--on a creer une boucle pour chaque tâche dans la liste en utilisant l'index comme clé unique pour 
          chaque élément dans la listes et il sera représenté par -->
        <div v-for="(task, index) in tasks" :key="index" class="task" :style="{ backgroundColor: task.color }">
          <div class="task-content">
            <!--Si la tâche n'est pas en mode édition on affiche titre,date... -->
            <p v-if="!task.editing">Titre: {{ task.titre }}</p> 
            <p v-if="!task.editing">Date: {{ task.date }}</p>
            <p v-if="!task.editing">Temps: {{ task.time }}</p>
            <p v-if="!task.editing">Catégorie: {{ task.category }}</p>
           <!-- Si la tâche n'est pas en mode édition on affiche etat et bouton editer etat-->
            <div  class= "priority" v-if="!task.editing">
              <p @click="EditPriority(index)">Priorité: {{ task.priority }}</p>
            </div>
            <!-- Si letat est en mode édition on affiche select pout changer letat
            et un bouton pour enregistrer les modifications-->
            <div v-if="task.editingPriority">
              <label for="taskpriority"></label>
             <select  class="priorite" name="Priority" id="taskpriority" v-model="task.editedPriority">
             <option value="Pas commencer" class="option">Pas commencer</option>
             <option value="En cours" class="option">En cours</option>
             <option value="Terminée" class="option">Terminée</option>
             </select>
             <span class="edit" @click="SavePriority(index)">Enregistrer</span>
            </div>

            <p v-if="task.details && !task.editingDetails"> Détails:</p>
            <!--Si la tâche a des détails (qui sont string) et n'est pas en mode édition affiche les détails sous forme de checkbox-->
              <div v-if="task.details && typeof task.details === 'string' && !task.editingDetails">
               <!-- v-for qui itère sur chaque ligne des détails de la tache
               split('\n') est utilisée pour diviser les détails en un tableau de lignes en fonction des sauts de ligne ('\n')
                Chaque ligne est ensuite rendur checkbox -->
              <div class="checkbox-container" v-for="(line, lineIndex) in task.details.split('\n')" :key="lineIndex">
                <input type="checkbox" />
                <label>{{ line }}</label>
              </div>
              <span class="edit" @click="EditTask(index)">Modifier</span>
            </div>
          
            <div v-else-if="!task.editingDetails"> <!-- de la version modifie si elle existe -->
              <div class="checkbox-container" v-for="(line, lineIndex) in task.editedDetails.split('\n')" :key="lineIndex">
                  <input type="checkbox" />
                 <label>{{ line }}</label>
               </div>
            </div>
           <!--Si les détails sont en mode édition affiche affiche textarea pour moodifer et bouton enregistrer-->
            <div v-if="task.editingDetails">
            <textarea v-model="task.editedTaskDetails" placeholder="Modifier les détails" v-if="task.editingDetails"></textarea>
            <span class="edit" @click="SaveDetails(index)">Enregistrer</span>
            </div>
           <!-- a chaque fois quon clique sur supprimer deletetask est appele -->
            <span class="Supprimer" @click="DeleteTask(index)">Supprimer</span>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  // data est utilise pour définir les données du code
  data() {
    return {
      tasks: [],
      //taskform cest un objet qui représente le formulaire avec des propriétés qui coresepondent aux champs de form
      //Lorsquon remplit le formulaire et soumet une nouvelle tâche les valeurs entrées sont stockées dans this.taskForm
      taskForm: {
        titre: '',
        date: '',
        time: '',
        category: '',
        priority: '',
        color: '#ff0000',
        details: '',
      },
    };
  },
  
  mounted() {
    //  permet Récupérer les tâches depuis le stockage local et les assigner à tasks
  this.tasks = JSON.parse(localStorage.getItem('tasks')) || []; // Mettre à jour le stockage local apres avoir ajouter une tache
  },

  methods: {
    addTask() {
    // on cree un nouveau objet représentant une nouvelle tâche en utilisant les valeurs acteuls du formulaire
      const newTask = {
        titre: this.taskForm.titre, //Copie la valeur du champ "titre" du (taskForm) dans la propriété titre de la nouvelle tâche.
        date: this.taskForm.date,
        time: this.taskForm.time,
        category: this.taskForm.category,
        priority: this.taskForm.priority,
        color: this.taskForm.color,
        details: this.taskForm.details,
        editing: false, //propriete utilisée pour suivre si une tâche est en cours d'édition
        editingDetails: false, //propriete utilisée pour suivre si les details sont en cours d'édition
        editedDetails: '' , // variable pour stocker les modifications des détails d'une tâche pendant l'édition
        editingPriority: false, ////propriete utilisée pour suivre si letat de la tache est en cours d'édition
        editedPriority: '',
      };
      this.tasks.push(newTask); //on utilise la méthode push pour ajouter l'objet newTask a la liste des taches (tasks) et afficher la tache
      localStorage.setItem('tasks', JSON.stringify(this.tasks)) // Mettre à jour le stockage local

      // Réinitialisation du formulaire (taskform) a chaque fois quon fini dajouter 
      // pour etre prêt pour l'ajout de la prochaine tâche
      this.taskForm = {
        titre: '',
        date: '',
        time: '',
        category: '',
        priority: '',
        color: '#ff0000',
        details: ''
      };
    },
    //index est une variable qui représente la position de l'élément actuel dans la liste lors de l'itération avec v-for, 
    //et elle est utilisée pour effectuer des opérations spécifiques sur des éléments de la liste.
   // l'index est utilisé pour savoir quelle tâche doit être supprimer,editer,saver de la liste
    DeleteTask(index) {
      // Supprime la tâche à l'index spécifié du tableau tasks
      this.tasks.splice(index, 1);
      localStorage.setItem('tasks', JSON.stringify(this.tasks)); //pour supprimer la tache definitivement 
   },

    EditTask(index) {
      this.tasks[index].editing = true; //activer ledition de la tache
      this.tasks[index].editingDetails = true;
      this.tasks[index].editedTaskDetails = this.tasks[index].details; //initialise editedTaskDetails avec les détails actuels de la tâche
    },

    SaveDetails(index) {
      this.tasks[index].editingDetails = false; //desactiver ledition pour quon puisse sauvegarder
      this.tasks[index].details = this.tasks[index].editedTaskDetails; // remplacer les details par les nouveaux details
      this.tasks[index].editedDetails = ''; // réinitialiser à une chaîne vide,
      this.tasks[index].editing = false;
      localStorage.setItem('tasks', JSON.stringify(this.tasks)) // pour sauvegarder la modification des details 
    },

    EditPriority(index) {
      this.tasks[index].editingPriority = true;  // Activer l'édition de la priorité
      this.tasks[index].editedPriority = this.tasks[index].priority; //initialise edited avec letat actuel de la tâche
   },

   SavePriority(index) {
      this.tasks[index].editingPriority = false; // Désactiver l'édition de la priorité
      this.tasks[index].priority = this.tasks[index].editedPriority; //remplacer par les modifcations
      this.tasks[index].editedPriority = ''; // réinitialiser à une chaîne vide,
      localStorage.setItem('tasks', JSON.stringify(this.tasks));  // pour sauvegarder la modification de letat quand on fait refresh
   },
  }
};
</script>

<style>
html {
  background-image: radial-gradient(ellipse at center, rgb(226, 226, 184) 0%,rgb(151, 129, 129)100%);
  width: 50%;
     height:100%;
     flex-direction: column;
     align-items:center;
     justify-content: center;
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
    margin-bottom: 5px;
    margin-top: 5px;
  }
  header{
    z-index: 1;
  }
  .sidebar{
  position:fixed;
  left: 0;
   top:0;
    bottom:0;
    width: 15%;
    height: 100%;
    background-color:white;
  }
  .sidebar p {
    padding: 10px 30px;
    flex: 100px;
    font-size:x-large;
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
  .itemswrap{ 
  display: block;
  margin :18px;
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
  padding: 15px;
  margin-top: 10px;
  width: 95%;
 height: 70%;
 margin-left: 400px;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 0px 20px 10px #e7e5cb;
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

input[type="text"],
textarea {
  width: 100%;
  padding: 10px 5px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
}
input[type="text"],
text{
  border: none;
  padding: 14px;
  border-radius: 5px;
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
margin: 0;
  display: grid;
  grid-template-columns: repeat(3,320px);
  width: 100%;
  margin-left: 300px;
  
}
.task {
  background-color: #f3f0f3;
  border-radius: 20px;
  margin: 20px;
  
}
.task span {
  font-weight: bold;
  display: block;

}
.task .Supprimer{
  color: black;
  cursor: pointer;
  float: right;
  margin-left: 180px;
}
.task .Supprimer:hover{
  background-color: rgb(226, 226, 184);
}

.task .edit {
  color: black;
  cursor: pointer;
  float: right;
  margin-right: 10px;
}
.task .edit:hover{
  background-color: rgb(226, 226, 184);
}
.task-content {
  display: flex;    /*yavait flex*/
  flex-direction: column;

}
.task-content p {
  display: block;
  font-size: 15px;
  font-weight: bold;
  margin-left: 5px;
  margin: 5px 0; /* une marge pour l'espacement entre les paragraphes */
}

.checkbox-container {
  display: block;     /*yavait flex*/
  align-items: center;
}

.checkbox-container label {
  margin-left: 5px;
}

.checkbox-container input {
  margin-right: 5px;
}
#taskcolor{
  padding: 0%;
}
.priorite{
  width: 0;
  height: 0%;
  z-index: 1; 
}
.option{
  text-align: left;
  align-items: left;
  justify-content: left;
  display: block;
  z-index: 1;
  
}
.priority:hover{
background-color: rgb(226, 226, 184);
}
</style>