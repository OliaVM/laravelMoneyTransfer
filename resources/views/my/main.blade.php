<!DOCTYPE html>
<html lang="ru">
	<head>
	  	<meta charset="UTF-8">
		<!-- CSS Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<!-- theme Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- js Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> 
		<meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
	<body>
		@section('header')
		<div class="container" style="background-color: #e6e6e6">	
			<div class="row" style="background-color: #138808">
				<img src="{{asset('/images/main.jpg')}}" class="img-responsive"> 
			</div>
		@show 

		@section('navbar')
			<div class="row bg-info" style="background-color: #d6d6d6">
				<div class="col-xs-6 col-sm-4">
					<!-- Menu -->
					<br>
					@if (Auth::id() == null)
						<a href="{{ url('/login') }}"><button type="button" class="btn btn-success">Авторизоваться</button></a></li><br> 
                    	<a href="{{ url('/register') }}"><button type="button" class="btn btn-success">Зарегистрироваться</button></a></li><br> 
					@else
							<a href="{{ route('logout') }}"><button type="button" class="btn btn-success">Выход</button></a></li><br><br>  
							<a href="{{ route('do_transfer') }}"><button type="button" class="btn btn-success">Перевести</button></a></li><br><br> 
							<a href="{{ route('show', ['session_user_id' => Auth::id()]) }}"><button type="button" class="btn btn-success">Посмотреть операции</button></a></li><br><br> 
						
					@endif		
				</div>
				<div class="col-xs-12 col-sm-8" style="background-color: #c5d0e6">
		@show

		@section('content')
				<h3>This is a money transfer app</h3>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est ipsum eveniet consectetur, quidem vel quibusdam, eius at error cumque impedit, sapiente dignissimos facere! Quisquam error possimus nemo minus dolores dolore, aliquid aut numquam, consectetur quas cupiditate eveniet quibusdam officia. Quam accusamus ratione eveniet rerum optio dicta odit. Dignissimos, ut asperiores veritatis molestias harum consectetur a, recusandae voluptas, voluptatem, odit expedita! Tempora tenetur, deleniti delectus nesciunt dolore iusto, omnis facilis qui quam at. Tenetur ipsum iure labore aperiam fugit quos eius ducimus ullam architecto, laboriosam debitis ipsa, velit autem sunt tempora, maxime explicabo a, porro voluptate libero eligendi illum! Accusantium, illo! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam consectetur quo, recusandae asperiores nesciunt esse odio accusamus officiis! Magni eos repudiandae quas ratione sit, dicta tempore unde. Sint nam nemo sed quasi expedita beatae delectus laudantium asperiores vitae sunt, voluptatum architecto tempore quisquam obcaecati harum nostrum iste reiciendis. Doloribus magni consectetur, ad odit at quaerat ipsum quibusdam, pariatur accusantium. Dolores perspiciatis eum, placeat inventore consequuntur amet cupiditate quas nemo, deleniti repellat! Suscipit magnam deserunt maxime soluta, accusamus beatae quis qui velit ut eaque pariatur repellat doloribus dicta rem veritatis, ea quam labore veniam odio mollitia fugiat, aliquam sapiente nihil! Animi! <br><br> 
		@show

		@section('footer')
				</div>
			</div>
			<div class="row text-center">
				<img src="{{asset('/images/footer.jpg')}}" class="img-responsive">
			</div>
		@show
		</div>
	</body>
</html>