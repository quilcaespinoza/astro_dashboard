<?php // $user = json_encode($data)?>
{{--{{ $img = $data['imagen'] }}--}}
{{--<h1>Gracias {{$data["nombre"]}}</h1>--}}
{{--<img src='{{ asset("storage/$data")}}' width="100px" height="100px" alt="">--}}
{{--<img src="{{storage_path('app/')}}" alt="">--}}


{{--<h2>{{$data["email"]}}</h2>--}}
{{--<h1>{{$user['nombre']}}</h1>--}}
{{--{{dump($user)}}--}}

<h1>{{$nombre}}</h1>
<img src="{{  $message->embed(storage_path("app/".$imagen))  }}" width="500px" height="500px" alt="">
