@extends('layouts.login')

@section('content')
<div class="container">
    <div>
    <p>つぶやき投稿フォーム</p>
    </div>
    <div>
        <table>
            <tr>
                <div class="">
                  <td><img src="images/icon1.png"></td>

                  <div class="">
                      <td>name</td>
                      <td>日時</td>
                    <td>内容</td>
                  </div>

                  <div class="">
                    <td><a href=""><img src="images/edit.png"></a></td>
                    <td><a href="" onclick="return confirm('この投稿を削除してよろしいですか？')"><img src="images/trash.png"></a></td>
                  </div>
                </div>
            </tr>
        </table>
    </div>
</div>

@endsection
