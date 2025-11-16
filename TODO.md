- [x] Edit public/upload.php: Fix uploadDir to **DIR** . '/uploads/', wrap upload logic in function uploadImage() returning $filename or null, remove DB code and echo.
- [x] Edit App/Controllers/AdminController.php: In create method, change require to require_once, call $filename = uploadImage() and use it directly.

my image doesn't sim to beuploading to my data base from thr create function can you help me figure this out, 