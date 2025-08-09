<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Blade Component</title>
</head>

<body>

    <h1>Hello World!</h1>

    {{-- <x-alert style="color:red; border:1px solid green;" text="This is a message!" /> --}}

    {{-- @php
    $languages = ["PHP", "JavaScript", "Python", "C", "C++", "Dart"];
    @endphp

    @foreach ($languages as $language)
    <x-alert :text="$language" />
    @endforeach --}}

    {{-- <x-button name="click_me" id="click_me" style="background: red; color: black;" />
    <x-button style="color: White;" /> --}}

    {{-- <x-button>
        Click Here
    </x-button> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <x-card>
                    <x-slot name="image">
                        <img src="https://images.unsplash.com/photo-1754630551378-e1ecffe9da6b?q=80&w=2332&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="...">
                    </x-slot>
                    <x-slot name="title">
                        <h5 class="card-title">Card title</h5>
                    </x-slot>
                </x-card>
            </div>
            <div class="col-md-4">
                <x-card>
                    <x-slot name="image">
                        <img src="https://images.unsplash.com/photo-1752861680950-95de10209572?q=80&w=2138&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="...">
                    </x-slot>
                    <x-slot name="title">
                        <h5 class="card-title">Card title</h5>
                    </x-slot>
                </x-card>
            </div>
            <div class="col-md-4">
                <x-card>
                    <x-slot name="image">
                        <img src="https://images.unsplash.com/photo-1754404053337-7363006e4391?q=80&w=2340&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            class="card-img-top" alt="...">
                    </x-slot>
                    <x-slot name="title">
                        <h5 class="card-title">Card title</h5>
                    </x-slot>
                </x-card>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
</body>

</html>