<?= loadPartial('head') ?>

<?= loadPartial('nav') ?>

<!-- Hero Section -->
<section class="hero-section text-center">
  <div class="container">
    <h1 class="display-4 mb-4 fade-in">Welcome to BizBuilt</h1>
    <p class="lead mb-5 fade-in">
      Your source for the latest business insights and strategies
    </p>
    <div class="search-box fade-in">
      <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Search articles..."
        onkeyup="searchPosts()" />
    </div>
  </div>
</section>

<!-- Featured Posts -->
<section class="py-5">
  <div class="container">
    <h2 class="mb-4 fade-in">Featured Articles</h2>
    <div class="row">
      <!-- Featured Post -->
       <?php foreach($articles as $article): ?>
      <div class="col-md-4">
        <div class="card blog-card fade-in">
          <img src="/uploads/<?= $article->image_path ?>" class="card-img-top" alt="Blog post image" />
          <div class="card-body">
            <div class="mb-2">
              <a href="#" class="tag">Business</a>
              <a href="#" class="tag">Strategy</a>
            </div>
            <h5 class="card-title">
             <?= $article->title ?>
            </h5>
            <p class="card-text">
             <?= $article->content ?>
            </p>
            <div class="d-flex justify-content-between align-items-center">
              <a href="/readmore/<?= $article->id ?>" class="btn btn-primary">Read More</a>
              <small class="text-muted">5 mins read</small>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Newsletter Section -->
<section class="py-5 bg-light">
  <div class="container text-center">
    <h3 class="mb-4 fade-in">Subscribe to Our Newsletter</h3>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="fade-in">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Enter your email" />
            <button class="btn btn-primary" type="submit">Subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<?= loadPartial('footer') ?>

<!-- scripts -->
 <?= loadPartial('scripts') ?>