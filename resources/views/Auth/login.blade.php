<x-layout>
    
    <div class="container vh-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-8 col-md-6">
                @if ($errors->any())
                <div class="alert error">
                        @foreach ($errors->all() as $error)
                        <div>
                            <span class="error__icon">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            </span>
                            <span class="error__title">{{ $error }}</span>
                        </div>
                        @endforeach
                </div>
                @endif
                
                <h2 class="mb-3 h1">{{__('message.loginWebsite')}}</h2>

                <form class="form" action="{{route('login')}}" method="POST">
                    @csrf
                    <span class="input-span">
                        <label for="email" class="label">{{__('message.email')}}</label>
                        <input type="email" value="{{old('email')}}" name="email" id="email"></span>
                        <span class="input-span">
                        <label for="password" class="label">{{__('message.password')}}</label>
                        <input type="password" name="password" id="password"></span>
                        <button class="submit" type="submit">{{__('message.login')}}</button>
                        <span class="span">{{__('message.notHaveAcc')}} <a href="{{route('register')}}">{{__('message.register')}}</a></span>

                    </form>
            </div>
        </div>
    </div>
        
        
    </x-layout>