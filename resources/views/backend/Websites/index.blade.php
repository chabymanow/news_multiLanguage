@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-body" style="background: #1f1f1f; color: #FEFEFE;">
                <div class="card-title"><h1>Websites</h1>
                    <div class="template-demo">
                        <a href="{{ route('create.website') }}">
                            <button type="button" class="btn btn-primary btn-fw" style="float: right;">Add website</button>
                        </a>
                    </div>
                </div>
                <div class="card-text">
                        <table class="table table-striped align-middle" style="background: #1f1f1f; color: #FEFEFE;"">
                            <thead>
                            <tr>
                                <th scope="col">Website ID</th>
                                <th scope="col">Website name</th>
                                <th scope="col">Website link</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <!-- the $categories come from the CategoryController and conatins all information from the database -->
                                @foreach ($websites as $website)
                                <tr>
                                    {{-- Create index for the list --}}
                                    <td class="text-center">{{ $website-> id}}</td>
                                    <td class="text-center">{{ $website-> website_name}}</td>
                                    <td class="text-center">{{ $website-> website_link}}</td>
                                    <td>
                                        <a href="{{ url('edit/website', $website->id) }}" class="btn btn-info"><i class="bi bi-pencil"></i></a>
                                        <a href="{{ url('delete/website', $website->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="bi bi-trash"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $websites -> links('pagination-links') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
