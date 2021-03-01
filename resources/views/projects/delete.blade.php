<form action="{{ route('projects.destroy', $project->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center">Você deseja excluir esse projeto {{ $project->name }} ?</h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Yes, Delete Project</button>
    </div>
</form>