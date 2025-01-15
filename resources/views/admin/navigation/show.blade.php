@extends('admin.layout.app')
@section('page-title', 'Navigation Menu Details')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.navigation.list.all') }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-chevron-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <p>{{ $navigation->title }}</p>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <p>{{ $navigation->status == 1 ? 'Active' : 'Inactive' }}</p>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('admin.navigation.edit', $navigation->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
