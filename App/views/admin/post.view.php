<!-- head -->
<?= loadPartial('head') ?>

<?= loadPartial('nav') ?>

<section>
<div class="container">
    <h2 class="mb-4 fade-in">All Articles</h2>
    <div class="row">
        <!-- Featured Post -->
        <?php foreach ($articles as $article): ?>
            <div class="col-md-4">
                <div class="card blog-card fade-in">
                    <img src="<?= $article->image_path ?>" class="card-img-top" alt="Blog post image" />
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
                            <a href="/readmore" class="btn btn-primary">View Post</a>
                            <small class="text-muted">5 mins read</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>
<!-- scripts -->
<?= loadPartial('scripts') ?>