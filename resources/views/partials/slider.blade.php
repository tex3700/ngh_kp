<div id="slider-container">
    <div id="slider">
        <div class="slide">
            <span class="slide-img">
                <img src="/img/KSP-201-2.png" alt="Контейнеры скважинные погружные">
            </span>
            <span class="slide-description">
                <a href="{{ route('product.show', 'ksp-201') }}">
                    <h3 class="sl-heading">Контейнеры скважинные погружные КСП 201</h3>
                </a>
                <p class="sl-description">
                    Контейнер устанавливается под глубинно-насосным оборудованием во время его монтажа на скважине.
                    Ингибитор находящийся в твердой форме растворяется в контейнере при контакте со скважинной водой или нефтью и выносится на поверхность,
                    защищая стенки погружного оборудования от солеотложений, коррозии, АСПО и т.д.
                </p>
            </span>
        </div>
        <div class="slide">
            <span class="slide-img">
                <img src="/img/UDR-210-2.png" alt="Установка дозирования реагента">
            </span>
            <span class="slide-description">
                <h3 class="sl-heading">Установка дозирования реагента УДР 210</h3>
                <p class="sl-description">
                    Установки дозирования реагента «УДР 210» предназначены для объемного напорного дозирования
                    жидких химических реагентов и ввода их в трубопровод системы подготовки и транспорта нефти,
                    дизельного топлива, газового конденсата, других жидких углеводородов и т.д.
                </p>
            </span>
        </div>
    </div>

    <div class="pagination" id="pagination">
        <div class="pagination-item" onclick="goToSlide(0)">
            <section class="pgn-content">
                <p class="pgn-number">01</p>
                <span class="pgn-plus"><img src="/img/pgn-plus.svg"></span>
                <p class="pgn-description">Контейнеры скважинные погружные КСП 201</p>
            </section>
        </div>
        <div class="pagination-item" onclick="goToSlide(1)">
            <section class="pgn-content">
                <p class="pgn-number">02</p>
                <span class="pgn-plus"><img src="/img/pgn-plus.svg"></span>
                <p class="pgn-description">Установка дозирования реагента УДР 210</p>
            </section>
        </div>
        <div id="prev"><img src="/img/prev.svg"></div>
        <div id="next"><img src="/img/next.svg"></div>
    </div>
    <a name="documents"></a>
</div>

<script>
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
</script>
