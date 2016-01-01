function editUser(id) {

    var userTable = document.getElementById('userTable');
    var userRow = userTable.rows.namedItem(id);

    var username = userRow.cells.namedItem('username');
    var password = userRow.cells.namedItem('password');

    document.getElementById("eId").value = id;
    document.getElementById("eUsername").value = username.innerHTML.trim();
    document.getElementById("ePassword").value = password.innerHTML.trim();

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

function editCategory(id) {

    var categoryTable = document.getElementById('categoryTable');
    var categoryRow = categoryTable.rows.namedItem(id);

    var title = categoryRow.cells.namedItem('title');
    var summary = categoryRow.cells.namedItem('summary');

    document.getElementById("eId").value = id;
    document.getElementById("eTitle").value = title.innerHTML.trim();
    document.getElementById("eSummary").value = summary.innerHTML.trim();

    e_div_show();

}


function deleteCategory(id) {
    var http_request = new XMLHttpRequest();
    http_request.open("POST","/deleteCategory",true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send("id=" + id);
    location.reload();
}

function editItem(id) {

    var itemTable = document.getElementById('itemTable');
    var itemRow = itemTable.rows.namedItem(id);

    var name = itemRow.cells.namedItem('name');
    var description = itemRow.cells.namedItem('description');
    var price = itemRow.cells.namedItem('price');
    var calories = itemRow.cells.namedItem('calories');
    var allergyInformation = itemRow.cells.namedItem('allergyInformation');
    var category = itemRow.cells.namedItem('category');
    var photo = itemRow.cells.namedItem('photo');

    document.getElementById("eId").value = id;
    document.getElementById("eName").value = name.innerHTML.trim();
    document.getElementById("description").value = description.innerHTML.trim();
    document.getElementById("price").value = price.innerHTML.trim();
    document.getElementById("calories").value = calories.innerHTML.trim();
    document.getElementById("allergyInformation").value = allergyInformation.innerHTML.trim();
    document.getElementById("category").value = category.innerHTML.trim();
    document.getElementById("photo").value = photo.innerHTML.trim();


    e_div_show();

}


function deleteItem(id) {
    var http_request = new XMLHttpRequest();
    http_request.open("POST","/deleteItem",true);
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