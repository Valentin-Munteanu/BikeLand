@extends("loyaut")
@section("title", "Editarea Trotinetelor")
@section("content")

<div class="info-crud">
    <h3>Actualizarea Trotinetelor</h3>
</div>
<div class="Crud">
    <div class="formular">
        <form action="{{route("update-trotinete")}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="trt_id">Alege trotineta pentru actualizare:</label>
                <select name="trt_id" id="trt_id">
                    @foreach($trotinete as $trt)
                        <option value="{{ $trt->id }}">{{ $trt->name_trt}}</option>
                    @endforeach
                </select>
            <div class="logo-bike">
             <label for="type">Imaginea Trotinetei</label>
                <label for="image" id="logo-label">
                <input type="file" name="image" id="image">
                @error("image")
                <p class="errors">{{$message}}</p>
                @enderror
                <img src="https://static-00.iconduck.com/assets.00/add-image-icon-2048x1908-0v5fxcb2.png" alt="">
            </label>
            </div>

                <label for="type">Firma Trotinetei</label>
                <input type="text" name="name_trt" id="" placeholder="Firma Trotinetei">
                @error("name_trt")
                <p class="errors">{{$message}}</p>
                @enderror
                <label for="type">Viteza Trotinetei</label>
                <input type="number" name="speed_trt" id="" placeholder="Viteza Trotinetei">
                @error("speed_trt")
                <p class="errors">{{$message}}</p>
                @enderror

                <label for="type">Culoarea Trotinetei</label>
                <input type="text" name="color_trt" placeholder="Culoarea Trotinetei">
                @error("color_trt")
                <p class="errors">{{$message}}</p>
                @enderror
                <label for="type">Pretul</label>
                <input type="number" name="price_trt" placeholder="Pretul Trotinetei">
                @error("price_trt")
                    <p class="errors">{{$message}}</p>
                @enderror
                <textarea name="description" id="" cols="30" rows="10" placeholder="Descrierea(Proprietati ale trotinetei)"></textarea>
                @error("description")
                <p class="errors">{{$message}}</p>
                @enderror
                     <label for="hidden">Ascunde trotineta:</label>
            <input type="checkbox" name="hidden" id="hidden" value="1">
                <div class="button-send">
                    <button>Actualizează trotinetă</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
