var linguagem = 0
function changelg(){
  const lg = document.getElementById("linguagemslct")
  const lgn = document.getElementById("lgn")
  const loginText = document.getElementById("login-text")
  const homeLink = document.getElementById("home-link")
  const backLink = document.getElementById("back-link")
  
  if(linguagem == 0){
    lg.style.backgroundImage = "url(Flag_of_the_United_States.svg.png)"
    linguagem = 1;
    lgn.innerHTML = "language"
    loginText.innerHTML = "Login"
    homeLink.innerHTML = "Home"
    backLink.innerHTML = "Back"
  } else {
    lg.style.backgroundImage = "url(Flag_of_Brazil.svg.webp)"
    linguagem = 0;
    lgn.innerHTML = "linguagem"
    loginText.innerHTML = "Login"
    homeLink.innerHTML = "Home"
    backLink.innerHTML = "Voltar"
  }
}

var darkmd = 0
function darkmode(){
  const balldm = document.getElementById("balldm")
  const darkspan = document.getElementById("darkmd")
  const body = document.body
  
  balldm.classList.toggle("balldark")
  body.classList.toggle("dark-mode")
  
  if (darkmd == 0){
    balldm.style.backgroundColor = "rgb(255, 232, 206)"
    darkspan.style.backgroundColor = "rgba(0, 0, 0, 1)"
    darkmd = 1
  } else {
    balldm.style.backgroundColor = "rgba(0, 0, 0, 1)"
    darkspan.style.backgroundColor = "rgb(255, 232, 206)"
    darkmd = 0
  }
}

const moreCars = [
  {name: "Sandero", oldPrice: "R$ 72.000", newPrice: "R$ 63.000", img: "./polo/1.webp"},
  {name: "Logan", oldPrice: "R$ 68.000", newPrice: "R$ 59.000", img: "./civic/1.webp"},
  {name: "Duster", oldPrice: "R$ 98.000", newPrice: "R$ 85.000", img: "./x4/1.webp"},
  {name: "Kwid", oldPrice: "R$ 52.000", newPrice: "R$ 45.000", img: "./fiat500/1.webp"},
  {name: "Mobi", oldPrice: "R$ 48.000", newPrice: "R$ 42.000", img: "./fiat500/1.webp"},

  {name: "Captur", oldPrice: "R$ 115.000", newPrice: "R$ 102.000", img: "./honda-hr-v/1.webp"},
  {name: "Kicks", oldPrice: "R$ 88.000", newPrice: "R$ 76.000", img: "./mercedesa180/1.webp"}
];

function loadMoreCars() {
  const grid = document.getElementById("cars-grid");
  const btn = document.getElementById("load-more-btn");
  
  moreCars.forEach(car => {
    const carCard = document.createElement("div");
    carCard.className = "car-card";
    carCard.innerHTML = `
      <img src="${car.img}" alt="${car.name}">
      <h3>${car.name}</h3>
      <div class="price-container">
        <span class="old-price">${car.oldPrice}</span>
        <span class="new-price">${car.newPrice}</span>
      </div>
    `;
    grid.appendChild(carCard);
  });
  
  btn.style.display = "none";
}

function updateCarOpacity() {
  const cards = document.querySelectorAll('.car-card');
  const windowHeight = window.innerHeight;
  const isDarkMode = document.body.classList.contains('dark-mode');
  
  cards.forEach(card => {
    const rect = card.getBoundingClientRect();
    const cardCenter = rect.top + rect.height / 2;
    const distanceFromCenter = Math.abs(cardCenter - windowHeight / 2);
    const maxDistance = windowHeight;
    const opacity = Math.max(0.7, 1 - (distanceFromCenter / maxDistance) * 0.5);
    
    card.style.opacity = opacity;
    
    const img = card.querySelector('img');
    if (isDarkMode) {
      const brightness = Math.max(0.9, 1.2 - (distanceFromCenter / maxDistance) * 0.3);
      img.style.filter = `brightness(${brightness})`;
    } else {
      img.style.filter = '';
    }
  });
}

window.addEventListener('scroll', updateCarOpacity);
window.addEventListener('load', updateCarOpacity);

let selectedInstallments = 12;
let currentCarData = {};
let popupCurrentImage = 1;
let popupMax = 31;
let popupCurrentCar = "amarok";

const popupCursor = {
    isDragging: false,
    initialPosition: 0,
};

const popupUpdateImg = (direction) => {
    if(direction > 0){
        if(popupCurrentImage == popupMax){
            popupCurrentImage = 1
        } else {
            popupCurrentImage++
        }
    } else {
       if(popupCurrentImage == 1){
            popupCurrentImage = popupMax
        } else {
            popupCurrentImage--
        }
    }
    document.querySelector('.popup-carimg').src = `./${popupCurrentCar}/${popupCurrentImage}.webp`
}

function openCarPopup(carName, carPrice, carImage) {
  const popup = document.getElementById('car-popup');
  const model = document.getElementById('popup-model');
  const price = document.getElementById('popup-price');
  const popupCarImg = document.querySelector('.popup-carimg');
  
  currentCarData = {
    name: carName,
    price: parseFloat(carPrice.replace('R$ ', '').replace('.', '').replace(',', '.'))
  };
  
  // Set car for 360 view
  const carFolderMap = {
    "amarok": "amarok", "civic": "civic", "polo": "polo", "fiat 500": "fiat500",
    "bmw x4": "x4", "x4": "x4", "mercedes a180": "mercedesa180", "mercedesa180": "mercedesa180",
    "honda hr-v": "honda-hr-v", "honda-hr-v": "honda-hr-v", "corolla": "amarok",
    "onix": "civic", "golf": "polo", "uno": "fiat500", "tucson": "x4",
    "compass": "mercedesa180", "fit": "honda-hr-v", "hilux": "amarok",
    "cruze": "civic", "jetta": "polo", "argo": "fiat500", "creta": "x4",
    "renegade": "mercedesa180", "city": "honda-hr-v", "ranger": "amarok",
    "prisma": "civic", "sandero": "polo", "duster": "x4", "logan": "honda-hr-v",
    "kwid": "mercedesa180", "captur": "amarok"
  };
  
  const carMaxImages = {
    "amarok": 31, "civic": 31, "polo": 31, "x4": 31,
    "mercedesa180": 32, "fiat500": 29, "honda-hr-v": 32
  };
  
  popupCurrentCar = carFolderMap[carName.toLowerCase()] || "amarok";
  popupCurrentImage = 1;
  popupMax = carMaxImages[popupCurrentCar] || 31;
  
  model.textContent = carName;
  price.textContent = carPrice;
  popupCarImg.src = `./${popupCurrentCar}/${popupCurrentImage}.webp`;
  
  updateInstallmentOptions();
  popup.style.display = 'flex';
  
  // Add 360 interaction
  setupPopup360();
}

function setupPopup360() {
  const container = document.querySelector('.popup-container');
  
  container.addEventListener("mousedown", (event) => {
    popupCursor.isDragging = true;
    popupCursor.initialPosition = event.clientX;
  });
  
  container.addEventListener("mouseup", () => {
    popupCursor.isDragging = false;
  });
  
  container.addEventListener("mousemove", ({clientX}) => {
    if(!popupCursor.isDragging) return;
    
    const offset = popupCursor.initialPosition - clientX
    
    if(Math.abs(offset) >= 20 ){
      popupUpdateImg(offset)
      popupCursor.initialPosition = clientX;
    };
  });
}

function closeCarPopup() {
  document.getElementById('car-popup').style.display = 'none';
}

function updateInstallmentOptions() {
  const price = currentCarData.price;
  document.getElementById('installment-12').textContent = `R$ ${(price * 1.1 / 12).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
  document.getElementById('installment-24').textContent = `R$ ${(price * 1.2 / 24).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
  document.getElementById('installment-36').textContent = `R$ ${(price * 1.3 / 36).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
  document.getElementById('installment-48').textContent = `R$ ${(price * 1.4 / 48).toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
}

function selectInstallment(months) {
  selectedInstallments = months;
  document.querySelectorAll('.installment-option').forEach(opt => opt.style.backgroundColor = '');
  event.target.closest('.installment-option').style.backgroundColor = '#e8f5e8';
}

function purchaseCar() {
  alert(`Compra realizada: ${currentCarData.name} em ${selectedInstallments}x`);
  closeCarPopup();
}

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.car-card').forEach(card => {
    card.addEventListener('click', function() {
      const carName = this.querySelector('h3').textContent;
      const carPrice = this.querySelector('.new-price').textContent;
      const carImage = this.querySelector('img').src;
      openCarPopup(carName, carPrice, carImage);
    });
  });
});

window.onclick = function(event) {
  const popup = document.getElementById('car-popup');
  if (event.target === popup) {
    closeCarPopup();
  }
}