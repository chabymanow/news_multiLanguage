@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
            <div class="card-title"><h1>All posts</h1>
            <div class="template-demo">
                <a href="{{ route('add.district') }}">
                    <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add new post</button>
                </a>
            </div>
            </div>
            <div class="card-text">
                <table class="table table-striped align-middle " style="background: #1f1f1f; color: #FEFEFE;">
                    <thead>
                    <tr>
                        <th scope="col">Post ID</th>
                        <th scope="col">Post Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">District</th>
                        <th scope="col">Subdistrict</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($posts as $post)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $post-> id}}</td>
                            <td class="text-center">{{ Str::limit( $post-> title_en, 30)}}</td>
                            <td class="text-center"><img class="img-fluid" style="min-width: 8vw; height: auto; border: none; border-radius: 0px;" src="{{ asset($post-> image) }}" alt=""></td>
                            <td class="text-center">{{ $post-> category_en}}</td>
                            <td class="text-center">{{ $post-> subcategory_en}}</td>
                            <td class="text-center">{{ $post-> district_en}}</td>
                            <td class="text-center">{{ $post-> subdistrict_en}}</td>
                            <td class="text-center">
                                @if ($post-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    <?php $newDateFormat = date('d-m-Y', strtotime( $post-> created_at)); ?>
                                    {{ $newDateFormat }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit/post', $post->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i></a>
                                <a href="{{ url('delete/post', $post->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts -> links('pagination-links') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
