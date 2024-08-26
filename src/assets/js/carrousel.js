const carousel = document.querySelector('.carousel-inner');
const items = document.querySelectorAll('.carousel-item');
const prevButton = document.querySelector('.carousel-control-prev');
const nextButton = document.querySelector('.carousel-control-next');

let index = 0;

function showItem(index) {
  const itemsToShow = getItemsToShow(); // Função para determinar o número de itens por vez
  carousel.style.transform = `translateX(-${index * (100 / itemsToShow)}%)`;
}

function getItemsToShow() {
  if (window.innerWidth > 1024) {
    return 4; // 4 itens para telas grandes
  } else if (window.innerWidth >= 768) {
    return 2; // 2 itens para tablets
  } else {
    return 1; // 1 item para dispositivos móveis
  }
}

prevButton.addEventListener('click', () => {
  const itemsToShow = getItemsToShow();
  index = (index > 0) ? index - 1 : Math.ceil(items.length / itemsToShow) - 1;
  showItem(index);
});

nextButton.addEventListener('click', () => {
  const itemsToShow = getItemsToShow();
  index = (index < Math.ceil(items.length / itemsToShow) - 1) ? index + 1 : 0;
  showItem(index);
});

window.addEventListener('resize', () => {
  showItem(index); // Recalcula o layout ao redimensionar a tela
});
