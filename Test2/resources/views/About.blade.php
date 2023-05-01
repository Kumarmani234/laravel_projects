<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<h1>This is About Page</h1>
<table class="table">
<thead class='bg-warning'>
<th scope="col">id</th>
<th scope="col">title</th>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
    <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
</tr>
@endforeach
</tbody>
</table>