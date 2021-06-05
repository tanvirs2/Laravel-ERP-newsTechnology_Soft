
<table class="table table-bordered">
    <tr>
        <th>SL</th>
        <th>Qty</th>
        <th>Time</th>
    </tr>
    @foreach($partials as $k => $partial)
    <tr>
        <td>{{ ++$k }}</td>
        <td>{{ $partial->qty }}</td>
        <td>{{ $partial->created_at }}</td>
    </tr>
    @endforeach
</table>