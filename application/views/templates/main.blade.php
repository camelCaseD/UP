<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Unity Project @yield('title')</title>
  <meta name="viewport" content="width=device-width" />
  <link href="http://fonts.googleapis.com/css?family=Londrina+Solid|Montserrat" rel="stylesheet" type="text/css" />
  {{ Basset::show('up.css') }}
  @yield('extra')
</head>
<body>
  <div class="container">
    {{ HTML::image('img/logoTrans.png', 'Unity Project', array('id' => 'logo')) }}
    <nav>
      <ul>
        <li class="enders">{{ HTML::link_to_route('root', 'home')}}<div class="first"></div></li>
      </ul>
    </nav>
  </div>
</body>
</html>