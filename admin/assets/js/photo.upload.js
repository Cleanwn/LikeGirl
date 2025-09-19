function imgUrlChange(url){
    const name = ImageController.targetInputName || 'imgUrl';
    let inputElement = document.querySelector(`input[name="${name}"]`);
    if (inputElement) {
        try {
            inputElement.value = url;
        } catch (error) {}
    }
}

// 当前选中的文件（点击或拖拽）
let currentFile = null;

// 点击缩略图区域触发文件选择
document.getElementById('thumbnailContainer').addEventListener('click', function() {
    document.getElementById('imageFile').click();
});

// 文件选择或拖拽后的统一处理函数
function handleFileSelect(event) {
    const file = event.target.files[0];
    if (!file) return;

    currentFile = file; // 保存当前文件
    const thumbnailImage = document.getElementById('thumbnailImage');
    const overlay = document.getElementById('thumbnailContainer').querySelector('.overlay');
    const fileNameSpan = document.getElementById('fileName');

    const reader = new FileReader();
    reader.onload = function(e) {
        thumbnailImage.src = e.target.result;
        thumbnailImage.style.display = 'block';
        overlay.style.opacity = '0';
        fileNameSpan.value = file.name; // 显示文件名
    }
    reader.readAsDataURL(file);
}

// 文件选择事件
document.getElementById('imageFile').addEventListener('change', handleFileSelect);

// 拖拽事件
const thumbnailContainer = document.getElementById('thumbnailContainer');

thumbnailContainer.addEventListener('dragover', function(event) {
    event.preventDefault();
    thumbnailContainer.classList.add('dragging');
    document.getElementById('fileName').value = '松开以上传文件';
});

thumbnailContainer.addEventListener('dragleave', function() {
    thumbnailContainer.classList.remove('dragging');
    document.getElementById('fileName').value = currentFile ? currentFile.name : '拖放文件或点击选择文件';
});

thumbnailContainer.addEventListener('drop', function(event) {
    event.preventDefault();
    thumbnailContainer.classList.remove('dragging');

    const file = event.dataTransfer.files[0];
    if (file) {
        handleFileSelect({ target: { files: [file] } });
    }
});

// 上传按钮点击事件
const uploadBtn = document.getElementById('uploadImg');
uploadBtn.addEventListener('click', function(e) {
    e.preventDefault();
    const fileInput = document.getElementById('imageFile');
    const file = currentFile || fileInput.files[0];

    if (!file) {
        toastr["warning"]("请先选择图片", "LikeGirl");
        return;
    }

    const fileNameSpan = document.getElementById('fileName');
    const formData = new FormData();
    formData.append('file', file, fileNameSpan.value);

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

            // 清理状态
            fileInput.value = '';
            fileNameSpan.value = '拖放文件或点击选择文件';
            currentFile = null;
            document.getElementById('thumbnailImage').style.display = 'none';

            //刷新当前页
            ImageController.loadImages(ImageController.currentPage);
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
