<x-layout>
  <form class="reg">
    @csrf
    <div class="mb-3 log-revisor login">
      <h1 class="display-2 mb-5 text-center fw-bold">{{__('message.register')}}</h1>
      @if (session('message'))
      <div class="alert alert-success text-center fw-bold">
          {{ session('message') }}
      </div>
      @endif
          <label for="text" class="label fw-bolder">{{__('message.username')}}</label>
          <input type="text" class="form-control">
        <div class="mb-3">
            <label for="description" class="my-2 label fw-bolder">{{__('message.request')}}</label>
          <textarea class="form-control" name="description" cols="30" rows="5" placeholder="Scrivi il tuo Motivo"></textarea>
        </div>
        <a href="{{route('become-revisor')}}" type="submit" class="btn submit">{{__('message.sendReq')}}</a>
      </form>
</x-layout>
    
