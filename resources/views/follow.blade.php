<!DOCTYPE html>
<h1>ユーザー一覧</h1>

@foreach ($users as $user)
  <div style="margin-bottom: 10px;">
    <strong>{{ $user->name }}</strong>

    @if ($authUser->followings->contains($user))
      <form method="POST" action="{{ route('unfollow', $user->id) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">フォロー解除</button>
      </form>
    @else
      <form method="POST" action="{{ route('follow', $user->id) }}" style="display:inline;">
        @csrf
        <button type="submit">フォローする</button>
      </form>
    @endif
  </div>
@endforeach
