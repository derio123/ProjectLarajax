@forelse ($projects as $proj)
    <tr>
        <span class="alert alert-info">Não projetos</span>
    </tr>
@empty
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
@endforelse
