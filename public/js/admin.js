function editUser(id) {

    var userTable = document.getElementById('userTable');
    var userRow = userTable.rows.namedItem(id);

    var name = userRow.cells.namedItem('name');
    var password = userRow.cells.namedItem('password');

    document.getElementById("eId").value = id;
    document.getElementById("eName").value = name.innerHTML;
    document.getElementById("ePassword").value = password.innerHTML;

    //alert(name.innerHTML);
    e_div_show();

}


function deleteUser(id) {
    var http_request = new XMLHttpRequest();
    http_request.open("POST","/deleteUser",true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send("id=" + id);
    location.reload();
}


//Function To Display Popup
function div_show() {
    document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
    document.getElementById('abc').style.display = "none";
}

//Function To Display Popup
function e_div_show() {
    document.getElementById('eabc').style.display = "block";
}
//Function to Hide Popup
function e_div_hide(){
    document.getElementById('eabc').style.display = "none";
}