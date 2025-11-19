<?= loadPartial('head') ?>

<!-- Navigation -->
<?= loadPartial('nav') ?>

<?php foreach ($articles as $article): ?>
  <!-- Post Header -->
  <header class="post-header" style="background: url(/uploads/<?= $article->image_path ?>) center/cover">
    <div class="post-header-content">
      <div class="container">
        <h1 class="display-4 mb-3">
          <?= $article->title ?>
        </h1>
        <div class="d-flex align-items-center">
          <!-- <img src="assets/img/author-avatar.jpg" alt="Author Avatar" class="rounded-circle" -->
          <!-- style="width: 50px; height: 50px; object-fit: cover" /> -->
          <div class="ms-3">
            <p class="mb-0">By <?= $article->author ?></p>
            <p class="mb-0"><small>Published on <?= dateFormat($article->published_date) ?></small></p>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- Tags -->
          <div class="mb-4">
            <a href="#" class="tag">Business</a>
            <a href="#" class="tag">Strategy</a>
            <a href="#" class="tag">Innovation</a>
          </div>

          <!-- Article Content -->
          <div class="article-content fade-in">
            <!-- <p class="lead">
              In an ever-evolving business landscape, staying ahead requires
              adopting innovative strategies that align with current market
              trends and future predictions.
            </p>

            <h2>1. Digital Transformation</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>

             <img src="assets/img/strategy1.jpg" alt="Digital Transformation" class="img-fluid my-4 rounded" /> 

            <h2>2. Sustainable Business Practices</h2>
            <p>
              Ut enim ad minim veniam, quis nostrud exercitation ullamco
              laboris nisi ut aliquip ex ea commodo consequat.
            </p> -->

            <?php echo ($article->full_content); ?>
            <blockquote class="blockquote">
              <p>
                <?= $article->remark ?>
              </p>
              <footer class="blockquote-footer"><?= $article->remark_owner ?></footer>
            </blockquote>

            <!-- Continue with more sections -->
          </div>

          <!-- Author Box -->
          <div class="author-box fade-in">
            <div class="row">
              <!-- <div class="col-md-3">
                <img src="assets/img/author-avatar.jpg" alt="John Doe" class="author-avatar" />
              </div> -->
              <div class="col-md-9">
                <h4><?= $article->author ?></h4>
                <!-- <p class="text-muted">Business Strategy Consultant</p> -->
                <p>
                  <?= $article->about_author ?>
                </p>
                <div class="social-links">
                  <a href="#" class="btn btn-outline-primary me-2" aria-label="Twitter Profile"><i
                      class="fab fa-twitter"></i></a>
                  <a href="#" class="btn btn-outline-primary me-2" aria-label="LinkedIn Profile"><i
                      class="fab fa-linkedin"></i></a>
                  <a href="#" class="btn btn-outline-primary" aria-label="Website"><i class="fas fa-globe"></i></a>
                </div>
              </div>
            </div>
          </div>

          <!-- Comments Section -->
          <div class="comments-section mt-5 fade-in">
            <h3>Comments</h3>
            <!-- Comment Form -->
            <form class="mb-4" method="post" action="/comment/<?= $article->id ?>">
              <div class="mb-3">
                <textarea class="form-control" name="comment" rows="3" placeholder="Leave a comment"></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary">
                Post Comment
              </button>
            </form>

            <!-- Comments List -->
            <div class="comments-list">
              <!-- Sample Comment -->
              <div class="comment mb-4">
                <div class="d-flex">
                  <img src="assets/img/user-avatar.jpg" alt="User Avatar" class="rounded-circle me-3"
                    style="width: 50px; height: 50px; object-fit: cover" />
                  <div>
                    <h5 class="mb-1">Jane Smith</h5>
                    <p class="text-muted mb-2"><small>2 hours ago</small></p>
                    <p>
                      Great article! The insights about digital transformation
                      are particularly relevant for today's business
                      environment.
                    </p>
                    <button class="btn btn-sm btn-link">Reply</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <!-- Related Posts -->
          <div class="sidebar-section mb-5 fade-in">
            <h4>Related Posts</h4>
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-4">
                  <img src="assets/img/related1.jpg" class="img-fluid rounded-start" alt="Related post image" />
                </div>
                <div class="col-8">
                  <div class="card-body">
                    <h6 class="card-title">The Future of Remote Work</h6>
                    <p class="card-text">
                      <small class="text-muted">3 days ago</small>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- Add more related posts -->
          </div>

          <!-- Categories Widget -->
          <div class="sidebar-section mb-5 fade-in">
            <h4>Categories</h4>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Business Strategy
                <span class="badge bg-primary rounded-pill">14</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Marketing
                <span class="badge bg-primary rounded-pill">21</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Leadership
                <span class="badge bg-primary rounded-pill">11</span>
              </li>
            </ul>
          </div>

          <!-- Tags Cloud -->
          <div class="sidebar-section fade-in">
            <h4>Popular Tags</h4>
            <div class="tags-cloud">
              <a href="#" class="tag">Business</a>
              <a href="#" class="tag">Strategy</a>
              <a href="#" class="tag">Marketing</a>
              <a href="#" class="tag">Digital</a>
              <a href="#" class="tag">Innovation</a>
              <a href="#" class="tag">Leadership</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>

<?php endforeach; ?>

<!-- Footer -->

<?= loadPartial('footer') ?>

<?= loadPartial('scripts') ?>