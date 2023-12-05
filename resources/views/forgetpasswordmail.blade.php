<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<p>{{$data['body']}}</p>
<a href="{{route('reset.password',$data['token'])}}">Click here</a>
<p>Thank You</p>
</body>
</html>
