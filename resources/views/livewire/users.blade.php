<div>
    <h1 class="text-3xl font-bold">{{ $title }}</h1>

    <p>Users count: {{ count($users) }}</p>

    @foreach ($users as $user)
        <div>{{ $user->name }}</div>
    @endforeach
</div>
