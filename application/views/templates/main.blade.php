<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Unity Project @yield('title')</title>
  <meta name="viewport" content="width=device-width" />
  <link href="http://fonts.googleapis.com/css?family=Londrina+Solid|Montserrat" rel="stylesheet" type="text/css" />
  {{ Basset::show('up.css') }}
  {{ Basset::show('jq.js') }}
  <link rel="icon" type="image/ico" href="/img/favicon.ico">
  <link rel="shortcut icon" type="image/ico" href="/img/favicon.ico">
  @yield('extra')
</head>
<body>
  <div class="container">
    {{ HTML::image('img/logoTrans.png', 'Unity Project', array('id' => 'logo')) }}
    <nav>
      <ul>
        <li class="enders">{{ HTML::link_to_route('root', 'home')}}<div class="first"></div></li>
        <li>{{ HTML::decode(HTML::link_to_route('involved', '<p class="nav">get</p><p>involved</p>')) }}<div class="middle"></li>
        <li>{{ HTML::decode(HTML::link_to_route('about', '<p class="nav">about</p><p>us</p>')) }}<div class="last"></div></li>
        <li class="enders">{{ HTML::link_to_route('pictures', 'pictures') }}</li>
      </ul>
    </nav>
    <div class="content">
      @yield('content')
    </div>
  </div>
</body>
</html>