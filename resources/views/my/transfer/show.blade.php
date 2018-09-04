@extends('my.main')

@section('header')
  @parent
@endsection

@section('navbar')
  @parent
@endsection

@section('content')
  <h3>Вы перевели</h3>
  <table cellspacing="5" cellpadding="10" border="1" width="100%" style="text-align:center">
    <tr>
        <th>Дата и время</th>
        <th>От кого</th>
        <th>Кому</th>
        <th>Сумма перевода</th>
    </tr>
    @foreach ($transfers_from as $transfer_from) 
      <tr><td>{{ $transfer_from->created_at }}</td>
      <td>{{ $transfer_from->from_user_id }}</td>
      <td>{{ $transfer_from->to_user_id }}</td>
      <td>{{ $transfer_from->count_money }}</td></tr>  
    @endforeach
  </table>
  
  <h3>Вам перевели</h3>
  <table cellspacing="5" cellpadding="10" border="1" width="100%" style="text-align:center">
    <tr>
        <th>Дата и время</th>
        <th>От кого</th>
        <th>Кому</th>
        <th>Сумма перевода</th>
    </tr>
    @foreach ($transfers_to as $transfer_to) 
      <tr><td>{{ $transfer_to->created_at }}</td
      <td>{{  $transfer_to->from_user_id }}</td>
            <td>{{  $transfer_to->to_user_id }}</td>
            <td>{{  $transfer_to->count_money }}</td></tr>
    @endforeach
  </table><br>
  
@endsection

@section('footer')
  @parent
@endsection

