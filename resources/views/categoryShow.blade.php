<x-layout>
    
    <div class="container-fluid p-5 shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2 text-center text-black fw-bolder">{{__('message.exploreCat')}} {{$category->name}}</h1>
            </div>
        </div>
    </div>            
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->announcements as $announcement)
                    <div class="col-12 col-md-4 my-2">
                        <div class="card shadow" data-aos="fade-down">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,300) : 'https://picsum.photos/200/300'}}" class="card-img-top p-3 rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{$announcement->body}}</p>
                                <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn5 mb-2 shadow">{{__('message.seeMore')}}</a>
                                <p class="card-footer">{{__('message.publish')}} {{$announcement->created_at->format('d/m/Y')}} {{-- - {{__('message.author')}}--}} {{$announcement->user->name ?? ''}}</p>   
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <p class="h1 text-bold">{{__('message.noAnn2')}}</p>
                        <p class="h2 text-bold">{{__('message.publishOne')}} <a href="{{route('announcement.create')}}" class="btn btn-success shadow">{{__('message.newAd')}}</a></p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layout>