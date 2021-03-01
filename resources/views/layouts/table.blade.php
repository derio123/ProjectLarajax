<table class="table table-bordered table-hover table-responsive">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Introduction</th>
        <th>Location</th>
        <th>Cost</th>
        <th>Date Created</th>
        <th width="120px">Action</th>
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
                    {{-- <form action="{{ route('projects.destroy', $proj->id) }}" method="POST"> --}}
                        {{-- href="{{ route('projects.show', $proj->id) }}" 
                        href="{{ route('projects.edit', $proj->id) }}" --}}
                        <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                            data-attr="{{ route('projects.show', $proj->id) }}"
                            style="border: none; background-color:transparent;" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a class="text-secondary ml-2" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                            data-attr="{{ route('projects.edit', $proj->id) }}"
                            style="border: none; background-color:transparent;" title="Editar">
                            <i class="fas fa-edit fa-lg text-gray-500"></i>
                        </a>

                        
                        <a class="ml-1" data-toggle="modal" id="deleteButton" data-target="#deleteModal"
                            data-attr="{{ route('delete', $proj->id) }}" method="POST" title="Excluir"
                            style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </a>
                    
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
