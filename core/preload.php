<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      margin: 0;
    }

    .preloader {
      position: fixed;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      overflow: hidden;
      /* фоновый цвет */
      background: #e0e0e0;
      z-index: 1001;
    }

    .preloader__image {
      position: relative;
      top: 50%;
      left: 50%;
      width: 70px;
      height: 70px;
      margin-top: -35px;
      margin-left: -35px;
      text-align: center;
      animation: preloader-rotate 2s infinite linear;
    }

    @keyframes preloader-rotate {
      100% {
        transform: rotate(360deg);
      }
    }

    .loaded_hiding .preloader {
      transition: 0.3s opacity;
      opacity: 0;
    }

    .loaded .preloader {
      display: none;
    }
  </style>
</head>

<body>
  <div class="preloader">
    <svg class="preloader__image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
      <path fill="currentColor"
        d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zm208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48zM96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48 48-21.49 48-48zm12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.491-48-48-48zm294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48c0-26.509-21.49-48-48-48zM108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.491-48-48-48z">
      </path>
    </svg>
  </div>

  <script>
    function loaded(){
        document.body.classList.add('loaded_hiding');
        document.body.classList.add('loaded');
        document.body.classList.remove('loaded_hiding');
    }

    window.onload = function () {
      setTimeout(loaded, 750);
    }
  </script>
</body>

</html>							
						