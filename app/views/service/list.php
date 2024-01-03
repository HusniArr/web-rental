<?php 
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'header.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'navbar.php');
  include (ROOT.DS.'app'.DS.'views'.DS.'partials'.DS.'sidebar.php');
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
          <a href="<?php echo APP_PATH?>/service" title="Go to Gallery" class="tip-bottom"
            ><i class="icon-home"></i> Layanan</a
          >
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    
                    <div class="widget-title">
                        <span class="icon"><a href="<?php echo APP_PATH ?>/service/create" class="btn btn-mini btn-primary"><i class="icon-plus icon-white"></i>Tambah</a></span>
                        <h5><?php echo $title ?></h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table id="tb-gallery" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Mobil</th>
                                    <th>Jenis Mobil</th>
                                    <th>Detail</th>
                                    <th>Biaya</th>
                                    <th>Gambar</th>
                                    <th>Tanggal Upload</th>
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
                url: "<?php echo APP_PATH ?>/service/data",
                type: 'GET'
            },
            columns: [
                { data: 'car_name' },
                { data: 'car_type' },
                { data: 'detail' },
                { data: 'cost' },
                { data: 'image',
                  render: function( data, type, row) {
                    return '<img src="<?php echo APP_URL ?>/upload/services/'+row.image+'" width="100">';
                  }
                },
                { data: 'created_at'},
                { data: 'action'}
            ],
            order:[[5, 'desc']],
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