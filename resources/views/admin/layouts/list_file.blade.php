@foreach(App\Models\Files::orderBy('id', 'desc')->paginate(20) as $file)
                        <img src="{{asset('storage/uploads/' . $file->name)}}" alt="image" style="width: 100px; height: 100px; padding: 5px; cursor:pointer;">
@endforeach