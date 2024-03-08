<?php if ($this->session->flashdata('message')) { ?>
    <script type="text/javascript">
        alert('<?=$this->session->flashdata('message')?>');
    </script>
<?php
}
?>

<div class="login-container modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5 mt-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header p-5 pb-4 border-bottom-0">
                <h1 class="fw-bold mb-0 fs-2">로그인</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-5 pt-0">
                <form class="" action="/ci-opentutorial/index.php/auth/authentication" method="post">
                    <div class="form-floating mb-3">
                        <input type="" class="form-control rounded-3" name="id" id="id" placeholder="id">
                        <label for="id">아이디</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-3" id="password" placeholder="password">
                        <label for="password">비밀번호</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">로그인</button>
                </form>
            </div>
        </div>
    </div>
</div>