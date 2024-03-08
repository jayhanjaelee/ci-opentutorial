 <style>
    .topic-container {
        flex-grow: 2;
        padding-left: 0;
        padding-right: 0;
    }
 </style>

<!-- topic start -->
 <div class="topic-container border border-1 border-primary container">
     <div class="row">
         <div class="col-md-8"></div>
             <div class="content p-3">
               <a class="btn btn-primary" href="<?=$this->config->base_url() . '/topic/add'?>">글작성</a>
                <div>
                    <h1>제목: <?= $topic->title ?></h1>
                </div>
                <div><?=kdate($topic->created)?></div>
                 <?=auto_link($topic->description)?>
             </div>
         </div>
     </div>
 </div>
 <!-- topic end -->

</div>
<!-- topics end -->