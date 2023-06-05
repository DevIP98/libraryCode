@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>Bienvenidos al futuro</h2>
                    <p>En este sitio encontrarás noticias y novedades en tecnología, recursos para programadores, tutoriales y guías de aprendizaje.</p>
                    <p>Explora nuestro menú de programación y libros de tecnología para encontrar información interesante y útil.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>Noticias y novedades en tecnología</h3>
                    <p>¡Mantente al día con las últimas noticias y novedades en tecnología! Aquí encontrarás artículos interesantes sobre los avances más recientes en el mundo de la tecnología.</p>
                    <a href="{{ route('categorias.index') }}" class="btn btn-outline-info">Ver más noticias</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>Recursos para programadores</h3>
                    <p>¿Eres programador o estás interesado en aprender a programar? Aquí encontrarás una gran variedad de recursos útiles, como tutoriales, guías de aprendizaje y herramientas para programadores.</p>
                    <a href="{{ route('libros.index') }}" class="btn btn-outline-info">Ver más recursos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
