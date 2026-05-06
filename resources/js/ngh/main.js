document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".pic").forEach(function (pic) {
        pic.addEventListener("click", function () {
            document.querySelectorAll(".pic").forEach(function (pic) {
                pic.classList.toggle("away"); // Toggle 'away' class on all elements with 'pic' class
            });
            this.classList.remove("away"); // Remove 'away' class from the clicked element
            this.classList.toggle("active"); // Toggle 'active' class on the clicked element
        });
    });

    const boxes = document.querySelectorAll(".box-wrapper");
    const cards = document.querySelectorAll(".ma-vcard");

    function activateTab(box) {
        boxes.forEach((t) => t.classList.remove("active"));
        box.classList.add("active");
    }

    function hoverTab(card) {
        cards.forEach((t) => t.classList.remove("m-hover"));
        card.classList.add("m-hover");
    }

    boxes.forEach((box) => {
        box.addEventListener("mouseover", () => {
            activateTab(box);
        });

        box.addEventListener("click", () => {
            activateTab(box);
        });
    });

    // --- Двойной клик на мобильных для карточек продуктов ---
    const isTouchDevice = () => window.matchMedia("(hover: none) and (pointer: coarse)").matches;

    document.querySelectorAll('.rectangle-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            if (!isTouchDevice()) return; // на десктопе не вмешиваемся

            const boxWrapper = this.closest('.box-wrapper');

            if (!boxWrapper.classList.contains('active')) {
                // Первый клик — показываем описание, блокируем переход
                e.preventDefault();
                // activateTab уже добавит active через всплытие,
                // но на случай если нет — добавляем явно:
                boxes.forEach((t) => t.classList.remove("active"));
                boxWrapper.classList.add('active');
            }
            // Второй клик — active уже есть, переход происходит штатно
        });
    });

// Клик вне карточек снимает active (на мобильных)
    document.addEventListener('click', function (e) {
        if (!isTouchDevice()) return;
        if (!e.target.closest('.box-wrapper')) {
            boxes.forEach((bw) => bw.classList.remove('active'));
        }
    });
// --- конец блока ---

    cards.forEach((card) => {
        card.addEventListener("mouseover", () => {
            hoverTab(card);
        });

        card.addEventListener("click", () => {
            hoverTab(card);
        });
    });
});