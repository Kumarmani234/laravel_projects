<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<h1><i>Asapu Sri Kumar Manikanta</i></h1>
<table class="table">
<thead class='bg-success'>
<th scope="col"><h1>Id</h1></th>
<th scope="col"><h1>Title</h1></th>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
    <td><button><h3>{{$post->id}}</h3></button></td>
    <td><button><h3>{{$post->title}}</h3></button></td>
</tr>
@endforeach
</tbody>
</table>