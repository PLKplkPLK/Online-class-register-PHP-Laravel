<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Strona główna</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}

        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div>
    <div  style="background-color: white; height: 55px; margin: auto; line-height: 50px;">
        <div style="padding: 10px; float:right" class="hidden sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" style="font-size: x-large; border-radius: 10px; border: 1px solid #6b7280;padding:5px;" class="text-sm text-gray-700 dark:text-gray-500">Przejdź do profilu</a>
            @else
                <a href="{{ route('login') }}" style="font-size: x-large; border-radius: 10px; border: 1px solid #6b7280;padding:5px;" class="text-sm text-gray-700 dark:text-gray-500">Zaloguj się do dziennika</a>

{{--                <a href="{{ route('register') }}" style="font-size: x-large; border-radius: 10px; border: 1px solid #9ca3af;padding:3px; box-shadow: 1px 1px 1px;" class="ml-4 text-sm text-gray-700 dark:text-gray-500">Rejestracja</a>--}}

            @endauth
        </div>

        <div class="top-0 left-0" style="padding: 8px">
{{--            <a style="font-size: 30px">SP C. F. Gaussa</a>--}}
        </div>
    </div>

    <div style="background-color: #90CAF8; height: 175px;width: available; margin-top: 20px;">
        <img style="height: 150px; padding-left: 5%; margin-top: 18px" src="https://i.ibb.co/qC39cmz/logo.jpg" alt="SPG logo">
    </div>

    <div style="width: 1200px; margin: 100px auto auto auto">

{{--        <div style="background-color: #e2e8f0; width: 450px; margin: 50px auto 100px auto; border-radius: 10px">--}}
{{--            <p class="text-center" style="font-size: 20px">Aby przejść do panelu użytkownika <a href="{{ route('login') }}" class="underline">zaloguj się</a></p>--}}
{{--        </div>--}}
        <div style="margin: auto; width:600px; height: 70px">
            <div style="width:33%; float:left; padding:10px; text-align: center">
                <a href="/aktualnosci" style="font-size: 22px">
                    Aktualności
                </a>
            </div>
            <div style="width:33%; float:left; padding:10px; text-align: center">
                <a href="/patron" style="font-size: 22px">
                    Patron
                </a>
            </div>
            <div style="width:33%; float:left; padding:10px; text-align: center">
                <a href="/kontakt" style="font-size: 22px">
                    Kontakt
                </a>
            </div>
        </div>


        <div style="height: 1200px; background-color: white; width: 1200px; margin: auto; border-top: 2px solid #9ca3af; padding-top: 30px;">
{{--            <p style="height: 8%; font-size: 32px; margin:0; text-align: center; line-height: 45px">Najnowsze wiadomości z życia szkoły</p>--}}

            @if($btn=='kontakt')
                <div style="padding-left: 40px; margin-left: 130px">
                    <h3 style="margin-left: 32px">Adres szkoły</h3>
                    <p>
                        <i class="fas fa-school" style="font-size:18px; margin-bottom: 7px;"></i> &nbsp;Hogwarts Castle<br>
                        <i class="fas fa-map-marked-alt" style="font-size:18px; margin-bottom: 7px; margin-left: 2px;"></i> &nbsp;Highlands, Szkocja, Wielka Brytania</p><br>
                    <h4 style="margin-left: 30px">Sekretariat</h4>
                    <p>
                        <i class="far fa-user-circle" style="font-size:18px; margin-bottom: 7px;"></i>&nbsp;&nbsp;mgr. Pani Sekretarka<br>
                        <i class="far fa-envelope" style="font-size:18px; margin-bottom: 7px;"></i><a href="mailto:pani.sekretarka@szkola.com"> &nbsp;pani.sekretarka@szkola.com</a><br>
                        <i class="fa-solid fa-mobile-screen-button" style="font-size:18px; margin: 0 3px 7px 2px"></i> &nbsp;+48 12 23 3244
                    </p><br>
                    <h4 style="margin-left: 30px">Administrator szkoły</h4>
                    <p>
                        <i class="far fa-user-circle" style="font-size:18px; margin-bottom: 7px;"></i>&nbsp;&nbsp;mgr. inż. Admin Adminowy<br>
                        <i class="far fa-envelope" style="font-size:18px"></i><a href="mailto:admin@szkola.com"> &nbsp;admin@szkola.com</a>
                    </p><br>
                    <img style=" max-width: 80%; margin: 75px 0 0 0px; border-radius: 40px" src="https://i.ytimg.com/vi/oE-pXV-G9aY/maxresdefault.jpg">
                </div>
            @elseif($btn=='patron')
                <div style="width: 1100px">
                    <div style="width: 50%; margin: 30px 0 0 20px; float: left">
                        <h2>Carl Friedrich Gauß</h2>
                        <p style="text-align: justify; margin-bottom: 270px">Niemiecki naukowiec: matematyk, fizyk, astronom, geodeta i wynalazca. Członek towarzystw naukowych, także zagranicznych, oraz laureat nagród, w tym Medalu Copleya. <br><br> Gauss zajmował się różnymi działami matematyki i jej zastosowaniami w innych dziedzinach. Był uznanym autorytetem w całej Europie, a jemu współcześni nazywali go „księciem matematyków” (łac. princeps mathematicorum). Bywał nazywany jednym z trzech największych matematyków w historii, obok Archimedesa i Newtona.</p>
                        <h3>Rozkład Gaussa</h3>
                        <p style="text-align: justify; margin-bottom: 80px">jeden z najważniejszych rozkładów prawdopodobieństwa, odgrywający ważną rolę w statystyce. Wykres funkcji prawdopodobieństwa tego rozkładu jest krzywą w kształcie dzwonu (tak zwaną krzywą dzwonową).<br><br>
                            Przyczyną jego znaczenia jest częstość występowania w naturze. Jeśli jakaś wielkość jest sumą lub średnią bardzo wielu drobnych losowych czynników, to niezależnie od rozkładu każdego z tych czynników jej rozkład będzie zbliżony do normalnego (centralne twierdzenie graniczne) – dlatego można go bardzo często zaobserwować w danych. Ponadto rozkład normalny ma interesujące właściwości matematyczne, dzięki którym oparte na nim metody statystyczne są proste obliczeniowo.</p>
                        <p>
                            <b>Źródła informacji:</b><br>
                            https://pl.wikipedia.org/wiki/Carl_Friedrich_Gauss
                            https://pl.wikipedia.org/wiki/Rozk%C5%82ad_normalny
                        </p>
                    </div>
                    <div style="width: 35%; height: auto; margin: 30px 10px 0 0; float: right">
                        <img style="max-width:100%; max-height:100%; margin-bottom: 200px; border-radius: 120px" src="https://cdn.britannica.com/27/190027-050-A9A35298/Carl-Friedrich-Gauss-engraving.jpg" alt="https://www.shutterstock.com/g/nicku">
                        <img style="max-width:100%; max-height:100%;" alt="krzywa gaussa z wiki" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Standard_deviation_diagram.svg/1920px-Standard_deviation_diagram.svg.png">
                    </div>
                </div>
            @else
                <div style="height: 24%; padding: 20px; overflow: clip">
                    <div style="width: 30%; height:85%; float:left;position: relative;overflow: hidden; border-radius: 7px; margin-left: 90px">
                        <img style="margin: auto; width: 360px; height: auto" src="https://prostetorodo.pl/wp-content/uploads/2021/09/e-dziennik-w-szkole-a-rodo.jpg" alt="obrazek artykułu">
                    </div>
                    <div style="width: 50%; height:73%; float:left; text-align: left; vertical-align: middle; margin-left: 70px; overflow:hidden;">
                        <p style="display: inline-block; width: 100%;font-size: 20px; margin: 20px 0 0 0; color: #2d3748"><b>Start dziennika elektronicznego</b></p>
                        <p style="display: inline-block; width: 100%;font-size: 16px; margin: 0; color: #333e50; max-height: 150px">Z przyjemnością informujemy o wprowadzeniu nowej funkcjonalności dla naszych
                            nauczycieli i uczniów - dziennika elektronicznego. Wasze konta powinny być już dostępne,
                            w przeciwnym wypadku prosimy o kontakt pod adresem admin@szkola.com. Mamy nadzieję, że dzięki
                            temu nauka i organizacja pracy w szkole będzie jeszcze bardziej owocna niż wcześniej.
                        </p>
                    </div>
                </div>
                <div style="height: 24%; padding: 20px; overflow: clip">
                    <div style="width: 30%; height:85%; float:left;position: relative;overflow: hidden; border-radius: 7px; margin-left: 90px">
                        <img style="margin: auto; width: 360px; height: auto" src="https://samequizy.pl/wp-content/uploads/2017/06/filing_images_6562487ad75a-1.jpg" alt="obrazek artykułu">
                    </div>
                    <div style="width: 50%; height:73%; float:left; text-align: left; vertical-align: middle; margin-left: 70px; overflow:hidden;">
                        <p style="display: inline-block; width: 100%;font-size: 20px; margin: 20px 0 0 0; color: #2d3748"><b>Korytarz na trzecim piętrze jest wyłączony z użytku</b></p>
                        <p style="display: inline-block; width: 100%;font-size: 16px; margin: 0; color: #333e50; max-height: 150px">Pan Filch przypomina, że korytarz na trzecim piętrze jest wyłączony z użytku.
                            Prosimy o respektowanie tej zasady i magiczne teleportowanie się z pietra drugiego na piętro
                            trzecie, gdyż jak wszyscy pamiętamy windy w naszym budynku nie działają. W sprawie wind
                            proszę kontaktować się z firmą od prądu aby umorzyli nasze długi.
                    </div>
                </div>
                <div style="height: 24%; padding: 20px; overflow: clip">
                    <div style="width: 30%; height:85%; float:left;position: relative;overflow: hidden; border-radius: 7px; margin-left: 90px">
                        <img style="margin: auto; width: 360px; height: auto" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/150B9/production/_108610268_pupilsincloisters.jpg.webp" alt="obrazek artykułu">
                    </div>
                        <div style="width: 50%; height:73%; float:left; text-align: left; vertical-align: middle; margin-left: 70px; overflow:hidden;">
                            <p style="display: inline-block; width: 100%;font-size: 20px; margin: 20px 0 0 0; color: #2d3748"><b>Uczniowie wracają do szkół</b></p>
                            <p style="display: inline-block; width: 100%;font-size: 16px; margin: 0; color: #333e50; max-height: 150px">Pomimo trwania epidemii od trzech lat, dopiero w tym semestrze nasi uczniowie mogli powrócić do placówki.
                            Uczniowie już dawno stęsknili się za swoimi nauczycielami, a nauczyciele niechętnie muszą opuścić swoje ciepłe domy.
                                Pomimo upływu tak długiego czasu, mamy nadzieję, że wszyscy powitamy się z radością i
                                wspólnie zaczniemy kolejny etap nauki.
                            </p>
                        </div>
                </div>
            @endif
        </div>
        <div>
            <p style="text-align: center">Ewa Ania Kamil Kacper Inc. ® ©</p>
        </div>
    </div>
</div>
</body>
</html>
