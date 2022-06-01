@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="card-title">Deleted categories</div>
            <div class="card-text">
                <table class="table table-striped align-middle">
                    <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category English</th>
                        <th scope="col">Category Hungarian</th>
                        <th scope="col">Deleted at</th>
                        {{-- <th scope="col">Elapsed time</th> --}}
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($deletedCats as $deletedCat)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $deletedCat-> id}}</td>
                            <td class="text-center">{{ $deletedCat-> category_en}}</td>
                            <td class="text-center">{{ $deletedCat-> category_hun}}</td>
                            <td class="text-center">
                                @if ($deletedCat-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    {{ $deletedCat-> created_at}}
                                @endif
                            </td>
                            <td><a href="{{ url('restore/category', $deletedCat->id) }}" onclick="return confirm('Are you sure to restore this category?')" class="btn btn-success">Restore</a></td>
                            <td><a href="{{ url('delete/category', $deletedCat->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $deletedCats -> links() }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
