<form method="post">
    @csrf
    email (john@example.com):<input type="text" name="email" value="{{ $usuario->email }}"/><br/>
    @error("email")
    <div style="color:red">{{ $message }}</div>
    @enderror
    password:<input type="password" name="password" value=""/><br/>
    @error("password")
    <div style="color:red">{{ $message }}</div>
    @enderror
    Recordar clave <input type="checkbox" value="1" name="remember"/><br/>
    <button type="submit" name="boton">Login</button><br/>
    <div style="color:red">{{ $mensaje }}</div>

</form>