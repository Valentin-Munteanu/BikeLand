@extends("loyaut")
@section("title", "Crearea Biciclete")
@section("content")

<div class="info-crud">
    <h3>Crearea Bicicletelor</h3>
</div>
<div class="Crud">
    <div class="formular">
        <form action="{{route("store-bike")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

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
                <input type="text" name="type_bike" id="" placeholder="Tipul bicicletei">
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
                <div class="button-send">
                    <button>Crează bicicletă</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
