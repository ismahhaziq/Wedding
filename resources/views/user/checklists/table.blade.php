@extends('layouts.userapp')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Checklist Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>List of Checklists</h6>
                        <div class="mb-2">
                            <a href="{{ route('checklists.create') }}" class="btn btn-primary">Add New Checklist</a>
                        </div>
                    </div>
                </div>
                    <div id="alert">
                        @include('components.alert')
                    </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(count($checklists) > 0)
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                            @foreach ($checklists as $s)
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title bg-primary text-white p-2" id="title{{ $s->id }}"
                                                data-color="{{ $s->title_color }}">{{ $s->title }}</h5>
                                            @if ($s->content_type === 'list')
                                                <ul class="card-text">
                                                    @foreach (explode("\n", $s->content) as $index => $item)
                                                        @if ($index < 3)
                                                            <li>{{ $item }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                @if (count(explode("\n", $s->content)) > 3)
                                                    <button class="btn btn-link show-more-btn"
                                                        data-target="#collapse{{ $s->id }}">
                                                        Show More
                                                    </button>
                                                    <div class="collapse" id="collapse{{ $s->id }}">
                                                        <ul class="card-text">
                                                            @foreach (explode("\n", $s->content) as $index => $item)
                                                                @if ($index >= 3)
                                                                    <li>{{ $item }}</li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            @else
                                                <p class="card-text">
                                                    @if (strlen($s->content) > 100)
                                                        <span class="initial-content">{{ substr($s->content, 0, 100) }}</span>
                                                        <span class="additional-content" style="display: none;">{{ substr($s->content, 100) }}</span>
                                                        <button class="btn btn-link show-more-btn"
                                                            data-target=".additional-content{{ $s->id }}">
                                                            Show More
                                                        </button>
                                                    @else
                                                        {{ $s->content }}
                                                    @endif
                                                </p>
                                                @if (strlen($s->content) > 100)
                                                    <div class="collapse additional-content{{ $s->id }}">
                                                        {{ substr($s->content, 100) }}
                                                    </div>
                                                @endif
                                                @if (strlen($s->content) > 100)
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            const showMoreBtn = document.querySelector('.show-more-btn');

                                                            if (showMoreBtn) {
                                                                showMoreBtn.addEventListener('click', function () {
                                                                    showMoreBtn.style.display = 'none';
                                                                });
                                                            }
                                                        });
                                                    </script>
                                                @endif
                                            @endif
                                            <div class="text-left mt-2">
                                                <form action="{{ route('checklists.destroy', $s->id) }}" method="POST"
                                                    class="d-inline">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('checklists.edit', $s->id) }}" title="Edit">
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
                        <p class="text-center">No checklists added.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('.show-more-btn');

            buttons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const targetId = button.getAttribute('data-target');
                    const targetElements = document.querySelectorAll(targetId);

                    if (targetElements) {
                        targetElements.forEach(function (element) {
                            element.classList.toggle('show');
                        });
                        button.style.display = 'none';
                    }
                });
            });

            document.addEventListener('click', function (event) {
                if (!event.target.classList.contains('show-more-btn')) {
                    // Hide all collapse elements
                    const collapses = document.querySelectorAll('.collapse.show');
                    collapses.forEach(function (collapse) {
                        collapse.classList.remove('show');
                    });
                    buttons.forEach(function (button) {
                        button.style.display = 'inline'; // Show all buttons on document click
                    });
                }
            });

            // Prevent default behavior for line breaks in content
            document.querySelectorAll('.card-text br').forEach(function (br) {
                br.parentNode.replaceChild(document.createTextNode('\n'), br);
            });
        });
    </script>
@endsection
