<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Markdown Editor</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/github-markdown-css/4.0.0/github-markdown.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
    }
    .editor {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }
    .editor textarea {
        flex: 1;
        height: calc(100vh - 50px);
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .editor .preview {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow-y: auto;
    }
    .editor .preview.markdown-body {
        padding: 0;
    }
    .editor button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }
</style>
</head>
<body>

<div class="editor">
    <textarea id="markdownInput" placeholder="Write your Markdown here..."></textarea>
    <div class="preview markdown-body" id="preview"></div>
    <button onclick="publish()">Publish</button>
</div>

<script>
    // Function to update the preview with Markdown content
    function updatePreview() {
        var markdownInput = document.getElementById('markdownInput').value;
        var preview = document.getElementById('preview');
        preview.innerHTML = marked(markdownInput);
    }

    // Function to publish the Markdown content (replace with your publish logic)
    function publish() {
        var markdownInput = document.getElementById('markdownInput').value;
        // Replace this with your publish logic, e.g., sending Markdown content to a server
        alert('Publishing content:\n\n' + markdownInput);
    }

    // Initial call to update the preview
    updatePreview();

    // Update the preview whenever the input changes
    document.getElementById('markdownInput').addEventListener('input', updatePreview);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/3.0.5/marked.min.js"></script>
</body>
</html>
