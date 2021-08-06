@extends("admin.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Stations</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        <div class="row">

            @if(!$errors->isEmpty())
            <div class="modal fade show" id="my-modal" style="display: block" tabindex="-1" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title alert alert-danger" id="exampleModalLabel">Erreur lors de l'ajout de la station</h5>
                    <button type="button" class="btn-close" id="my-modal-closer" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                </div>
              </div>
            </div>
            @endif
            <div class="col-md-3 mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Ajouter une station
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ajout d'une station</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.station') }}" method="post">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Ville</label>
                                        <input type="text" name="ville" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Quartier</label>
                                        <input type="text" name="quartier" class="form-control" id="exampleFormControlInput1">
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
            <div class="col-md-8 p-5 shadow bg-white">
                <h4>Liste des stations</h4>
                <table class="table " style="padding-left: 10px;">
                    <thead>
                        <tr>
                            <th scope="col">Lieu</th>
                            <th scope="col">Gérer</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stations as $station)
                        <tr>
                            <td>{{ $station->lieu_station }}</td>
                            <td><a href="{{ route("admin.station") }}/{{ $station->id }}"><i class="fas fa-edit"></i></a></td>
                            <td>
                                <form action="{{route("admin.station") }}/{{ $station->id }}" method="post">
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
    </div>
    <script>
        closer = document.querySelector("#my-modal-closer")
        my_modal = document.querySelector("#my-modal")
        closer.addEventListener("click",()=>{
            my_modal.style.display = "none"
        });
    </script>
@endsection
