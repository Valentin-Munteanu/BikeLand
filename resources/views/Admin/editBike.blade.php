@extends("loyaut")
@section("title", "Actualizarea Biciclete")
@section("content")

<div class="info-crud">
    <h3>Actualizarea Bicicletelor</h3>
</div>
<div class="Crud">
    <div class="formular">
        <form action="{{route("update-bike")}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">

            <label for="bike_id">Alege bicicleta pentru actualizare:</label>
            <select name="bike_id" id="bike_id">
                @foreach($bikes as $bike)
                    <option value="{{ $bike->id }}">{{ $bike->name_bike }}</option>
                @endforeach
            </select>
            <div class="logo-bike">
                <label for="type">Imaginea Bicicletei</label>
                <label for="image" id="logo-label">
                    <input type="file" name="image_bike" id="image">
                    @error("image_bike")
                    <p class="errors">{{$message}}</p>
                    @enderror
                    <img src="https://static-00.iconduck.com/assets.00/add-image-icon-2048x1908-0v5fxcb2.png" alt="">
                </label>
            </div>

            <label for="type">Firma Bicicletei</label>
            <input type="text" name="name_bike" id="" placeholder="Firma bicicletei">
            @error("name_bike")
            <p class="errors">{{$message}}</p>
            @enderror
            <label for="type">Tipul Bicicletei</label>
            <input type="text" name="type_bike" id="" placeholder="Firma bicicletei">
            @error("type_bike")
            <p class="errors">{{$message}}</p>
            @enderror
            <label for="type">Culoarea Bicicletei</label>
            <input type="text" name="color_bike" placeholder="Culoarea bicicletei">
            @error("color_bike")
            <p class="errors">{{$message}}</p>
            @enderror

            <label for="type">Pretul</label>
        <input type="number" name="price" placeholder="Pretul bicicletei">
            @error("price")
            <p class="errors">{{$message}}</p>
            @enderror

            <textarea name="description" id="" cols="30" rows="10" placeholder="Descrierea(Proprietati ale bicicletei)"></textarea>
            @error("description")
            <p class="errors">{{$message}}</p>
            @enderror
        <label for="hidden">Ascunde bicicleta:</label>
            <input type="checkbox" name="hidden" id="hidden" value="1">
            <div class="button-send">
                <button>Actualizează bicicletă</button>
            </div>
            </div>

        </form>


    </div>
</div>


@endsection

