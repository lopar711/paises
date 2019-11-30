

let paises = {};

function cargarPaisesPostJson(){
var url = 'http://localhost/paises/paises.php';
var data = {code:"MEX"};

fetch(url, {
    method: 'post',
    mode: "same-origin",
    credentials: "same-origin",
    headers: {
      'Accept': 'application/json, text/plain, */*',
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }).then(res=>res.json())
    .then(res => console.log(res));
}


function cargarPaises(){
var misCabeceras = new Headers();
var miInit = { method: 'GET',
               headers: misCabeceras,
               mode: 'cors',
               cache: 'default' };

fetch('http://127.0.0.1/paises/paises.php',miInit)
.then(function(response) {
  return response;
});

}

cargarPaisesPostJson();