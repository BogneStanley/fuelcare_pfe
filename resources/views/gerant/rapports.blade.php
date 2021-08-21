@extends("gerant.layout")
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h4">Rapports</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div>
                <button type="button" style="margin-bottom: 15px" class="btn btn-primary p-1" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Nouveau rapport
                </button>
                <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un rapport</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('gerant.rapports') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Titre</label>
                                    <input type="text" name="titre" class="form-control"
                                        id="exampleFormControlInput1" >
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Ajouter un fichier</label>
                                    <input type="file" name="my_file" class="form-control"
                                        id="exampleFormControlInput1" >
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger"
                                    data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 p-5 shadow bg-white">
            <h4>Liste des rapports</h4>
            <table class="table text-center " style="padding-left: 10px;">
                <thead>
                    <tr>
                        <th class="text-start"  scope="col">Rapport</th>
                        <th scope="col">Télécharger</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rapports as $rapport)
                    <tr>
                        <td class="text-start">{{ $rapport->piece_jointe }}</td>
                        <td ><a href="{{route("gerant.rapports") }}/{{ $rapport->id }}"><i class="fas fa-download"></i></a></td>
                        <td>
                            <form action="{{route("gerant.rapports") }}/{{ $rapport->id }}" method="post">
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
