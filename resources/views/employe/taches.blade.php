@extends("employe.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Mes Tâches</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8 p-4 shadow bg-white">
            <h5>Liste des tâches</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tâche</th>
                        <th scope="col">création</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Auth::user()->taches()->get() as $tache)
                        <tr>
                            <td>
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseTwo{{ $tache->id }}"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                {{ $tache->intitule }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseTwo{{ $tache->id }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="panelsStayOpen-headingTwo">
                                            <div class="accordion-body">
                                                {{ $tache->description }}.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $tache->created_at }}
                            </td>
                            <td>
                                @if ($tache->status) <span
                                    style="color: rgb(41, 182, 41)">Terminer</span> @else <span
                                        style="color: rgb(221, 31, 24)">En cours</span> @endif
                            </td>
                            <td>
                                <form action="{{ route("employe.tache") }}/{{ $tache->id }}"
                                    method="post">
                                    @csrf
                                    @method("put")
                                    <button type="submit" style="background: none; border:none">
                                        @if ($tache->status)
                                        <i class="fas fa-check" style="color: rgb(44, 240, 60)"></i>
                                        @else
                                        <i class="fas fa-times" style="color: rgb(255, 59, 59)"></i>
                                        @endif
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
