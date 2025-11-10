// Scroll animation
document.addEventListener('DOMContentLoaded', function() {
    const fadeElems = document.querySelectorAll('.fade-in');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.1 });
    
    fadeElems.forEach(elem => observer.observe(elem));

    // Initialize form handlers
    initializeForms();
});

// Form handling
function initializeForms() {
    // Comment form handling
    const commentForm = document.querySelector('.comment-form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            this.reset();
            // Your PHP will handle the form submission
        });
    }

    // Newsletter form handling
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            this.reset();
            // Your PHP will handle the newsletter subscription
        });
    }
}

// Image preview for post creation/editing
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            if (preview) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Dynamic tag management
function addTag() {
    const tagInput = document.getElementById('tagInput');
    const tagContainer = document.getElementById('tagContainer');
    
    if (tagInput && tagContainer && tagInput.value.trim() !== '') {
        const tag = document.createElement('span');
        tag.className = 'tag me-2 mb-2';
        tag.innerHTML = `
            ${tagInput.value}
            <button type="button" class="btn-close ms-2" onclick="this.parentElement.remove()"></button>
        `;
        tagContainer.appendChild(tag);
        tagInput.value = '';
    }
}

// Client-side search functionality
function searchPosts() {
    const searchInput = document.getElementById('searchInput');
    const searchTerm = searchInput?.value.toLowerCase() || '';
    const posts = document.querySelectorAll('.blog-card');
    
    posts.forEach(post => {
        const title = post.querySelector('.card-title')?.textContent.toLowerCase() || '';
        const excerpt = post.querySelector('.card-text')?.textContent.toLowerCase() || '';
        const tags = Array.from(post.querySelectorAll('.tag')).map(tag => tag.textContent.toLowerCase());
        
        const matches = title.includes(searchTerm) || 
                       excerpt.includes(searchTerm) ||
                       tags.some(tag => tag.includes(searchTerm));
        
        post.style.display = matches ? 'block' : 'none';
    });
}

// Form validation
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return true;

    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });

    return isValid;
}

// Toggle password visibility in login/register forms
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    
    if (input && icon) {
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
}