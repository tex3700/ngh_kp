document.addEventListener("DOMContentLoaded", function () {
    const contactsButton = document.querySelector('.contacts-button');
    const modal = document.querySelector('.modal');
    const modalOverlay = document.querySelector('.modal-overlay');
    const cancelButton = document.querySelector('.cancel-button');
    const contactForm = document.getElementById('contactForm');
    const responseMessage = document.getElementById('responseMessage');
    const formInputPhone = document.getElementById('phone');
    const spanPhoneError = document.getElementById('phone-error');
    const formTextarea = document.getElementById('text');
    const checkboxAgree = document.querySelector('.checkbox-input-agree');
    const checkboxAgreeError = document.getElementById('checkbox-error');
    const checkboxAgreeContainer = document.querySelector('.agree-checkbox');

    contactsButton.addEventListener('click', () => {
        modal.classList.add('show');
        modalOverlay.classList.add('show');
    });

    cancelButton.addEventListener('click', () => {
        modal.classList.remove('show');
        modalOverlay.classList.remove('show');
    });

    modalOverlay.addEventListener('click', () => {
        modal.classList.remove('show');
        modalOverlay.classList.remove('show');
    });

    formInputPhone.addEventListener('input', function(e) {
        let phoneInput = e.target;
        const errorSpan = document.getElementById('phone-error');
        let phoneValue = phoneInput.value.trim();

        // Удаляем все символы кроме цифр и +
        let cleaned = phoneValue.replace(/[^\d+]/g, '');

        // Проверяем, чтобы + был только в начале
        if (cleaned.includes('+')) {
            // Если + не в начале, удаляем его
            if (cleaned.indexOf('+') > 0) {
                cleaned = cleaned.replace('+', '');
            }
            // Оставляем только один + в начале
            cleaned = '+' + cleaned.replace(/\+/g, '');
        }

        // Обновляем значение
        if (phoneValue !== cleaned) {
            phoneInput.value = cleaned;
        }

        // Очищаем предыдущие классы
        phoneInput.classList.remove('valid', 'invalid');
        errorSpan.style.display = 'none';

        // Если поле пустое, не показываем ошибку
        if (phoneValue === '') {
            return;
        }

        // Простая валидация телефона
        const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,15}$/;

        if (!phoneRegex.test(phoneValue)) {
            phoneInput.classList.add('invalid');
            errorSpan.textContent = 'Введите корректный номер телефона';
            errorSpan.style.display = 'block';
        } else {
            phoneInput.classList.add('valid');
        }
    });

    // Дополнительная защита на случай вставки
    formInputPhone.addEventListener('paste', function(e) {
        e.preventDefault();
        let pastedText = (e.clipboardData || window.clipboardData).getData('text');

        // Очищаем вставленный текст
        let cleaned = pastedText.replace(/[^\d+]/g, '');

        // Проверяем + только в начале
        if (cleaned.includes('+') && cleaned.indexOf('+') > 0) {
            cleaned = cleaned.replace('+', '');
        }
        cleaned = cleaned.replace(/\+/g, '');
        if (cleaned.length > 0) {
            cleaned = '+' + cleaned;
        }

        // Вставляем очищенный текст
        document.execCommand('insertText', false, cleaned);
    });

// Валидация при потере фокуса
    formInputPhone.addEventListener('blur', function(e) {
        const phoneInput = e.target;
        if (phoneInput.value.trim() === '' && phoneInput.hasAttribute('required')) {
            phoneInput.classList.add('invalid');
            spanPhoneError.textContent = 'Поле обязательно для заполнения';
            spanPhoneError.style.display = 'block';
        }
    });

    // Функция валидации чекбокса
    function validateCheckbox() {
        // Сбрасываем состояние ошибки
        checkboxAgreeContainer.classList.remove('invalid');
        checkboxAgreeError.style.display = 'none';

        // Проверяем, отмечен ли чекбокс
        if (!checkboxAgree.checked) {
            checkboxAgreeContainer.classList.add('invalid');
            checkboxAgreeError.textContent = 'Необходимо принять условия обработки персональных данных';
            checkboxAgreeError.style.display = 'block';
            return false;
        }

        return true;
    }

    // Валидация при клике на чекбокс
    checkboxAgree.addEventListener('change', function() {
        if (this.checked) {
            checkboxAgreeContainer.classList.remove('invalid');
            checkboxAgreeError.style.display = 'none';
        }
    });

    contactForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Отменяем стандартную отправку формы

        if (!validateCheckbox()) {
            e.preventDefault(); // Останавливаем отправку формы
            // Прокручиваем к чекбоксу для привлечения внимания
            checkboxAgreeContainer.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
            return false;
        }

        // Создаем объект FormData для сериализации данных формы
        const formData = new FormData(this);
        // Отправляем данные через Fetch API
        const formAction = contactForm.getAttribute('action') || '/contact/send';
        fetch(formAction, {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                contactForm.style.display = 'none';
                responseMessage.innerHTML = data;
                responseMessage.style.display = 'block';
                // Закрываем модальное окно через 5 секунд
                setTimeout(function () {
                    modal.classList.remove('show');
                    modalOverlay.classList.remove('show');
                    location.reload();
                }, 3000);
            })
            .catch(error => {
                responseMessage.innerHTML = 'Ошибка при отправке сообщения.';
                responseMessage.style.display = 'block';
                console.error('Ошибка:', error);
            });
    });

});
