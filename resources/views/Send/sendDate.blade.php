@if (session("success"))

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesare de date</title>
    <link rel="stylesheet" href="{{ asset("Css/styles.css") }}">
<link rel="icon" href="{{asset("Images/Logo.png")}}">
    <script defer src="{{asset("SendDate/send.js")}}"></script>
</head>
<body>
    <div class="sendDate">
        <div class="modal-send">
            <h2 id="processing-text">Informația se procesează, vă rugăm să așteptați</h2>
            <img class="loading-img" id="loadingImg" src="https://usagif.com/wp-content/uploads/loading-96.gif" alt="Loading...">
            <h2 id="success-text" class="hidden">Ați fost înregistrat cu succes, vă rugăm să activați contul prin confirmarea pe care ați primito pe E-mailul Dvs.</h2>
            <img src="https://cdn4.iconfinder.com/data/icons/buno-info-signs/32/__sync_done_success-512.png" class="succes-date hidden" id="successIcon" alt="">
        </div>
    </div>

</body>
</html>
@endif
