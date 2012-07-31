@layout('templates.main')

@section('extra')
  {{ Basset::show('nivo.css') }}
  {{ Basset::show('nivo.js') }}
@endsection

@section('content')
  <div class="slider-wrapper up-nivo">
    <div id="slider" class="nivoSlider">
      {{ HTML::image('/img/logo.JPG', '') }}
      {{ HTML::image('/img/line.JPG', '') }}
      {{ HTML::image('/img/game.JPG', '') }}
      {{ HTML::image('/img/leaders.JPG', '') }}
      {{ HTML::image('/img/crowdFacingJim.JPG', '') }}
      {{ HTML::image('/img/band.JPG', '') }}
    </div>
  </div>
@endsection