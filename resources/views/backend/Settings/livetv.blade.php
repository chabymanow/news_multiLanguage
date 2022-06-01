@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-16" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">Live TV settings</div>
                        <div class="card-body" style="background:#191c24;">
                            <div class="mb-16">
                                    <div class="form-group">
                                        <form method="POST" action="{{ route('update.livetv', $livetv->id) }}">
                                            @csrf
                                            <div class="template-demo">
                                                <div class="row justify-content-end">
                                                    <div class="col-md-4">
                                                        {{-- {{dd($livetv->status);}} --}}
                                                        <input type="hidden" name="livetvactive" id="livetvactive" value="{{ $livetv->status }}">
                                                        <button id="changeButton" type="button" onclick="return change(livetvactive);" class="btn btn-fw">o</button>

                                                        {{-- @if(livetvactive.value == 1)
                                                                    <button id="changeButton" type="button" onclick="return change(livetvactive);" class="btn btn-success btn-fw" style="float: right;">Inactive</button>

                                                                <small class="text-succes">Live TV is active</small>
                                                        @else
                                                                    <button type="button"  onclick="return change(livetvactive)" class="btn btn-dark btn-fw" style="float: right;">Active</button>
                                                                <small class="text-danger">Live TV is inactive</small>
                                                        @endif --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="exampleFormControlInput1"  class="form-label mt-3">Embed code:</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Active / Inactive</label>
                                              </div>
                                            <textarea class="form-control editor" name="embed_code" id="summernote_en">{{ $livetv->embed_code}}</textarea>
                                            @error('embed_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Save Live TV</button>
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
        if ( $("#livetvactive").val() == "1" ){
            $("#livetvactive").val("1");
            $('#changeButton').text("Active");
            $('#changeButton').addClass('btn-success');
            $('#changeButton').removeClass('btn-danger');
        }else{
            $("#livetvactive").val("0");
            $('#changeButton').text("Inactive");
            $('#changeButton').removeClass('btn-success');
            $('#changeButton').addClass('btn-danger');
        }
        console.log( $("#livetvactive").val() );
    });

    function change( el )
    {
        if (  $("#livetvactive").val() == "1" ){
            $("#livetvactive").val("0");
            $('#changeButton').text("Inactive");

            $('#changeButton').removeClass('btn-success');
            $('#changeButton').addClass('btn-danger');
        }else{
            $("#livetvactive").val("1");
            $('#changeButton').text("Active");
            $('#changeButton').addClass('btn-success');
            $('#changeButton').removeClass('btn-danger');
        }
        console.log( $("#livetvactive").val() );
    }
</script>
@endsection
