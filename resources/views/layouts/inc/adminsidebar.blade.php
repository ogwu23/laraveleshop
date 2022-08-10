<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{Request::is('dashboard') ? 'active':''}}" >
      <a class="nav-link" href="index.html">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <!-- category -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{Request::is('categories') ? 'active':''}} "> <a class="nav-link" href="{{url('categories')}}">View Category page</a></li>
          <li class="nav-item {{Request::is('add-category') ? 'active':''}}"> <a class="nav-link" href="{{url('add-category')}}">Add Category</a></li>
        </ul>
      </div>
    </li>
    <!-- end of category-->

    <!-- product -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-circle-outline menu-icon"></i>
        <span class="menu-title">Product</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{Request::is('products') ? 'active':''}} "> <a class="nav-link" href="{{url('products')}}">View Product page</a></li>
          <li class="nav-item {{Request::is('add-product') ? 'active':''}}"> <a class="nav-link" href="{{url('add-product')}}">Add Product</a></li>
        </ul>
      </div>
    </li>
    <!-- end of product-->

    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Form elements</span>
      </a>
    </li>

  </ul>
</nav>
<!-- partial -->
