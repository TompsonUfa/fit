<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('desc')">
    <meta name="Keywords" content="@yield('keywords')">
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

    @vite(['resources/sass/app.scss', 'resources/sass/style.scss'])

    <title>@yield('title')</title>
</head>

<body>
    <header class="header-static">
        <div class="container">
            <div class="header-static__logo">
                <a href="/"><img src="/logo.png" alt="ШКОЛА ФИТНЕСА «Ө-FIT»"></a>
            </div>
        </div>
    </header>
    <div class="container my-5">
        @yield('content')
    </div>
</body>

</html>
