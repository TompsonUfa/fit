@extends('layouts.app')

@section('title', 'Школа фитнеса в Уфе | фитнес клуб Ө-FIT')

@section('content')
    <div class="wrapper-header container-fluid">
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-sm-2 d-flex justify-content-center align-items-center">
                        <a href="/" class="header__logo">
                            <img src="logo.png" alt="ШКОЛА ФИТНЕСА «Ө-FIT»">
                        </a>
                    </div>
                    <div class="col-8 col-sm-10 header__content">
                        <div
                            class="w-100 mb-lg-2 d-flex justify-content-end justify-content-lg-between align-items-center p-0">
                            <ul class="header__contact contact d-lg-flex">
                                <li class="contact__item">
                                    <a href="https://yandex.ru/maps/-/CCU7Q6b5dD" target="_blank">г. Уфа, ул.
                                        Коммунистическая, д. 67</a>
                                </li>
                                <li class="contact__item">
                                    <a href="tel:+79375810088">+7 (937) 581-00-88</a>
                                </li>
                            </ul>
                            <ul class="header__social social px-sm-5 d-sm-flex">
                                <li class="social__item">
                                    <a href="https://instagram.com/o.fit.ufa?igshid=YmMyMTA2M2Y= " target="_blank"
                                        class="social__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            id="Layer_1" x="0px" y="0px" viewBox="0 0 50 50"
                                            style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #FFFFFF;
                                                }
                                            </style>
                                            <path class="st0"
                                                d="M16,3C8.8,3,3,8.8,3,16v18c0,7.2,5.8,13,13,13h18c7.2,0,13-5.8,13-13V16c0-7.2-5.8-13-13-13H16z M16,5h18 c6.1,0,11,4.9,11,11v18c0,6.1-4.9,11-11,11H16C9.9,45,5,40.1,5,34V16C5,9.9,9.9,5,16,5z M37,11c-1.1,0-2,0.9-2,2s0.9,2,2,2 s2-0.9,2-2S38.1,11,37,11z M25,14c-6.1,0-11,4.9-11,11s4.9,11,11,11s11-4.9,11-11S31.1,14,25,14z M25,16c5,0,9,4,9,9s-4,9-9,9 s-9-4-9-9S20,16,25,16z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="social__item">
                                    <a href="https://vk.com/o.fit_ufa" target="_blank" class="social__item">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            id="Layer_1" x="0px" y="0px" viewBox="0 0 50 50"
                                            style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                            <style type="text/css">
                                                .st0 {
                                                    fill: #FFFFFF;
                                                }
                                            </style>
                                            <path class="st0"
                                                d="M8.6,4.2c-2.7,0-5,2.3-5,5v32c0,2.7,2.3,5,5,5h32c2.7,0,5-2.3,5-5v-32c0-2.7-2.3-5-5-5H8.6z M8.6,6.2h32 c1.7,0,3,1.3,3,3v32c0,1.7-1.3,3-3,3h-32c-1.7,0-3-1.3-3-3v-32C5.6,7.5,7,6.2,8.6,6.2z M23,16.2c-1.1,0-2,0.1-2.8,0.5c0,0,0,0,0,0 c-0.4,0.2-0.7,0.5-0.9,0.8C19.1,17.6,19,17.7,19,18c0,0.2,0,0.5,0.1,0.8c0.2,0.3,0.5,0.5,0.8,0.5c0.2,0,0.5,0.2,0.6,0.2c0,0,0,0,0,0 c0,0,0.1,0.4,0.2,0.7c0,0.3,0,0.6,0,0.6c0,0,0,0.1,0,0.1c0,0,0.1,0.9,0,1.8c0,0.4-0.1,0.7-0.1,1c-0.4-0.4-0.9-1.1-1.6-2.4 c-0.8-1.5-1.5-2.8-1.5-2.8c0-0.1-0.2-0.5-0.6-0.8c-0.5-0.4-1-0.4-1-0.4c-0.1,0-0.1,0-0.2,0l-3.9,0c0,0-0.2,0-0.5,0s-0.7,0.1-1.1,0.6 c0,0,0,0,0,0c-0.4,0.4-0.3,0.9-0.3,1.2c0,0.3,0.1,0.5,0.1,0.5c0,0,0,0,0,0c0,0,3.2,6.8,6.9,10.8c2.6,2.9,5.4,2.9,7.6,2.9H26 c0.4,0,0.8,0,1.2-0.3c0.4-0.2,0.7-0.9,0.7-1.3c0-0.4,0.1-0.8,0.1-1c0.1-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0c0.2,0.1,0.4,0.4,0.7,0.7 c0.6,0.7,1.3,1.6,2.2,2.2c0.7,0.4,1.3,0.6,1.7,0.7c0.3,0,0.5,0,0.7,0l3.7,0c0,0,0,0,0.1,0c0,0,0.6,0,1.3-0.4 c0.3-0.2,0.7-0.6,0.9-1.1s0-1.1-0.3-1.7c0,0,0,0,0,0c0.1,0.1,0-0.1-0.2-0.3c-0.1-0.2-0.3-0.4-0.5-0.7c-0.4-0.6-1.2-1.4-2.3-2.5 c0,0,0,0,0,0c-0.6-0.5-1-0.9-1.1-1.1c-0.2-0.2-0.1-0.1-0.1-0.2c0-0.1,0.7-1.1,2.2-3c0.9-1.2,1.5-2,1.9-2.8s0.7-1.4,0.5-2.1 c0,0,0,0,0,0c-0.1-0.3-0.3-0.6-0.6-0.8c-0.3-0.2-0.5-0.2-0.7-0.3c-0.4-0.1-0.8-0.1-1.1-0.1c-0.7,0-3.9,0-4.2,0 c-0.3,0-0.8,0.1-1.1,0.3c-0.6,0.3-0.7,0.8-0.7,0.8c0,0,0,0,0,0.1c0,0-0.7,1.5-1.5,2.9c-0.9,1.5-1.5,2.2-1.9,2.5c0-0.1,0,0,0-0.1 c0-0.4,0-1,0-1.5c0-1.5,0.1-2.5,0.1-3.5c0-0.5-0.1-0.9-0.4-1.4s-0.8-0.7-1.3-0.8c-0.3-0.1-0.6-0.3-1.9-0.3c0,0,0,0,0,0 C23.8,16.2,23.4,16.2,23,16.2z M24.1,18.2c1.1,0,0.8,0.1,1.4,0.2c0.2,0,0.1,0,0.1,0c0,0,0.1,0.1,0.1,0.4c0,0.6-0.1,1.7-0.1,3.3 c0,0.4-0.1,1.1,0,1.7c0.1,0.6,0.2,1.5,1,2c0.4,0.2,0.8,0.3,1.2,0.2c0.4-0.1,0.7-0.3,1-0.6c0.7-0.6,1.5-1.5,2.4-3.1 c0.9-1.5,1.6-3,1.6-3.1c0,0,0,0,0,0c0,0,0,0,0,0c0.4,0,3.5,0,4.2,0c0.2,0,0.2,0,0.3,0c0,0.1,0,0-0.1,0.3c-0.3,0.6-0.9,1.4-1.7,2.5 c-1.4,1.9-2.3,2.6-2.5,3.8c-0.1,0.6,0.1,1.3,0.5,1.8s0.8,0.9,1.4,1.4c1.1,1,1.7,1.7,2.1,2.2c0.2,0.2,0.3,0.4,0.4,0.5 c0.1,0.1,0.1,0.1,0.1,0.3c0.1,0.1,0,0,0,0.1c-0.1,0-0.3,0.1-0.3,0.1l-3.7,0c-0.1,0-0.1,0-0.2,0c0,0,0,0-0.2,0 c-0.2,0-0.5-0.1-0.9-0.4c-0.5-0.3-1.2-1.2-1.8-1.9c-0.3-0.4-0.7-0.7-1.1-1c-0.4-0.3-1-0.6-1.7-0.4c-0.7,0.2-1.2,0.8-1.5,1.3 C26,30.3,26,30.7,26,31.2c0,0,0,0,0,0h-1.7c-2.3,0-3.9,0.2-6.1-2.3c-3-3.3-5.8-8.8-6.2-9.7l3.5,0c0.1,0,0.2,0.1,0.2,0.1c0,0,0,0,0,0 c-0.1-0.1,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0.7,1.3,1.6,2.8c0.9,1.5,1.5,2.4,2.1,3c0.3,0.3,0.6,0.5,1,0.7s0.9,0.1,1.3-0.1 c0.7-0.4,0.8-1,0.9-1.5c0.1-0.5,0.2-1,0.2-1.6c0-1,0-1.9,0-1.9c0,0,0-0.4-0.1-0.8c-0.1-0.5-0.1-1.1-0.6-1.6l0,0c0,0,0,0,0,0 C22.6,18.3,23.1,18.2,24.1,18.2z M32.9,19.2L32.9,19.2C32.9,19.2,32.9,19.2,32.9,19.2C32.9,19.2,32.9,19.2,32.9,19.2z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                            <div class="menu-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="Layer_1" x="0px" y="0px" viewBox="0 0 384 384"
                                    style="enable-background:new 0 0 384 384;" xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #FFFFFF;
                                        }
                                    </style>
                                    <path class="st0"
                                        d="M368,207.7H16c-8.8,0-16-7.2-16-16s7.2-16,16-16h352c8.8,0,16,7.2,16,16S376.8,207.7,368,207.7z" />
                                    <path class="st0"
                                        d="M368,85H16C7.2,85,0,77.8,0,69s7.2-16,16-16h352c8.8,0,16,7.2,16,16S376.8,85,368,85z" />
                                    <path class="st0"
                                        d="M368,330.3H16c-8.8,0-16-7.2-16-16s7.2-16,16-16h352c8.8,0,16,7.2,16,16S376.8,330.3,368,330.3z" />
                                </svg>
                            </div>
                        </div>
                        <div class="w-100 p-0 d-none d-lg-block ">
                            <nav class="header__nav nav-btns">
                                <div class="nav-btns__item">
                                    <a href="#about" class="nav-btns__link">О школе фитнеса</a>
                                </div>
                                <div class="nav-btns__item">
                                    <a href="#directions" class="nav-btns__link">Направления</a>
                                </div>
                                <div class="nav-btns__item">
                                    <a href="#courses" class="nav-btns__link">Курсы</a>
                                </div>
                                <div class="nav-btns__item">
                                    <a href="#posters" class="nav-btns__link">Афиша</a>
                                </div>
                                <div class="nav-btns__item">
                                    <a href="#employment" class="nav-btns__link">трудоустройство</a>
                                </div>
                                <div class="nav-btns__item">
                                    <a href="#reasons" class="nav-btns__link">5 причин учиться у нас</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <section class="section section__main main" id="main">
        <video loop="loop" autoplay muted class="main__video" poster="/images/about.jpg">
            <source src="/video/main.mp4" type="video/mp4">
        </video>
        <div class="main__content">
            <div class="container h-100">
                <div class="row">
                    <div class="col-12">
                        <h1 class="main__title">
                            <span> СТАНЬ ЛУЧШИМ </span>ФИТНЕС-ИНСТРУКТОРОМ С «Ө-FIT»!
                        </h1>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section section__info info" id="info">
        <div class="container section__content">
            <div class="row">
                <div class="col-12 col-lg-6 info__text">
                    <h2 class="title info__title">ШКОЛА ФИТНЕСА<br> «Ө-FIT»</h2>
                    <p class="desc info__desc">
                        Обучаем фитнес-инструкторов с нуля.<br>
                        Диплом государственного образца.<br>
                        Курсы. Мастер классы. Семинары, Воркшопы. Аттестация.
                    </p>
                </div>
                <div class="col-12 col-lg-6">
                    <img data-src="/images/studenty-shkoly-fitnesa.webp" src="/images/lazy.png"
                        alt="Студенты школы фитнеса" class="info__img">
                </div>
            </div>
        </div>
    </section>
    <section class="section section__about about" id="about">
        <div class="container section__content">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <img data-src="/images/obuchenie-na-fitnes-trenera.webp" src="/images/lazy.png" class="about__img"
                        alt="Обучение на фитнес тренера">
                </div>
                <div class="col-12 col-lg-6 about__text">
                    <h2 class="title about__title">КОРОТКО О ШКОЛЕ ФИТНЕСА</h2>
                    <p class="desc about__desc">
                        <strong>ОБУЧАЙСЯ У ЛУЧШИХ!</strong>
                        <br>
                        <br>
                        <strong>Школа Фитнеса «Ө-FIT»</strong> — это объединение профессионалов в области фитнес индустрии,
                        спорта и
                        здорового образа жизни.
                        <br>
                        <br>
                        Мы приглашаем пройти обучение и получить новую профессию у лучших специалистов фитнес - индустрии.
                        Фитнес-школа «Ө-FIT» работает как с опытными тренерами и инструкторами, так и с начинающими
                        специалистами, предлагает гибкие системы оплаты обучения и разные программы.
                        <br>
                        <br>
                        🔹 Обучение проходит на базе Башкирского института физической культуры;
                        <br>
                        <br>
                        🔹 Практика проводится на базе СК «Динамо»
                        <br>
                        <br>
                        🔹 По окончанию курсов выдается диплом государственного образца;
                        <br>
                        <br>
                        🔹 Содействуем в трудоустройстве
                    </p>
                    <div class="btn btn-primary btn-lg about__btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Получить консультацию</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__directions directions" id="directions">
        <div class="container section__content">
            <div class="row">
                <div class="col-12 col-lg-6 directions__text">
                    <h2 class="title directions__title">
                        {{ $direction->title }}
                    </h2>
                    <div class="desc directions__desc">
                        {!! $direction->text !!}
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <img data-src="/storage/images/direction/shkola-fitnesa-dlya-trenerov-i-instruktorov.webp"
                        src="/images/lazy.png" alt="Школа фитнеса для тренеров и инструкторов" class="directions__img">
                </div>
            </div>
        </div>
    </section>
    <section class="section section__courses courses" id="courses">
        <div class="container-fluid section__header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Мы предлагаем качественное обучение
                            по следующим курсам</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section__content">
            <div class="row">
                <div class="col-12">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($courses as $course)
                            <div class="accordion-item course">
                                <h2 class="accordion-header" id="flush-heading-{{ $loop->iteration }}">
                                    <button class="accordion-button collapsed accordion__title" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $loop->iteration }}"
                                        aria-expanded="false" aria-controls="flush-collapse-{{ $loop->iteration }}">
                                        {{ $course['title'] }}
                                    </button>
                                </h2>
                                <div id="flush-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse "
                                    aria-labelledby="flush-heading-{{ $loop->iteration }}"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body accordion__content">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                {!! $course['text'] !!}
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <img data-src="/storage/images/courses/{{ $course['id'] . '/' . $course['img'] . '.webp?=r' . rand(0, 999999) }}"
                                                    src="/images/lazy.png" alt="{{ $course['title'] }}"
                                                    class="accordion__img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="courses__block">
                        <p class="courses__desc">ТАКЖЕ, мы проводим внутриклубное обучение для фитнес-центров.<br>
                            Программа,
                            темы
                            и методика курса строятся исходя из задач клуба. Кроме того, это возможность выбрать удобное
                            время,
                            график обучения и снизить стоимость за счёт единовременного обучения.</p>
                    </div>
                    <div class="col-12 banner">
                        <p class="banner__text">Узнать подробности или записаться на курс</p>
                        <div class="btn btn-primary banner__btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Получить консультацию</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__posters posters" id="posters">
        <div class="container-fluid section__header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Афиша ближайших мероприятий</h2>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p class="section__desc">
                            Успейте записаться: <a href="tel:+79179030977">+7 (937) 581-00-88</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section__content">
            <div class="row">
                @foreach ($posters as $poster)
                    <div class="col-12 col-lg-6">
                        <img class="posters__img mb-4"
                            data-src="/storage/images/posters/{{ $poster['id'] }}/{{ $poster['img'] . '.webp?=r' . rand(0, 999999) }}"
                            src="/images/lazy.png" alt="{{ $poster['name'] }}">
                    </div>
                @endforeach
                <div class="col-12 banner posters__banner">
                    <p class="banner__text">Узнать подробности или записаться на мероприятие</p>
                    <div class="btn btn-primary banner__btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Получить консультацию</div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__training training" id="training">
        <div class="container-fluid section__header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">ДЛЯ КОГО ОБУЧЕНИЕ</h2>
                        <p class="section__desc">
                            - тренер с нуля<br>
                            - повышение квалификации практикующего тренера<br>
                            - расширение тренерского профиля<br>
                            - для эффективных самостоятельных тренировок </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section__content">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <img data-src="/images/provoditsya-zaniyatie-v-fitnes-shkole.webp" src="/images/lazy.png"
                        alt="Проводятся занятия в фитнес школе" class="training__img">
                </div>
                <div class="col-12 col-lg-6">
                    <img data-src="/images/sertifikat-uchastnika-master-klassa.webp" src="/images/lazy.png"
                        alt="Сертификат участника мастер класса" class="training__img">
                </div>
            </div>
        </div>
    </section>
    <section class="section section__teachers teachers" id="teachers">
        <div class="container-fluid section__header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">Преподаватели</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section__content">
            <div class="row">
                <div class="col-12">
                    <div class="accordion accordion-flush" id="accordionExample">
                        @foreach ($teachers as $teacher)
                            <div class="accordion-item teacher">
                                <h2 class="accordion-header" id="teacher-heading-{{ $loop->iteration }}">
                                    <button class="accordion-button collapsed accordion__title" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#teacher-collapse-{{ $loop->iteration }}" aria-expanded="false"
                                        aria-controls="teacher-collapse-{{ $loop->iteration }}">
                                        {{ $teacher['fullName'] }}
                                    </button>
                                </h2>
                                <div id="teacher-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse"
                                    aria-labelledby="teacher-heading-{{ $loop->iteration }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body accordion__content">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                {!! $teacher['text'] !!}
                                            </div>
                                            <div
                                                class="col-12 col-lg-6 d-flex justify-content-center mb-4 mb-lg-0 order-first order-lg-last">
                                                <div class="wrapper-img">
                                                    <img data-src="/storage/images/teachers/{{ $teacher['id'] }}/{{ $teacher['img'] . '.webp?=r' . rand(0, 999999) }}"
                                                        src="/images/lazy.png" alt="{{ $teacher['fullName'] }}"
                                                        class="accordion__img teacher__img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section__employment employment" id="employment">
        <div class="container-fluid section__header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">СОДЕЙСТВИЕ В ТРУДОУСТРОЙСТВЕ</h2>
                    </div>
                    <div class="col-12">
                        <p class="section__desc">
                            Мы не только обучаем тренеров, но и содействуем в дальнейшем трудоустройстве.<br>
                            Мы сотрудничаем с фитнес-клубами города и приглашаем их представителей на выпускные занятия и
                            экзамены для выбора кандидатов на трудоустройство.<br>
                            Также, проходя практику, у вас есть возможность присмотреться к клубу и проявить себя, как
                            потенциального сотрудника.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section__content container-fluid">
            <div class="row">
                <div class="slider">
                    <div class="slider__wrapper container p-0">
                        <div class="slider__items">
                            @foreach ($employment as $slide)
                                <div class="slider__item">
                                    @if (empty($slide['video']))
                                        <img data-src="/storage/media/employment/{{ $slide['id'] }}/{{ $slide['img'] . '.webp?=r' . rand(0, 999999) }}"
                                            src="/images/lazy.png" class="slider__img" alt="{{ $slide['name'] }}">
                                    @else
                                        <video width="100%" height="100%" controls>
                                            <source
                                                src="/storage/media/employment/{{ $slide['id'] }}/{{ $slide['video'] }}.mp4"
                                                type="video/mp4">
                                            Ваш браузер, не поддерживает видео.
                                        </video>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="slider__btn slider__btn_prev">
                        <svg class="carousel-control-prev-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                        </svg>
                    </button>
                    <button class="slider__btn slider__btn_next">
                        <svg class="carousel-control-next-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="section section__reasons reasons" id="reasons">
        <div class="container-fluid section__header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__title">5 ПРИЧИН ОБУЧАТЬСЯ В НАШЕЙ ШКОЛЕ ФИТНЕСА</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container section__content">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <p class="desc reasons__desc">
                        1. Диплом государственного образца<br>
                        2. Качественный преподавательский состав<br>
                        3. Максимум практики и концентрированная теория, с возможностью расширять знания на
                        мастер-классах<br>
                        4. Гибкая система оплаты (рассрочка, программа лояльности)<br>
                        5. Перспективы трудоустройства
                    </p>
                </div>
                <div class="col-12 col-lg-6 mb-3">
                    <img data-src="/images/studenty-shkoly-fitnesa-i-anisimov-stepan.webp" src="/images/lazy.png"
                        alt="Студенты школы фитнеса и Анисимов Степан" class="reasons__img">
                </div>
                <div class="col-12 banner">
                    <p class="banner__text">Узнать подробности или записаться на курс</p>
                    <div class="btn btn-primary banner__btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Получить консультацию</div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer container-fluid" id="footer">
        <div class="container">
            <h5 class="footer__title">Контакты</h5>
            <address class="footer__address">
                Г. Уфа, ул. Коммунистическая, д. 67 <br>
                Башкирский институт физической культуры (филиал) ФГБОУ ВО «УралГУФК», Аудитория №4
            </address>
            <p class="footer__contact">
                Подробности и запись на курсы:<br>
                Телефон: <a href="tel:+79375810088">+7 (937) 581-00-88</a> Степан Анисимов<br>
                Email: <a href="mailto:o-fitschool@mail.ru">o-fitschool@mail.ru</a><br>
                ИП Горбатова Вера Константиновна<br>
                ИНН: 165113742290<br>
                ОГРНИП: 322169000210158<br>
                Сайт не является публичной офертой и носит информационный характер
            </p>
        </div>
    </footer>
    <div class="menu">
        <div class="menu__container">
            <ul class="menu__list">
                <li class="menu__item">
                    <a href="#" class="menu__link">
                        Главная
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#about" class="menu__link">
                        Коротко о школе
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#directions" class="menu__link">
                        Направления
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#courses" class="menu__link">
                        Актуальные курсы
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#posters" class="menu__link">
                        Афиша
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#training" class="menu__link">
                        Для кого обучение
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#teachers" class="menu__link">
                        Преподаватели
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#employment" class="menu__link">
                        Содействие
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#reasons" class="menu__link">
                        5 причин обучаться
                    </a>
                </li>
                <li class="menu__item">
                    <a href="#footer" class="menu__link">
                        Контакты
                    </a>
                </li>
                <li class="menu__item">
                    <a href="tel:+79375810088" class="menu__link">+7 (937) 581-00-88</a>
                </li>
            </ul>
            <ul class="menu__social social">
                <li class="social__item">
                    <a href="https://instagram.com/o.fit.ufa?igshid=YmMyMTA2M2Y= " target="_blank" class="social__item">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1"
                            x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
                            <path class="st0"
                                d="M16,3C8.8,3,3,8.8,3,16v18c0,7.2,5.8,13,13,13h18c7.2,0,13-5.8,13-13V16c0-7.2-5.8-13-13-13H16z M16,5h18 c6.1,0,11,4.9,11,11v18c0,6.1-4.9,11-11,11H16C9.9,45,5,40.1,5,34V16C5,9.9,9.9,5,16,5z M37,11c-1.1,0-2,0.9-2,2s0.9,2,2,2 s2-0.9,2-2S38.1,11,37,11z M25,14c-6.1,0-11,4.9-11,11s4.9,11,11,11s11-4.9,11-11S31.1,14,25,14z M25,16c5,0,9,4,9,9s-4,9-9,9 s-9-4-9-9S20,16,25,16z" />
                        </svg>
                    </a>
                </li>
                <li class="social__item">
                    <a href="https://vk.com/o.fit_ufa" target="_blank" class="social__item">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Layer_1"
                            x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">

                            <path class="st0"
                                d="M8.6,4.2c-2.7,0-5,2.3-5,5v32c0,2.7,2.3,5,5,5h32c2.7,0,5-2.3,5-5v-32c0-2.7-2.3-5-5-5H8.6z M8.6,6.2h32 c1.7,0,3,1.3,3,3v32c0,1.7-1.3,3-3,3h-32c-1.7,0-3-1.3-3-3v-32C5.6,7.5,7,6.2,8.6,6.2z M23,16.2c-1.1,0-2,0.1-2.8,0.5c0,0,0,0,0,0 c-0.4,0.2-0.7,0.5-0.9,0.8C19.1,17.6,19,17.7,19,18c0,0.2,0,0.5,0.1,0.8c0.2,0.3,0.5,0.5,0.8,0.5c0.2,0,0.5,0.2,0.6,0.2c0,0,0,0,0,0 c0,0,0.1,0.4,0.2,0.7c0,0.3,0,0.6,0,0.6c0,0,0,0.1,0,0.1c0,0,0.1,0.9,0,1.8c0,0.4-0.1,0.7-0.1,1c-0.4-0.4-0.9-1.1-1.6-2.4 c-0.8-1.5-1.5-2.8-1.5-2.8c0-0.1-0.2-0.5-0.6-0.8c-0.5-0.4-1-0.4-1-0.4c-0.1,0-0.1,0-0.2,0l-3.9,0c0,0-0.2,0-0.5,0s-0.7,0.1-1.1,0.6 c0,0,0,0,0,0c-0.4,0.4-0.3,0.9-0.3,1.2c0,0.3,0.1,0.5,0.1,0.5c0,0,0,0,0,0c0,0,3.2,6.8,6.9,10.8c2.6,2.9,5.4,2.9,7.6,2.9H26 c0.4,0,0.8,0,1.2-0.3c0.4-0.2,0.7-0.9,0.7-1.3c0-0.4,0.1-0.8,0.1-1c0.1-0.1,0.1-0.2,0.2-0.2c0,0,0,0,0,0c0.2,0.1,0.4,0.4,0.7,0.7 c0.6,0.7,1.3,1.6,2.2,2.2c0.7,0.4,1.3,0.6,1.7,0.7c0.3,0,0.5,0,0.7,0l3.7,0c0,0,0,0,0.1,0c0,0,0.6,0,1.3-0.4 c0.3-0.2,0.7-0.6,0.9-1.1s0-1.1-0.3-1.7c0,0,0,0,0,0c0.1,0.1,0-0.1-0.2-0.3c-0.1-0.2-0.3-0.4-0.5-0.7c-0.4-0.6-1.2-1.4-2.3-2.5 c0,0,0,0,0,0c-0.6-0.5-1-0.9-1.1-1.1c-0.2-0.2-0.1-0.1-0.1-0.2c0-0.1,0.7-1.1,2.2-3c0.9-1.2,1.5-2,1.9-2.8s0.7-1.4,0.5-2.1 c0,0,0,0,0,0c-0.1-0.3-0.3-0.6-0.6-0.8c-0.3-0.2-0.5-0.2-0.7-0.3c-0.4-0.1-0.8-0.1-1.1-0.1c-0.7,0-3.9,0-4.2,0 c-0.3,0-0.8,0.1-1.1,0.3c-0.6,0.3-0.7,0.8-0.7,0.8c0,0,0,0,0,0.1c0,0-0.7,1.5-1.5,2.9c-0.9,1.5-1.5,2.2-1.9,2.5c0-0.1,0,0,0-0.1 c0-0.4,0-1,0-1.5c0-1.5,0.1-2.5,0.1-3.5c0-0.5-0.1-0.9-0.4-1.4s-0.8-0.7-1.3-0.8c-0.3-0.1-0.6-0.3-1.9-0.3c0,0,0,0,0,0 C23.8,16.2,23.4,16.2,23,16.2z M24.1,18.2c1.1,0,0.8,0.1,1.4,0.2c0.2,0,0.1,0,0.1,0c0,0,0.1,0.1,0.1,0.4c0,0.6-0.1,1.7-0.1,3.3 c0,0.4-0.1,1.1,0,1.7c0.1,0.6,0.2,1.5,1,2c0.4,0.2,0.8,0.3,1.2,0.2c0.4-0.1,0.7-0.3,1-0.6c0.7-0.6,1.5-1.5,2.4-3.1 c0.9-1.5,1.6-3,1.6-3.1c0,0,0,0,0,0c0,0,0,0,0,0c0.4,0,3.5,0,4.2,0c0.2,0,0.2,0,0.3,0c0,0.1,0,0-0.1,0.3c-0.3,0.6-0.9,1.4-1.7,2.5 c-1.4,1.9-2.3,2.6-2.5,3.8c-0.1,0.6,0.1,1.3,0.5,1.8s0.8,0.9,1.4,1.4c1.1,1,1.7,1.7,2.1,2.2c0.2,0.2,0.3,0.4,0.4,0.5 c0.1,0.1,0.1,0.1,0.1,0.3c0.1,0.1,0,0,0,0.1c-0.1,0-0.3,0.1-0.3,0.1l-3.7,0c-0.1,0-0.1,0-0.2,0c0,0,0,0-0.2,0 c-0.2,0-0.5-0.1-0.9-0.4c-0.5-0.3-1.2-1.2-1.8-1.9c-0.3-0.4-0.7-0.7-1.1-1c-0.4-0.3-1-0.6-1.7-0.4c-0.7,0.2-1.2,0.8-1.5,1.3 C26,30.3,26,30.7,26,31.2c0,0,0,0,0,0h-1.7c-2.3,0-3.9,0.2-6.1-2.3c-3-3.3-5.8-8.8-6.2-9.7l3.5,0c0.1,0,0.2,0.1,0.2,0.1c0,0,0,0,0,0 c-0.1-0.1,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0.7,1.3,1.6,2.8c0.9,1.5,1.5,2.4,2.1,3c0.3,0.3,0.6,0.5,1,0.7s0.9,0.1,1.3-0.1 c0.7-0.4,0.8-1,0.9-1.5c0.1-0.5,0.2-1,0.2-1.6c0-1,0-1.9,0-1.9c0,0,0-0.4-0.1-0.8c-0.1-0.5-0.1-1.1-0.6-1.6l0,0c0,0,0,0,0,0 C22.6,18.3,23.1,18.2,24.1,18.2z M32.9,19.2L32.9,19.2C32.9,19.2,32.9,19.2,32.9,19.2C32.9,19.2,32.9,19.2,32.9,19.2z" />
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="menu__close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="bi bi-x" viewBox="0 0 15 15">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="bi bi-x" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title mb-3" id="exampleModalLabel">Получить консультацию</h5>
                    <p class="modal-desc mb-3">Оставьте свой номер телефона и мы свяжемся с вами</p>
                    <form class="form needs-validation">
                        @csrf
                        <div class="mb-3 wrapper-control">
                            <input type="text" class="form-control" data-text-input placeholder="Имя" name="name"
                                maxlength="35">
                            <span class="wrapper-control__error">
                                Пожалуйста, укажите свое Имя.
                            </span>
                        </div>
                        <div class="mb-3 wrapper-control ">
                            <input type="tel" class="form-control" data-tel-input placeholder="Телефон"
                                name="phone" maxlength="18">
                            <span class="wrapper-control__error">
                                Пожалуйста, укажите свой телефон.
                            </span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit w-100">Отправить</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <span class="modal-politic">
                        Нажимая кнопку "отправить" вы соглашаетесь с нашей <a href="/politika-konfidencialnosti"
                            target="_blank">
                            политикой
                            конфиденциальности</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div type="button" class="btn_close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="bi bi-x" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </div>
                <div class="modal-body">
                    <h4 class="modal-title mb-3" id="exampleModalLabel2">Ответьте на 3 вопроса</h4>
                    <p class="modal-desc mb-3">Получи купон номиналом 1000 руб. на любой из ближайших курсов</p>
                    <div class="questions mb-3">
                        <div class="questions__item">
                            <h5 class="questions__title">1. Кто вы?</h5>
                            <div class="answers">
                                <div class="btn answers__item">Тренер</div>
                                <div class="btn answers__item">Хочу стать тренером</div>
                                <div class="btn answers__item">Веду здоровый образ жизни</div>
                            </div>
                        </div>
                        <div class="questions__item">
                            <h5 class="questions__title">2. Какое направление интересно?</h5>
                            <div class="answers">
                                <div class="btn answers__item">Тренажерный зал</div>
                                <div class="btn answers__item">Групповые программы</div>
                                <div class="btn answers__item">Детский фитнес</div>
                                <div class="answers__item answers__item_input ">
                                    <div class="wrapper-control ">
                                        <input type="text" class="form-control" data-text-input
                                            placeholder="Свой ответ" name="answers" maxlength="35">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="questions__item">
                            <h5 class="questions__title">3. Ваши контакты?</h5>
                            <form class="form needs-validation">
                                @csrf
                                <div class="wrapper-control">
                                    <input type="text" class="form-control" data-text-input placeholder="Имя"
                                        name="name" maxlength="35">
                                    <span class="wrapper-control__error">
                                        Пожалуйста, укажите свое Имя.
                                    </span>
                                </div>
                                <div class="wrapper-control">
                                    <input type="tel" class="form-control" data-tel-input placeholder="Телефон"
                                        name="phone" maxlength="18">
                                    <span class="wrapper-control__error">
                                        Пожалуйста, укажите свой телефон.
                                    </span>
                                </div>
                                <span class="modal-politic text-white d-block mb-3">
                                    Нажимая кнопку "Отправить" вы соглашаетесь с нашей <a
                                        href="/politika-konfidencialnosti" target="_blank">
                                        политикой
                                        конфиденциальности</a></span>
                                <button type="submit" class="btn btn-primary btn-submit w-100">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-btns">
        <a href="#main" class="panel-btns__item panel-btns__item_scroll ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-up-short"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
            </svg>
        </a>
        <div class="panel-btns__item panel-btns__item_open" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <svg viewBox="0 0 1024 1024" fill="#000000" class="icon" version="1.1"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M99.2 883.2c-41.6 0-75.2-34.4-75.2-76.8V648c32.8-7.2 59.2-24 73.6-47.2 8-13.6 22.4-39.2 22.4-65.6 0-24.8-12.8-47.2-21.6-62.4-15.2-24-44-44-74.4-50.4V264c0-42.4 33.6-76.8 75.2-76.8h825.6c41.6 0 75.2 34.4 75.2 76.8v158.4c-29.6 7.2-55.2 25.6-71.2 52l-2.4 4.8c-10.4 16.8-21.6 35.2-21.6 55.2s11.2 39.2 21.6 55.2l3.2 4.8c16 26.4 41.6 45.6 71.2 52v159.2c0 42.4-33.6 76.8-75.2 76.8H99.2z m249.6-48h604.8V692h-0.8c-62.4-39.2-98.4-96.8-98.4-156.8 0-60 36-117.6 98.4-156.8h0.8V236H348.8v72.8h-55.2v-72.8H70.4v135.2h0.8c47.2 29.6 98.4 88 98.4 164S118.4 669.6 71.2 699.2h-0.8v136h223.2v-72.8h55.2v72.8z"
                    fill="" />
                <path
                    d="M721.6 559.2h-75.2c-3.2 0-5.6 0.8-8.8 2.4-2.4 1.6-4 0-4 3.2s0 6.4 0.8 10.4 0.8 3.2 0.8 5.6c0 4.8 4 6.4 11.2 4.8H720c7.2 0 11.2 4 11.2 11.2v24c0 8-5.6 12-16 12h-22.4c-5.6 0-12 0-18.4 0.8-6.4 0.8-12.8 0.8-17.6 0.8h-10.4c-6.4 0-10.4 4-10.4 12v55.2c0 4-3.2 6.4-8.8 6.4h-26.4c-9.6 0-14.4-4-14.4-12.8 0-3.2 0-10.4 0.8-20.8s0-25.6-0.8-29.6c0-4-0.8-6.4-0.8-8-0.8-0.8-3.2-1.6-6.4-1.6H504c-9.6 0-15.2-4.8-15.2-16 0-2.4 0-5.6-0.8-8.8-0.8-3.2-0.8-4.8 0-8.8 0.8-4 2.4-7.2 3.2-11.2 1.6-3.2 4.8-4 8.8-3.2h81.6c1.6 0 2.4-1.6 2.4-6.4v-16c0-4-4.8-5.6-13.6-5.6h-71.2c-3.2 0-5.6 0-8-0.8-2.4 0-3.2-2.4-3.2-6.4v-12c0-6.4 0-11.2-0.8-14.4-1.6-4.8 0-8.8 3.2-12 4-3.2 8.8-4.8 15.2-4.8 6.4 0.8 12.8 0.8 20 0.8 7.2-0.8 8-0.8 12-0.8h13.6c4.8 0 6.4-1.6 4.8-4.8-1.6-1.6-2.4-8-9.6-17.6-8-10.4-19.2-27.2-28-38.4-9.6-13.6-21.6-28.8-34.4-44-5.6-8.8-4-16 3.2-21.6 4-2.4 8-5.6 12-8.8 4-3.2 8.8-7.2 14.4-10.4 7.2-4.8 14.4-0.8 21.6 12.8 2.4 3.2 6.4 8.8 12.8 17.6s12.8 16.8 20 27.2c6.4 9.6 13.6 18.4 19.2 25.6 6.4 8 9.6 12 10.4 13.6 1.6 3.2 4 4.8 8 5.6 4 0.8 7.2-0.8 8.8-4 0.8-1.6 4-6.4 9.6-15.2 5.6-8 12-17.6 19.2-28 7.2-10.4 13.6-20 19.2-29.6 6.4-8.8 9.6-15.2 11.2-17.6 4-5.6 7.2-8.8 9.6-10.4 2.4-1.6 7.2-0.8 13.6 0.8 4 1.6 8 4 12 7.2 4.8 3.2 8 5.6 8.8 7.2 8 8.8 10.4 16 7.2 22.4-1.6 2.4-5.6 8.8-12.8 18.4-7.2 9.6-14.4 20-22.4 30.4-8 10.4-15.2 27.2-21.6 36.8-6.4 9.6-10.4 15.2-11.2 16.8-2.4 4-1.6 6.4 3.2 7.2 4 0.8 8 1.6 12 1.6h46.4c4 0 7.2 1.6 9.6 4.8 2.4 3.2 4 6.4 4 9.6v26.4c0.8 6.4-3.2 8.8-10.4 8.8zM292.8 387.2h56.8v121.6h-56.8V387.2zM349.6 705.6h-56.8V562.4h56.8v143.2z"
                    fill="" />
            </svg>
        </div>

    </div>
@endsection
