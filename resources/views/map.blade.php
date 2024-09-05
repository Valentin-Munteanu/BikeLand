@extends("loyaut")
@section("title", "Locația")
@section("content")
<div class="background-map">
<h2>Locațiile noastre</h2>
</div>
<div id="map"></div>
<script src="{{asset("Map/map.js")}}"></script>
@endsection
