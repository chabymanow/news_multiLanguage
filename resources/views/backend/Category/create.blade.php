@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-6" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">Add new category</div>
                        <div class="card-body">
                            <div class="mb-8">
                                <form method="POST" action="{{ route('create.category') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"  class="form-label">Category english name:</label>
                                        {{-- Textbox with the category name. The text come in the $categories variable from the controller file, edit function --}}
                                        <input type="text" class="form-control" name="category_en" id="addCategoryEN" placeholder="New category english name" lenght="25">

                                        @error('category_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Category hungarian name:</label>
                                        <input type="text" class="form-control" name="category_hun" id="addCategoryHU" placeholder="New category hungarian name" lenght="25">
                                        @error('category_hun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Add category</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
@endsection
