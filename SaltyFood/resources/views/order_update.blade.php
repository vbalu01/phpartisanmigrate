<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rendelés módosítása</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="text-center">Rendelés állapota | módosítás</h2>
  <br>
  <form action = "/updateOrder/<?php echo $id; ?>" method = "post" class="form-group" style="width:70%; margin-left:15%;" action="/action_page.php">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

  <!--id int [PK, increment]
c_id INT [ref: > app.couriers.id]
a_id INT [ref: > app.addresses.id]
o_date datetime [NOT NULL]
o_status int [NOT NULL]
payment_method int [NOT NULL]
full_price int [NOT NULL]-->

        
   
    <label class="form-group">Futár:</label>
  
    
    
    <select class="form-control" name="c_id">

    @foreach ($couriers as $da => $c)
    
<option value="{{$c -> id}}">{{$c -> c_name}}</option>
@endforeach
    </select>
    

    
        <label>Szállítási cím:</label>

       
    <select class="form-control" name="a_id">


    @foreach ($addresses as $da => $a)
<option value="{{$a -> id}}">{{$a -> a_name}}</option>
@endforeach
    </select>
   
    <label>Rendelés ideje:</label>
    @foreach ($orders as $da => $o)
         
         <input type="date" class="form-control" placeholder="{{$o ->o_date}}" name="o_date" required>
        
         <label> Rendelés állapota::</label>



         <input type="number" class="form-control" placeholder="{{$o ->o_status}}" name="o_status" min='1' required>

            <label> Fizetési mód:</label>
            <select class="form-control" name="payment_method">


    
<option value="1">Készpénz</option>
<option selected="true" value="2">Kártya</option>
<option selected="true" value="3">Onlyfans</option>
        
    </select>
<label>Végösszeg:</label>
<input type="number" class="form-control" placeholder="{{$o -> full_price}}" name="full_price" required>
@endforeach

    <button type="submit"  value = "" class="btn btn-primary">Rendelés módosítása</button>
  </form>
</div>

</body>
</html>