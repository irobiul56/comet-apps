@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">All Sliders </h4> 
                    <a href="{{route('show.trash.slider')}}" class="btn btn-sm btn-danger">Trash Slider <i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($clients as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> name}}</td>
                                        <td>
                                            <img style="width: 50px; object-fit: cover;  border-radius: 50%" src="{{url('storage/clients/' . $item -> logo)}}" alt="">
                                        </td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                        <td>

                                            @if($item -> status)
                                                <span class="badge badge-success">Published</span>
                                                <a class="text-danger" href="{{route('slider.status.update', $item -> id)}}"><i class="fa fa-times"></i></a>
                                            @else
                                                <span class="badge badge-danger">Unpublished</span>
                                                <a class="text-success" href="{{route('slider.status.update', $item -> id)}}"><i class="fa fa-check"></i></a>
                                            @endif

                                        </td>

                                        <td>
                                            {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a> --}}
                                            <a class="btn btn-sm btn-warning" href="{{route('sliders.edit', $item -> id)}}"><i class="fa fa-edit"></i></a>
                                            {{-- Trash --}}
                                            
                                            @if ($form_type == 'create')
                                             <a class="btn btn-sm btn-danger" href="{{route('slide.trash', $item -> id)}}"><i class="fa fa-trash"></i></a>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            @if ($form_type == 'create')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Client</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" value="{{old('name')}}" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Logo</label>
                              <br>
                              <br>
                              <img style="width: 100%;" id="slider-photo-preview" src="" alt="">
                              <br>
                              <br>
                              <input style="display: none;" name="logo" type="file" class="form-control" id="slider-photo">
                              <label for="slider-photo">
                               <img style="width: 100px; cursor: pointer;" src="https://icon-library.com/images/album-icon/album-icon-3.jpg" alt="">
                              </label>
                            </div>

                        

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            {{-- @if ($form_type == 'edit')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Slide</h4>
                </div>
                <div class="card-body">
                 @include('validate')
                    <form action="{{route('sliders.update', $slide -> id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" type="text" value="{{$slide -> title}}" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>Sub Title</label>
                          <input name="subtitle" type="text" value="{{$slide -> subtitle}}" class="form-control">
                        </div>

                        <div class="form-group">
                          <label>photo</label>
                          <br>
                          <br>
                          <img style="width: 100%;" id="slider-photo-preview" src="{{url('storage/sliders/' . $slide -> photo)}}" alt="">
                          <br>
                          <br>
                          <input style="display: none;" name="photo" type="file" class="form-control" id="slider-photo">
                          <label for="slider-photo">
                           <img style="width: 100px; cursor: pointer;" src="https://icon-library.com/images/album-icon/album-icon-3.jpg" alt="">
                          </label>
                        </div>

                        <div class="form-group slider-btn-otp">

                            @foreach (json_decode($slide -> btns) as $btn)
                            <div class="btn-otp-area">
                                <span>Button #</span>
                                <input class="form-control" type="text" name = "btn_title[]" value="{{$btn -> btn_title}}" placeholder="Button Title">
                                <input class="form-control" type="text" name = "btn_link[]" value="{{$btn -> btn_link}}" placeholder="Button Link">
                                <select class="form-control" name="btn_type[]">
                                    <option @if ($btn -> btn_type === 'btn-light-out') selected @endif value="btn-light-out">default</option>
                                    <option @if ($btn -> btn_type === 'btn-color btn-full') selected @endif value="btn-color btn-full">Red</option>
                                </select>
                                </div>
                            @endforeach

                          <a id="add-new-btn-slider" class="btn btn-sm btn-info" href="#">Add New Button</a>
                        
                                
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif --}}
            

        </div>
    </div>
    
@endsection