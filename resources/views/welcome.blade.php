<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column; /* Stack children vertically */
    }



    footer {
        background-color: #343a40; /* dark color */
        color: white;
        text-align: center;
        padding: 15px; /* Adjust padding as needed */
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    .full-height {
        height: 7vh; /* Full viewport height */
    }
    #div_connected{
        top: -14px;
        position: relative;
    }
</style>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <!-- Header -->
    <header class="text-black" >
    <div class="row mx-3" id="header">
        <div class="col-md-8" id="logo">
            <div class="h1">Benvenuti in {{ env('APP_NAME') }}</div>
            <div id="div_connected" class="blockquote fs-6">
                Connessi: <span id="connected-users-count" class="text-success"></span>
            </div>
        </div>
            <div id="flag" class="col-md-1 mt-3">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <div style="display: inline-block">
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <img class="img-fluid"
                                 src="{{ url('assets/flags/24x24') }}/{{ $localeCode }}.png">
                        </a>
                    </div>
                @endforeach
            </div>
       <div class="col-md-1 mt-3" >
           <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
       </div>
        <div class="col-md-1 mt-3"  >
                       @if(Auth::check() && Auth::user() )
               <form method="POST"  action="{{ route('filament.user.auth.logout') }}" >
                   @csrf
               <button type="submit" class="btn btn-warning">Logout</button>
               </form>
           @else
               <a href="/user" class="btn btn-success">Login</a>
           @endif



                  </div>
    </div>
    </header>
@section('main')

    <!-- Main Content -->
    <main class="container my-3 content">
        <div class="row">
            <div class="col-md-2">
                    <div class="d-flex">
                        <div class="bg-light row text-center">

                            <div class="col-md-12 navbar-nav flex-column">
                                <a class="nav-item nav-link active" href="{{ route('home') }}">Home</a>
                               <a class="nav-item nav-link" href="{{ route('regolamento') }}">Regolamento</a>
                                <a class="nav-item nav-link" href="{{ route('ambientazione') }}">Ambientazione</a>
                                <a class="nav-item nav-link" href="{{ route('contatti') }}">Contatti</a>
                                @if(Auth::check() && Auth::user() )
                                    <a class="btn btn-success" href="{{ route('game_index') }}">Entra in gioco</a>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
            @section('content')
                <div class="col-md-10">
                    <h2>Contenuto Principale</h2>
                    <p>Questo è un esempio di contenuto principale. Puoi inserire qui le informazioni che desideri mostrare
                        ai tuoi visitatori.</p>
                    <p>Utilizza le classi di Bootstrap per stilizzare e organizzare il tuo contenuto.</p>
                </div>
            @show

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3" style="bottom:0px">
        <p>&copy; 2024 <a href="https://chatgdr.lookatnow.com">PBC GDR</a>. Tutti i diritti riservati.</p>
    </footer>
    @show
    <script
            src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
/* $(document).ready(function(){
     // Initialize sum variable
     var totalHeight = 0;

     // Calculate height of all <div> elements and <h2>
     $('#login').find('div, h2').each(function() {
         totalHeight += $(this).outerHeight(true); // true to include margin
     });
console.log(totalHeight);
     // Applica l'altezza calcolata al logo
     $('#logo').css('height', totalHeight + 'px');
     $('#header').css('height', totalHeight + 'px');
 });
*/
 function fetchConnectedUsers() {
     document.getElementById('connected-users-count').innerText =0;
    /* $.ajax({
         url: 'url',
         beforeSend: function (xhr) {
             //show loading
         }
     }).done(function (data, xhr) {
         //hide loading

         //success

     }).fail(function (xhr) {
         //hide loading

         //error

     });  */
     $.get('/api/connected-users', function (response){
         document.getElementById('connected-users-count').innerText ="";
         document.getElementById('connected-users-count').innerText = response.connected_users;
     });

 }

 // Fetch initial value
 fetchConnectedUsers();

 // Set interval to fetch every 5 min
 setInterval(fetchConnectedUsers, 350000);
</script>
    </body>

</html>
