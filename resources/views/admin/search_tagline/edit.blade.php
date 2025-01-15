@extends('admin.layout.app')
@section('page-title', 'Edit Search Tagline')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.search-tagline.list.all') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-chevron-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.search-tagline.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="title">Title <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $data->title }}">
                                @error('title') 
                                    <p class="small text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status *</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status') 
                                    <p class="small text-danger">{{ $message }}</p> 
                                @enderror
                            </div>
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <button type="submit" class="btn btn-primary">Update Search Tagline</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script> -->

<script>
   
</script>
@endsection
