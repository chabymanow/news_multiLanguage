@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h1>Subdistricts</h1>
            <div class="template-demo">
                <a href="{{ route('add.subdistrict') }}">
                    <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add subdistrict</button>
                </a>
            </div>
            </div>
            <div class="card-text">
                <table class="table table-striped align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Subdistrict ID</th>
                        <th scope="col">Linked district</th>
                        <th scope="col">Subdistrict English</th>
                        <th scope="col">Subdistrict Hungarian</th>
                        <th scope="col">Created at</th>
                        {{-- <th scope="col">Elapsed time</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($subdistricts as $subdistrict)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $subdistrict-> id}}</td>
                            <td class="text-center">{{ $subdistrict -> district_en }}</td>
                            <td class="text-center">{{ $subdistrict-> subdistrict_en}}</td>
                            <td class="text-center">{{ $subdistrict-> subdistrict_hun}}</td>
                            <td class="text-center">
                                @if ($subdistrict-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    {{ $subdistrict-> created_at}}
                                @endif
                            </td>
                            <td><a href="{{ url('edit/subdistrict', $subdistrict->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{ url('delete/subdistrict', $subdistrict->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subdistricts -> links('pagination-links') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
