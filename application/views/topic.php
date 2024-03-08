 <style>
    .topic-container {
        flex-grow: 2;
        padding-left: 0;
        padding-right: 0;
    }
 </style>

 <div class="topic-container border border-1 border-primary container">
     <div class="row">
         <div class="col-md-8">
             <div class="content p-3">
                <button type="button" class="btn btn-primary mb-3">글 작성</button>
                <div>
                    <h1>제목: <?= $topic->title ?></h1>
                </div>
                 <p><?= $topic->description ?></p>
             </div>
         </div>
     </div>
 </div>
 <!-- topic end -->

</div>
<!-- topics end -->