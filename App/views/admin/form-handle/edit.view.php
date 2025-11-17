<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <?= loadAdminPartial('sidebar') ?>
        <!-- Main Content -->
        <div class="admin-content flex-grow-1">
            <div class="container py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Edit Article</h2>
                    <a href="/admin/posts" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Back to Posts
                    </a>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title h5 mb-0">Edit Article Details</h3>
                    </div>
                    <div class="card-body">
                        <?php foreach ($articles as $article): ?>
                            <form action="/admin/posts/update" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($article->id) ?? ''; ?>">
                                <div class="mb-3">
                                    <label for="postTitle" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="postTitle" name="title"
                                        value="<?php echo htmlspecialchars($article->title) ?? ''; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="postCategory" class="form-label">Category</label>
                                    <select class="form-select" id="postCategory" name="category" required>
                                        <option value="">Select a category</option>
                                        <option value="business" <?php echo ($article->category == 'business') ? 'selected' : ''; ?>>Business</option>
                                        <option value="strategy" <?php echo ($article->category == 'strategy') ? 'selected' : ''; ?>>Strategy</option>
                                        <option value="marketing" <?php echo ($article->category == 'marketing') ? 'selected' : ''; ?>>Marketing</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="postImage" class="form-label">Featured Image</label>
                                    <input type="file" class="form-control" id="postImage" name="image" accept="image/*"
                                        onchange="previewImage(this)">
                                    <?php if (!empty($article->image_path)): ?>
                                        <img id="imagePreview" src="<?php echo $article->image_path; ?>" alt="Current Image"
                                            class="mt-2 img-fluid">
                                    <?php else: ?>
                                        <img id="imagePreview" src="#" alt="Preview" class="mt-2 img-fluid d-none">
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="editor" class="form-label">Content</label>
                                    <textarea id="editor" name="content" class="form-control"
                                        rows="3"><?php echo htmlspecialchars($article->content ?? ''); ?></textarea>
                                </div>
                                <!-- full content -->
                                <div class="mb-3">
                                    <label for="editor" class="form-label">Full Content</label>
                                    <textarea id="editor" name="full_content" class="form-control"
                                        rows="8"><?php echo htmlspecialchars($article->full_content ?? ''); ?></textarea>
                                </div>

                                <input type="tex" class="form-control mb-2" name="tags" id="tags" placeholder="Add tags">

                                <!-- <div class="mb-3">
                                    <label class="form-label">Tags</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tagInput" placeholder="Add a tag">
                                        <button class="btn btn-outline-secondary" type="button"
                                            onclick="addTag()">Add</button>
                                    </div>
                                    <div id="tagContainer" class="mt-2">
                                        <?php
                                        $tags = explode(',', $article->tags ?? '');
                                        foreach ($tags as $tag):
                                            if (!empty(trim($tag))):
                                                ?>
                                                <span class="tag"><?php echo htmlspecialchars(trim($tag)); ?> <span
                                                        class="remove-tag" onclick="removeTag(this)">&times;</span></span>
                                                <?php
                                            endif;
                                        endforeach;
                                        ?>
                                    </div>
                                </div> -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2"
                                        onclick="window.history.back()">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update Post</button>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/admin-edit.js"></script>
</body>

</html>