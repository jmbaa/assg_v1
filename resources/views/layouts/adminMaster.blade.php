<html lang="en">
<head lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Үзий</title>
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}" type="image/x-icon"/>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

      /* base css */
      :root {
        --navbar_background: #0085c9;
        --navbar_font: #eee;
        --navbar_menu_hover: #0072ac;
      }

      * {
        margin: 0;
        padding: 0;
      }

      body {
        font-family: "Poppins", sans-serif;
      }

      /* Navbar Css */

      .__navbar {
        display: flex;
        position: fixed;
        top: 0;
        width: 100%;
        height: 50px;
        background: var(--navbar_background);
        color: var(--navbar_font);
        align-items: center;
      }

      /* Navbar Logo */
      .__navbar-logo {
        width: 50%;
        margin: 0 0 0 2%;
      }

      /* Navbar Menu */

      .__navbar-menu {
        display: flex;
        width: 50%;
        margin: 0 0 0 0;
        height: 100%;
        align-items: center;
      }

      .__navbar-menu ul {
        display: flex;
        list-style: none;
        width: 100%;
        height: 100%;
        justify-content: space-around;
      }

      .__navbar-menu a {
        color: var(--navbar-font);
        text-decoration: none;
        width: 100%;
        height: 100%;
      }

      .__navbar-menu ul li {
        display: flex;
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
      }

      .__navbar-menu ul li:hover {
        background: var(--navbar_menu_hover);
      }

      /* Hamburger */

      .__hamburger {
        display: none;
        flex-direction: column;
        height: 40px;
        width: 45px;
        justify-content: space-around;
        margin: 0 2% 0 0;
        cursor: pointer;
      }

      .__hamburger div {
        width: 40px;
        height: 4px;
        background: white;
      }

      .__section{
          padding: 60px 10px;
      }

      @media only screen and (max-width: 800px) {
        .__navbar-menu ul {
          display: flex;
          flex-direction: column;
          position: absolute;
          top: 0;
          margin: 0 0 0 0;
          z-index: 1;
          background: var(--navbar_background);
          height: 100vh;
          width: 100vw;
        }

        .__navbar-menu-open {
          right: 0;
          transition: 0.5s ease;
        }
        .__navbar-menu-close {
          right: -100vw;
          transition: 0.5s ease;
        }

        .__navbar-menu {
          justify-content: flex-end;
        }
        .__hamburger {
          display: flex;
          z-index: 2;
        }
      }

      /* Slideshow container */
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }

      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }

      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }

      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }

      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }

      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }

      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }

      .active, .dot:hover {
        background-color: #717171;
      }

      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
      }

      @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
      }

      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
      }

    </style>
</head>
<body>
    <nav>
      <div class="__navbar">
        <div class="__navbar-logo">
          <h1>Үзий систем</h1>
        </div>
        <div class="__navbar-menu">
        <ul class="__navbar-menu-close">
          <a href="#home"><li><span>Эхлэл</span></li></a>
          <a href="#services"><li><span>Үйлчилгээ</span></li></a>
          <a href="#help"><li><span>Тухай</span></li></a>
          @if (Route::has('login'))
              @auth
                <a href="{{ url('/home') }}" ><li><span>Эхлэл</span></li></a>
                  @else
                    <a href="{{ route('login') }}" ><li><span>Нэвтрэх</span></li></a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" ><li><span>Бүртгүүлэх</span></li></a>
                        @endif
              @endauth
          @endif
        </ul>
        <div class="__hamburger">
          <div></div>
          <div></div>
          <div></div>
        </div>  
      </div>
    </nav>
    <script>

    </script>
</body>
</html>