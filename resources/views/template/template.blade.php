<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>G.Trabalhos - @yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/fontgoogle2.css') }}
        {{ Html::style('css/font-awesome.min.css') }}
        {{ Html::style('css/fontgoole.css') }}
        {{ Html::style('css/bootstrap.min.css') }}
        {{ Html::style('css/template.css') }}

    </head>
  <body class="w3-light-grey">
        <div class="w3-bar w3-top w3-black w3-large menu-top" style="z-index:4; ">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();">Menu</button>
            <div style="float: left; margin-top: 7px; margin-left: 10px">
              Gerenciamento de trabalhos
            </div>
            <div class="menu-top-nome">
              @if(auth()->check())
                  <a href="{{ url('exit') }}"><span class="w3-bar-item w3-right">Sair</span></a></div>
              @else
                  <a href="{{ url('/') }}"><span class="w3-bar-item w3-right">Entrar</span></a></div>
              @endif
            </div>
        </div>

        @section('header')
        @show
        <br><br>

	    <!-- Sidebar/menu -->
      @if(auth()->check())
          <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;"
          id="mySidebar"><br>
              <div class="w3-container w3-row">
                <div class="w3-col s8 w3-bar">
                  <span>Olá, <strong>{{auth()->user()->name}}</strong></span><br>
                </div>
              </div>
              <hr>
              <div class="w3-container w3-blue">
                <h5>Opções:</h5>
              </div>
              <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>Fechar Menu</a>

              <div class="w3-bar-block">
                  @if(auth()->user()->manager)
                    <a href="{{url('/admin')}}" class="w3-button w3-padding">Administratores</a>
                    <a href="{{url('/course/new')}}" class="w3-button w3-padding">Cursos</a>
                    <a href="{{url('/discipline/new')}}" class="w3-button w3-padding">Disciplinas</a>
                    <a href="{{url('/teacher/new')}}" class="w3-button w3-padding">Professores</a>
                    <a href="{{url('/semester/new')}}" class="w3-button w3-padding">Semestres</a>
                  @endif

                  @if(auth()->user()->manager or auth()->user()->teacher)
                    <a href="{{url('/student/new')}}" class="w3-button w3-padding">Estudantes</a>
                  @endif

                @if(auth()->user()->teacher)
                    <a href="{{url('/work')}}" class="w3-button w3-padding">Trabalhos</a>
                  @endif

                  @if(auth()->user()->student)
                    <a href="{{url('/panel')}}" class="w3-button w3-padding">Painel inicial</a>
                  @endif

                  </div>
            </div>
          </nav>
      @else
      @endif
	    <br><br>
        @yield('content')
          <footer class="text-center">
            <hr>
            &copy; 2017 - Análise e Desenvolvimento de Sistemas - IFTM
          </footer>
        </article>
      <script>
        // Get the Sidebar
			var mySidebar = document.getElementById("mySidebar");

			// Get the DIV with overlay effect
			var overlayBg = document.getElementById("myOverlay");

			// Toggle between showing and hiding the sidebar, and add overlay effect
			function w3_open() {
			    if (mySidebar.style.display === 'block') {
			        mySidebar.style.display = 'none';
			        overlayBg.style.display = "none";
			    } else {
			        mySidebar.style.display = 'block';
			        overlayBg.style.display = "block";
			    }
			}

			// Close the sidebar with the close button
			function w3_close() {
			    mySidebar.style.display = "none";
			    overlayBg.style.display = "none";
			}
		  </script>
        {{ Html::script('js/app.js') }}
        {{ Html::script('js/jquery.js') }}
        {{ Html::script('js/bootstrap.min.js') }}
    </body>
</html>
