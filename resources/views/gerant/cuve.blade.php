@extends("gerant.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Etat des cuves</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>

    </div>
    <div class="row justify-content-center">
        <div class="row col-md-10 mx-3 my-2 justify-content-center p-4 shadow bg-white">
            <div class="col-md-4">
                <div class="cuve shadow">
                    <div class="niveauTexte">
                        30%
                    </div>
                    <div class="niveau">

                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h4>Cuve1</h4>
                <p>volume de carburant restant : 1200m<sup>3</sup> <br>Niveau de carburant trés bas!</p>
                <p><button class="btn btn-warning">Passer une commande de carburant</button></p>
            </div>
        </div>
        <div class="row col-md-10 mx-3 my-2 justify-content-center p-4 shadow bg-white">
            <div class="col-md-4">
                <div class="cuve shadow">
                    <div class="niveauTexte">
                        0%
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h4>Cuve2</h4>
                <p>volume de carburant restant : 0m<sup>3</sup> <br>Niveau de carburant trés bas!</p>
                <p><button class="btn btn-warning">Passer une commande de carburant</button></p>
            </div>
        </div>
        <div class="row col-md-10 mx-3 my-2 justify-content-center p-4 shadow bg-white">
            <div class="col-md-4">
                <div class="cuve shadow">
                    <div class="niveauTexte">
                        0%
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <h4>Cuve3</h4>
                <p>volume de carburant restant : 0m<sup>3</sup> <br>Niveau de carburant trés bas!</p>
                <p><button class="btn btn-warning">Passer une commande de carburant</button></p>
            </div>
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
