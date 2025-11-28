@extends('layouts.main')
@section('titulo','Dashboard')

@section('contenido')

<main id="main" class="main">

<section class="section dashboard">
  <div class="row">

    <!-- ===================== CONTADORES ===================== -->
    <div class="col-lg-12">
      <div class="row">

        <!-- ITEMS -->
        <div class="col-xxl-3 col-lg-3 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Ítems Registrados</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-collection"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $totalItems }}</h6>
                  <span class="text-muted small">Total Ítems</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- CATEGORÍAS -->
        <div class="col-xxl-3 col-lg-3 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Categorías</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-tags"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $totalCategorias }}</h6>
                  <span class="text-muted small">Total Categorías</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- AUTORES -->
        <div class="col-xxl-3 col-lg-3 col-md-6">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Autores</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $totalAutores }}</h6>
                  <span class="text-muted small">Autores Registrados</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- USUARIOS -->
        <div class="col-xxl-3 col-lg-3 col-md-6">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Usuarios</h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $totalUsuarios }}</h6>
                  <span class="text-muted small">Usuarios Registrados</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ===================== GRÁFICO BARRAS ===================== -->
        <div class="col-12 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ítems por Categoría</h5>
              <canvas id="catChart" style="height: 280px;"></canvas>
            </div>
          </div>
        </div>

        <!-- ===================== FILA MITAD-MITAD ===================== -->
        <div class="col-lg-6 mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ítems por Año</h5>
              <canvas id="anioChart" style="height: 300px;"></canvas>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mt-3">
          <div class="card recent-sales">
            <div class="card-body">
              <h5 class="card-title">Últimos Ítems Registrados</h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th>Ítem</th>
                    <th>Categoría</th>
                    <th>Año</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($itemsPorAnio->take(5) as $i)
                  <tr>
                    <td>{{ $i->anio_item }}</td>
                    <td>-</td>
                    <td>{{ $i->total }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

</main>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// ================= BARRA: ÍTEMS POR CATEGORÍA =================
new Chart(document.getElementById('catChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($itemsPorCategoria->pluck('categoria')) !!},
        datasets: [{
            label: 'Ítems',
            data: {!! json_encode($itemsPorCategoria->pluck('total')) !!},
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 2,
    }
});

// ================= DONA: ÍTEMS POR AÑO =================
new Chart(document.getElementById('anioChart'), {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($itemsPorAnio->pluck('anio_item')) !!},
        datasets: [{
            data: {!! json_encode($itemsPorAnio->pluck('total')) !!}
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: 2,
    }
});
</script>

@endpush
@endsection
