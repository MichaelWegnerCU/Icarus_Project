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
 