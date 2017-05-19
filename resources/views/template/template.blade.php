<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>G.Pesquisa - @yield('title')</title>

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
            <span class="w3-bar-item w3-right">Cadastrar</span>
            <span class="w3-bar-item w3-right">Entrar</span>
        </div>
        @section('header')
        @show
        <br><br>

	    <!-- Sidebar/menu -->
	    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left menu-lateral" style="z-index:3;width:300px;" id="mySidebar"><br>
	      <div class="w3-container w3-row">
	        <div class="w3-col s8 w3-bar">
	          <span>Bem Vindo, <strong>Professor ou Aluno / Fazer Login</strong></span><br>
	        </div>
	      </div>
	      <hr>
	      <div class="w3-container">
	        <h5>Opções da Pagina</h5>
	      </div>
	      <div class="w3-bar-block">
	        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu">Fechar Menu</a>
	        <a href="#" class=" w3-button w3-blue menu-word">  Opc 1</a>
	        <a href="#" class="w3-button w3-padding">  Opc 2</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 3</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 4</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 5</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 6</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 7</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 8</a>
	        <a href="#" class="menu-word w3-button w3-padding">  Opc 9</a>
	      </div>
	    </nav>
	    <br><br>
            @yield('content')
              <article class="col-md-offset-5">
                <footer>
                    <hr>
                    &copy; 2017 - Análise e Desenvolvimento de Sistemas - IFTM
                </footer>
              </article>
                </div>
            </div>
        </div>
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
