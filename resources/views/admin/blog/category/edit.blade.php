@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('categories')}}">Category</a>
      <span class="breadcrumb-item active">Edit Category </span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Update Blog Category </h5>
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Blog Category 
        </h6>

        <div class="table-wrapper">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          <form method="post" action="{{ url('update/blogcategory/'.$editblogcat->id)}}">
              @csrf
              <div class="modal-body pd-20">
                  <div class="form-group">
                      <label for="category">Category Name English</label>
                   <input type="text" class="form-control" value="{{ $editblogcat->category_name_en }}" name="category_name_en">
                  </div>
              </div><!-- modal-body -->
              <div class="modal-body pd-20">
                  <div class="form-group">
                      <label for="category">Category Name Deutch</label>
                   <input type="text" class="form-control" value="{{ $editblogcat->category_name_de }}" name="category_name_de">
                  </div>
              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
            </form>
        </div><!-- table-wrapper -->
      </div><!-- card -->

    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->


@endsection