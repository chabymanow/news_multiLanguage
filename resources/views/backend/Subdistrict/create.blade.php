@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-6" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header"><h1>Add new subdistrict<h1>
                        <div class="card-body">
                            <div class="mb-8">
                                <form method="POST" action="{{ route('create.subdistrict') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"  class="form-label">Subdistrict english name:</label>
                                        {{-- Textbox with the category name. The text come in the $categories variable from the controller file, edit function --}}
                                        <input type="text" class="form-control" name="subdistrict_en" id="addCategoryEN" lenght="25">

                                        @error('subdistrict_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Subdistrict hungarian name:</label>
                                        <input type="text" class="form-control" name="subdistrict_hun" id="addCategoryHU" lenght="25">
                                        @error('subdistrict_hun')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="category" class="form-label mt-3">Main district</label>
                                            <select class="form-control" name="district_id" id="district">
                                                <option hidden>Choose District</option>
                                                @foreach ($districts as $item)
                                                    <option value="{{ $item->id }}">{{ $item->district_en }} | {{ $item->district_hun }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Add subdistrict</button>
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
