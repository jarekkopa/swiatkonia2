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

                    <form action="{{ action('AdvertsController@store') }}" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" /> {{-- tytuł --}}
                        <label for="title">Tytuł ogłoszenia</label>
                        <input name="title" id="title" placeholder="Podaj tytuł ogłoszenia" size="50" class="form-control"> {{-- treść --}}
                        <label for="description">Treść ogłoszenia</label>
                        <textarea name="description" id="description" placeholder="Podaj treść ogłoszenia" class="form-control"></textarea>

                        {{-- województwa --}}
                        <label for="region">Województwo</label>
                        <select class="form-control" name="region">
                            @foreach($regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <label for="category">Kategoria</label>
                        <select name="category" class="form-control">
                            <option value="">--Wybierz kategorię--</option>
                            @foreach ($categories as $category => $value)
                            <option value="{{ $category }}"> {{ $value }}</option>
                            @endforeach
                        </select>
                        <label for="subcategory">Podkategoria</label>
                        <select name="subcategory" class="form-control">
                            <option>--Wybierz podkategorię--</option>
                        </select>
                        {{-- cena --}}
                        <label for="price">Cena</label>
                        <input name="price" id="price" class="form-control">
                        <hr>
                        <h5>DANE KONTAKTOWE</h5>
                        {{-- TELEFON --}}
                        <label for="phone">Telefon</label>
                        <input name="phone" id="phone" class="form-control">

                        <button type="submit" class="btn btn-danger">Wyślij</button>
                    </form>

                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/select_subselect.js') }}"></script>
    </body>

</html>