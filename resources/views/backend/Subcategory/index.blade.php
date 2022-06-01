@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title"><h1>Subcategories</h1>
            <div class="template-demo">
                <a href="{{ route('add.subcategory') }}">
                    <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add subcategory</button>
                </a>
            </div>
            </div>
            <div class="card-text">
                <table class="table table-striped align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Subcategory ID</th>
                        <th scope="col">Linked category</th>
                        <th scope="col">Subcategory English</th>
                        <th scope="col">Subcategory Hungarian</th>
                        <th scope="col">Created at</th>
                        {{-- <th scope="col">Elapsed time</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($subcategories as $subcategory)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $subcategory-> id}}</td>
                            <td class="text-center">{{ $subcategory -> category_en }}</td>
                            <td class="text-center">{{ $subcategory-> subcategory_en}}</td>
                            <td class="text-center">{{ $subcategory-> subcategory_hun}}</td>
                            <td class="text-center">
                                @if ($subcategory-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    {{ $subcategory-> created_at}}
                                @endif
                            </td>
                            <td><a href="{{ url('edit/subcategory', $subcategory->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{ url('delete/subcategory', $subcategory->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subcategories -> links('pagination-links') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
