<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}" />
    <script src="{{url('assets/js/components/bootstrap.js')}}"></script>

    <title>Test</title>

    <body>
        {{-- menu górne --}} @include('pages.inc.navbar'); {{-- slider --}} @include('pages.inc.slider');

        <div class="container">
            <div class="row">
                @include('pages.inc.messages'); {{-- breadcrumos --}}
            </div>

            <div class="row">
                {{-- lewa kolumna --}}
                <div class="col-sm-3">
                    <h5>lewa kolumna np. na menu kategorii lub filtry wyszukujące</h5>
                </div>
                {{-- content --}}
                <div class="col-sm-9">

                    <form action="{{ action('AdvertsController@store') }}" method="POST" enctype="multipart/form-data">
                        <div>
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" /> {{-- tytuł --}}
                        </div>
                        <div>
                            {{-- tytuł --}}
                            <label for="title">Tytuł ogłoszenia</label>
                            <input name="title" id="title" placeholder="Podaj tytuł ogłoszenia" size="50" class="form-control"> {{-- treść --}}
                        </div>  
                        <div>
                            {{-- opis --}}
                            <label for="description">Treść ogłoszenia</label>
                            <textarea name="description" id="description" placeholder="Podaj treść ogłoszenia" class="form-control"></textarea>
                        </div>
                        <div>
                            {{-- województwa --}}
                            <label for="region">Województwo</label>
                            <select class="form-control" name="region">
                                @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            {{-- kategoria --}}
                            <label for="category">Kategoria</label>
                            <select name="category" class="form-control">
                                <option value="">--Wybierz kategorię--</option>
                                @foreach ($categories as $category => $value)
                                <option value="{{ $category }}"> {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            {{-- podkategoria --}}
                            <label for="subcategory">Podkategoria</label>
                            <select name="subcategory" class="form-control">
                                <option>--Wybierz podkategorię--</option>
                            </select>
                        </div>
                        <div>
                            {{-- cena --}}
                            <label for="price">Cena</label>
                            <input name="price" id="price" class="form-control" disabled>
                        </div>
                        <div>
                            {{-- za darmo --}}
                            <input type="checkbox" name="price-checkbox" id="price-checkbox" checked value="0"> Za darmo
                        </div>
                        <div>
                            {{-- stan --}}
                            <label for="price">Stan</label>
                            <input name="condition" id="condition" class="form-control">
                        </div>
                        <div>
                            {{-- marka --}}
                            <label for="brand">Marka</label>
                            <input name="brand" id="brand" class="form-control">
                        </div>
                        <div>
                            {{-- kolor --}}
                            <label for="color">kolor</label>
                            <select class="form-control" name="color">
                                @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->color }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            {{-- djęcia --}}
                            <label for="foto">Zdjęcia</label>
                            <input  class="form-control" type="file" name="file[]" multiple="true">
                        </div>
                        <hr>
                        <div>
                            {{-- telefon --}}
                            <label for="phone">Telefon</label>
                            <input name="phone" id="phone" class="form-control">
                        </div>
                        <div>
                        {{-- wyślij --}}
                            <button style="margin-top: 10px" type="submit" class="btn btn-danger">Wyślij ogłoszenie</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/select_subselect.js') }}"></script>
        <script type="application/javascript">
        $("#price-checkbox").click( function(){   
            if( $(this).is(':checked') ){
                $("#price").attr("disabled",true);
                $("#price").val("");
            }else{
                $("#price").removeAttr("disabled");
            }
         });
        </script>
    </body>

</html>