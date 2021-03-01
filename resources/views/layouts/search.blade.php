<div class="d-flex">
    <div class="mx-auto">
        <form action="{{ route('projects.index') }}" method="GET" role="search">
            <div class="d-flex">

                <input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">
                <button class="btn btn-info t" type="submit" title="Search projects">
                    <span class="fas fa-search"></span>
                </button>
                <a href="{{ route('projects.index') }}" class="ml-2">
                    <button class="btn btn-danger" type="button" title="Refresh page">
                        <span class="fas fa-sync-alt"></span>
                    </button>
                </a>

                <div class="float-right">
                    <a class="btn btn-success ml-2" data-toggle="modal" id="mediumButton" data-target="#mediumModal"
                        data-attr="{{ route('projects.create') }}" title="Novo projeto">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
