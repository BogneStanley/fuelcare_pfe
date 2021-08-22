@extends("gerant.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Employés</h1>
    </div>

    <div class="row justify-content-center">
        <div class=" row col-md-8 p-5 shadow bg-white">
            <div class="col-md-7">
                <p>
                    <strong>Nom : </strong>{{ $user->lastname }} <br>
                    <strong>Prenom : </strong>{{ $user->firstname }}<br>
                    <strong>Email : </strong>{{ $user->email }}<br>
                </p>
            </div>
            <div class="col-md-5">
                <div>
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal2">
                        Donner une tâche
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('gerant.employes.tache') }}/{{ $user->id }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Titre de la
                                                tache</label>
                                            <input type="text" name="titre" class="form-control"
                                                id="exampleFormControlInput1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea type="text" name="description" class="form-control"
                                                id="exampleFormControlInput1"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        <div class="col-md-8 p-4 shadow bg-white">
            <h5>Tâches de l'agent</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Tâche</th>
                        <th scope="col">Etat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->taches()->get() as $tache)
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
                                @if ($tache->status) <span
                                    style="color: rgb(41, 182, 41)">Terminer</span> @else <span
                                        style="color: rgb(221, 31, 24)">En cours</span> @endif
                            </td>
                            <td>
                                <form action="{{ route('gerant.employes.tache') }}/{{ $tache->id }}"
                                    method="post">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" style="background: none; border:none"><i
                                            class="fas fa-trash-alt" style="color: rgb(255, 59, 59)"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
