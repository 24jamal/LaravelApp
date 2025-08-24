@props(['user', 'size' => 'w-12 h-12'])



@if ($user->image)
    <img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full">
@else
    <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/100/male3-512.png" alt="Dummy Avatar"
        class="{{ $size }} rounded-full">
@endif