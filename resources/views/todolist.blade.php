<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/reset.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card__header">
        <p class="title mb-15">ToDo List</p>
        <div class="auth mb-15">
          <p class="detail">「{{$users->name}}」でログイン中</p>
          <form action="/logout" method="post">
            @csrf
            <button class="btn-logout">ログアウト</button>
          </form>
        </div>
      </div>
      <form action="/search" method="post">
        @csrf
        <button class="btn-search mb-15">タスク検索</button>
      </form>
      <div class="todo">
        @if (count($errors) > 0)
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
          </ul>
        @endif
        <form action="/create" method="post" class="flex between mb-30">
          @csrf
          <input type="text" class="input-add" name="name">
          <input type="hidden" name="user_id" value={{$users->id}}>
          <select class="select-tag" name="tag_id">
            @foreach ($tags as $tag)
              <option value={{$tag->id}}>{{$tag->name}}</option>
            @endforeach
          </select>
          <input class="button-add" type="submit" value="追加">
        </form>
        <table>
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>タグ</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            @foreach ($todos as $todo)
            <tr>
              <td>
                {{$todo->updated_at}}
              </td>
              <form action="/update" method="post">
                <td>
                  @csrf
                  <input type="text" class="input-update" name="name" value={{$todo->name}}>
                  <input type="hidden" name="id" value={{$todo->id}}>
                </td>
                <td>
                  <select class="select-tag" name="tag_id">
                    <option type="hidden" value={{$todo->tag_id}}>{{$todo->tags->name}}</option>
                    @foreach ($tags as $tag)
                      <option value={{$tag->id}}>{{$tag->name}}</option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <button class="button-update">更新</button>
                </td>
              </form>
              <form action="/delete" method="post">
                <td>
                  @csrf
                  <input type="hidden" name="name" value={{$todo->name}}>
                  <input type="hidden" name="id" value={{$todo->id}}>
                  <button class="button-delete">削除</button>
                </td>
              </form>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>