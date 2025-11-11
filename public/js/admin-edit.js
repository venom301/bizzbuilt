function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.classList.add('d-none');
    }
}

function addTag() {
    const tagInput = document.getElementById('tagInput');
    const tagContainer = document.getElementById('tagContainer');
    const tagValue = tagInput.value.trim();
    if (tagValue) {
        const tagElement = document.createElement('span');
        tagElement.className = 'tag';
        tagElement.innerHTML = tagValue + ' <span class="remove-tag" onclick="removeTag(this)">&times;</span>';
        tagContainer.appendChild(tagElement);
        tagInput.value = '';
    }
}

function removeTag(element) {
    element.parentElement.remove();
}
