{{-- @if($errors->any())
<ul class="error-list">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif --}}

<label>
    Status:
    <select name="status">
        <option value="1">Ativo</option>
        <option value="0">Desativado</option>
    </select>
</label>

<label>
    Título do link:
    <input type="text" name="title" value="{{$link->title ?? old('title')}}" />
</label>

<label>
    URL do link:
    <input type="text" name="href" value="{{$link->href ?? old('href')}}" />
</label>

<label>
    Cor do fundo:
    <input type="color" name="op_bg_color" value="{{$link->op_bg_color ?? '#000000'}}" />
</label>

<label>
    Cor do texto:
    <input type="color" name="op_text_color" value="{{$link->op_text_color ?? '#ffffff'}}" />
</label>

<label>
    Tipo de borda:
    <select name="op_border_type">
        <option value="rounded" selected>Arredondada</option>
        <option value="square">Quadrada</option>
    </select>
</label>

<button type="submit">Salvar</button>