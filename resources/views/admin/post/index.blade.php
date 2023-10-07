@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
                <div class="card-body">
                    <form action="{{route('admin#createPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input name="postTitle" type="text" placeholder="Enter Your Post Title" class="form-control">
                        @error('postTitle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea  name="postDescription" type="text" cols="30" rows="10"class="form-control" placeholder="Enter Your Post Description"></textarea>
                        @error('postDescription')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="postImage" class="form-control">
                    </div>
                    <div class="form-group">
                            <select name="postDescriptionName" class="form-control">
                                <option value="">Choose Category</option>
                                @foreach ($category as $item)
                                <option value="{{$item['category_id']}}">{{$item['title']}}</option>
                                @endforeach
                            </select>
                            @error('postDescriptionName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button class="btn btn-info" type="submit">Post</button>
                </form>
                </div>


        </div>
    </div>
    <div class="col-8">
        <div class="col-4">
            {{-- Alert Message Start --}}
            @if (Session::has('accountDelete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('accountDelete')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true" class="text-white">&times;</span>
                </button>
            </div>
            @endif
            {{-- Alert Message End --}}
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List Table</h3>

            <div class="card-tools">
            <form action="{{route('admin#categorySearchList')}}" method="POST">
                @csrf
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="nameSearchKey" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
            </form>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
              <thead>
                <tr>
                  <th>Post ID</th>
                  <th>Post Title</th>
                  <th>Post Description</th>
                  <th>Image</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($post as $item)
                <tr>
                    <td>{{$item['post_id']}}</td>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['description']}}</td>
                    <td><img width="100px" height="80px"
                        @if ($item['image']==null) src="{{asset('default/default.png')}}"
                        @else  src="{{asset('postImage/'.$item['image'])}}">
                        @endif
                    </td>
                    <td>
                        {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                        <a href="{{ route('admin#categoryEditPage',$item['post_id'])}}">
                          <button class="btn btn-sm bg-warning text-white"><i class="fas fa-edit"></i></button>
                        </a>
                      </td>
                    <td>
                      {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                      <a href="{{ route('admin#deletePost',$item['post_id'])}}">
                        <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>
@endsection


