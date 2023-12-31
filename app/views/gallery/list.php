<?php 
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'header.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'navbar.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'sidebar.php');
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
          <a href="<?php echo APP_PATH?>/gallery" title="Go to Gallery" class="tip-bottom"
            ><i class="icon-home"></i> Galeri</a
          >
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    
                    <div class="widget-title">
                        <span class="icon"><a href="<?php echo APP_PATH ?>/gallery/create" class="btn btn-mini btn-primary"><i class="icon-plus icon-white"></i>Tambah</a></span>
                        <h5>Data Galeri</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table id="tb-gallery" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Headline</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Pembuatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){

        new DataTable('#tb-gallery', {
             ajax: {
                url: "<?php echo APP_PATH ?>/gallery/data",
                type: 'GET'
            },
            columns: [
                { data: 'headline' },
                { data: 'info' },
                { data: 'image',
                  render: function( data, type, row) {
                    return '<img src="<?php echo APP_URL ?>/upload/galleries/'+row.image+'" width="100">';
                  }
                },
                { data: 'created_at' },
                { data: 'action'}
            ],
            order:[[3, 'desc']],
            processing: true,
            serverSide: true,
            lengthMenu:[10, 25, 50, 100],
            pagingType: "full_numbers",
            dom: '<""l>t<"F"fp>',

        })
   })
</script>
<?php 
include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'footer.php');
?>