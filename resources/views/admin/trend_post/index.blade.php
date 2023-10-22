@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
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
                  <th>View Count</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($post as $item)
                <tr >
                    <td>{{$item['post_id']}}</td>
                    <td>{{$item['title']}}</td>
                    <td>{{$item['description']}}</td>
                    <td><img width="150px" class="rounded shadow py-3"
                        @if ($item['image']==null) src="{{asset('default/default.png')}}"
                        @else  src="{{asset('postImage/'.$item['image'])}}">
                        @endif
                    </td>
                    <td>
                        {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                        <i class="fa-solid fa-eye"></i> {{ $item["post_count"] }}
                      </td>
                    <td>
                        <a href="{{route('admin#trendPostDetails',$item['post_id'])}}"><button class="btn btn-sm bg-info text-white"><i class="fa-solid fa-circle-info"></i></button></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-end mr-3">
                {{-- {{ $post->links() }} --}}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>
@endsection
