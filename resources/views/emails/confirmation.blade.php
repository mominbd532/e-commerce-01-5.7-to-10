<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm your  Email address</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://uucentrallibrary.000webhostapp.com/assets/css/mmbazzar.css">

    <!--<link rel="stylesheet" href="mmbazzar.css">-->


</head>
<body>
<div class="container">
    <div class="outer-panel text-center rounded">
        <i class="far fa-bookmark" style="padding: 2px"></i>
        <div class="inner-panel rounded">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="mt-3">Welcome To MM-BAZZAR</h6>
                    <p>Thanks for register</p>
                </div>
                <div class="col-md-12">
                    <img src="https://uucentrallibrary.000webhostapp.com/assets/img/mmbazzar.jpg" alt="img1" style="width: 100%;height: 90%;">
                </div>
                <div class="col-md-12">
                    <p>Please confirm your email address for active the account</p>
                    <a href="{{url('/confirm/'.$code)}}" class="btn btn-warning">Confirm Email</a>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="p-4">
                        <i class="far fa-images fa-2x px-2 py-2" style="background-color: lightblue;"></i>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="p-4">
                        <h6>Your Name</h6>
                        <p>{{$name}}</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="p-4">
                        <i class="far fa-images fa-2x px-2 py-2" style="background-color: lightblue;"></i>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="p-4">
                        <h6>Your Email</h6>
                        <p>{{$email}}</p>
                    </div>
                </div>
                <div class="col-md-12 p-4">
                    <h6>Have any question please ask me!</h6>
                    <a href="#" style="font-size: 13px;text-decoration: none;">mominbd533@gmail.com</a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <footer style="padding: 3% 19%;">
                    <div class="d-flex flex-row p-4">
                        <i class="fab fa-facebook-f circle"></i>
                        <i class="fab fa-twitter circle"></i>
                        <i class="fab fa-instagram circle"></i>
                        <i class="fab fa-youtube circle"></i>

                    </div>
                    <p>There are many variations of passages o</p>

                </footer>
            </div>
        </div>

    </div>


</div>



</body>
</html>