<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura </title>
</head>
<style>
  table,
  td,
  th {
    border: 1px solid black;
  }

  h3 {
    text-align: right;
  }

  table {
    width: 100%;
  }
</style>

<body>
  <h1>Informació Comanda</h1>
  <h2>Ticket ID: {{ $ticket->id }}</h2>
  <table>
    <tr>
      <th>Article</th>
      <th>Artiste</th>
      <th>Quantitat</th>
      <th>Preu/Unitat</th>
      <th>Total</th>
    </tr>
    @foreach ($lineas as $item)
    <tr>
      <td>{{ $item->product_name }}</td>
      <td>{{ $item->product_artist}}</td>
      <td>{{ $item->quantity }}</td>
      <td>{{ $item->price}}</td>
      <td>{{ $item->quantity * $item->price}}</td>
    </tr>
    @endforeach
  </table>
  <h3>TOTAL(EUR): {{ $ticket->final_price}}</h3>

  <img src="{{ public_path('/' . $ticket->qr) }}" alt="QR Code">

</body>

</html>