@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-6" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header"><h1>Add new subcategory</h1></div>
                        <div class="card-body">
                            <div class="mb-8">
                                <form method="POST" action="{{ route('update.subcategory', $subcategories->id) }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"  class="form-label">Subcategory english name:</label>
                                        {{-- Textbox with the category name. The text come in the $categories variable from the controller file, edit function --}}
                                        <input type="text" class="form-control" value="{{ $subcategories->subcategory_en }}" name="subcategory_en" id="addCategoryEN" lenght="25">

                                        @error('subcategory_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Subcategory hungarian name:</label>
                                        <input type="text" class="form-control" value="{{ $subcategories->subcategory_hun }}" name="subcategory_hun" id="addCategoryHU" lenght="25">
                                        @error('subcategory_hun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="category" class="form-label mt-3">Main category</label>
                                            <select class="form-control" name="category_id" id="category">
                                                <option hidden>Choose Category</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}"
                                                        <?php
                                                            if ($item->id == $subcategories->category_id){
                                                                echo "selected";
                                                            }
                                                        ?>
                                                    >{{ $item->category_en }} | {{ $item->category_hun }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Add subcategory</button>
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
