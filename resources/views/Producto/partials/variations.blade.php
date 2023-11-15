<table>
    @foreach($variacions as $variacion)
        <tr>
            <td><input {{ $variacion->value ? 'checked' : null }} data-id="{{ $variacion->id }}" type="checkbox" class="variacion-enable"></td>
            <td>{{ $variacion->nombre }}</td>
            <td><input value="{{ $variacion->value ?? null }}" {{ $variacion->value ? null : 'disabled' }} data-id="{{ $variacion->id }}" name="variacions[{{ $variacion->id }}]" type="text" class="form-control" placeholder="Tiempo extra"></td>
        </tr>
    @endforeach
</table>

@section('scripts')
    @parent
    <script>
        $('document').ready(function () {
            $('.variacion-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.variacion-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.variacion-amount[data-id="' + id + '"]').val(null)
            })
        });
    </script>
@endsection