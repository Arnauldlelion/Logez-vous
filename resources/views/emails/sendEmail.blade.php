<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $mailData['title']}}</h1>
    <p>{{$mailData['body']}} </p>
    <p> this is the content of your email. thant for your subscription on our app.</p>
    <p>thanks</p>
    {{-- <a href="{{route('sendMail')}}">send mail</a> --}}
</body>
</html>