<?php
//dd($data);
?>


<div>
    <table border="1px solid black">
    @foreach ($data as $dat)
        <tr>
            @foreach (get_object_vars($dat) as $da => $e)
                <td>{{ $e }}</td>
            @endforeach
        </tr>
    @endforeach
    </table>
</div>