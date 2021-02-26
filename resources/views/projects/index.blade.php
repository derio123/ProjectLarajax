@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}" title="Novo projeto"> <i
                        class="fas fa-plus-circle"></i>
                </a>
            </div>

            @if ($message = Session::get('sucess'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered table-responsive-lg">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Introduction</th>
                    <th>Location</th>
                    <th>Cost</th>
                    <th>Date Created</th>
                    <th width="280px">Action</th>
                </tr>
                <tbody>
                    @forelse ($projects as $proj)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $proj->name }}</td>
                            <td>{{ $proj->introduction }}</td>
                            <td>{{ $proj->location }}</td>
                            <td>{{ $proj->cost }}</td>
                            <td>{{ date_format($proj->created_at, 'jS M Y') }}</td>
                            <td>
                                <form action="{{ route('projects.destroy', $proj->id) }}" method="POST">
                                    <a href="{{ route('projects.show', $proj->id) }}" title="show">
                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                    </a>

                                    <a href="{{ route('projects.edit', $proj->id) }}">
                                        <i class="fas fa-edit  fa-lg"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <div class="text-center">
                                <span class="alert alert-info">Não projetos</span>
                            </div>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $projects->links() !!}
        </div>
    </div>
@endsection
