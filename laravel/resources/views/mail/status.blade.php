<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estat comanda </title>
</head>

<body>

  <h2>Canvi estat comanda</h2>
  <p>Estimat Sr./ Estimada Sra.: {{$ticket->user_name}}</p>
  <p>La seva comanda ha cambiat de estat, l'estat de la seva comanda es: <b>{{$ticket->estat}}</b> </p>
  <h4>Nº de seguiment : {{ $ticket->id }}</h4>

  <p>No dubtis a contactar-nos en cas de tindre alguna dubte</p>
  <p>Els saludem cordialment,</p>

</body>

</html>