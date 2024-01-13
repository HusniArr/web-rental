<?php include(ROOT . DS . 'app' . DS . 'views' . DS .'includes'. DS .'header.php');?>
<?php include(ROOT . DS . 'app' . DS . 'views' . DS .'includes'. DS .'navbar.php')?>

<div id="header" class="p-5">
    <h1 class="display-5 fw-bold title-header">Temukan layanan sewa mobil dan truk barang terbaik pilihan Anda</h1>
    <p class="fs-4 info">Di Pijar kami melayani berbagai macam pilihan kebutuhan sewa mobil dan truk barang. Fasilitas yang kami tawarkan diantaranya bisa menerima carteran mobil, truk angkutan barang ataupun pindahan dan rute perjalanan yang dilalui baik antar kota maupun provinsi.</p>
    <a href="#services" class="btn btn-primary btn-lg" role="button">LIHAT DAFTAR SEWA</a>
</div>
<div id="gallery" class="">
    <div class="container">
        <h1 class="title-gallery mt-4">GALERI KAMI</h1>
        <hr class="divider-gallery d-flex justify-content-center">
        <p>Lihat album perjalanan kami dari tahun ke tahun. Kami memiliki pelayanan prima siap melayani 1 x 24 jam.</p>
        <div class="content-gallery">
            <?php
                $galleryId = '';
                foreach ($galleries as $key => $row) {
                    echo '
                    <div class="card-image">
                        <img src="'.APP_URL.'/upload/galleries/'.$row->image.'" class="card-img-top" alt="'.$row->headline.'">
                        <h4>'.$row->headline.'</h4>
                        <p>'.$row->info.'</p>
                    </div>
                    ';

                    $galleryId = $row->id;
                }
            ?>
            <div id="remove-row">
                <button type="button" class="btn btn-sm btn-primary mt-2" id="btn-more" data-id="<?php echo $galleryId ?>">Load More</button>

            </div>
        </div>
    </div>
</div>
<div id="services">
    <div class="container">
        <h1 class="title-service mt-4">LAYANAN KAMI</h1>
        <hr class="divider-service">
        <div class="row mt-2">
            <?php 
                foreach ($services as $key => $row) {
                    echo '
                    <div class="col-6 mt-4">
                            <div class="card shadow-lg p-3 bg-body" aria-hidden="true">
                                <img src="'.APP_URL.'/upload/services/'.$row->image.'" class="card-img-top" alt="">
                                <div class="card-body card-service">
                                    <h5 class="card-title placeholder-glow">
                                    '.$row->car_name.'
                                    </h5>
                                    <p class="card-text placeholder-glow">
                                        Tarif : Rp '.number_format($row->cost, 0,',', '.').'
                                    </p>
                                    <p class="card-text placeholder-glow">
                                        '.$row->detail.'
                                    </p>
                                    <a href="https://wa.me/+6281277779999" target="_blank" class="btn btn-primary col-6">Order Sekarang</a>
                                </div>
                            </div>
                    </div>
                    
                    ';
                }
            
            ?>
            
        </div>
        
        <ul class="pagination mt-4">
            <?php if($page > 1) { ?>
                <li class="page-item">
                <a class="page-link" href="<?php echo APP_PATH."/?page=".($page - 1).""; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
                </li>
            <?php } ?>    

            <?php for($i=1; $i <= $totalPages; $i++) {?>
            <li class="page-item <?php echo ($page == $i ) ? 'active' : ''; ?>"><a class="page-link" href="<?php echo APP_PATH."/?page=$i"; ?>"><?php echo $i ?></a></li>
            <?php } ?>

            <?php if($page < $totalPages) {?>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php } else {?>
                <li class="page-item disabled">
                    <a class="page-link" href="<?php echo APP_PATH."/?page=".($page + 1).""; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<div id="contact" class="">
    <div class="container">
        <h1 class="title-contact mt-4">KONTAK KAMI</h1>
        <hr class="divider-contact">
    <div class="row">
                <div class="col-6">
                   <h4>Alamat Kantor</h4>
                    <ul class="office">
                        <li><i class="fa-solid fa-map-location"></i> Kantor : Jl. Pangeran Diponegoro KM 101, Kab. Banyumas</li>
                        <li><i class="fa-solid fa-envelope"></i> Email : admin@pijar.com</li>
                        <li><i class="fa-solid fa-phone-flip"></i> Telp/ Hp : 021777999</li>
                    </ul>
                    
                </div>
                <div class="col-6">
                    <h4>Sosial Media</h4>
                    <div class="sosmed">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-square-x-twitter"></i></a>
                    </div>
                </div>
            </div>

    </div>

</div>
  

<script>
    $(document).ready(function(){
        $("#btn-more").on("click", function(){
            let galleryId = $(this).data("id");
            let html = '';
            $("#btn-more").html("Loading...");
            $.ajax({
                url: "<?php echo APP_PATH ."/gallery/load_more"?>",
                method: "POST",
                data: { gallery_id : galleryId},
                dataType: 'JSON',
                success: function(response){

                    if(response != ''){
                        $("#remove-row").remove();
                        response.map(function(res){
                            html += `
                            <div class="card-image">
                                <img src="<?php echo APP_URL ."/upload/galleries/"?>${res.image}" class="card-img-top" alt="'.$row->headline.'">
                                <h4>${res.headline}</h4>
                                <p>${res.info}</p>
                            </div>
                            `;
                        });
                        html += `
                        <div id="remove-row">
                            <button type="button" class="btn btn-sm btn-primary mt-2" id="btn-more" data-id="<?php echo $galleryId ?>">Load More</button>

                        </div>
                        `;
                        $(".content-gallery").append(html);
                    }else{
                        $("#btn-more").html("Tidak ada data lagi")
                    }
                }
            })
        });
    })
</script>
<?php
    include(ROOT . DS . 'app' . DS . 'views' . DS .'includes'. DS .'footer.php');
?>