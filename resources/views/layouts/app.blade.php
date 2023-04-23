<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Школа фитнеса «O-fit»: обучаем фитнес инструкторов с нуля в г. Уфа. ☛ Гибкая система оплаты. ☛ Большой выбор программ обучения. ☛ По окончанию курсов выдается диплом государственного образца. ☎️ Звоните +7 (937) 581-00-88">
    <meta name="Keywords"
        content="Школа фитнеса,фитнес уфа,спорт обучение,обучение,тренер обучение, тренер, Школа фитнеса в Уфе, фитнес клуб Ө-FIT, фитнес клуб O-FIT, фитнес клуб О-FIT , фитнес клуб О ФИТ">
    <meta property="og:image" content="/images/about.jpg" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-site-verification" content="tpFlWYoZEdQMgDxldMIgHMdkyrsfG0PYI7nDQE6at9I" />
    <meta name="yandex-verification" content="52c9fa4dae93f0a4" />
    <script src="//code.jivo.ru/widget/8IWUtegk9O" async></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(92372402, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/92372402" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    @yield('content')
</body>

</html>
