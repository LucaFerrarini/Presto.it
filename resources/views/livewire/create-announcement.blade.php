<div>
    <div class="container-fluid my-5">
        <div class="row h-100 createAnn justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="text-center">{{__('message.creaAnn')}}</h1>

                @if(session()->has('message'))
                <div class="flex flex-row justify-center my-2 alert alert-success">
                  {{session('message')}}
                </div>
                @endif
                
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form wire:submit.prevent='store'>
                    @csrf
                    <div class="mb-2 input-span2">
                      <label for="title" class="label">{{__('message.title')}}</label>
                      <input type="text" wire:model="title" @error('title') is-invalid @enderror id="title" >
                      @error('title')
                      {{$message}}
                      @enderror
                    </div>
                    
                    <div class="mb-1 input-span2">
                        <label for="body" class="label">{{__('message.description')}}</label><br>
                        <textarea name="body" id="body" wire:model="body" @error('body') is-invalid @enderror cols="30" rows="3"></textarea>
                        @error('body')
                        {{$message}}
                        @enderror
                      </div>
                      <div class="mb-2 input-span2">
                        <label for="price" class="label">{{__('message.price')}}</label>
                        <input type="number" wire:model="price" @error('price') is-invalid @enderror class="form-control" id="price" >
                        @error('price')
                        {{$message}}
                        @enderror
                      </div>
                      <div class="mb-2 input-span2">
                        <input type="file" name="images" wire:model="temporary_images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img">
                        @error('temporary_images.*')
                        <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                      </div>
                      @if (!empty($images))
                    <div class="row">
                      <div class="col-12">
                        <p>{{__('message.preview')}}</p>
                        <div class="row border border-4 border-info rounded shadow py-4">
                          @foreach($images as $key => $image)
                          <div class="col my-2">
                            <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('message.cancel')}}</button>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    @endif
                      <div class="mb-2 input-span2">
                        <label for="category" class="label">{{__('message.category')}}</label>
                        <select wire:model.defer="category" id="category" class="form-control">
                          <option value="">{{__('message.choose')}}</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                     <button type="submit" class="btn submit w-50">{{__('message.creaAnn')}}</button>
                  </form>
                </div>
              </div>
    </div>
   
</div>
  