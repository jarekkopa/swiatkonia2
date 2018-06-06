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

        <div class="container">
            <div class="row">
        {{-- lewa kolumna --}}
                <div class="col-sm-3">lewa kolumna np. na menu kategorii lub filtry wyszukujące </div>

        {{-- content         --}}
                <div class="col-sm-9">
                    @if(count($adverts) > 0)
                        @foreach($adverts as $advert)
                            <div class="row">                           
                                <div class="card">
                                        <h5 class="card-header">{{ $advert->title }} <span class="badge badge-danger">Nowe</span></h5>
                                        <div class="card-body">
                                            {{-- <h5 class="card-title">Special title treatment</h5> --}}
                                            <p class="card-text">{{ str_limit($advert->description, 300) }} </p>
                                            <p class="card-text">
                                                {{-- sprawdzenie czy podano cenę --}}
                                                @if($advert->price)
                                                    {{ $advert->price }} zł</p>
                                                @else
                                                    Cena: Za darmo
                                                @endif
                                            <p>
                                            <a href="{{ route('adverts.show', $advert->id) }}" class="btn btn-outline-danger">Zobacz</a>
                                        </div>
                                        </div>
                                        <p></p>
                        
                                {{-- <div class="col-sm-2">
                                        <img src="/img/pict8.jpg" style="max-width: 200px">
                                </div> --}}
                                
                            </div>
                        @endforeach
                    @endif
                    
                </div>
                
            </div>
           
        </div>
    </body>
</html>
