<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}"/>
        <script src="{{url('assets/js/components/bootstrap.js')}}"></script>

        <title>Test</title>
    <body>
        {{-- menu górne --}}
        @include('pages.inc.navbar'); 
        
        {{-- slider --}}
        @include('pages.inc.slider');
       
        <div class="container-fluid">
            <div class="row">
        {{-- breadcrumos --}}
                <h7>Tutaj jesteś: Home > coś tam - zrobić @inslude dla breadcrumps</h7>
            </div>

            <div class="row">
        {{-- lewa kolumna --}}
                <div class="col-sm-2"><h5>lewa kolumna np. na menu kategorii lub filtry wyszukujące</h5> </div>
        {{-- content         --}}
                <div class="col-sm-10">
                    <div class="col-sm-5">
                        <form action="" method="POST>
                            <label for="title">Tytuł ogłoszenia</label>
                            <input name="title" id="title" placeholder="Podaj tytuł ogłoszenia" size="50" class="form-control">

                            <label for="description">Treść ogłoszenia</label>
                            <textarea name="description" id="description" placeholder="Podaj treść ogłoszenia"  class="form-control"></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </body>
</html>
