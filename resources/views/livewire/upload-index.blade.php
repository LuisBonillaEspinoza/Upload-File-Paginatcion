
    <div class="col-md-8">
        <h2>Archivos Subidos</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Tamaño</th>
                <th>Fecha de Subida</th>
                <th>Ubicacion del Archivo</th>
            </thead>
            <tbody>
                @foreach ( $upload as $file )
                <tr>
                    <td>
                        <img src='storage/{{ $file->name }}' name="{{$file->name}}" style="width:90px;height:90px;">
                    </td>
                    <td>
                        {{ $file->name }}
                    </td>
                    <td>
                        @if($file->size < 1000)
                            {{ number_format($file->size,2) }} bytes
                        @elseif($file->size >= 1000000)
                            {{ number_format($file->size/1000000,2) }} mb
                        @else
                            {{ number_format($file->size/1000,2) }} kb
                        @endif
                    </td>
                    <td>
                        {{ $file->created_at->format('d/m/Y') }}
                    </td>
                    <td>
                        <a href="{{ $file->location }}">Mostrar Imagen</a>
                        <a href="{{ route('upload.download',$file) }}">Descargar Imagen</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $upload->links() }}
    </div>
