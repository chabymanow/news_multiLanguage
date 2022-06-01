@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-16" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">Social settings</div>
                        <div class="card-body" style="background:#191c24;">
                            <div class="mb-16">
                                    <div class="form-group">
                                        <form method="POST" action="{{ route('update.social', $socials->id) }}">
                                            @csrf
                                        <label for="exampleFormControlInput1"  class="form-label">Facebook account:</label>
                                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $socials->facebook}}" lenght="25">
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-labe mt-3">Twitter account:</label>
                                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $socials->twitter}}" lenght="25">
                                        @error('twitter')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Youtube account:</label>
                                        <input type="text" class="form-control" name="youtube" id="youtube" value="{{ $socials->youtube}}" lenght="25">
                                        @error('youtube')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Linkedin account:</label>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $socials->linkedin}}" lenght="25">
                                        @error('linkedin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Github account:</label>
                                        <input type="text" class="form-control" name="github" id="github" value="{{ $socials->github}}" lenght="25">
                                        @error('github')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Codepen account:</label>
                                        <input type="text" class="form-control" name="codepen" id="codepen" value="{{ $socials->codepen}}" lenght="25">
                                        @error('codepen')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Save social</button>
                                        </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
@endsection
