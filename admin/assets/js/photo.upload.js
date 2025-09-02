function imgUrlChange(url){
    const name = ImageController.targetInputName || 'imgUrl';
    let inputElement = document.querySelector(`input[name="${name}"]`);
    if (inputElement) {
        try{
                inputElement.value = url;
                return; 
        }catch (error) {}
    }
}

document.getElementById('thumbnailContainer').addEventListener('click', function() {
    document.getElementById('imageFile').click();
});

document.getElementById('imageFile').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const thumbnailImage = document.getElementById('thumbnailImage');
    const thumbnailContainer = document.getElementById('thumbnailContainer');
    const overlay = thumbnailContainer.querySelector('.overlay');
    const fileNameSpan = document.getElementById('fileName');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            thumbnailImage.src = e.target.result;
            thumbnailImage.style.display = 'block';
            overlay.style.opacity = '0';
            fileNameSpan.value = file.name;
        }
        reader.readAsDataURL(file);
    } else {
        thumbnailImage.style.display = 'none';
        overlay.style.opacity = '1';
        fileNameSpan.value = '点击上传框选择文件';
    }
});

const uploadBtn = document.getElementById('uploadImg');

uploadBtn.addEventListener('click', function(e) {
    e.preventDefault();
    const fileInput = document.getElementById('imageFile');
    const file = fileInput.files[0];
    if (!file) {
        toastr["warning"]("请先选择图片", "LikeGirl");
        return;
    }
    const fileNameSpan = document.getElementById('fileName');
    const formData = new FormData();
    formData.append('file', file, fileNameSpan.value)
    
    uploadBtn.disabled = true;
    uploadBtn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
        正在上传
    `;
    fetch('/admin/photoFunc.php?func=upload', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status) {
            toastr["success"]("上传成功", "LikeGirl");
            $('#uploadModal').modal('hide'); 
            imgUrlChange(data.data.links.url);
			fileInput.value = '';
            fileNameSpan.value = '';
            const thumbnailImage = document.getElementById('thumbnailImage');
            if (thumbnailImage) {
                thumbnailImage.style.display = 'none';
            }
        } else {
            toastr["error"](data.message, "LikeGirl");
        }
    })
    .catch(error => {
        toastr["error"]("上传失败", "LikeGirl");
    })
    .finally(() => {
        uploadBtn.disabled = false;
        uploadBtn.innerHTML = '上传图片';
    });
    
});