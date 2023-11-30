// get form and task list Element
const form = document.getElementById("taskform"); // methode qui permet de renvoyer un objet form represantant lelement de lid taskform
const taskList = document.getElementById("tasklist");

// Add task event listner
form.addEventListener("submit", (event) => {   //attache une fonction à appeler chaque fois que l'évènement spécifié est envoyé à la cible.
  event.preventDefault(); //ajoute la liste des événements de tâche

  // Get form value
  const date = document.getElementById("taskdate").value;
  const time = document.getElementById("tasktime").value;
  const details = document.getElementById("taskdetails").value;
  const categorie = document.getElementById("taskcategorie").value; //permet de tirer la valeurs et les mettres dans les constantes
  
  // create task element
  const task = document.createElement("div");
  task.className = "task"; //cree un element de type task cest le petit carre qui saffiches quand on click ajouter

  // create task content
  const taskContent = document.createElement("span"); //ajoute le contenu de la task qui est la date temps .. ect
  taskContent.className="task-content";

  const dateText = document.createElement("p");
dateText.innerText = `Date: ${date}`;
taskContent.appendChild(dateText);

  const timeText = document.createElement("p");
timeText.innerText = `Temps: ${time}`;
taskContent.appendChild(timeText);

const categoryText = document.createElement("p");
categoryText.innerText = `Catégorie: ${categorie}`;
taskContent.appendChild(categoryText);

 const detailsLines = details.split('\n');

 //creation des checkbox pour chaque ligne
 detailsLines.forEach(line => {
  const detailsCheckbox = createCheckbox(line.trim());
  taskContent.appendChild(detailsCheckbox);
 });
  // create Delete button
  const deleteBtn = document.createElement("span");
  deleteBtn.className = "Supprimer";
  deleteBtn.innerHTML = "Supprimer";
  deleteBtn.addEventListener("click", () => {
    task.remove();
  });

  //creation un bouton de modficitaion
   const editBtn = document.createElement("span");
  editBtn.className = "edit";
  editBtn.innerHTML = "Modifier";
  editBtn.addEventListener("click", () => {
    const newDetails = prompt("Modifier la tâche :", details);
    if (newDetails !== null) {
      taskContent.innerHTML = ''; // Effacer le contenu existant
      // Ajoute à nouveau le texte pour le temps, la catégorie et la date
      taskContent.appendChild(dateText);
      taskContent.appendChild(timeText);
      taskContent.appendChild(categoryText);
      // Recréer les checkboxes pour chaque ligne de texte modifié
      newDetails.split('\n').forEach(line => {
        const detailsCheckbox = createCheckbox(line.trim());
        taskContent.appendChild(detailsCheckbox);
      });
    }
  });

  task.appendChild(taskContent);
  task.appendChild(deleteBtn);   // permet dajouter a chque carre de tache un boutton delete
  task.appendChild(editBtn);
  

  // Append task element to task list
  taskList.appendChild(task); 

  function createCheckbox(value) {
    const checkboxContainer = document.createElement("div");
    checkboxContainer.className = "checkbox-container";
  
    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.checked = false; 
  
    const label = document.createElement("label");
    label.innerText = value;
  
    checkboxContainer.appendChild(checkbox);
    checkboxContainer.appendChild(label);
  
    return checkboxContainer;
  }
});
