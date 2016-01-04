function updateProducts() {
    var http_request = new XMLHttpRequest();
    http_request.onreadystatechange = function (){
        if(4==http_request.readyState){
                var picsArray = JSON.parse(http_request.responseText);
            for(var key in picsArray){
                var p = document.getElementById(picsArray[key].id);
                p.src = "img/"+picsArray[key].photo;
            }


            }
        }
    http_request.open("GET","/productsUpdate",true);
    http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http_request.send();
}


setInterval(updateProducts,5000);