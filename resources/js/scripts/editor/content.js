function contentEditor(){
    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write your thoughts...',
        modules: {
            toolbar: [
                ['bold', 'italic'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ]
        }
    });
    
    document.getElementById('text_form').onsubmit = function() {
        document.getElementById('content').value = quill.root.innerHTML;
    };
}

contentEditor();