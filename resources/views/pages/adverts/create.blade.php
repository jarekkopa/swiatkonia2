<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}" />
    <script src="{{url('assets/js/components/bootstrap.js')}}"></script>

    <title>Dodaj ogłoszenie jeździeckie  kategorii akcesoria jeździeckie</title>

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

                    <form action="{{ action('EquipmentAdvertsController@store') }}" method="POST" enctype="multipart/form-data">
                        {{-- token --}}
                        <div>
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" /> {{-- tytuł --}}
                        </div>
                        {{-- tytuł --}}
                        <div class="form-group row">      
                            <label for="title" class="col-sm-2 col-form-label">Tytuł ogłoszenia</label>
                            <div class="col-sm-10">
                                <input  name="title" id="title" placeholder="Podaj tytuł ogłoszenia" size="50" class="form-control">
                                <small id="titleHelpBlock" class="form-text text-muted">Pole obowiązkowe</small>
                            </div>
                        </div>  
                        <div class="form-group row">      
                            <label for="description" class="col-sm-2 col-form-label">Treść ogłoszenia</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="title" placeholder="Podaj tytuł ogłoszenia" size="50" class="form-control"></textarea>
                                <small id="descriptioneHelpBlock" class="form-text text-muted">Pole obowiązkowe</small>
                            </div>
                        </div> 
                        <div>
                         {{-- kategoria --}}
                         <div class="form-group row">      
                            <label for="category" class="col-sm-2 col-form-label">Kategoria</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control">
                                    <option value="">--Wybierz kategorię--</option>
                                    @foreach ($categories as $category => $value)
                                    <option value="{{ $category }}"> {{ $value }}</option>
                                    @endforeach
                                </select>
                                <small id="categoryHelpBlock" class="form-text text-muted">Pole obowiązkowe</small>
                            </div>
                        </div> 
                        {{-- podkategoria --}}
                        <div class="form-group row">      
                            <label for="subcategory" class="col-sm-2 col-form-label">Podkategoria</label>
                            <div class="col-sm-10">
                                <select name="subcategory" class="form-control">
                                    <option>--Wybierz podkategorię--</option>
                                </select>
                            </div>
                        </div> 
                        {{-- cena --}}
                        <div class="form-group row">      
                            <label for="price" class="col-sm-2 col-form-label">Cena</label>
                            <div class="col-sm-10">
                                <input name="price" id="price" class="form-control" disabled>
                                <input type="checkbox" name="price-checkbox" id="price-checkbox" checked value="0"> Za darmo
                            </div>
                        </div> 
                        {{-- stan --}}
                        <div class="form-group row">      
                            <label for="condition" class="col-sm-2 col-form-label">Stan</label>
                            <div class="col-sm-10">
                                <input name="condition" id="condition" class="form-control">
                                <small id="conditionelpBlock" class="form-text text-muted">Pole obowiązkowe</small>
                            </div>
                        </div> 
                        {{-- marka  --}}
                        <div class="form-group row">      
                            <label for="brand" class="col-sm-2 col-form-label">Marka</label>
                            <div class="col-sm-10">
                                <input name="brand" id="brand" class="form-control">
                                <small id="brandHelpBlock" class="form-text text-muted">Pole obowiązkowe</small>
                            </div>
                        </div> 
                        {{-- kolor --}}
                        <div class="form-group row">      
                            <label for="color" class="col-sm-2 col-form-label">Kolor</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="color">
                                    @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        {{-- zdjęcia --}}
                        <div class="form-group row">      
                            <label for="foto" class="col-sm-2 col-form-label">Zdjęcia</label>
                            <div class="col-sm-10">
                                <input  class="form-control" type="file" name="file[]" multiple="true">
                                <small id="regionHelpBlock" class="form-text text-muted">Akceptowane są pliki JPG, PNG</small>
                            </div>
                        </div> 
                        {{-- województwa --}}
                        <div class="form-group row">      
                            <label for="region" class="col-sm-2 col-form-label">Województwo</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="region">
                                    @foreach($regions as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                                </select>
                                <small id="regionHelpBlock" class="form-text text-muted">Pole obowiązkowe</small>
                            </div>
                        </div> 
                        {{-- telefon --}}
                        <div class="form-group row">      
                            <label for="phone" class="col-sm-2 col-form-label">Telefon</label>
                            <div class="col-sm-10">
                                <input name="phone" id="phone" class="form-control">
                            </div>
                        </div> 
                        {{-- wyślij --}}
                        <div class="form-group row">      
                            <label for="send" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button style="margin-top: 10px" type="submit" class="btn btn-danger">Wyślij ogłoszenie</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/select_subselect.js') }}"></script>
        <script src="{{ asset('js/price_checkobox.js') }}"></script>
    </body>

</html>