<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>{{ __("frontend.Localization") }}</title>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">{{ __("frontend.Navbar") }}</a>
                <form class="d-flex" action="{{ route("home") }}" method="GET" onchange="this.submit()">
                    <select class="form-select" aria-label="{{ __("frontend.Default select example") }}" name="locale"
                        id="locale">
                        <option @selected(request("locale") == "en") value="en">English</option>
                        <option @selected(request("locale") == "da") value="da">دری</option>
                        <option @selected(request("locale") == "pu") value="pu">پښتو</option>
                    </select>
                </form>
            </div>
        </nav>


        <div class="row">
            @foreach ($cardsInfo as $cardInfo)
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            {{ __("frontend.Featured") }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ __("frontend.$cardInfo->title") }}</h5>
                            <p class="card-text">{{ __("frontend.$cardInfo->description") }}</p>
                            <a href="#" class="btn btn-primary">{{ __("frontend.Go somewhere") }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>