 @if(count($adverts) > 0) @foreach($adverts as $advert)
<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-12 box-shadow">
                        <{{ $advert->title }}
                            <div class="card-body">
                                <p class="card-text">
                                    <strong>{{ $advert->title }}</strong>
                                </p>
                                <hr>
                                <p class="card-text">{{ str_limit($advert->description, 300) }} </p>
                                <p0>
                                    @if($advert->price) <strong>Cena: </strong><span class="badge badge-danger">{{ $advert->price }} zł</span>
                                    @else <strong>Cena:</strong> <span class="badge badge-danger">za darmo</span> @endif    

                                    <strong>Kategoria:</strong> <span class="badge badge-success">
                                    @foreach($categories as $category)
                                        @if($advert->category == $category->id)
                                            {{ $category->name }}
                                        @endif
                                    @endforeach
                                </span>       
                            </p>
                            </p>
                                <p class="card-text">
                                    @foreach($pictures as $picture) @if( $advert->id == $picture->advertId )
                                    <a href="{{ Storage::url('images/'.$picture->fileName) }}" class="image-popup-vertical-fit">
                                        <img class="rounded" src="{{ Storage::url('images/'.$picture->fileName) }} " style="max-height: 60px">
                                    </a>
                                    @endif @endforeach
                                </p>    
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="btn-group">
                                        <a href="{{ route('adverts.show', $advert->id) }}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">Dodano: {{ $advert->created_at, 10 }}</small>
                                </div>
                            </div>
                    </div>
                </div>



            </div>
        </div>
        <p></p>
    </div>
    @endforeach {{ $adverts->links() }} @endif