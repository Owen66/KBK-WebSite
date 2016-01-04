
function editUser(id) {

    var userTable = document.getElementById('adminTable');
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

    var categoryTable = document.getElementById('adminTable');
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

    http_request.onreadystatechange = function (){
        if(4==http_request.readyState){
            if(http_request.responseText > 0){
                alert("This Category can't be deleted as there are items attached to it!");
            }
            else{
                http_request.onreadystatechange = function () {
                    if (4 == http_request.readyState) {
                        location.reload();
                    }
                }
                http_request.open("POST","/deleteCategory",true);
                http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                http_request.send("id=" + id);
            }
        }
    }

    http_request.open("POST","/hasItems",true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send("id=" + id);

}

function editItem(id) {

    var itemTable = document.getElementById('adminTable');
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
    document.getElementById("eDescription").value = description.innerHTML.trim();
    document.getElementById("ePrice").value = price.innerHTML;
    document.getElementById("eCalories").value = calories.innerHTML;
    document.getElementById("eAllergyInformation").value = allergyInformation.innerHTML.trim();
    document.getElementById("eCategory").value = category.innerHTML;
    //document.getElementById("ePhoto").value = photo.;
    alert("deadbeef");
    e_div_show();

}


function deleteItem(id) {
    var valid = confirm("Are you sure you want to delete this item?");
    if(valid == true) {
        var http_request = new XMLHttpRequest();
        http_request.open("POST","/deleteItem",true);
        http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http_request.send("id=" + id);
    }

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

$(document).ready(function()
    {
        $("#adminTable").tablesorter();

        // Write on keyup event of keyword input element
        $("#search").keyup(function(){
            _this = this;
            // Show only matching TR, hide rest of them
            $.each($("#adminTable tbody").find("tr"), function() {
                console.log($(this).text());
                if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) == -1)
                    $(this).hide();
                else
                    $(this).show();
            });
        });
    }
);
