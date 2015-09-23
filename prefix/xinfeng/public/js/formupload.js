
$('#file_1').change(function(){

       var form = document.getElementById("form_uploadimg");
       var xhr = new XMLHttpRequest();
       xhr.open("POST", "form");
       xhr.send(new FormData(form));     
});  