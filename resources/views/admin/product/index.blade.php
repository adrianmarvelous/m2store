@extends('admin.index')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card p-4">
        <div class="d-flex justify-content-between">
            <h1>Product List</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create New Product <i class="bx bx-plus-circle"></i>
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      </button>
                  </div>
                  <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                      <label for="">Product Name</label>
                      <input class="form-control mt-3" type="text" name="nama">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($product as $index => $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-detail me-1"></i>Detail</a>
                                <a class="dropdown-item" href="{{ route('products', ['slug' => $item->slug]) }}"><i class="bx bx-window me-1"></i>View Page</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
