
<p>Estimad@ {{ $nombre }}</p>
<p>Te enviamos el gráfico de tu Carta Astral elaborado por Rubén Jungbluth.
    En el gráfico encontrarás los símbolos, planetas y asteroides que influencian en tu vida.
    Con esta carta natal podrás aprender a interpretarla y conoces más detalles en nuestras conferencias, talleres y programa
    “Reescribiendo Tu Destino” que emitimos todos los jueves a las 8 pm en vivo por “Epistre Tv”, tanto en Facebook, YouTube y www.epistre.net </p>
<p>Recuerda que, si pierdes tu gráfico, debes ingresar a nuestra web www.astrovision.us  y con tu usuario y contraseña podrás descargarlo nuevamente.
    “Tu destino está escrito, pero puedes modificarlo”.</p>
<p>Saludos,</p>
<p>Astro Vision, Inc.</p>
<img src="{{  $message->embed(storage_path("app/".$imagen))  }}" width="500px" height="500px" alt="">
