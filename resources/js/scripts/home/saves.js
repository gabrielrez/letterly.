const posts_save_btn = document.querySelectorAll('.writing_save');

const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

posts_save_btn.forEach(post => {
    post.addEventListener('click', async function (event) {
        event.preventDefault();

        const writing_id = post.dataset.id;
        const icon = post.querySelector('i');

        try {
            const response = await fetch(`/writings/${writing_id}/toggle-save`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });

            const data = await response.json();

            if (data.success) {
                post.classList.toggle('text-primary', data.saved);

                if (data.saved) {
                    showHeartEffect(post);
                    icon.classList.remove('fa-regular');
                    icon.classList.add('fa-solid');
                } else {
                    icon.classList.remove('fa-solid');
                    icon.classList.add('fa-regular');
                }
            }
        } catch (error) {
            console.error('Error on saving/unsaving writing:', error);
        }
    });
});

function showHeartEffect(element) {
    const save = document.createElement('span');
    save.innerHTML = '<i class="fa-solid fa-bookmark"></i>';
    save.classList.add('save-effect');

    element.parentElement.appendChild(save);

    setTimeout(() => {
        save.remove();
    }, 1200);
}
