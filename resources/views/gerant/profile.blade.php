@extends("gerant.layout")
@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-8 p-5 mt-5 shadow bg-white col-md-6">
            <div class="row p-0 m-0 justify-content-between">
                <div class="p-0 m-0 col-sm-4">
                    <h4>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
                    <h6>Gérant</h6>
                </div>
            </div>
            <div class="row mt-2 p-0 m-0 justify-content-center">
                <div class="row p-0 m-0 justify-content-between">
                    <div class=" p-0 m-0 col-3"> <strong>Nom</strong></div>
                    <div class=" p-0 m-0 col-6">{{ Auth::user()->lastname }}</div>
                </div>
                <div class="row p-0 m-0 justify-content-between">
                    <div class="p-0 m-0 col-3"><strong>Prenom</strong> </div>
                    <div class="p-0 m-0 col-6">{{ Auth::user()->firstname }}</div>
                </div>
                <div class="row p-0 m-0 justify-content-between">
                    <div class="p-0 m-0 col-3"><strong>Email</strong> </div>
                    <div class="p-0 m-0 col-6">{{ Auth::user()->email }}</div>
                </div>
            </div>


            <div class="row mt-5 justify-content-end">
                <div class="col-sm-5">
                    <div>
                        <button type="button" style="margin-bottom: 15px" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Modifier mon profile
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier mon profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.profil') }}/{{ Auth::user()->id }}" method="post">
                                    @csrf
                                    @method("put")
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                            <input type="text" name="nom" class="form-control"
                                                id="exampleFormControlInput1" value="{{ Auth::user()->lastname }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Prenom</label>
                                            <input type="text" name="prenom" class="form-control"
                                                id="exampleFormControlInput1" value="{{ Auth::user()->firstname }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Mot de
                                                passe</label>
                                            <input type="password" name="password" class="form-control"
                                                id="exampleFormControlInput1">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Confirmer le mot
                                                de
                                                passe</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="exampleFormControlInput1">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>
@endsection
