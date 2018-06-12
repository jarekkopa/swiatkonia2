<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}" />


    <script src="{{url('assets/js/components/bootstrap.js')}}"></script>

    <title></title>

    <body>
        {{-- menu górne --}} @include('pages.inc.navbar'); {{-- slider --}} @include('pages.inc.slider');

        <div class="container">
            <div class="row">
                {{-- lewa kolumna --}}
                <div class="col-sm-3">lewa kolumna np. na menu kategorii lub filtry wyszukujące </div>

                {{-- content --}}
                <div class="col-sm-9">
                    @include('pages.inc.show_new_adv')
                </div>
            </div>
        </div>
    </body>

</html>