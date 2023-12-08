<template>
  <div id="app">
    
    <nav class="sidebar">
      <p>Planify it</p>
      <div class="sidebars">
        <a href="App.vue"> Home</a>
        
      </div>
      <div class="sidebars">
        
        <a href="calendar.vue"> Calendrier</a>
      </div>
      <div class="sidebars">
       
        <router-link to="/HelloWorld.vue">Services</router-link>
        
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
          <select name="Categorie" id="taskcategorie" v-model="taskForm.category"> 
            <option value="Etude">Etude</option>
            <option value="Travail">Travail</option>
            <option value="Sport">Sport</option>
            <option value="Loisir">Loisir</option>
          </select>
        </div>
        
        <div class="itemswrap">
          <label for="taskcolor">Couleur:</label>
          <input type="color" id="taskcolor" name="taskcolor" value="#ff0000" v-model="taskForm.color">
        </div>
        
        <div class="itemswrap" id="app">
          <label for="taskdetails">Détails:</label>
          <textarea id="taskdetails" v-model="taskForm.details" placeholder="Ecrivez les détails de votre tâche"></textarea>
        </div>
        
        <button type="submit">Ajouter tache</button>
      </form>


      <div id="tasklist">
        <div v-for="(task, index) in tasks" :key="index" class="task" :style="{ backgroundColor: task.color }">
          <div class="task-content">
            <p v-if="!task.editing">Titre: {{ task.titre }}</p>

            <p v-if="!task.editing">Date: {{ task.date }}</p>
            <p v-if="!task.editing">Temps: {{ task.time }}</p>
            <p v-if="!task.editing">Catégorie: {{ task.category }}</p>

            <p v-if="task.details && !task.editingDetails"> Détails:</p>

            <!--<div v-if="task.details && !task.editing && !task.editingDetails"> -->
               <div v-if="task.details && !task.editingDetails"> 
              <div class="checkbox-container" v-for="(line, lineIndex) in task.details.split('\n')" :key="lineIndex">
                <input type="checkbox" />
                <label>{{ line }}</label>
                <span class="edit" @click="EditTask(index)">Modifier</span>
              </div>
              

            </div>

            <div v-else-if="!task.editingDetails">
              <div class="checkbox-container" v-for="(line, lineIndex) in task.editedDetails.split('\n')" :key="lineIndex">
                
                  <input type="checkbox" />
                 <label>{{ line }}</label>
               </div>
            </div>

            <div v-if="task.editingDetails">
            <textarea v-model="task.editedTaskDetails" placeholder="Modifier les détails" v-if="task.editingDetails"></textarea>
            <span class="edit" @click="SaveDetails(index)">Enregistrer</span>
            </div>
           
            <span class="Supprimer" @click="DeleteTask(index)">Supprimer</span>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      taskForm: {
        titre: '',
        date: '',
        time: '',
        category: '',
        color: '#ff0000',
        details: '',
      },
    };
  },
  
  mounted() { //  permet Récupérer les tâches depuis le stockage local
  this.tasks = JSON.parse(localStorage.getItem('tasks')) || [];
  },

  methods: {
    addTask() {
      // Ajouter la nouvelle tâche à la liste des tâches
      const newTask = {
  
        titre: this.taskForm.titre,
        date: this.taskForm.date,
        time: this.taskForm.time,
        category: this.taskForm.category,
        color: this.taskForm.color,
        details: this.taskForm.details,
        editing: false,
        editingDetails: false,
        editedDetails: ''
      };

      this.tasks.push(newTask);

      localStorage.setItem('tasks', JSON.stringify(this.tasks))
      // Réinitialiser le formulaire
      this.taskForm = {
        titre: '',
        date: '',
        time: '',
        category: '',
        color: '#ff0000',
        details: ''
      };
    },
   
    DeleteTask(index) {
      // Supprime la tâche à l'index spécifié du tableau tasks
      this.tasks.splice(index, 1);
      localStorage.setItem('tasks', JSON.stringify(this.tasks));
    },
    EditTask(index) {
      this.tasks[index].editing = true;
      this.tasks[index].editingDetails =!this.tasks[index].editingDetails;
      this.tasks[index].editingDetails = true;
      this.tasks[index].editedTaskDetails = this.tasks[index].details;
    },
    SaveDetails(index) {
      this.tasks[index].editingDetails = false;
      // Mettre à jour les détails avec les modifications
      this.tasks[index].details = this.tasks[index].editedTaskDetails;
      this.tasks[index].editedDetails = '';
      this.tasks[index].editing = false;
      localStorage.setItem('tasks', JSON.stringify(this.tasks))
    },
},
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
    padding: 10px 57px;
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
  margin :25px;
  
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
  display: flex;    /*yavait flex*/
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
  margin-bottom: 5px;
  /* Ajoutez une marge en bas pour l'espacement entre les checkboxes */
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
</style>

