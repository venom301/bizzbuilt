<?= loadPartial('head') ?>

<?= loadPartial('nav') ?>
<div class="container-fluid py-3">
    <div class="row">
        <?php foreach ($articles as $article): ?>
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
                            <a href="/readmore" class="btn btn-primary">View full article</a>
                            <small class="text-muted">5 mins read</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="navbar navbar-dark d-flex justify-content-between">
    <h2 class="text-light">Create new post</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPostModal">
        <i class="fas fa-plus me-2"></i>New Post
    </button>
</div>

<!-- modal -->
<div class="modal fade" id="newPostModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/posts">
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="postTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="postCategory" class="form-label">Category</label>
                        <select name="category" class="form-select" id="postCategory">
                            <option value="">Select a category</option>
                            <option value="business">Business</option>
                            <option value="strategy">Strategy</option>
                            <option value="marketing">Marketing</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="postTitle" class="form-label">Author</label>
                        <input type="text" class="form-control" id="postAuthor" name="author">
                    </div>
                    <div class="mb-3">
                        <label for="postImage" class="form-label">Featured Image</label>
                        <input name="image" type="file" class="form-control" id="postImage" accept="image/*"
                            onchange="previewImage(this)">
                        <img id="imagePreview" src="#" alt="Preview" class="mt-2 img-fluid d-none">
                    </div>
                    <div class="mb-3">
                        <label for="editor" class="form-label">Content</label>
                        <textarea name="content" id="editor"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </form>
            </div>
        </div>
    </div>
</div> 

<?= loadPartial('scripts') ?>