function RemoveUser(a) {
if (confirm("¿Estas seguro?") == true) {
	url ='RemoveUser.php?dirCorreo='+a
	window.location = url; 	 
	

} else {
  window.location.replace("HandlingAccounts.php");
}
}