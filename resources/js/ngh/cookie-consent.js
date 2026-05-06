document.addEventListener('DOMContentLoaded', function() {
    const cookieConsent = document.querySelector('.cookie-consent');
    const acceptButton = document.querySelector('.cookie-consent__button');

    // Проверка уже установленных cookie
    if (!getCookie('cookieConsent')) {
        cookieConsent.classList.add('active');
    }

    // Прослушиваем кнопку принять cookie
    acceptButton.addEventListener('click', function() {
        // устанавливаем cookie на 30 дней
        setCookie('cookieConsent', 'accepted', 30);
        cookieConsent.classList.remove('active');
    });

    // Установка cookie
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Получение cookie
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for(let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Открытие модального окна политики cookie
    const policyLink = document.querySelector('.cookie-consent__link');
    const policyModal = document.getElementById('cookiePolicyModal');
    const closePolicyModal = document.getElementById('closeCookiePolicyModal');

    if (policyLink && policyModal && closePolicyModal) {
        policyLink.addEventListener('click', function(e) {
            e.preventDefault();
            policyModal.style.display = 'flex';
        });
        closePolicyModal.addEventListener('click', function() {
            policyModal.style.display = 'none';
        });
        // Закрытие по клику вне окна
        policyModal.addEventListener('click', function(e) {
            if (e.target === policyModal) {
                policyModal.style.display = 'none';
            }
        });
    }
});
