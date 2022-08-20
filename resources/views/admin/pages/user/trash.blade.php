@extends('admin.layouts.app')

@section('main-section')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Trash Users</h4> 
                    <a href="{{route('admin-user.index')}}" class="btn btn-success">Published User <i class="fa fa-arrow-right"></i></a>

                </div>
                @include('validate-main')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 data-table-search">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($all_data as $item)
                                    @if ($item -> name !== 'Provider')
                                        <tr>
                                            <td>{{$loop -> index + 1}}</td>
                                            <td>{{$item -> name}}</td>
                                    
                                            <td>
                                            
                                                @if ($item -> photo == 'avater.png')
                                                   <img style="width: 60px; height:60p; object-fit:cover" src="https://ps.w.org/user-avatar-reloaded/assets/icon-256x256.png?rev=2540745" alt=""> 
                                                @endif
                                            
                                            </td>
                                            <td>{{$item -> created_at -> diffForHumans()}}</td>
                                        
                                            <td>

                                                
                                                {{-- <a class="btn btn-sm btn-info" href="#"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-sm btn-warning" href="{{route('admin-user.edit', $item -> id)}}"><i class="fa fa-edit"></i></a> --}}

                                                {{-- Trash --}}
                                                <a class="btn btn-sm btn-success" href="{{route('admin.trash.update', $item -> id)}}">Restore</i></a>
                                                <form action="{{route('admin-user.destroy', $item -> id)}}" method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" href="#">Permanently Delete</i></button>
                                                </form>

                                            </td>
                                        </tr>   
                                    @endif
                                @empty
                                    <tr>
                                        <td class="text-center text-danger" colspan="5">No Records Found</td>
                                    </tr>
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
                        <h4 class="card-title">Add New User</h4>
                    </div>
                    <div class="card-body">
                     @include('validate')
                        <form action="{{route('admin-user.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Email</label>
                              <input name="email" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Cell</label>
                              <input name="cell" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Username</label>
                              <input name="username" type="text" class="form-control">
                            </div>

                            <div class="form-group">
                              <label>Role</label>
                              <select name="role" id="" class="form-control">
                                    <option value="">-- Select --</option>
                                 @foreach ($roles as $role)
                                     <option value="">{{$role -> name}}</option>
                                 @endforeach
                              </select>
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
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Edit Permission</h4>
                        <a class="btn-sm btn-info" href="{{route('admin-user.index')}}">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('permission.update', $edit -> id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @include('validate')
                                <label>Name</label>
                                <input name="name" type="text" value="{{$edit -> name}}" class="form-control">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif --}}
            

        </div>
    </div>
    
@endsection