

var carroatual = 0;

function backcar(){
    carroatual ++;
    if(carroatual>3){
        carroatual=0
    }
    passbar()
    setcar()
    document.getElementById("car").innerHTML = carroatual;
}
function passcar(){
    carroatual--;
    if(carroatual<0){
        carroatual=3
    }
    
    backbar()
    setcar()
    document.getElementById("car").innerHTML = carroatual;
}

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}


var id = null;
function backbar() {
    
var e1 = document.getElementById("img1");
  var e2 = document.getElementById("img2");
  
  var e3 = document.getElementById("img3");
  
  var pos = -700;
  var scl1 = 0.5;
  var scl2 = 1.55;
  clearInterval(id);
  id = setInterval(frame, 2);
  function frame() {
    if (pos == 0){
    clearInterval(id);
    } else {
      pos=pos+4;
      scl1 += 0.0032;
      scl2 -= 0.0032;
    e1.style.left = pos + 'px';
    e2.style.left = pos + 'px';
    e2.style.scale = scl1;
    e3.style.left = pos + 'px';
    e3.style.scale = scl2;
    }

  }
}
  
  
function passbar() {
    
  var e1 = document.getElementById("img1");
  var e2 = document.getElementById("img2");
  
  var e3 = document.getElementById("img3");
  
  var pos = 700;
  var scl1 = 1.55;
  var scl2 = 0.5;
  clearInterval(id);
  id = setInterval(frame, 2);
  function frame() {
    if (pos == 0){
    clearInterval(id);
    } else {
      pos=pos-4;
      scl1 -= 0.0032;
      scl2 += 0.0032;
    e1.style.left = pos + 'px';
    e2.style.left = pos + 'px';
    e1.style.scale = scl1;
    e3.style.left = pos + 'px';
    e2.style.scale = scl2;
    }
  
 
}}



function setcar(){
    var car1;
    var car2;
    var car3;
    if(carroatual == 0){
        car1 = "url(carro1.png)"
        car2 = "url(carro2.png)"
        car3 = "url(carro3.png)"
    }
     if(carroatual == 1){
        car1 = "url(carro2.png)"
        car2 = "url(carro3.png)"
        car3 = "url(carro4.webp)"
    }
     if(carroatual == 2){
        car1 = "url(carro3.png)"
        car2 = "url(carro4.webp)"
        car3 = "url(carro1.png)"
    }
    if(carroatual == 3){
        car1 = "url(carro4.webp)"
        car2 = "url(carro1.png)"
        car3 = "url(carro2.png)"
    }

    
    document.getElementById("img1").style.backgroundImage = car1;
    document.getElementById("img2").style.backgroundImage = car2;
    document.getElementById("img3").style.backgroundImage = car3;

    
    document.getElementById("barpass").style.backgroundImage = car1
    document.getElementById("barback").style.backgroundImage = car3
}


function pesquisar(){
  var nameshow = document.getElementById("name")
  var carroimg = document.getElementById("carroshow")
  var carrostring =  document.getElementById("carpesquisa").value
  var carropesquisado = carrostring.toLowerCase()
  if (carropesquisado == "lamborgini"){
    carroimg.style.backgroundImage = "url(carro1.png)"
    nameshow.innerHTML = carropesquisado
  }
}

