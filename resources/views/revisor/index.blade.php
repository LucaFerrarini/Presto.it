<x-layout>
    <div class="container-fluid text-center p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2 text-black">
                    {{$announcement_to_check ? 'Annunci da revisionare' :'Non ci sono annunci da revisionare'}}
                </h1>
            </div>
        </div>
    </div>
    @if($announcement_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">

                        @if ($announcement_to_check->images->isNotEmpty())
                        @foreach ($announcement_to_check->images as $image)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="mb-3">
                                <div class="row p-2 card2 mx-auto">
                                    
                                    <div class="col-12 col-md-6 text-center imgRev">
                                        <img src="{{$image->getUrl(400,300)}}" class="img-fluid p-3 rounded" alt="...">
                                    </div>
                                    
                                    
                                    <div class="col-md-3 text-start tags mt-5">
                                        <h5 class="card-title mb-2">{{__('message.title')}}{{$announcement_to_check->title}}</h5>
                                        <p class="card-title mb-2">{{__('message.description')}} {{$announcement_to_check->body}}</p>
                                        <p class="card-footer mb-2">{{__('message.publish')}}{{$announcement_to_check->created_at->format('d/m/Y')}}</p>
                                        <h5 class="tc-accent mt-3">Tags:</h5>
                                        <div class="p-1">
                                            @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                            <p class="d-inline">{{$label}},</p>
                                            @endforeach
                                            @endif 
                                        </div>
                                    </div>
                                    <div class="col-md-3 d-flex align-items-center ms-3">
                                        <div class="card-body">
                                            <h5 class="tc-accent mt-4 mb-5">Revisione Immagini:</h5>
                                            <div class="">
                                                
                                                <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                                <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                                <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                                <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                                <p>Contenuto Esplicito: <span class="{{$image->racy}}"></span></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/id/1/200/300" alt="img-fluid p-3 rounded">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/1/200/300" alt="img-fluid p-3 rounded">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/id/1/200/300" alt="img-fluid p-3 rounded">
                            </div>
                        </div>
                        @endif
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
    
    <div class="container">
        <div class="row align-items-end  justify-content-center">
            <div class="col-12 col-md-2">
                <form action="{{route('revisor.reject_announcement', ['announcement'=>$announcement_to_check])}}" method="POST" >
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn4 btn-danger shadow mb-2">{{__('message.refuse')}}</button>
                </form>
            </div>
            <div class="col-12 col-md-2  ">
                <form action="{{route('revisor.accept_announcement', ['announcement'=>$announcement_to_check])}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn4 btn-success shadow mb-2">{{__('message.accept')}}</button>
                </form>
            </div>
        </div>
    </div>
    
    
    @endif
        
    </x-layout>
    
    