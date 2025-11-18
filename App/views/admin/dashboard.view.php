<?= loadPartial('head') ?>
<div class="d-flex">
    <!-- Sidebar -->
    <?= loadAdminPartial('sidebar') ?>

    <!-- Main Content -->
    <div class="admin-content flex-grow-1">
        <div class="container-fluid py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Dashboard Overview</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPostModal">
                    <i class="fas fa-plus me-2"></i>New Post
                </button>
            </div>

            <!-- Stats Cards -->
            <div class="row">
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 class="h5 mb-3">Total Posts</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h2 mb-0"><?= count($articles) ?></span>
                            <i class="fas fa-file-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 class="h5 mb-3">Comments</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h2 mb-0">243</span>
                            <i class="fas fa-comments fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 class="h5 mb-3">Categories</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h2 mb-0">12</span>
                            <i class="fas fa-tags fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stats-card">
                        <h3 class="h5 mb-3">Users</h3>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h2 mb-0">1,234</span>
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Posts Table -->
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="card-title h5 mb-0">Recent Posts</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td><?= $article->title ?></td>
                                        <td><?= $article->author ?></td>
                                        <td><?= $article->category ?></td>
                                        <td><?= dateFormat($article->published_date) ?></td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td>
                                            <form method="POST" action="/admin/post/delete/<?= $article->id ?>">
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="/admin/edit/<?= $article->id ?>" title="edit"
                                                    class="btn btn-sm btn-primary me-1" aria-label="Edit post"><i
                                                        class="fas fa-edit"></i></a>
                                                <button type="submit" title="delete" class="btn btn-sm btn-danger"
                                                    aria-label="Delete post"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- Add more rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Post Modal -->
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
                    <!-- full content -->
                    <div class="mb-3">
                        <label for="editor" class="form-label">Full Content</label>
                        <textarea id="editor" name="full_content" class="form-control"
                            rows="8"><?php echo htmlspecialchars($article->full_content ?? ''); ?></textarea>
                    </div>
                    <input type="tex" class="form-control mb-2" name="tags" id="tags" placeholder="Add tags">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- scripts -->
<?= loadPartial('scripts') ?>