<!-- Show errors -->
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif  
<h3 style ="color: #c70000">{{ isset($err) ? $err : ' ' }}</h3><br>

<br>
<form method="POST" accept-charset="UTF-8" action="{{ route('do_transfer') }}">
    {{ csrf_field() }} 
    Введите номер счета для перевода средств: 
    <input type="text" name="number_of_account" maxlength="11" value=""><br><br>
    Введите сумму перевода:  
    <input type="text" name="money_for_transfer" maxlength="20" value=""><br><br>
    <input type="submit" class="btn btn-success" name="do_transfer" value="Перевести"><br><br>
</form>

<b>{{ isset($result_action) ? $result_action : ' ' }}</b>