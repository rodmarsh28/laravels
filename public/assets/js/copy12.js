function myFunction68() {
  var copyText = document.getElementById("ccn_approved");
  copyText.select();
 copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("CCN Copied");
}


function myFunction67(element_id){
    playClick();
  var aux = document.createElement("ccn_approved");
  aux.setAttribute("contentEditable", true);
  aux.innerHTML = document.getElementById(element_id).innerHTML;
  aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 
  document.body.appendChild(aux);
  aux.focus();
  document.execCommand("copy");
  document.body.removeChild(aux);
}