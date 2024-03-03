@if (session('success'))
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Categories & Products</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .floating-window {
            display: none;
            position: fixed;
            z-index: 1000;
            background-color: #14d938;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            padding: 8px;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
        }

        .floating-window .img {
            position: absolute;
            top: 5px;
            right: 5px;
            bottom: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>

$(function() {
    // تحديد عنصر النافذة المطفوة
    var floatingWindow = $(".floating-window");

    // حساب ارتفاع الشاشة
    var windowHeight = $(window).height();

    // تحديد النافذة في الجزء العلوي من الشاشة
    floatingWindow.css("top", -floatingWindow.outerHeight());

    // إظهار النافذة بعد فترة زمنية وتحريكها لأسفل
    floatingWindow.fadeIn(100).animate({
        top: '+=300px'
    }, 2000);

    // تأخير تحريك النافذة لأعلى بعد فترة زمنية
    setTimeout(function() {
        floatingWindow.animate({
            top: '-=220px'
        }, 3000, function() {
            // بعد انتهاء التحريك لأعلى، تقوم بتحريكها لأسفل بشكل تدريجي وسلس
            floatingWindow.fadeOut(3000);
        });
    }, 4000); // تأخير لمدة ثانيتين (2000 ميلي ثانية) قبل بدء التحريك لأعلى
});







    </script>
</head>
<body>
    <div class="floating-window">

        <img class="img" src="{{asset('assets/img/R.gif')}}" alt="">
        <p class="p">@yield('message')</p>
    </div>
</body>
</html>
@endif
