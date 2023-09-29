<x-layout>
    
    <div class="container-fluid">
        <div class="row header align-items-center">
            <div class="col-12 text-center">
                <h1 class="position-relative">Journey through 
                    
                    <span class="P">P</span><span>resto</span>
                </h1>
            </div>
        </div>
    </div>
    @if (session('access.denied'))
    <div class="alert alert-danger text-center fw-bold">
        {{ session('access.denied') }}
    </div>
    @endif
    @if (session('message'))
    <div class="alert alert-success text-center fw-bold">
        {{ session('message') }}
    </div>
    @endif
    <div class="container annRec">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mt-5 text-center fw-bold display-1">{{__('message.annRecenti')}}</h2> 
            </div>
            <div class="col-12 col-md-8">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($announcements as $announcement)
                        <div class="carousel-item mt-4 @if ($loop->first) active @endif">
                            <div class="card mx-auto shadow">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200/300'}}" class="card-img-top p-3 rounded picture h-custom" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}€</p>
                                    <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn5 shadow">{{__('message.seeMore')}}</a>
                                    <a href="{{route('categoryShow', ['category'=> $announcement->category])}}" class="my-2 card-link shadow btn btn5">{{__('message.category')}} {{$announcement->category->name}}</a>
                                    <p class="card-footer">{{__('message.publish')}} {{$announcement->created_at->format('d/m/Y')}}</p>
                                    
                                </div>
                                
                            </div>
                        </div>
                        @endforeach  
                        
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
