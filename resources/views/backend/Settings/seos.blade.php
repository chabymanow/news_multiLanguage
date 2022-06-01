@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-16" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">SEO settings</div>
                        <div class="card-body" style="background:#191c24;">
                            <div class="mb-16">
                                    <div class="form-group">
                                        <form method="POST" action="{{ route('update.seo', $seos->id) }}">
                                            @csrf
                                        <label for="exampleFormControlInput1"  class="form-label">Meta author:</label>
                                        <input type="text" class="form-control" name="meta_author" id="meta_author" value="{{ $seos->meta_author}}" lenght="25">
                                        @error('meta_author')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-labe mt-3">Meta title:</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ $seos->meta_title}}" lenght="25">
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Meta keyword:</label>
                                        <input type="text" class="form-control" name="meta_keyword" id="meta_keyword" value="{{ $seos->meta_keyword}}" lenght="25">
                                        @error('meta_keyword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Meta description:</label>
                                        {{-- <input type="text" class="form-control" name="meta_description" id="meta_description" value="{{ $seos->meta_description}}" lenght="25"> --}}
                                        <textarea class="form-control editor" name="meta_description" id="summernote_en">{{ $seos->meta_description}}</textarea>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Google analyticst:</label>
                                        <input type="text" class="form-control" name="google_analytics" id="google_analytics" value="{{ $seos->google_analytics}}" lenght="25">
                                        @error('google_analytics')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Google verificationt:</label>
                                        <input type="text" class="form-control" name="google_verification" id="google_verification" value="{{ $seos->google_verification}}" lenght="25">
                                        @error('google_verification')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Alexa analytics:</label>
                                        <input type="text" class="form-control" name="alexa_analytics" id="alexa_analytics" value="{{ $seos->alexa_analytics}}" lenght="25">
                                        @error('alexa_analytics')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Save SEO</button>
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
