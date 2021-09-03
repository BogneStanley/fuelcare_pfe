@extends("gerant.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Tableau de bord</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
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
                                30%
                            </div>
                            <div class="niveau niveau3">

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


    <div class="row justify-content-center mt-3">
        <div class="col-md-12 p-4 shadow bg-white" style="overflow-y: scroll">
            <h5>Liste des tâches non terminées</h5>
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
                    @foreach (Auth::user()->taches()->get()->where("status",false) as $tache)
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
                                <form action="{{ route('gerant.tache') }}/{{ $tache->id }}"
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
