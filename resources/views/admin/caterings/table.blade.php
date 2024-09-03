@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Catering Management'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h6>List of Caterings</h6>
                    <div class="mb-2">
                        <a href="{{ route('caterings.create') }}" class="btn btn-primary">Add New Catering</a>
                    </div>
                </div>
            </div>
            <div id="alert">
                @include('components.alert')
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @if(count($caterings) > 0)
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    @foreach ($caterings as $catering)
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title bg-primary text-white p-2">{{ $catering->title }}</h5>
                                <div class="card-text">
                                    <strong>Price:</strong> RM{{ $catering->price }} / PAX<br><br>
                                    {!! nl2br(e($catering->description)) ?? 'N/A' !!}
                                </div>
                                <div class="text-left mt-2">
                                    <form action="{{ route('caterings.destroy', $catering->id) }}" method="POST"
                                        class="d-inline">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('caterings.edit', $catering->id) }}" title="Edit">
                                            <i class="fas fa-edit" aria-hidden="true"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                            <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-center">No Service Added</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection