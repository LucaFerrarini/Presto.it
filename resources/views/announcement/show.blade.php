<x-layout>
<div class="container-fluid p-5 shadow mb-4">
    <div class="row">
        <div class="col-12 text-light p-5">
            <h1 class="display-2 text-center text-black fw-bold">{{__('message.annuncio')}} {{$announcement->title}}</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="showCarousel" class="card carousel slide" data-bs-ride="carousel">
                @if($announcement->images)
                <div class="carousel-inner">
                    @foreach ($announcement->images as $image)
                    <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200/300'}}" class="img-fluid p-3 rounded h-custom" alt="">
                    </div>
                    @endforeach
                </div>
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
                <button class="carousel-control-next" type="button" data-bs-target="#showCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                <button class="carousel-control-prev" type="button" data-bs-target="#showCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <div>
                    <h5 class="card-title">{{__('message.title')}} {{$announcement->title}}</h5>
                    <p class="card-text">{{__('message.description')}} {{$announcement->body}}</p>
                    <p class="card-text">{{__('message.price')}} {{$announcement->price}}€</p>
                    <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-2 card-link shadow btn btn5">{{__('message.category')}} {{$announcement->category->name}}</a>
                    <p class="card-footer">{{__('message.publish')}} {{$announcement->created_at->format('d/m/Y')}} {{--  - {{__('message.author')}} --}} {{$announcement->user->name ?? ''}}</p>
                </div>
            </div>
        </div>
    </div>
</div>


</x-layout>