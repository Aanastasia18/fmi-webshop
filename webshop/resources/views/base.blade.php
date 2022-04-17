<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>FMI WebShop</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
        </style>
    </head>
    <body class="d-flex flex-column min-vh-100">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">FMI WebShop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    </ul>
                    <form class="d-flex" action="/cart">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                        </button>
                    </form>
                    @auth('web')
                    <form class="d-flex" action="{{ route('logout') }}" style="padding-left: 5px">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-key-fill me-1"></i>
                            Logout
                        </button>
                    </form>
                    @endauth
                    @guest
                    <form class="d-flex" action="/login" style="padding-left: 5px">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-key-fill me-1"></i>
                            Login
                        </button>
                    </form>
                    @endguest
                    
                </div>
            </div>
        </nav>

        @yield('content')
        <!-- Footer-->
        <footer class="py-5 bg-success mt-auto">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; FMI WebShop 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>