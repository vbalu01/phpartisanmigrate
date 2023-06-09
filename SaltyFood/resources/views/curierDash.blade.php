<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Futár</title>
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="tinder">
        <div class="tinder--status">
          <i class="fa fa-remove"></i>
          <i class="fa fa-heart"></i>
        </div>

        <div id="cards" class="tinder--cards">
          <div class="tinder--card">
            <img src="https://placeimg.com/600/300/people">
            <h3>Demo card 1</h3>
            <p>This is a demo for Tinder like swipe cards</p>
          </div>
          <div class="tinder--card">
            <img src="https://placeimg.com/600/300/animals">
            <h3>Demo card 2</h3>
            <p>This is a demo for Tinder like swipe cards</p>
          </div>
          <div class="tinder--card">
            <img src="https://placeimg.com/600/300/nature">
            <h3>Demo card 3</h3>
            <p>This is a demo for Tinder like swipe cards</p>
          </div>
          <div class="tinder--card">
            <img src="https://placeimg.com/600/300/tech">
            <h3>Demo card 4</h3>
            <p>This is a demo for Tinder like swipe cards</p>
          </div>
          <div class="tinder--card">
            <img src="https://placeimg.com/600/300/arch">
            <h3>Demo card 5</h3>
            <p>This is a demo for Tinder like swipe cards</p>
          </div>
        </div>

        <div class="tinder--buttons">
          <button id="nope"><i class="fa fa-remove"></i></button>
          <button id="accept"><i class="fa fa-check"></i></i></button>
        </div>
      </div>
      <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
      <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
      <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
      <script src="{{ asset('js/swiper.js') }}"></script>
      <script>
        $(document).ready(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            $.ajax({
                type: "POST",
                url: '/Dashboard/Courier/getorders',
                async: false,
                success: function(response){
                    const obj = JSON.parse(response);
                    obj.forEach(element => {
                        $( "#cards" ).append(
                        "<div class='tinder--card' value='"+element.orderID+"'>"+
                            "<h3>Felvételi üzlet: </h3>"+
                            "<h3>"+element.r_name+"</h3>"+
                            "<h4>Felvételi cím: "+element.restAddr+"</h3>"+
                            "<h3>Kiszállítás: </h3>"+
                            "<h3>"+element.u_fullname +"</h3>"+
                            "<h4>Szállítási cím: "+element.userAddr+"</h4>"+
                            "<p>Termék: "+element.f_name+"</p>"+
                        "</div>");
                    });
                }
            });
        });
        </script>
</body>
</html>
