<label>
    Status:
    <select name="status">
        <option {{isset($link) ? ($link->status == 1 ? 'selected' : '') : ''}} value="1">Ativo</option>
        <option {{isset($link) ? ($link->status == 0 ? 'selected' : '') : ''}} value="0">Desativado</option>
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
        <option {{isset($link) ? ($link->op_border_type == 'rounded' ? 'selected' : '') : ''}}
            value="rounded">Arredondada</option>
        <option {{isset($link) ? ($link->op_border_type == 'square' ? 'selected' : '') : ''}} value="square">Quadrada
        </option>
    </select>
</label>

<button type="submit">Salvar</button>