@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Categories
            <div class="template-demo">
                <a href="{{ route('add.category') }}">
                    <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add category</button>
                </a>
            </div>
            </div>
            <div class="card-text">
                <table class="table table-striped align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category English</th>
                        <th scope="col">Category Hungarian</th>
                        <th scope="col">Created at</th>
                        {{-- <th scope="col">Elapsed time</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($categories as $category)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $category-> id}}</td>
                            <td class="text-center">{{ $category-> category_en}}</td>
                            <td class="text-center">{{ $category-> category_hun}}</td>
                            <td class="text-center">
                                @if ($category-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    {{ $category-> created_at}}
                                @endif
                            </td>
                            <td><a href="{{ url('edit/category', $category->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{ url('softdelete/category', $category->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories -> links('pagination-links') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
