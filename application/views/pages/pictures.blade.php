@layout('templates.main')

@section('title')
  Unity Project :: Pictures
@endsection

@section('extra')
  {{ Basset::show('pg.css') }}
  {{ Basset::show('pg.js') }}
@endsection

@section('content')
  <h1>Unity Project - Pictures</h1>
  <ul id="pg">
    <li>{{ HTML::image('/img/worship.JPG', 'Worship')}}</li>
    <li>{{ HTML::image('/img/vBall.JPG', 'Volley Ball')}}</li>
    <li>{{ HTML::image('/img/bBall.JPG', 'Basket Ball')}}</li>
    <li>{{ HTML::image('/img/fooseBall.JPG', 'Foose Ball')}}</li>
    <li>{{ HTML::image('/img/foose.JPG', 'Foose')}}</li>
    <li>{{ HTML::image('/img/pinBall.JPG', 'Pin Ball')}}</li>
    <li>{{ HTML::image('/img/t.JPG', 'Barbaque')}}</li>
  </ul>
@endsection