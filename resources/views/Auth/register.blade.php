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
                
                <h2 class="mb-3 h1">{{__('message.registerWebsite')}}</h2>

                <form action="{{route('register')}}" method="POST">
                    @csrf
                
                        <label for="email" class="label">{{__('message.email')}}</label>
                        <input type="email" value="{{old('email')}}" name="email">
                        <label for="text" class="label">{{__('message.username')}}</label>
                        <input type="text" value="{{old('name')}}" name="name">
        
                            <label for="password" class="label">{{__('message.password')}}</label>
                            <input type="password" name="password">
                      
                            <label for="password" class="label">{{__('message.passwordConf')}}</label>
                            <input type="password" name="password_confirmation">
                    
                        <button type="submit" class="submit mt-2">{{__('message.register')}}</button>
                        <span class="span">{{__('message.alreadyHaveAcc')}}<a href="{{route('login')}}">{{__('message.login')}}</a></span>
                    </form>
                    

            </div>
        </div>
    </div>
    
        
    </x-layout>