<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rendelés felvétele</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">Rendelés | felvétel</h2>
  <br>
  <form action = "/createOrder" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<!--$c_id = $request->input('c_id');
        $a_id = $request->input('a_id');
        $o_date = $request->input('o_date');
        $o_status = $request->input('o_status');
        $payment_method = $request->input('payment_method');
        $full_price = $request->input('full_price');-->

    <label class="form-group">Futár:</label>
    <input type="text" class="form-control" placeholder="" name="c_id">
    <label>Cím:</label>
    <input type="text" class="form-control" placeholder="" name="a_id">
    <select class="form-control" name="a_id">
    @foreach ($data['addresses'] as $da)
    
    <option value="{{$da -> id}}">{{$da -> id}} - {{$da -> a_name}}</option>
            

    @endforeach
            
        </select>
  <label>Rendelés dátuma:</label>
        <select class="form-control" name="o_date">
            <option value="bhubaneswar">Bhubaneswar</option>
            <option value="cuttack">Cuttack</option>
        </select>
<label>Rendelés állapota:</label>
    <input type="text" class="form-control" placeholder="Enter Email" name="o_status"><br>
    <label>Fizetés típusa:</label>
    <select class="form-control" name="payment_method">
            <option value="kp">Készpénz</option>
            <option value="card">Bankkártya</option>
        </select>
    <label>Végösszeg::</label>
    <input type="number" class="form-control" placeholder="25000" name="full_price"><br>
    <button type="submit"  value = "Add student" class="btn btn-primary">Rendelés leadása</button>
  </form>
</div>

</body>
</html>