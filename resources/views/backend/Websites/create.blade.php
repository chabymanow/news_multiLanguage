@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h1>Add website</h1></div>
                        <div class="card-body" style="background:#191c24;">
                            <div class="mb-16">
                                <form method="POST" action="{{ route('add.website') }}">
                                @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"  class="form-label">Website name:</label>
                                        <input type="text" class="form-control" name="website_name" id="website_name" lenght="25">

                                        @error('website_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Website link:</label>
                                        <input type="text" class="form-control" name="website_link" id="website_link" lenght="25">
                                        @error('website_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Add website</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>
@endsection
