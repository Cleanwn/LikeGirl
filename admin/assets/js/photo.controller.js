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
			            //toastr["warning"]("还没有图片欧", "LikeGirl");
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
        //防止翻到末页再点下一页直接跳回第一页
		if (newPage < 1 || newPage > this.totalPages) return;
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
                  this.loadImages(this.currentPage);
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