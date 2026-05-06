@extends('layouts.app')

@section('content')
<div class="main-bottom">
    <a name="reagents"></a>
    <div class="reagent-card-wrapper">
        <h2>Химические реагенты и материалы</h2>
        <div class="main-advantages-subheading">
            <p class="subheading">
                обеспечивают надежность и эффективность на всех этапах нефтегазового производства.
            </p>
        </div>
        <div class="reagent-card-content">
            <div class="reagent-card">
                <img src="/img/transitoil-icon.png" alt="Блок Транспортировки">
                <h3>Блок Транспортировки</h3>
                <ul>
                    <li>Ингибитор коррозии</li>
                    <li>Ингибитор солеотложений</li>
                    <li>Противотурбулентная присадка</li>
                    <li>Депрессорная присадка</li>
                </ul>
            </div>
            <div class="reagent-card">
                <img src="/img/drilling-icon.png" alt="Блок Бурения">
                <h3>Блок Бурения</h3>
                <ul>
                    <li>Гидрофобизатор</li>
                    <li>Регулятор реологии</li>
                    <li>Ингибитор глин</li>
                    <li>Буровая смазывающая присадка</li>
                </ul>
            </div>
            <div class="reagent-card">
                <img src="/img/prepare-drilling-icon.png" alt="Блок Подготовки">
                <h3>Блок Подготовки</h3>
                <ul>
                    <li>Деэмульгатор</li>
                    <li>Поглотитель кислорода</li>
                    <li>Нейтрализатор сероводорода</li>
                    <li>Пеногаситель</li>
                </ul>
            </div>
            <div class="reagent-card">
                <img src="/img/production-oil-icon.png" alt="Блок Добычи">
                <h3>Блок Добычи</h3>
                <ul>
                    <li>Ингибитор коррозии</li>
                    <li>Ингибитор солеотложений</li>
                    <li>Ингибитор и растворитель АСПО</li>
                    <li>Растворитель гидратов</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-advantages">
        <a name="service"></a>
        <div class="main-advantages-heading">
            <h2>Предлагаемые решения</h2>
        </div>
        <div class="main-advantages-subheading">
            <p class="subheading">
                ООО «НефтеГазХим» охватывают весь цикл работы с химическими реагентами.
                Мы обеспечиваем индивидуальный подход и испытание продукции с учетом конкретных задач и условий эксплуатации.
            </p>
        </div>
        @include('partials.main-advantages-cards')
        <a name="aditional-solutions"></a>
    </div>

    <div class="main-experience">
        <div class="main-experience-heading">
            <span class="me-heading">
                <h2>Дополнительные решения</h2>
            </span>
            <p class="subheading">Мы предлагаем комплексный подход, включающий разработку специализированных систем
                дозирования, хранения и транспортировки реагентов,
                а также индивидуальные решения для повышения эффективности и безопасности производственных
                процессов, помогающий нашим клиентам поддерживать
                высокий уровень производительности и стабильности в их операционной деятельности.
            </p>
            <p class="subheading"> Наши дополнительные решения ориентированы на оптимизацию технологических
                процессов и снижение затрат,
                что делает нас надежным партнером для компаний, стремящихся к максимальной эффективности и
                устойчивому развитию на рынке.
            </p>
        </div>
        <div class="me-competitions">
            @include('partials.slider')
        </div>
    </div>

    <div class="main-documents-container">
        <div class="documents-block documents-description">
            <div class="main-documents-heading">
                <span class="me-heading">
                    <h2>Документация</h2>
                </span>
                <p>Все поставляемые реагенты имеют:</p>
                <ul>
                    <li>Сертификаты соответствия «Нефтепромхим»</li>
                    <li>Сертификаты соответствия «КАРТЭК»</li>
                    <li>Сертификаты соответствия «ТЭКСЕРТ»</li>
                    <li>Сертификаты на применение</li>
                </ul>
                <ul>
                    <li>Технические условия</li>
                    <li>Инструкции на применение</li>
                    <li>Протоколы анализа на ХОС</li>
                    <li>Паспорта безопасности</li>
                </ul>
            </div>
        </div>
        <div class="documents-block documents-slider">
            <div class="frame">
                <div class="pics">
                    <div class="pic pic-1"><img src="/img/sert-1.jpg" alt="" /></div>
                    <div class="pic pic-2"><img src="/img/sert-2.jpg" alt="" /></div>
                    <div class="pic pic-3"><img src="/img/sert-3.jpg" alt="" /></div>
                    <div class="pic pic-4"><img src="/img/sert-4.jpg" alt="" /></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
