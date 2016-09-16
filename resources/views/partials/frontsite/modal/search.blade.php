{{-- search modal --}}
<div id="modal-search" class="modal">
    <div class="modal-content">
        <h4>Пошук по сайту</h4>


        <form class="row right-align" action="{{url('search')}}">

            <div class="input-field col s10 m11 left-align">
                <input id="search" type="text" class="validate" name="term" required>
                <label for="search" data-error="wrong" data-success="right">Пошук</label>
            </div>

            <button class="btn-floating btn right" type="submit" style="margin-top: 20px; margin-right: 11px;">
                <i class="material-icons right">search</i>
            </button>

        </form>
    </div>
</div>