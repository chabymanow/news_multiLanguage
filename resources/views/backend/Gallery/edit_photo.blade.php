@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
                <div class="card-title">
                    <h4>Add new photo</h4>
                </div>
                <form class="forms-sample" action="{{ route('update.photo', $photos->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                    <div class="row">
                        <div class="form-group">
                            <label for="title">Photo title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $photos->title }}">
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <input type="hidden" name="old_photo" value="{{ $photos-> photo }}">
                        <img class="img-fluid" style="min-width: 8vw; height: auto; border: none; border-radius: 0px;" src="{{ asset($photos-> photo) }}" alt="">
                    </div>

                    <div class="row mt-4">
                        <div class="form-group">
                            <label for="image">News Image Upload </label>
                            <input type="file" name="photo" class="form-control-file" id="photo">
                        </div>
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label for="type">Photo type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="0""
                                <?php
                                    if($photos->type == 0){
                                        echo "selected";
                                    }
                                ?>
                                >Small photo</option>
                                <option value="1"
                                <?php
                                if($photos->type == 1){
                                    echo "selected";
                                }
                                ?>
                                >Big photo</option>
                            </select>
                        </div>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> <!-- End Row  -->

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
