@extends("admin.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="d-flex">
            <h1 class="h4">Station {{ $station->lieu_station }}</h1>
            <div>
                <button type="text" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal00">
                    <i style="color: rgb(94, 94, 255)" class="fas fa-edit"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal00" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mettre a jour la station {{ $station->lieu_station }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.station') }}/{{ $station->id }}" method="post">
                                @csrf
                                @method("put")
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Ville</label>
                                        <input type="text" name="ville" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Quartier</label>
                                        <input type="text" name="quartier" class="form-control"
                                            id="exampleFormControlInput1">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @if ($station->users->isEmpty())
        <div class="row justify-content-center">
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter un Gérant
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajouter un gérant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.station') }}/{{ $station->id }}" method="post">
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
    @else
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div>
                    <button type="button" style="margin-bottom: 15px" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Modifier le Gérant
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier le gérant</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.station') }}/user/{{ $gerant->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                            <input type="text" name="nom" class="form-control" id="exampleFormControlInput1"
                                                value="{{ $gerant->lastname }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Prenom</label>
                                            <input type="text" name="prenom" class="form-control"
                                                id="exampleFormControlInput1" value="{{ $gerant->firstname }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                id="exampleFormControlInput1" value="{{ $gerant->email }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Mot de
                                                passe</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleFormControlInput1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Confirmer le
                                                mot
                                                de
                                                passe</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="exampleFormControlInput1">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                        data-bs-target="#exampleModal2">
                        Ajouter une tâche
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajout d'une tâche</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.station.tache') }}/{{ $gerant->id }}" method="post">
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
                <!-- Button trigger modal -->

            </div>
            <div class="col-md-4 p-4 shadow bg-white">
                <h5>Informations du gérant</h5>
                <p class=""> <span style="font-weight: bolder; font-size:12px">Nom: </span>
                    {{ $gerant->lastname }} <br>
                    <span style="font-weight: bolder; font-size:12px">Prenom:</span> {{ $gerant->firstname }}
                    <br><span style="font-weight: bolder; font-size:12px">Email:</span> {{ $gerant->email }}
                </p>
            </div>

        </div>
        <div class="row justify-content-between mt-5">
            <div class="col-md-12 p-4 shadow bg-white">
                <h5>Etat des cuves</h5>
                <div class="row justify-content-center">
                    <div class="col-md-4 d-flex my-5 justify-content-center">
                        <div>
                            <h6 class="text-center">Cuve 1</h6>
                            <div class="cuve shadow">
                                <div class="niveauTexte">
                                    100%
                                </div>
                                <div class="niveau">

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 d-flex my-5 justify-content-center">
                        <div>
                            <h6 class="text-center">Cuve 2</h6>
                            <div class="cuve shadow">
                                <div class="niveauTexte">
                                    0%
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex my-5 justify-content-center">
                        <div>
                            <h6 class="text-center">Cuve 3</h6>
                            <div class="cuve shadow">
                                <div class="niveauTexte">
                                    0%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between mt-3">
            <div class="col-md-12 p-4 shadow bg-white">
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
                        @foreach ($gerant->taches()->get() as $tache)
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
                                    <form action="{{ route('admin.station.tache') }}/{{ $tache->id }}"
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
        <div class="row justify-content-between mt-5" >
            <div class="col-md-12 p-4 shadow bg-white" style="overflow-y: scroll">
                <h5>Liste des rapports</h5>
                <table class="table text-center " style="padding-left: 10px;">
                    <thead>
                        <tr>
                            <th class="text-start" scope="col">Rapport</th>
                            <th class="text-start" scope="col">Création</th>
                            <th scope="col">Télécharger</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gerant->rapports as $rapport)
                            <tr>
                                <td class="text-start">{{ $rapport->piece_jointe }}</td>
                                <td class="text-start">{{ $rapport->created_at }}</td>
                                <td><a href="{{ route('admin.station.rapport') }}/{{ $rapport->id }}"><i
                                            class="fas fa-download"></i></a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <script>
        var cuve = document.querySelector(".cuve")
        var niveau = document.querySelector(".niveau")
        var niveauTexte = document.querySelector(".niveauTexte")
        var hauteurCuve = cuve.clientHeight
        var posNiveau = niveau.getBoundingClientRect()
        var hauteurNiveau = posNiveau.height

        setInterval(()=>{
        fetch("http://192.168.4.1/").then(function (res) {
          return res.json();
        }).then(function (data) {
          var level = data.level;
          var nouvelHauteur = hauteurCuve - (parseInt(level)*(hauteurCuve/20))
          niveau.style.height = ""+ nouvelHauteur + "px";
          var pourcentage = (nouvelHauteur/hauteurCuve)*100
          var intPourcentage = parseInt(pourcentage) ;
          niveauTexte.innerHTML = "" + intPourcentage +"%"
          if (pourcentage > 60) {
              niveau.classList.remove("niveau2")
              niveau.classList.remove("niveau3")
          }else if (pourcentage > 30) {
            niveau.classList.add("niveau2")
            niveau.classList.remove("niveau3")
          }else if ((pourcentage < 30) && (pourcentage > 0)){
            niveau.classList.add("niveau3")
            niveau.classList.remove("niveau2")
          }
        })}, 200);

    </script>
@endsection
