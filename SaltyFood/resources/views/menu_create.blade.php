<!DOCTYPE html>
<html lang="en">
<head>
  <title>Étel felvétele</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center mt-3">Étel | felvétel</h2>
  <br>
  <form action = "/createMenu" method = "post" class="form-group p-3" style="width:70%; margin-left:15%;" action="/action_page.php">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<!--$c_id = $request->input('c_id');
        $a_id = $request->input('a_id');
        $o_date = $request->input('o_date');
        $o_status = $request->input('o_status');
        $payment_method = $request->input('payment_method');
        $full_price = $request->input('full_price');-->

    <label class="form-group">Étterem:</label>
    <select class="form-control" name="r_id">
    @foreach ($data['restaurants'] as $da)
    
    <option hidden="hidden" value="{{$da -> id}}">{{$da -> id}} - {{$da -> r_name}}</option>
            

    @endforeach
            
        </select>
        <label>Étel:</label>
        <input type="text" class="form-control" placeholder="Kakaós Prézli" name="f_name" required>
    
        <label>Étel leírása:</label>
         <input type="text" class="form-control" placeholder="Boostolja a dimat IQ-dat " name="description" required>

         <label>Étel ára:</label>
         <input type="number" class="form-control" placeholder="750" name="price" required>
         <label> Étel képe:</label>
         <input type="text" class="form-control" placeholder="https://onlyfans.com/sikin.jpg" name="img_src">
            <label> Étel kategória:</label>
    <select class="form-control" name="c_id">

    @foreach ($data['categories'] as $da)
    
    <option value="{{$da -> id}}">{{$da -> id}} - {{$da -> c_name}}</option>
            

    @endforeach
            
        </select>
<label>Elérhetőség</label>
        <select class="form-control" name="available">


    
    <option value="0">Hamis</option>
    <option selected="true" value="1">Igaz</option>

            
        </select>


    <button type="submit"  value = "" class="btn btn-primary mt-3">Étel felvétele</button>
  </form>
</div>

</body>
</html>