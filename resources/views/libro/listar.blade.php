<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
     <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>NumPaginas</th>
                <th>Precio</th>
                <th>Modificar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
         
            <tr>
                <td>{{ $libro->Titulo }}</td>
                <td>{{ $libro->Autor }}</td>
                <td>{{ $libro->NumPaginas }}</td>
                <td>{{ $libro->Precio }}</td>
                <td><a href="/libro/modificar/{{ $libro->id }}">Modificar {{ $libro->id }}</a></td>
            </tr>
            @endforeach

        </tbody>
     </table>
</div>
