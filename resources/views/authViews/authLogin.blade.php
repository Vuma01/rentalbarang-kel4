<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Barang | Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    .main{
        height: 100vh;
    }
    .h-5vh{
        height:10vh ;
    }
</style>
<body>



    <section class="vh-100">



        <div class="container py-5 h-100">



            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                    <h3 class="text-center ">ようこそ　レントの物　に</h3>

                    {{-- Ini kalo pasword atau phonenya gakada di DB --}}
                    @if (session('status'))
                    <div class="alert alert-danger text-center">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="/login" method="POST">
                        @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="number" id="nim" name="nim" class="form-control form-control-lg" placeholder="NIM" required />
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" required />
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <a href="/register">Register?</a>
                        </div>

                        <div class="w-100 d-flex justify-content-around align-items-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
      </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
