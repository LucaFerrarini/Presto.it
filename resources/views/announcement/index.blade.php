<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <p class="display-2 my-2 mb-5 mt-5 fw-bold">{{__('message.eccoNostriAnn')}}</p>
                <div class="row">
                    @forelse ($announcements as $announcement)
                    <div class="col-12 col-md-4  h-100 mt-5">
                        <div class="card shadow" data-aos="fade-down">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/500/900'}}" class="picture card-img-top p-3 rounded h-custom" alt="...">
                            <div class="picture card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->body}}</p>
                                <p class="card-text">{{$announcement->price}}€</p>
                                <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn5 shadow">{{__('message.seeMore')}}</a>
                                <a href="{{route('categoryShow', ['category'=> $announcement->category])}}" class="my-2 card-link shadow btn btn5">{{__('message.category')}} {{$announcement->category->name}}</a>
                                <p class="picture card-footer">{{__('message.publish')}}    {{$announcement->created_at->format('d/m/Y')}}
                                {{-- - {{__('message.author')}} --}} {{$announcement->user->name ?? ''}}</p> 
                                
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning py-3 shadow">
                            <p class="lead">{{__('message.noAnn')}}</p>
                        </div>
                    </div>
                    @endforelse
                    <div class="d-flex justify-content-center"> 
                        {{-- crea un piccolo menù per navigare tra i vari annunci --}}
                        {{$announcements->links()}}

                    </div>
                </div>

            </div>
        </div>
    </div>

</x-layout>