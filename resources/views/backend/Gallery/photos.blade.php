@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
            <div class="card-title">Photo gallery
            <div class="template-demo">
                <a href="{{ route('add.photo') }}">
                    <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add photo</button>
                </a>
            </div>
            </div>
            <div class="card-text">
                <table class="table table-striped align-middle" style="color: #FAFAFA;">
                    <thead>
                    <tr>
                        <th scope="col">Photo ID</th>
                        <th scope="col">Photo title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Photo type</th>
                        <th scope="col">Created</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($photos as $photo)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $photo-> id}}</td>
                            <td class="text-center">{{ $photo-> title}}</td>
                            <td class="text-center">
                                <img class="img-fluid" style="min-width: 8vw; height: auto; border: none; border-radius: 0px;" src="{{ asset($photo-> photo) }}" alt="">
                            </td>
                            <td class="text-center">
                                @if ($photo-> type == 1)
                                    <span class="badge badge-success">Big photo</span>
                                @else
                                    <span class="badge badge-info">Small photo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($photo-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    {{ $photo-> created_at}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit/photo', $photo->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i></a>
                                <a href="{{ url('delete/photo', $photo->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $photos -> links('pagination-links') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
