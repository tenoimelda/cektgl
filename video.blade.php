

@foreach ($a as $date  => $value) 
{{$date}}<br>
@foreach($value as $abc)
{{$abc->nama_brg}} <br>
@endforeach
<br>
@endforeach
