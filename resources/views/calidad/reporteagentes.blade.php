
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reporte de Calidad</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="formulario/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="formulario/css/util.css">
	<link rel="stylesheet" type="text/css" href="formulario/css/main.css">
    </head>
<body>
	{!! Form::open(['route' => 'consulta.ejecuta']) !!}
	@csrf
	<div class="container-contact100">
		<div class="wrap-contact100">
		
	
			
				<span class="contact100-form-title">
				Reportes
				</span>

			<!--	<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">FULL NAME *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name">
				</div>
            -->
			<!--	<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>
            -->
			<!--	<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">Phone</span>
					<input class="input100" type="text" name="phone" placeholder="Enter Number Phone">
				</div>
            -->
            <div class="wrap-input100 input100-select bg1">
					<span class="label-input100">PLANTILLA *</span>
					<div>
						<select class="js-select2" name="plantilla" required>
                            <option value="">Seleccione la Pantilla </option>
                            @foreach ($plantilla_grupos as $plantilla_gruposs)
                            <option value="{{ $plantilla_gruposs->id }}">{{ $plantilla_gruposs->id }}  ||  {{ $plantilla_gruposs->nombre }}  </option>
                            @endforeach
						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">Grupo *</span>
					<div>
                    <select class="js-select2" name="grupo" required>
                            <option value="">Seleccione un Grupo </option>
                            @foreach ($departamento as $departamentos)
                            <option value="{{ $departamentos->user_group }}"> {{ $departamentos->user_group }} || {{ $departamentos->group_name }} </option>
                            @endforeach
						
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div>

				

				<div class="wrap-input100 validate-input bg0 rs1-alert-validate" data-validate = "Please Type Your Message">
					<span class="label-input100">Fecha desde</span>
                    <div class="form-group col-6">
        {{ form::label('fechadesde', 'Fecha de Gestion desde') }}
        {{ Form::date('fechadesde',null,['class' => 'form-control','required' => 'required']) }}
        </div>
        <div class="form-group col-6">
        {{ form::label('fechahasta', 'Fecha de Gestion Hasta') }}
        {{ Form::date('fechahasta', \Carbon\Carbon::now()->format('Y-m-d'),['class' => 'form-control']) }}
        </div>
				</div>
              
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit">
                  
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                
				</div>
               
		</div>
	</div>

	{!! Form::close() !!}



<!--===============================================================================================-->
<script src="{{ asset('formulario/vendor/jquery/jquery-3.2.1.min.js') }}"></script>

<!--===============================================================================================-->
	<script src="{{ asset('formulario/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('formulario/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('formulario/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('formulario/vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('formulario/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('formulario/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('formulario/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
    <script src="{{ asset('formulario/vendor/noui/nouislider.min.js') }}"></script>
  
	
<!--===============================================================================================-->
	<script src="{{ asset('formulario/js/main.js') }}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
