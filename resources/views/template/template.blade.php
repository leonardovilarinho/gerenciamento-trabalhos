<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        </style>
        {{ Html::style('style.css') }}
        {{ Html::style('font.awesome.min.css') }}
        <title>G.Trabalhos - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body class="w3-light-grey">

        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
          <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
          @section('header')

          @show
        </div>

        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
          <div class="w3-container w3-row">
            <div class="w3-col s8 w3-bar">
              <span>Bem Vindo, <strong>Professor ou Aluno</strong></span><br>
            </div>
          </div>
          <hr>
          <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>Opc9</a>
            @section('sidebar')
            @show
          </div>
        </nav>

        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <div class="w3-main" style="text-align: center;margin-top:50px;">

        @yield('content')
          <!-- Footer -->
          <article class="col-md-10" style="border-left: 1px solid #eee">
              <footer>
                  <hr>
                  <div style="text-align: center;">&copy; 2017 - Analise e Desenvolvimento de Sistemas</div>
              </footer>
          </article>

          <!-- End page content -->
        </div>

        {{ Html::script('js/app.js') }}
    </body>
</html>
