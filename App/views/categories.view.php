   <?= loadPartial('head') ?>

   <?= loadPartial('nav') ?>
    <!-- Categories Header -->
    <header class="py-5 bg-light">
      <div class="container text-center">
        <h1 class="display-4 mb-4 fade-in">Browse Categories</h1>
        <p class="lead mb-0 fade-in">Explore our content organized by topics</p>
      </div>
    </header>

    <!-- Categories Grid -->
    <section class="py-5">
      <div class="container">
        <div class="row">
          <!-- Business Strategy -->
          <div class="col-md-4 mb-4">
            <div class="card category-card fade-in">
              <div class="card-body text-center">
                <i class="fas fa-chart-line fa-3x mb-3 text-primary"></i>
                <h3 class="h4">Business Strategy</h3>
                <p class="text-muted">14 Articles</p>
                <a href="#" class="btn btn-outline-primary">View Articles</a>
              </div>
            </div>
          </div>

          <!-- Marketing -->
          <div class="col-md-4 mb-4">
            <div class="card category-card fade-in">
              <div class="card-body text-center">
                <i class="fas fa-bullhorn fa-3x mb-3 text-primary"></i>
                <h3 class="h4">Marketing</h3>
                <p class="text-muted">21 Articles</p>
                <a href="#" class="btn btn-outline-primary">View Articles</a>
              </div>
            </div>
          </div>

          <!-- Leadership -->
          <div class="col-md-4 mb-4">
            <div class="card category-card fade-in">
              <div class="card-body text-center">
                <i class="fas fa-users fa-3x mb-3 text-primary"></i>
                <h3 class="h4">Leadership</h3>
                <p class="text-muted">11 Articles</p>
                <a href="#" class="btn btn-outline-primary">View Articles</a>
              </div>
            </div>
          </div>

          <!-- Innovation -->
          <div class="col-md-4 mb-4">
            <div class="card category-card fade-in">
              <div class="card-body text-center">
                <i class="fas fa-lightbulb fa-3x mb-3 text-primary"></i>
                <h3 class="h4">Innovation</h3>
                <p class="text-muted">8 Articles</p>
                <a href="#" class="btn btn-outline-primary">View Articles</a>
              </div>
            </div>
          </div>

          <!-- Finance -->
          <div class="col-md-4 mb-4">
            <div class="card category-card fade-in">
              <div class="card-body text-center">
                <i class="fas fa-dollar-sign fa-3x mb-3 text-primary"></i>
                <h3 class="h4">Finance</h3>
                <p class="text-muted">16 Articles</p>
                <a href="#" class="btn btn-outline-primary">View Articles</a>
              </div>
            </div>
          </div>

          <!-- Technology -->
          <div class="col-md-4 mb-4">
            <div class="card category-card fade-in">
              <div class="card-body text-center">
                <i class="fas fa-microchip fa-3x mb-3 text-primary"></i>
                <h3 class="h4">Technology</h3>
                <p class="text-muted">19 Articles</p>
                <a href="#" class="btn btn-outline-primary">View Articles</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Popular Tags -->
    <section class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-5 fade-in">Popular Tags</h2>
        <div class="row justify-content-center">
          <div class="col-md-8 text-center fade-in">
            <a href="#" class="tag m-1">Business</a>
            <a href="#" class="tag m-1">Strategy</a>
            <a href="#" class="tag m-1">Marketing</a>
            <a href="#" class="tag m-1">Digital</a>
            <a href="#" class="tag m-1">Innovation</a>
            <a href="#" class="tag m-1">Leadership</a>
            <a href="#" class="tag m-1">Finance</a>
            <a href="#" class="tag m-1">Technology</a>
            <a href="#" class="tag m-1">Management</a>
            <a href="#" class="tag m-1">Startup</a>
            <a href="#" class="tag m-1">Growth</a>
            <a href="#" class="tag m-1">Analytics</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
 <?= loadPartial('footer') ?>

