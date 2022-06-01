@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-16" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">Headline settings</div>
                        <div class="card-body" style="background:#191c24;">
                            <div class="mb-16">
                                    <div class="form-group">
                                        <form method="POST" action="{{ route('update.headline', $headline->id) }}">
                                            @csrf
                                            <div class="template-demo">
                                                <div class="row justify-content-end">
                                                    <div class="col-md-4">
                                                        {{-- {{dd($livetv->status);}} --}}
                                                        <input type="hidden" name="headactive" id="headactive" value="{{ $headline->status }}">
                                                        <button id="changeButton" type="button" onclick="return change(headactive);" class="btn btn-fw">o</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="exampleFormControlInput1"  class="form-label mt-3">Headline text:</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Active / Inactive</label>
                                              </div>
                                            <textarea class="form-control editor" name="headline_text" id="summernote_en">{{ $headline->headline_text}}</textarea>
                                            @error('headline_text')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Save Headline</button>
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

<script>
    $(document).ready(function (){
        if ( $("#headactive").val() == "1" ){
            $("#headactive").val("1");
            $('#changeButton').text("Active");
            $('#changeButton').addClass('btn-success');
            $('#changeButton').removeClass('btn-danger');
        }else{
            $("#headactive").val("0");
            $('#changeButton').text("Inactive");
            $('#changeButton').removeClass('btn-success');
            $('#changeButton').addClass('btn-danger');
        }
        console.log( $("#headactive").val() );
    });

    function change( el )
    {
        if (  $("#headactive").val() == "1" ){
            $("#headactive").val("0");
            $('#changeButton').text("Inactive");

            $('#changeButton').removeClass('btn-success');
            $('#changeButton').addClass('btn-danger');
        }else{
            $("#headactive").val("1");
            $('#changeButton').text("Active");
            $('#changeButton').addClass('btn-success');
            $('#changeButton').removeClass('btn-danger');
        }
        console.log( $("#headactive").val() );
    }
</script>
@endsection
