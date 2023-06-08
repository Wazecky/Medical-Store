function searchMedicine(text, tag) {
  if(tag == "medicine_name") {
    document.getElementById("by_medicine_name").value = "";
    
  }
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
 
  xhttp.open("GET", "medd.php?action=search&text=" + text + "&tag=" + tag, true);
  xhttp.send();
}