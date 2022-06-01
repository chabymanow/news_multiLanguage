@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background:#191c24;">
                <div class="col-md-16" style="margin: 0 auto;">
                    <div class="card">
                        <div class="card-header">Coffee timer settings</div>
                        <div class="card-body" style="background:#191c24;">
                            <div class="mb-16">
                                    <div class="form-group">
                                        <form method="POST" action="{{ route('update.coffee', $coffee->id) }}">
                                            @csrf
                                        <label for="exampleFormControlInput1"  class="form-label">Moring coffee:</label>
                                        <input type="text" class="form-control" name="morning" id="morning" value="{{ $coffee->morning}}" lenght="25">
                                        @error('morning')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-labe mt-3">Second coffee:</label>
                                        <input type="text" class="form-control" name="second" id="second" value="{{ $coffee->second}}" lenght="25">
                                        @error('second')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">Afternon coffee:</label>
                                        <input type="text" class="form-control" name="afternon" id="afternon" value="{{ $coffee->afternon}}" lenght="25">
                                        @error('afternon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <label for="exampleFormControlInput1"  class="form-label mt-3">One more coffee:</label>
                                        <input type="text" class="form-control" name="onemore" id="onemore" value="{{ $coffee->onemore}}" lenght="25">
                                        @error('onemore')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="justify-content-md-end">
                                            <button type="submit" class="btn btn-xl btn-primary mt-3 me-md-2 mt-5" style="float:right;">Save coffee time</button>
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
