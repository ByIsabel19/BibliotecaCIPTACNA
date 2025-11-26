 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ route("home")}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Items</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route("items-nuevo")}}">
              <i class="bi bi-circle"></i><span>Agregar Item</span>
            </a>
          </li>
          <li>
            <a href="{{route("detalle-item")}}">
              <i class="bi bi-circle"></i><span>Consultar Item</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("categorias")}}">
          <i class="bi bi-person"></i>
          <span>Categoría</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("autores")}}">
          <i class="bi bi-question-circle"></i>
          <span>Autores</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("universidades")}}">
          <i class="bi bi-envelope"></i>
          <span>Universidades</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("capitulos")}}">
          <i class="bi bi-card-list"></i>
          <span>Capítulos</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("reportes")}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Reportes</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route("usuarios")}}">
          <i class="bi bi-dash-circle"></i>
          <span>Usuarios</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->