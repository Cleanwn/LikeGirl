<?php
session_start();
include_once 'Nav.php';
?>
    
<style>
.rounded-8 {
    border-radius: 8px !important;
}
.custom-file-label {
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 20px;
    transition: background-color 0.3s ease;
}

#thumbnailContainer {
    position: relative;
    width: 150px;
    height: 150px;
    border: 2px dashed #ccc;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
}

.thumbnail-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.no-border {
    border: none;
    outline: none;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
    border-radius: 10px;
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.upload-area:hover .overlay {
    opacity: 1;
}

.modal-title.text-center {
    text-align: center;
}
a{text-decoration:none}
.navbar-search .form-control {
    flex-grow: 1;
}

.navbar-search button {
    margin-left: 5px;
}

.navbar-function .btn {
	width: 40px;
    margin: 5px;
}

.btn {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: clip;
  box-shadow: none !important; 
}
.navbar-custom-i{
    background-color: rgb(255,255,255);
    border-radius: 8px;
    box-shadow: 0 3px 4px rgba(0,0,0,0.1);
    padding: 8px 0;
}
.container-fluid{
    padding: 0;
}

@media (max-width: 768px) {
    .navbar-custom-i .container-fluid {
        flex-direction: column;
    }

    .navbar-search,
    .navbar-function {
        width: 100%;
        margin-top: 10px;
        text-align: center;
    }

	.navbar-function .mx-2{
		width: 100%
	}
}

.img-card {
    position: relative;
    height: 300px;
    margin: 15px 0;
    cursor: pointer;
    transition: all 0.3s ease;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.img-card:hover:not(.selected) {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(250,92,124,0.4);
}

.img-card:hover:not(.selected) .selection-marker{
    display: flex;
}

.img-card.selected .selection-marker{
    display: flex;
}

.img-background {
    position: absolute;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    transition: opacity 0.3s ease;
}

.selection-marker {
    position: absolute;
    right: 10px;
    top: 10px;
    width: 1.5rem;
    height: 1.5rem;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: none;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

.selected {
    border: 1px solid #fa5c7c;
    box-shadow: 0 0 0 2px rgba(250,92,124,0.2);
}

.text-info {
    position: absolute;
    border-radius: 10px;
    bottom: 0;
    left: 0;
    right: 0;
    height: 25%;
    background-image: linear-gradient(to top, #000, transparent);
    display: flex;
    flex-direction: column;
    padding: 15px;
    color: white;
    transition: transform 0.3s ease;
}

.img-card.selected{
    transform: translateY(-5px);
}

.img-card.selected .fa-check-circle {
    opacity: 1;
}

.fa-check-circle {
    color: rgba(250,92,124,0.4);
    font-size: 1.5rem;
    opacity: 0;
}

.name {
    font-size: .875rem;
    line-height: 1.25rem;
    margin-bottom: 8px;
    overflow: hidden;
    text-overflow: ellipsis;
    color: rgb(255 255 255);
}

.time {
    font-size: .75rem;
    line-height: 1rem;
    overflow: hidden;
    text-overflow: ellipsis;
    color: rgb(255 255 255);
}
.round-6{
    border-radius: 6px;
}
</style>
<nav class="navbar navbar-expand-lg  navbar-custom-i">
    <div class="container-fluid">
        <div class="navbar-search d-flex align-items-center">
            <input type="text" class="form-control round-6" placeholder="输入关键字..." id="keywords">
            <button class="btn btn-success round-6" style="width: 4rem" id="btn-search">
                <i class="fas fa-search"></i> 
            </button>
            <button class="btn btn-primary ms-2 round-6" style="width: 4rem" onclick='location.href=("/admin/photoSet.php")' >
                <i class="fas fa-sliders-h"></i>
            </button>
            <button class="btn btn-danger ms-2 round-6" style="width: 4rem" disabled id="btn-del" >
                <i class="fa fa-trash"></i>
            </button>
        </div>

        <div class="navbar-function ms-auto d-flex align-items-center">
            <button class="btn btn-success round-6" id="prevPage">
                <i class="fas fa-chevron-left"></i> 
            </button>
            <span class="mx-2">第<span id="currentPage">0</span>页 / 共<span id="totalPages">0</span>页, 共 <span id="totalCount">0</span> 张</span>
            <button class="btn btn-success round-6" id="nextPage">
                <i class="fas fa-chevron-right"></i>
            </button>
            <button class="btn btn-primary ms-2 round-6" style="width: 4rem"  id="btn-upload" data-toggle="modal" data-target="#uploadModal">
                <i class="fa fa-upload"></i>
            </button>
        </div>
    </div>
</nav>

<!--上传图片-->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="uploadModalLabel">图片上传</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center">
        <div class="upload-area d-flex flex-column align-items-center mb-3">
          <div id="thumbnailContainer" class="relative">
            <img src="" alt="图片缩略图" id="thumbnailImage" class="thumbnail-image" style="display: none; width: 150px; height: 150px; object-fit: cover; border-radius: 10px; position: relative; z-index: 1;">
            <div class="overlay d-flex flex-column align-items-center justify-content-center" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); border-radius: 10px; opacity: 0; transition: opacity 0.3s ease;">
            </div>
          </div>
          <input id="fileName" type="text" class="text-center mt-2 no-border" placeholder="点击上传框选择文件" value="" required>
          <span class="text-center mt-2">选择后建议重命名(保留后缀如.png/.jpg)，便于图库查找</span>
        </div>
        <button class="btn btn-primary"  type="submit" id="uploadImg">上传图片</button>
      </div>
    </div>
  </div>
</div>
<input type="file" name="imageFile" id="imageFile" accept="image/*" required class="d-none">

<div class="row" id="imageContainer"></div>

<script>
const ImageController = {
    currentPage: 1,
    totalPages: 1,
    isLoading: false,
    searchKey: Object,
    delBtn:Object,
    selectedImgs: Object,

    init() {
        this.searchKey = document.getElementById('keywords');
        this.delBtn = document.getElementById('btn-del');
        this.selectedImgs = new Set();
        this.setupEventListeners();
        this.loadImages();
    },

    setupEventListeners() {
        document.getElementById('prevPage').addEventListener('click', () => this.changePage(-1));
        document.getElementById('nextPage').addEventListener('click', () => this.changePage(1));
        document.getElementById('btn-search').addEventListener('click', () => this.loadImages());
        this.delBtn.addEventListener('click', () => this.deleteImg());
    },

    async loadImages(page = 1) {
        if (this.isLoading) return;
        this.isLoading = true;
        try {
			const formData = new FormData();
			formData.append('page', page);
			formData.append('q', this.searchKey.value);
            const response = await fetch(`/admin/photoFunc.php?func=get_img`,{
						method: 'POST',
						body: formData
					});
            const data = await response.json();

            if (response.ok) {
				if(data.status){
				    if(data.data.total == 0){
				        this.renderNone();
			            toastr["warning"]("还没有图片欧", "LikeGirl");
				    }else{
				        this.renderImages(data.data.data);
					    this.updatePagination(data.data.current_page, data.data.last_page,data.data.total);
				    }
				}else{
				    this.renderNone();
			        toastr["error"]("图片加载失败", "LikeGirl");
				}
			}
			else {
			    this.renderNone();
			    toastr["error"]("图片加载失败", "LikeGirl");
            }
            
        } catch (error) {
            this.renderNone();
            toastr["error"]("图片加载失败", "LikeGirl");
        } finally {
            this.isLoading = false;
        }
    },
    
    renderNone(){
        const container = document.getElementById('imageContainer');
        container.innerHTML = `<div style="margin-top: 5rem;" class="col-lg-12 text-center">
            <img src="/admin/assets/images/no-images.svg" alt="还没有图片欧">
            <div style="text-align: center;color: #ccc"><p>相册像个被遗忘的魔法口袋<br/>此刻里面空空如也<br/>大概是我的美好回忆都在迷路<br/>还没来得及钻进这个小天地</p></div>
        </div>`;
    },

    renderImages(images) {
        const container = document.getElementById('imageContainer');
        container.innerHTML = '';

        images.forEach(img => {
            
            const col = document.createElement('div');
            col.className = 'col-lg-3';
			
			const card = document.createElement('div');
            card.className = 'img-card';
            card.dataset.id = img.key;

            const background = document.createElement('div');
            background.className = 'img-background';
            background.style.backgroundImage = `url('${img.links.url}')`;

            const marker = document.createElement('div');
            marker.className = 'selection-marker';
            marker.innerHTML = `<i class="far fa-check-circle"></i>`;

            const info = document.createElement('div');
            info.className = 'text-info';
            info.innerHTML = `
                <div class="name">${img.origin_name}</div>
                <div class="time">${img.date}</div>
            `;
            card.append(background, marker, info);
			col.append(card);
            container.appendChild(col);

            card.addEventListener('click', () => this.toggleSelection(card));
        });
    },

    changePage(direction) {
        let newPage = this.currentPage + direction;
		if(newPage<1 || newPage>this.totalPages) {
		    newPage = 1;
		}
        if (newPage >= 1 && newPage <= this.totalPages) {
            this.currentPage = newPage;
            this.loadImages(newPage);
        }
    },

    updatePagination(current_page, total_pages, total_count) {
        this.currentPage = current_page;
        this.totalPages = total_pages;
        document.getElementById('currentPage').textContent = current_page;
        document.getElementById('totalPages').textContent = total_pages;
        document.getElementById('totalCount').textContent = total_count;
    },

    toggleSelection(card) {
        card.classList.toggle('selected');
        if (this.selectedImgs.has(card.dataset.id)) {
            this.selectedImgs.delete(card.dataset.id);
          } else {
            this.selectedImgs.add(card.dataset.id);
          }
          
        if (this.selectedImgs.size==0){
            this.delBtn.disabled = true;
        }else{
            this.delBtn.disabled = false;
        }
    },
    
    deleteImg(){
        if (!confirm('您确认删除所选图片吗')) {
            return;
        }
        
        const array = Array.from(this.selectedImgs);
        fetch('/admin/photoFunc.php?func=del_img', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ keys: array })
        })
          .then(response => response.json())
          .then(data => {
              if(data.status){
                  toastr["success"](data.message, "LikeGirl");
                  this.selectedImgs.clear();
                  this.loadImages();
              }else{
                  toastr["error"](data.message, "LikeGirl");
              }
          })
          .catch(error => {
              console.log(error)
          });
    }
};

ImageController.init();


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
            ImageController.loadImages();
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
        toastr["error"]("不支持的文件格式!", "LikeGirl");
    })
    .finally(() => {
        uploadBtn.disabled = false;
        uploadBtn.innerHTML = '上传图片';
    });
    
});
</script>



<?php
include_once 'Footer.php';
?>

</body>
</html>