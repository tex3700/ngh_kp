
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

const pagination = document.getElementById('pagination');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');

function showSlide(index) {
    if (index < 0) {
        currentSlide = totalSlides - 1;
    } else if (index >= totalSlides) {
        currentSlide = 0;
    } else {
        currentSlide = index;
    }

    const newTransformValue = -currentSlide * 100 + '%';
    document.getElementById('slider').style.transform = 'translateX(' + newTransformValue + ')';

    // Обновляем активный элемент пагинации
    updatePagination();
}

function prevSlide() {
    showSlide(currentSlide - 1);
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function goToSlide(index) {
    showSlide(index);
}

function updatePagination() {
    // Обновляем активный элемент пагинации
    const paginationItems = document.querySelectorAll('.pagination-item');
    paginationItems.forEach(item => item.classList.remove('active'));
    paginationItems[currentSlide].classList.add('active');
}

// Добавляем обработчики событий для кнопок
prevButton.addEventListener('click', prevSlide);
nextButton.addEventListener('click', nextSlide);

// Создаем элементы пагинации
// for (let i = 0; i < totalSlides; i++) {
//     const paginationItem = document.createElement('div');
//     paginationItem.classList.add('pagination-item');
//     paginationItem.textContent = i + 1;
//     paginationItem.addEventListener('click', () => goToSlide(i));
//     pagination.appendChild(paginationItem);
// }

// Показываем первый слайд и устанавливаем активный элемент пагинации
showSlide(0);

