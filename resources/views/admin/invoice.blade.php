<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        

      <center>
          
             <h4>Customer Name: {{ $data->name }}</h4>
             <h4>Customer addr: {{ $data->rec_address }}</h4>
             <h4>Customer Phone Number: {{ $data->phone}}</h4>
             <h4>product Title: {{ $data->product->title}}</h4>
             <h4>product Price: {{ $data->product->price}}</h4>
             <img src="products/{{ $data->product->image }}" height="200px" width="300px">

      </center>

</body>
</html>