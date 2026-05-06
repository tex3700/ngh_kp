(function () {
    const input      = document.getElementById('qr-url-input');
    const errorMsg   = document.getElementById('qr-error');
    const checkBtn   = document.getElementById('qr-check-btn');
    const genBtn     = document.getElementById('qr-gen-btn');
    const result     = document.getElementById('qr-result');
    const resultLink = document.getElementById('qr-result-link');
    const qrCanvas   = document.getElementById('qr-gen-canvas');
    const dlBtn      = document.getElementById('qr-download-btn');

    const CHECK_IDLE     = 'idle';
    const CHECK_CHECKING = 'checking';
    const CHECK_OK       = 'ok';

    let checkState  = CHECK_IDLE;
    let verifiedUrl = null;

    const ICON_CHECK = `<svg class="qr-check-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M3 8.5L6.5 12L13 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`;
    const ICON_SPIN  = `<span class="qr-spinner"></span>`;

    function isValidFormat(str) {
        try {
            const url = new URL(str);
            return url.protocol === 'http:' || url.protocol === 'https:';
        } catch (_) {
            return false;
        }
    }

    function setCheckState(state) {
        checkState = state;
        if (state === CHECK_IDLE) {
            checkBtn.innerHTML = 'Проверить ссылку';
            checkBtn.classList.remove('state-ok', 'state-checking');
            checkBtn.disabled = !isValidFormat(input.value.trim());
        } else if (state === CHECK_CHECKING) {
            checkBtn.innerHTML = ICON_SPIN + ' Проверяем...';
            checkBtn.classList.add('state-checking');
            checkBtn.classList.remove('state-ok');
            checkBtn.disabled = false;
        } else if (state === CHECK_OK) {
            checkBtn.innerHTML = ICON_CHECK + ' Ссылка проверена';
            checkBtn.classList.add('state-ok');
            checkBtn.classList.remove('state-checking');
            checkBtn.disabled = false;
        }
    }

    function showError(msg) {
        errorMsg.textContent = msg;
        errorMsg.classList.add('visible');
        input.classList.add('input-error');
        input.classList.remove('input-ok');
    }

    function clearError() {
        errorMsg.classList.remove('visible');
        input.classList.remove('input-error');
    }

    input.addEventListener('input', function () {
        const val = input.value.trim();
        clearError();
        input.classList.remove('input-ok');
        verifiedUrl = null;
        genBtn.disabled = true;

        if (val === '') {
            setCheckState(CHECK_IDLE);
            checkBtn.disabled = true;
            return;
        }

        setCheckState(CHECK_IDLE);
        checkBtn.disabled = !isValidFormat(val);
    });

    checkBtn.addEventListener('click', function () {
        const url = input.value.trim();
        if (!isValidFormat(url)) return;

        clearError();
        setCheckState(CHECK_CHECKING);

        fetch((window.QR_CHECK_URL || '/products/qr-generate/check-url') + '?url=' + encodeURIComponent(url))
            .then(function (res) { return res.json(); })
            .then(function (data) {
                if (data.ok) {
                    verifiedUrl = url;
                    input.classList.add('input-ok');
                    setCheckState(CHECK_OK);
                    genBtn.disabled = false;
                } else {
                    setCheckState(CHECK_IDLE);
                    showError(data.error || 'Ссылка недоступна. Проверьте адрес и попробуйте снова.');
                    genBtn.disabled = true;
                }
            })
            .catch(function () {
                setCheckState(CHECK_IDLE);
                showError('Не удалось выполнить проверку. Попробуйте ещё раз.');
                genBtn.disabled = true;
            });
    });

    genBtn.addEventListener('click', function () {
        if (!verifiedUrl) return;

        const url = verifiedUrl;

        input.value = '';
        input.classList.remove('input-ok', 'input-error');
        clearError();
        verifiedUrl = null;
        genBtn.disabled = true;
        setCheckState(CHECK_IDLE);
        checkBtn.disabled = true;

        resultLink.href = url;
        resultLink.textContent = url;

        qrCanvas.innerHTML = '';
        new QRCode(qrCanvas, {
            text: url,
            width: 200,
            height: 200,
            correctLevel: QRCode.CorrectLevel.M
        });

        result.classList.add('visible');
    });

    dlBtn.addEventListener('click', function () {
        const canvas = qrCanvas.querySelector('canvas');
        if (!canvas) return;
        const a = document.createElement('a');
        a.href = canvas.toDataURL('image/png');
        let filename = 'qr-code';
        try {
            filename = new URL(resultLink.href).hostname.replace(/\./g, '-') + '-qr';
        } catch (_) {}
        a.download = filename + '.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
}());
