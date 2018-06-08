@if(count($adverts) > 0) 
    @foreach($adverts as $advert)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <div class="card">
                    <h6 class="card-header">{{ $advert->title }}
                        <span class="badge badge-danger">Nowe</span>
                        Dodano: {{ $advert->created_at, 10 }}
                    </h6>
                    <div class="card-body">
                        <p class="card-text">{{ str_limit($advert->description, 300) }} </p>
                        <p class="card-text">
                        
                        {{-- sprawdzenie czy podano cenę --}} 
                        @if($advert->price) 
                            Cena: {{ $advert->price }} zł</p>
                        @else 
                            Cena: Za darmo 
                        @endif
                            <a href="{{ route('adverts.show', $advert->id) }}" class="btn btn-outline-danger">Zobacz</a>
                    </div>
                </div>  
                </div>   
            </div>
            <p></p>
        </div>
    @endforeach 
        {{ $adverts->links() }} 
@endif
