@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
                <div class="card-title">
                    <h4>Add new video</h4>
                </div>
                <form class="forms-sample" action="{{ route('insert.video') }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row">
                        <div class="form-group">
                            <label for="title">Video title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="exampleTextarea1">Embed code</label>
                            <textarea class="form-control editor" name="embed_code" id="summernote_en"></textarea>
                        </div>
                        @error('embed_code')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="type">Video type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="0"">Small video</option>
                                <option value="1">Big video</option>
                            </select>
                        </div>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> <!-- End Row  -->

                    <button type="submit" class="btn btn-primary mr-2">Add video</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
