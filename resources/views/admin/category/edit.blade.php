@extends('admin.layouts.default')

@section('title', 'Edit Category')

@section('content')

            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Edit Category</h3>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>  
                                <li class="breadcrumb-item active" aria-current="page">
                                Edit Category
                                </li>
                            </ol>
                        </div>

                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row"> <!--begin::Col-->
                        
                        <div class="col-md-12">
                        <!--Form::Add Category-->
                        <div class="card card-warning card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">Edit category: <strong>{{ $category->title }}</strong></div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form method="post" action="{{ route('admin.categories.update', ['category' => $category->id]) }}"> <!--begin::Body-->
                                @csrf
                                @method('PUT')
                                    <div class="card-body">

                                        <div class="row mb-3"> <label for="title" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10"> <input type="text" name="title" value="{{ $category->title }}" class="form-control" id="title"> </div>
                                        </div>

                                        <div class="row mb-3"> <label for="meta_desc" class="col-sm-2 col-form-label">Meta description</label>
                                            <div class="col-sm-10"> <input type="text" name="meta_desc" value="{{ $category->meta_desc }}" class="form-control" id="meta_desc"> </div>
                                        </div>
                                        
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer"> 
                                        <button type="submit" class="btn btn-warning">Apply</button> 
                                    </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div>

                        </div>

                    </div> <!--end::Row--> 
                </div> <!--end::Container-->
            </div> <!--end::App Content-->

@endsection