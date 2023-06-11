<!DOCTYPE html>
<html lang="en">
<head>
  <title>Étterem módosítása</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center mt-3">Étterem | módosítás</h2>
  <br>
  <form action = "/updateMenu/<?php echo $id; ?>" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<!--$c_id = $request->input('c_id');
        $a_id = $request->input('a_id');
        $o_date = $request->input('o_date');
        $o_status = $request->input('o_status');
        $payment_method = $request->input('payment_method');
        $full_price = $request->input('full_price');-->

        <!--id int [PK, increment]
email varcahr [NOT NULL]
r_name varchar [not null]
password varcahr [NOT NULL]
address varcahr [NOT NULL]
available boolean [NOT NULL]-->

        
   
    <label class="form-group">Étterem neve:</label>
    @foreach ($restaurants as $da => $e)
    <input type="text"  class="form-control" placeholder="{{$e -> r_name}}" name="r_name" required>

    
        <label>Étterem email:</label>
         <input type="text" class="form-control" placeholder="{{$e -> email}}" name="email"required >

         <label>Étterem új jelszava:</label>
         <input type="password" class="form-control" placeholder="******" name="password" required>
         <label> Étterem címe:</label>
         <input type="text" class="form-control" placeholder="{{$e -> address}}" name="address" required>
            <label> Étel kategória:</label>

<label>Elérhetőség</label>
        <select class="form-control" name="available">


    
    <option value="0">Hamis</option>
    <option selected="true" value="1">Igaz</option>

            
        </select>
  @endforeach

    <button type="submit"  value = "" class="btn btn-primary mt-3">Étterem módosítása</button>
  </form>
</div>

</body>
</html>