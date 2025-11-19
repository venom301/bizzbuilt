<?= loadPartial('head') ?>
<div class="d-flex">
    <!-- Sidebar -->
    <?= loadAdminPartial('sidebar') ?>

    <!-- Main Content -->
    <div class="admin-content flex-grow-1">
        <div class="container-fluid py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Comments Management</h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCommentModal">
                    <i class="fas fa-plus me-2"></i>Add Comment
                </button>
            </div>

            <!-- Comments Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title h5 mb-0">All Comments</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Blog Post</th>
                                    <th>Comment</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($comments) && !empty($comments)): ?>
                                    <?php foreach ($comments as $comment): ?>
                                        <tr>
                                            <td><?= $comment->id ?? 'N/A' ?></td>
                                            <td><?= $comment->title ?? 'N/A' ?></td>
                                            <td class="text-truncate" style="max-width: 300px;">
                                                <?= htmlspecialchars($comment->comment ?? '') ?>
                                            </td>
                                            <td><?= $comment->commenter_email ?? 'Anonymous' ?></td>
                                            <td><?= dateFormat($comment->created_at ?? '') ?></td>
                                            <td>
                                                <span
                                                    class="badge bg-<?= ($comment->status ?? 'pending') === 'approved' ? 'success' : 'warning' ?>">
                                                    <?= ucfirst($comment->status ?? 'pending') ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <?php if (($comment->status ?? 'pending') !== 'approved'): ?>
                                                        <form method="POST" action="/admin/comments/approve/<?= $comment->id ?>"
                                                            class="d-inline">
                                                            <input type="hidden" name="_method" value="patch">
                                                            <button type="submit" class="btn btn-sm btn-success" title="Approve">
                                                                <i class="fas fa-check"></i>
                                                            </button>
                                                        </form>
                                                    <?php endif; ?>
                                                    <form method="POST" action="/admin/comments/delete/<?= $comment->id ?>"
                                                        class="d-inline">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No comments found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Comment Modal (Optional) -->
<div class="modal fade" id="newCommentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/admin/comments">
                    <div class="mb-3">
                        <label for="blogId" class="form-label">Blog Post ID</label>
                        <input type="number" name="blog_id" class="form-control" id="blogId" required>
                    </div>
                    <div class="mb-3">
                        <label for="commentText" class="form-label">Comment</label>
                        <textarea name="comment" class="form-control" id="commentText" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" id="author">
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<?= loadPartial('scripts') ?>