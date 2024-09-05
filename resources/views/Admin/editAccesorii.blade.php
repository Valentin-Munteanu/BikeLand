@extends("loyaut")
@section("title", "Editarea Accesoriilor")
@section("content")

<div class="info-crud">
    <h3>Editarea Accesoriilor</h3>
</div>
<div class="Crud">
    <div class="formular">
        <form action="{{route("update-accesorii")}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="acces_id">Alege accesoriul pentru actualizare:</label>
                <select name="acces_id" id="acces_id">
                    @foreach($accesorii as $acc)
                        <option value="{{ $acc->id }}">{{ $acc->name_acces}}</option>
                    @endforeach
                </select>
            <div class="logo-bike">
             <label for="type">Imagine Accesoriu</label>
                <label for="image" id="logo-label">
                <input type="file" name="image" id="image">
                @error("image")
                <p class="errors">{{$message}}</p>
                @enderror
                <img src="https://static-00.iconduck.com/assets.00/add-image-icon-2048x1908-0v5fxcb2.png" alt="">
            </label>
            </div>
            <label for="type">Accesoriu pentru</label>
            <input type="text" name="type_acces" id="" placeholder="Accesoriu pentru">
            @error("type_acces")
            <p class="errors">{{$message}}</p>
            @enderror
                <label for="type">Firma accesoriu</label>
                <input type="text" name="name_acces" id="" placeholder="Firma accesoriu">
                @error("name_acces")
                <p class="errors">{{$message}}</p>
                @enderror

                <label for="type">Culoare Accesoriu</label>
                <input type="text" name="color_acces" placeholder="Culoare Accesoriu">
                @error("color_acces")
                <p class="errors">{{$message}}</p>
                @enderror
                <label for="type">Pretul</label>
                <input type="number" name="price" placeholder="Pretul Accesoriu">
                @error("price")
                    <p class="errors">{{$message}}</p>
                @enderror
                <textarea name="description" id="" cols="30" rows="10" placeholder="Descrierea(Proprietati ale accesoriului)"></textarea>
                @error("description")
                <p class="errors">{{$message}}</p>
                @enderror
                <label for="hidden">Ascunde accesoriu:</label>
                <input type="checkbox" name="hidden" id="hidden" value="1">
                <div class="button-send">
                    <button>Actualizează Accesoriu</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
