<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    public $title;
    public $body;
    public $price;
    public $category;
    public $validate;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $announcement; 



    protected $rules = [
        'title' => 'required|min:5',
        'body' => 'required|min:10',
        'price'=>'required|numeric',
        'category' => 'required',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];

    protected $messeges=[
        'required'=>'Il campo:attribute è richiesto',
        'min'=>'Il campo:attribute è troppo corto',
        'numeric'=>'Il campo:attribute dev\' eseere un numero',
        'temporay_images.required' =>'L\'immagine è richiesto',
        'temporary_image.*'=> 'I file devono essere immagini',
        'temporary_images.*.max'=>'L\'immagine dev\'essere massimo di 1mb',
        'images.img'=>'L\'immagine dev\'essere un \'immagine',
        'images.max'=> 'L\'immagine dev\'essere massimo di 1mb',

    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])){
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }


    public function store(){
        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
         if(count($this->images)){
            foreach ($this->images as $image){
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path,400,300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));

        }
        session()->flash('message', 'Articolo inserito con successo sarà publicato dopo la revisione');
        $this->cleanForm();
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function cleanForm(){
        $this->title='';
        $this->body='';
        $this->price='';
        $this->category='';
        $this->temporary_images = [];
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
