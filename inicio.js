
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

function changecar(carro){
  var carroimg = document.getElementById("carroshow")
  carroimg.style.backgroundImage =  carro
}

function pesquisa(){
  var nameshow = document.getElementById("name")
  var carrostring =  document.getElementById("carpesquisa").value
  var carropesquisado = carrostring.toLowerCase()

  nameshow.innerHTML = carropesquisado
  if (carropesquisado == "lamborgini"){
    changecar("url(carro1.png)")
  }
}
function found(){
  var lupa = document.getElementById("lupa")
  var carrostring =  document.getElementById("carpesquisa").value
  var carropesquisado = carrostring.toLowerCase()
  if (carropesquisado == "lamborgini"){
    lupa.classList.toggle("giralupa")
  }
}
var linguagem = 0
function changelg(){
  const lg = document.getElementById("linguagemslct")
  const lgn = document.getElementById("lgn")
  const l1 = document.querySelector(".lnk1")
  const l2 = document.querySelector(".lnk2")
  const l3 = document.querySelector(".lnk3")
  const l4 = document.getElementById("lnk4")
  const footerText = document.getElementById("footer-text")
  const searchPlaceholder = document.getElementById("carpesquisa")
  
  if(linguagem == 0){
    lg.style.backgroundImage = "url(Flag_of_the_United_States.svg.png)"
    linguagem = 1;
    lgn.innerHTML = "language"
    l1.innerHTML = "stock"
    l2.innerHTML = "catalog"
    l3.innerHTML = "reservation"
    l4.innerHTML = "financing"
    footerText.innerHTML = "A website that makes it happen"
    searchPlaceholder.placeholder = "search for a car by name"
    document.getElementById("li-nome1").innerHTML = "Name"
    document.getElementById("li-marca1").innerHTML = "Brand"
    document.getElementById("li-cor1").innerHTML = "Color"
    document.getElementById("li-preco1").innerHTML = "Price"
    document.getElementById("li-fabricante1").innerHTML = "Manufacturer"
    document.getElementById("li-tipo1").innerHTML = "Type"
    document.getElementById("li-combustivel1").innerHTML = "Fuel"
    document.getElementById("li-nome2").innerHTML = "Name"
    document.getElementById("li-marca2").innerHTML = "Brand"
    document.getElementById("li-cor2").innerHTML = "Color"
    document.getElementById("li-preco2").innerHTML = "Price"
    document.getElementById("li-fabricante2").innerHTML = "Manufacturer"
    document.getElementById("li-tipo2").innerHTML = "Type"
    document.getElementById("li-combustivel2").innerHTML = "Fuel"
    document.getElementById("sch-todos").innerHTML = "all"
    document.getElementById("sch-novos").innerHTML = "new"
    document.getElementById("sch-usados").innerHTML = "used"
  } else {
    lg.style.backgroundImage = "url(Flag_of_Brazil.svg.webp)"
    linguagem = 0;
    lgn.innerHTML = "linguagem"
    l1.innerHTML = "estoque"
    l2.innerHTML = "catálogo"
    l3.innerHTML = "reserva"
    l4.innerHTML = "financiamento"
    footerText.innerHTML = "Um site que faz acontecer"
    searchPlaceholder.placeholder = "pesquise um carro pelo nome"
    document.getElementById("li-nome1").innerHTML = "Nome"
    document.getElementById("li-marca1").innerHTML = "Marca"
    document.getElementById("li-cor1").innerHTML = "Cor"
    document.getElementById("li-preco1").innerHTML = "Preço"
    document.getElementById("li-fabricante1").innerHTML = "Fabricante"
    document.getElementById("li-tipo1").innerHTML = "Tipo"
    document.getElementById("li-combustivel1").innerHTML = "Combustivel"
    document.getElementById("li-nome2").innerHTML = "Nome"
    document.getElementById("li-marca2").innerHTML = "Marca"
    document.getElementById("li-cor2").innerHTML = "Cor"
    document.getElementById("li-preco2").innerHTML = "Preço"
    document.getElementById("li-fabricante2").innerHTML = "Fabricante"
    document.getElementById("li-tipo2").innerHTML = "Tipo"
    document.getElementById("li-combustivel2").innerHTML = "Combustivel"
    document.getElementById("sch-todos").innerHTML = "todos"
    document.getElementById("sch-novos").innerHTML = "novos"
    document.getElementById("sch-usados").innerHTML = "usados"
  }
}


var darkmd = 0
function darkmode(){
  const logo = document.getElementById("logo")
  const balldm = document.getElementById("balldm")
  const darkspan = document.getElementById("darkmd")
  const body = document.body
  
  balldm.classList.toggle("balldark")
  body.classList.toggle("dark-mode")
  
  if (darkmd == 0){
    logo.src = "1000035516-removebg-preview.png"
    balldm.style.backgroundColor = "rgb(255, 232, 206)"
    darkspan.style.backgroundColor = "rgba(0, 0, 0, 1)"
    darkmd = 1
  } else {
    logo.src = "1000018033.png"
    balldm.style.backgroundColor = "rgba(0, 0, 0, 1)"
    darkspan.style.backgroundColor = "rgb(255, 232, 206)"
    darkmd = 0
  }
}


