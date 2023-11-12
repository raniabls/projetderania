// get form and task list Element
const form = document.getElementById("taskform");
const taskList = document.getElementById("tasklist");

// Add task event listner
form.addEventListener("submit", (event) => {
  event.preventDefault();

  // Get form value
  const date = document.getElementById("taskdate").value;
  const time = document.getElementById("tasktime").value;
  const details = document.getElementById("taskdetails").value;
  const categorie = document.getElementById("taskcategorie").value;
  // create task element
  const task = document.createElement("div");
  task.className = "task";

  // create task content
  const taskContent = document.createElement("span");
  taskContent.innerHTML = `Date: ${date}<br>Temps: ${time}<br>Categorie: ${categorie}<br>Details: ${details}`;

  // create Delete button
  const deleteBtn = document.createElement("span");
  deleteBtn.className = "delete";
  deleteBtn.innerHTML = "Delete";
  deleteBtn.addEventListener("click", () => {
    task.remove();
  });

  // Append task content an delete button to task element
  task.appendChild(taskContent);
  task.appendChild(deleteBtn);

  // Append task element to task list
  taskList.appendChild(task);

  // Append task element to task list
  document.getElementById("taskdate").value = "";
  document.getElementById("tasktime").value = "";
  document.getElementById("taskcategorie").value = "";
  document.getElementById("taskdetails").value = "";
  
});