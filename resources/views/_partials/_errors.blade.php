<div class="row justify-content-center">
    <div class="col-md-10">
    @if(count($errors))

    <div class="form-group">

        <div class="alert alert-danger">
            <ul>

                @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>
    </div>
    @endif
</div>
</div>
