<style>
    .modal-dialog{
        position: fixed;
        left: 300px;
        width: 900px !important;
        height: 600px !important;
    }
    .modal-content{
        width: 900px !important;
        height: 600px !important;
    }
    .file-manager{
        position: relative;
        display: block;
    }
    .file-list,
    .download-file{
        position: absolute;
    }
    .file-list{
        z-index: 999 !important;
    }
    .download-file form{
        width: 100%;
        height: 100%;
    }
</style>
<!-- Button trigger modal -->
<div class="col-md-6">
<button type="button" id="galeriya" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
  Qaleriya
</button>

<!-- Modal -->
<div class="full-modal">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="file-manager">
        <div class="modal-content file-list">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Şəkillər</h5>
                
                <button type="button" class="btn btn-success" id="downloadBtn">Şəkil yüklə</button>
            </div>
            <div class="modal-body">
            <div class="file-list-table">
                <div>
                {{ App\Models\Files::orderBy('id', 'desc')->paginate(20)->links() }}
                </div>
                <div id="file_list">

                </div>
            </div>
            </div>
        </div>
        <div class="modal-content download-file">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Şəkil yüklə</h5>
                <button type="button" class="btn btn-success" id="listBtn">Şəkillər</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="fileForm" class="dropzone" enctype="multipart/form-data">
                    @csrf
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>



