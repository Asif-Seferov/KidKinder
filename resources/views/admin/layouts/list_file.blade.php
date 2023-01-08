@foreach(App\Models\Files::orderBy('id', 'desc')->paginate(20) as $file)
                        
                            <img src="{{asset('storage/uploads/' . $file->name)}}" id="files{{$file->id}}" alt="image" class="file-img" style="width: 100px; height: 100px; padding: 5px; cursor:pointer;">
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm delete-file" id="delete{{$file->id}}" data-id="{{$file->id}}"><i class="fas fa-trash-alt"></i></a> 
                                          
@endforeach