<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/nba/pp" method="post" >
{{--        <input type="hidden" name="__token" value="{{csrf_token()}}">--}}
        @csrf
        @method('put')
        <button type="submit">submit</button>
    </form>
</body>
</html>
