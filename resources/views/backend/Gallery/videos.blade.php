@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
<div class="container">
    <div class="card">
        <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
            <div class="card-title">Video gallery
            <div class="template-demo">
                <a href="{{ route('add.video') }}">
                    <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add video</button>
                </a>
            </div>
            </div>
            <div class="card-text">
                <table class="table table-striped align-middle" style="color: #FAFAFA;">
                    <thead>
                    <tr>
                        <th scope="col">Video ID</th>
                        <th scope="col">Video title</th>
                        <th scope="col">Embed code</th>
                        <th scope="col">Video type</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- the $categories come from the CategoryController and conatins all information from the database -->
                        @foreach ($videos as $video)
                        <tr>
                            {{-- Create index for the list --}}
                            <td class="text-center">{{ $video-> id}}</td>
                            <td class="text-center">{{ $video-> title}}</td>
                            <td class="text-center">{{  Str::limit($video-> embed_code, 30)}}</td>
                            <td class="text-center">
                                @if ($video-> type == 1)
                                    <span class="badge badge-success">Big video</span>
                                @else
                                    <span class="badge badge-info">Small video</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($video-> created_at == NULL)
                                    <span class="text text-danger">No information</span>
                                @else
                                    {{ $video-> created_at}}
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('edit/video', $video->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i></a>
                                <a href="{{ url('delete/video', $video->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $videos -> links('pagination-links') }}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
