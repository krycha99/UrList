<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="SHORTCUT ICON" href="/images/logo.svg" type="images/x-icon" />
    <link rel="ICON" href="/images/logo.svg" type="image/ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href={{ url("css/app.css") }}>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>

    <title>UrList</title>

    <!--First navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><img src="/images/logo.svg" style="height: 50px; background-color:dimgray " class="logo rounded "></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>
          @guest
            <form class="form-inline my-2 my-lg-0">
            <a class="nav-link btn btn-outline-primary mr-2"type="submit" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
            <a class="nav-link btn btn-outline-primary mr-2"type="submit" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
          </form>
            @else
            <a href="/user/editUser"><img src={{ url("images/profil2.png") }} class="rounded-circle w-14 mr-2" href="/" alt="" ></a>
            <button class="nav-link btn btn-outline-primary mr-2" type="submit">Your list</button>
            <button type="submit">
              <a class="nav-link btn btn-outline-primary  "type="submit" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('Logout') }}</a> 
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
        
          @endguest
        </div>
      </nav>

      <!--Second navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
      <button class="btn btn-outline-primary mr-2" type="submit">All</button>
      <button class="btn btn-outline-primary mr-2" type="submit">Watching</button>
      <button class="btn btn-outline-primary mr-2" type="submit">Plan to watch</button>
      <button class="btn btn-outline-primary mr-2" type="submit">Completed</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
           
          </ul>
          <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
    </form>
        </div>
      </nav>
      

</head>
<body>
  <main class="py-4">
    
    @yield('content')
  </main>

  <footer class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold text-white h-16 mt-24 opacity-90 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="/movies/create"
                class="absolute top-1/3 right-10 bg-black text-white py-1 px-5"
                >Add Movie</a
            >
        </footer>

</body>
</html>