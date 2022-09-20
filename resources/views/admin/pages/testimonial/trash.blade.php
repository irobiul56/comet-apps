@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">All Testimonial </h4> 
                    <a href="{{route('testimonials.index')}}" class="btn btn-sm btn-success">Published Testimonial <i class="fa fa-arrow-right"></i></a>
                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Company</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($testimonials as $item)   
                                    <tr>
                                        <td>{{$loop -> index + 1}}</td>
                                        <td>{{$item -> client}}</td>
                                        <td>{{$item -> company}}</td>
                                        <td>{{$item -> created_at -> DiffForHumans()}}</td>

                                    

                                         <td>
                                                
                                                    {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-warning" href="{{route('admin-user.edit', $item -> id)}}"><i class="fa fa-edit"></i></a> --}}

                                                    {{-- Trash --}}
                                                    <a class="btn btn-sm btn-success" href="{{route('testimonials.trash', $item -> id)}}">Restore</i></a>
                                                    <form action="{{route('testimonials.destroy', $item -> id)}}" method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" href="#">Permanently Delete</i></button>
                                                    </form>
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
                        <h4 class="card-title">Add New Testimonial</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('testimonials.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Text</label>
                                <input name="text" type="text" value="{{old('text')}}" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Client</label>
                              <input name="client" type="text" value="{{old('client')}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Company</label>
                                <input name="company" type="text" value="{{old('company')}}" class="form-control">
                              </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
@endsection