<table class="table">
    <thead class="thead-inverse">
    <tr>
        <th>#</th>
        <th>Участник</th>
        <th>Сумма</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>

    @foreach($donations as $donation)
        <tr>
            <th scope="row"></th>
            <td>{{ $donation->name}}</td>
            <td>{{ $donation->donate}}</td>
            <td>{{ $donation->created_at}}</td>
        </tr>

    @endforeach
    </tbody>
</table>

<nav class="pagination-nav" aria-label="Page navigation">
    {{ $donations->links() }}
</nav>
<div class="separator"></div>
