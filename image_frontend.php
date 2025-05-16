<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Input</title>
</head>
<body>
    <div class="image-input-container">
    <form id='uploadForm' enctype="multipart/form-data">
        Send these files:<br />
        <input type="file" name="userfile" id="fileInput" multiple /><br />
        <button type='button'onclick='submitFiles()'>Send Files</button>
    </form>
    </div>
</body>
<script>
async function submitFiles() {  
    const formData = new FormData();
    const fileInput = document.getElementById('fileInput');
    for (let i = 0; i < fileInput.files.length; i++) {
        formData.append('userfile[]', fileInput.files[i]);
    }

    formData.append('userId', '12345'); //attach new data

    response = await fetch('upload_image.php', {
        method: 'POST',
        body: formData
    })
    console.log(await response.text());
};
</script>
</html>