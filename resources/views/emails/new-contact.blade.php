<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuova mail</title>
</head>
<body>
    <div class="form-group">
        <h3>Nuova mail ricevuta:</h3>
        <p class="form-control">Da: "{{$lead->email}}"</p>
        <p class="form-control">Nome: "{{$lead->name}}"</p>
        <p class="form-control">Message: </p>
        <p>
            {{$lead->message}}
        </p>
    </div>
</body>
</html>
