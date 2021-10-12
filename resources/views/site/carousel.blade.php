<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('./imagens/cliente02.jpeg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
            <h2>RF - Financeiro</h2>
            <p>Sistema para controle financeiro online. Completo, fácil de usar e gratuito.</p>
            <p><a class="btn btn-md btn-primary" href="{{ route('register') }}" role="button">Comece Já!</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('./imagens/cliente0101.jpeg') }}" alt="...">
      <div class="carousel-caption d-none d-md-block">
            <h2>Você no controle.</h2>
            <p>Controle financeiro completo pra você e sua família.</p>
            <p><a class="btn btn-md btn-primary" href="{{ route('register') }}" role="button">Comece Já!</a></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('./imagens/cliente03.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
            <h2>Tempo é dinheiro</h2>
            <p>No RF você controla sua grana diariamente em segundos e não perde tempo. Tenha tudo sob controle e aproveite seu tempo com o que realmente importa pra você!</p>
            <p><a class="btn btn-md btn-primary" href="{{ route('register') }}" role="button">Comece Já!</a></p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
