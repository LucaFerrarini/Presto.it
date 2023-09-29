<nav id="navbar" class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('welcome')}}"><img id="P"
      src="/img/P.png" alt="Presto Logo"
      height="60" /></a>
      
    
      <button type="button" class="btn btn-danger d-block d-lg-none mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa-solid fa-magnifying-glass colore-icon"></i>
      </button>
      
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-bars "></i>
    </button>
         
    
    {{-- Collapsible wrapper --}}
    <div class="collapse navbar-collapse tog" id="navbarSupportedContent">
      {{-- Left links --}}
      <ul class="navbar-nav  ">
        
        <li class="nav-item ">
          <a class="nav-link" href="{{route('announcement.index')}}">{{ __('message.annunci')}}</a>
        </li>
        
        <li class="dropdown nav-item">
          <a class=" btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
          aria-expanded="false" >
          {{__('message.categorie')}}
        </a>
        <ul class="dropdown-menu dropdown-menu-light fa-ul">
          @if (app()->getLocale()=='en')
          
          @foreach ($categories as $category)
          <li><a class="dropdown-item fw-bold " href="{{route('categoryShow', compact('category'))}}">{{($category->name_en)}}</a></li>
          @endforeach
          
          
          @elseif(app()->getLocale()=='ar')
          
          
          @foreach ($categories as $category)
          <li><a class="dropdown-item fw-bold" href="{{route('categoryShow', compact('category'))}}">{{($category->name_ar)}}</a></li>
          @endforeach

          @else
            
          @foreach ($categories as $category)
          <li><a class="dropdown-item fw-bold" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
          @endforeach    
          @endif
        </ul>  
      </li>
      
      
      
    </ul>
    <form action="{{route('announcements.search')}}" method="GET" class="search d-none d-md-flex mx-auto w-25 ">
      <input id="input" type="search" name="searched" class="rounded-start-pill form-control" placeholder="Search" aria-label="Search" />
      <button id="btn" class="btn btn-outline-danger rounded-end-pill" type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>
    {{-- right links --}}
    <ul class="navbar-nav">
      
      @auth
      
      <ul class="navbar-nav ms-3">
        
        <li class="nav-item me-4 w-auto">
          <a class="nav-link" href="{{route('announcement.create')}}">
            {{__('message.inserisciAnn')}}
            <i class="fa-solid fa-square-plus"></i>
          </a>
        </li>
        
        @endauth
        <div class="nav-item dropdown-center me-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @guest
            Account
            @else
            {{Auth::user()->name}}
            @if (Auth::user()->is_revisor)
            <span class="position-absolute top-0 strat-100 translate-middle badge rounded-pill bg-danger">{{App\Models\Announcement::toBeRevisionedCount()}}
              <span class="visually-hidden ">unread message</span></span>
              @endif
            @endguest
          </a>
          <ul class="dropdown-menu">
            @guest
            <li><a class="dropdown-item fw-bold" href="{{route('login')}}">{{__('message.login')}}</a></li>
            <li><a class="dropdown-item fw-bold" href="{{route('register')}}">{{__('message.register')}}</a></li>
            @else
            @if (Auth::user()->is_revisor)
              <li>
              <a class="dropdown-item position-relative fw-bold" href="{{route('revisor.index')}}">
                {{__('message.revisor')}}
                </li>
                @endif
                <li><a class="dropdown-item fw-bold" href="/logout" onclick="event.preventDefault(); getElementById('form-logout').submit();">
                {{__('message.logout')}}</a></li>
                <form id="form-logout" action="{{route('logout')}}" method="POST" class="d-none">
                  @csrf
                </form>
                @endguest
              </ul>
              </div>
            <div class="dropdown-center">
              <a class="btn fw-bold dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                {{__('message.lang')}}
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-item text-center">
                  <x-_locale lang="it" />
                </li>
                <li class="dropdown-item text-center">
                  <x-_locale lang="en" />
                </li>
                <li class="dropdown-item text-center">
                  <x-_locale lang="ar" />
                </li>
              </ul>
            </div>
            
          </ul>
      
    </ul>
    
    
      </div>
 
    
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>



  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body  ">
        <form action="{{route('announcements.search')}}" method="GET" class="search  position-relative d-md-none mx-auto ">
          <input id="input" type="search" name="searched" class="rounded-start-pill form-control" placeholder="Search" aria-label="Search" />
          <button  class="btn btn-outline-danger rounded-end-pill  " type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
            
          </button>
        </form>
      </div>
     
    </div>
  </div>
</div>