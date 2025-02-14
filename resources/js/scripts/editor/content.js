function contentEditor(){
    const toolbarOptions = [['bold', 'italic', 'underline', 'strike'],  ['code-block']];

    var quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Write your thoughts...',
        modules: {
            toolbar: toolbarOptions
        }
    });
    
    document.getElementById('text_form').onsubmit = function() {
        document.getElementById('content').value = quill.root.innerHTML;
    };
}

contentEditor();