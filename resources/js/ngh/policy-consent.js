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

    const cookiePolicyLinks = document.querySelectorAll('.cookie-consent__link');
    const cookiePolicyModal = document.getElementById('cookiePolicyModal');
    const closeCookiePolicyModal = document.getElementById('closeCookiePolicyModal');

    const confidencePolicyModal = document.getElementById('confidencePolicyModal');
    const closeConfidencePolicyModal = document.getElementById('closeConfidencePolicyModal');

    const agreePolicyModal = document.getElementById('agreePolicyModal');
    const closeAgreePolicyModal = document.getElementById('closeAgreePolicyModal');

    // Делегирование событий для динамически добавляемых или дублирующихся ID элементов
    document.addEventListener('click', function(e) {
        const target = e.target.closest('#confidence-policy-link, #agree-policy-link');
        if (!target) return;

        if (target.id === 'confidence-policy-link' && confidencePolicyModal) {
            e.preventDefault();
            confidencePolicyModal.style.display = 'flex';
        } else if (target.id === 'agree-policy-link' && agreePolicyModal) {
            e.preventDefault();
            agreePolicyModal.style.display = 'flex';
        }
    });

    if (cookiePolicyLinks.length > 0 && cookiePolicyModal && closeCookiePolicyModal) {
        cookiePolicyLinks.forEach(link => {
            policyModalHandle(link, cookiePolicyModal, closeCookiePolicyModal);
        });
    }

    if (confidencePolicyModal && closeConfidencePolicyModal) {
        setupModalClose(confidencePolicyModal, closeConfidencePolicyModal);
    }

    if (agreePolicyModal && closeAgreePolicyModal) {
        setupModalClose(agreePolicyModal, closeAgreePolicyModal);
    }

    function setupModalClose(modal, closeModal) {
        closeModal.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        // Закрытие по клику вне окна
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    }

    function policyModalHandle(link, modal, closeModal) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'flex';
        });
        setupModalClose(modal, closeModal);
    }
});
