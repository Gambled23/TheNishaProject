<table>
    @foreach($variacions as $variacion)
        <tr>
            <td>{{ $variacion->nombre }}</td>
            <td><input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mb-2" type="text" name="variacions[{{ $variacion->id }}]" id="tiempo_total" placeholder="Tiempo extra" value="{{old('tiempo_extra')}}">
        </tr>
    @endforeach
</table>