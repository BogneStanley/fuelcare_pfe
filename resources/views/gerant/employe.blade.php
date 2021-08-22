@extends("gerant.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Employés</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter un Employé
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un Employé</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('gerant.employes') }}/{{ Auth::user()->stations[0]->id }}" method="post">
                            @csrf
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Prenom</label>
                                    <input type="text" name="prenom" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mot de passe</label>
                                    <input type="password" name="password" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Confirmer le mot de
                                        passe</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11 p-5 shadow bg-white">
            <h4>Liste des employés</h4>
            <table class="table text-center " style="padding-left: 10px;">
                <thead>
                    <tr>
                        <th class="text-start"  scope="col">Nom</th>
                        <th class="text-start"  scope="col">Prenom</th>
                        <th scope="col">Gérer</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                    <tr>
                        <td class="text-start">{{ $employe->lastname }}</td>
                        <td class="text-start">{{ $employe->firstname }}</td>
                        <td ><a href="{{route("gerant.employes") }}/{{ $employe->id }}"><i class="fas fa-edit"></i></a></td>
                        <td>
                            <form action="{{route("gerant.employes") }}/{{ $employe->id }}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" style="background: none; border:none"><i class="fas fa-trash-alt" style="color: rgb(255, 59, 59)"></i></button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
