<section class="main-menu-button">

    <button class="contacts-button" type="button" value="#">Написать</button>

    <div class="modal-overlay"></div>
    <div class="modal" id="cf-modal">
        <form id="contactForm" action="{{ route('contact.send') }}" method="post">
            @csrf
            <h2>Оставьте Ваше сообщение</h2>
            <div class="label-float">
                <input type="text" id="name" name="name" required placeholder=" " />
                <label for="name">Пожалуйста представтесь</label>
            </div>

            <div class="label-float">
                <input type="email" id="email" name="email" required placeholder=" " />
                <label for="email">Ваш Email</label>
            </div>

            <div class="label-float">
                <input type="tel" id="phone" name="phone" placeholder=" " pattern="[\+]\d{1,3}[\(]?\d{3}[\)]?\d{3}[\-]?\d{2}[\-]?\d{2}" />
                <label for="phone">Ваш телефон</label>
                <span class="error-message" id="phone-error"></span>
            </div>

            {{-- Honeypot --}}
            <input type="text" name="hp" class="hp-field">

            <div class="label-float textarea-wrap">
                <textarea id="text" name="text" required placeholder=" " minlength="10" maxlength="500"></textarea>
                <label for="text">Ваше сообщение:</label>
                <span class="error-message" id="text-error"></span>
            </div>

            <div class="policy-box">
                <label class="agree-checkbox">
                    <input type="checkbox" class="checkbox-input-agree">
                    <span class="checkbox-checkmark"></span>
                    <span class="checkbox-text">
                        Принимаю условия обработки персональных данных<br>
                        <a href="#" id="confidence-policy-link" class="checkbox-link">Условия обработки персональных данных</a>
                        <br>
                        <a href="#" id="agree-policy-link" class="checkbox-link">Согласие на обработку персональных данных</a>
                    </span>
                </label>
                <span class="checkbox-error" id="checkbox-error"></span>
            </div>

            <br><br>

            <button type="submit">Отправить</button>
            <button type="button" class="cancel-button">Отменить</button>
        </form>
        <div id="responseMessage" style="display:none;"></div>
    </div>

    <section class="languages visibility-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <mask id="mask0_18_270" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="12" height="12">
                <circle cx="6" cy="6" r="6" fill="#D9D9D9" />
            </mask>
            <g mask="url(#mask0_18_270)">
                <path d="M-6.94702 10.3164H22.7372V17.6848H-6.94702V10.3164Z" fill="#FFCE00" />
                <path d="M-6.94702 -4.4209H22.7372V2.94752H-6.94702V-4.4209Z" fill="black" />
                <path d="M-6.94702 2.94727H22.7372V10.3157H-6.94702V2.94727Z" fill="#DD0000" />
                <path d="M-2.52649 0H14.4359V12.6316H-2.52649V0Z" fill="#012169" />
                <path d="M-0.538707 0L5.92821 4.76316L12.3686 0H14.4359V1.63158L8.07502 6.3421L14.4359 11.0263V12.6316H12.3156L5.95471 7.92105L-0.379685 12.6316H-2.52649V11.0526L3.80791 6.36842L-2.52649 1.68421V0H-0.538707Z" fill="white" />
                <path d="M8.71111 7.39474L14.4359 11.5789V12.6316L7.2534 7.39474H8.71111ZM3.83441 7.92105L3.99344 8.8421L-1.09529 12.6316H-2.52649L3.83441 7.92105ZM14.4359 0V0.0789474L7.83648 5.02632L7.88949 3.86842L13.1107 0H14.4359ZM-2.52649 0L3.80791 4.63158H2.21768L-2.52649 1.10526V0Z" fill="#C8102E" />
                <path d="M3.86092 0V12.6316H8.10152V0H3.86092ZM-2.52649 4.21053V8.42105H14.4359V4.21053H-2.52649Z" fill="white" />
                <path d="M-2.52649 5.07895V7.60526H14.4359V5.07895H-2.52649ZM4.70904 0V12.6316H7.2534V0H4.70904Z" fill="#C8102E" />
            </g>
        </svg>
        <a class="language-link" href="#">En</a>
    </section>
</section>
