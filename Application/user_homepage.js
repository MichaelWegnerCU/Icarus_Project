// JavaScript Document
function newItem() {
	var item = document.getElementById('todo_input').value;
	var ul = document.getElementById("list");
	var li = document.createElement('li');
	li.id ='todo_li';
	
  li.appendChild(document.createTextNode("- "+item));
  ul.appendChild(li);
  document.getElementById('todo_input').value="";
  li.onclick = removeItem;
}

document.body.onkeyup = function(e){
      if(e.keyCode == 13){
        newItem();
      }
  }

function removeItem(e) {
  e.target.parentElement.removeChild(e.target);
}

function openTab(evt, tabname) {
    var i, homecontent, tablinks;
    homecontent = document.getElementsByClassName("homecontent");
    for (i = 0; i < homecontent.length; i++) {
        homecontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabname).style.display = "block";
    evt.currentTarget.className += " active";
	
	var taskInput = document.getElementById("new-task");

var addButton = document.getElementsById("AddTask");
var incompleteTasksHolder = document.getElementById("incomplete-tasks");
var completedTasksHolder = document.getElementById("completed-tasks");

}

 