<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
     <form method="post">
        @csrf
        <input type="text" name="Titulo" placeholder="Titulo" value="{{ $libro->Titulo }}"/><br/>
        @error('Titulo')
        <div style="color:red">{{ $message }}</div>
        @enderror()
        <input type="text" name="Autor" placeholder="Autor" value="{{ $libro->Autor }}"/><br/>
         @error('Autor')
        <div style="color:red">{{ $message }}</div>
        @enderror()
        <input type="text" name="NumPaginas" placeholder="NumPaginas" value="{{ $libro->NumPaginas }}"/><br/>
         @error('NumPaginas')
        <div style="color:red">{{ $message }}</div>
        @enderror()
        <input type="text" name="Precio"  placeholder="Precio"  value="{{ $libro->Precio }}"/><br/>
         @error('Precio')
        <div style="color:red">{{ $message }}</div>
        @enderror()
        <button type="submit">Enviar</button>
     </form>
</div>
<div>{{ $mensaje }}</div>


