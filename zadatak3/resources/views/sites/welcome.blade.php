@extends('layouts.app')

@section('content')
    <h2>List of people</h2>
    <table id="table" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Height</th>
                <th>Mass</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

@endsection


@section('js')
<script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable({
            ajax: {
                url: '{{ route("api.characters") }}',
                dataSrc: 'results'
            },
            columns: [
                { data: 'name' },
                { data: 'height' },
                { data: 'mass' }

            ]

        });
    });
</script>
@endsection
