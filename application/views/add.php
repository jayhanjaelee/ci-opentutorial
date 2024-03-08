<div class="container-fluid">
    <?php echo validation_errors() ?>
    <h1 class="mt-3 text-center">Topic Add Page</h1>
    <form action="<?= $this->config->base_url() . 'topic/add' ?>" method="POST">
        <input type="text" name="title" placeholder="제목" style="width: 100%;">
        <textarea class="mt-3 span12" name="description" id="" placeholder="본문" cols="30" rows="15" style="width: 100%;"></textarea>
        <input type="submit" value="제출">
    </form>
</div>

<script type="text/javascript" src="<?=str_replace('index.php', '', $this->config->base_url()) . 'static/lib/ckeditor/ckeditor.js' ?>"></script>
<script>
    CKEDITOR.replace('description');
</script>