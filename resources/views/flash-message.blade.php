@if ($message = Session::get('success'))
<div class="modal fade show" id="my-modal" style="display: block;background-color:rgba(0, 0, 0, 0.207)" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" style="background-color:rgb(29, 242, 47);">
        <div class="modal-content" style="background-color:rgb(29, 242, 47);color:rgb(255, 255, 255)">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $message }}
                </h5>
                <button type="button" class="btn-close" id="my-modal-closer" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
<script>
    closer = document.querySelector("#my-modal-closer")
    my_modal = document.querySelector("#my-modal")
    closer.addEventListener("click", () => {
        my_modal.style.display = "none"
    });
</script>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
<script>
    closer = document.querySelector("#my-modal-closer")
    my_modal = document.querySelector("#my-modal")
    closer.addEventListener("click", () => {
        my_modal.style.display = "none"
    });
</script>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
<script>
    closer = document.querySelector("#my-modal-closer")
    my_modal = document.querySelector("#my-modal")
    closer.addEventListener("click", () => {
        my_modal.style.display = "none"
    });
</script>
@endif

@if (Session::get('errors'))
    <div class="modal fade show" id="my-modal" style="display: block; background-color:rgba(0, 0, 0, 0.207)" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" style="background-color:rgb(250, 71, 71)" >
            <div class="modal-content" style="background-color:rgb(250, 71, 71);color:white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Erreur lors de l'operation
                    </h5>
                    <button type="button" class="btn-close" id="my-modal-closer" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    <script>
        closer = document.querySelector("#my-modal-closer")
        my_modal = document.querySelector("#my-modal")
        closer.addEventListener("click", () => {
            my_modal.style.display = "none"
        });
    </script>
@endif

