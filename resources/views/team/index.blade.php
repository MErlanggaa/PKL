@extends('template.main')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Manajemen Team</h6>
          <a href="/team/create" class="btn btn-primary float-end">Add</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody style="text-align: center">

                @foreach ($team as $t)
                                  
                <tr>
                  <td class="align-middle text-center text-sm "> @if($t->image)
                    <a href="{{ asset('storage/' . $t->image) }}" data-lightbox="team-images">
                    <img src="{{ asset('storage/' . $t->image) }}"  class="rounded-circle img-thumbnail shadow"  style="max-width: 100px; max-height: 100px; object-fit: cover; ">
                    </a>
                    @else
                    No Image
                @endif</td>
                  <td class="px-4 py-2">{{ $t->name }}</td>
                  <td class="px-4 py-2">{{ $t->position }}</td>
                  <td class="px-4 py-2">
                    <div class="container">
                      <div class="row">
                          <div class="col-md-2 mb-2 mb-md-0">
                              <a href="{{ route('team.edit', $t->id) }}" class="btn btn-primary btn-block">Edit</a>
                          </div>
                          <div class="col-md-6">
                              <form action="{{ route('team.destroy', $t->id) }}" method="POST" class="d-inline">
                                  @method('DELETE')
                                  @csrf
                                  <input type="submit" class="btn btn-danger btn-block " value="Delete">
                              </form>
                          </div>
                      </div>
                  </div>
                  
                  </td>
                </tr>@endforeach
              </tbody> 
             
            </table>
          </div>
          
        </div>
      </div>
    </div> <a href="{{ route('news.index') }}" class="btn btn-primary btn-block">Back</a>
  </div>
@endsection
