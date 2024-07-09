@extends('template.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h3>Edit Team</h3>
            </div>
            <div class="card-body">
                <form class="form" action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image">CHOOSE IMAGE</label><br>
                        <input type="file" class="form-control-file" id="image" name="image" value="{{ $team->image }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" value="{{ $team->position }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection