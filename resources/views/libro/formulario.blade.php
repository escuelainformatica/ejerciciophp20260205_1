<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
     <form method="post">
        @csrf
        <input type="text" name="Titulo" placeholder="Titulo" value="{{ $libro->Titulo }}"/><br/>
        <input type="text" name="Autor" placeholder="Autor" value="{{ $libro->Autor }}"/><br/>
        <input type="text" name="NumPaginas" placeholder="NumPaginas" value="{{ $libro->NumPaginas }}"/><br/>
        <input type="text" name="Precio"  placeholder="Precio"  value="{{ $libro->Precio }}"/><br/>
        <button type="submit">Enviar</button>
     </form>
</div>
<div>{{ $mensaje }}</div>


